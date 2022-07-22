<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceDetail;
use App\Models\products\Product;
use App\Models\Stock;
use App\Models\Batch;
class SaleInvoiceController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function render()
    {
        $invoice_no=mt_rand(0,8889);
        return view("pages/sale/invoice",compact("invoice_no"));
    }

     public function getStock(Request $request,$id)
        {
             $productArr = Stock::where('product_id',$id)->with('product','batch')->first();
             $batchArr=Stock::where('product_id',$id)->with('batch')->get()->toArray();
              return response()->json(['productArr' => $productArr, 'batchArr' => $batchArr]);
            
            // return response()->json([$data,$data1]);
        }
         public function getBatches(Request $request)
        {
            $data=Stock::with('batch')->where('product_id',$request->product_id)->get();
                 return response()->json($data);
        }

    public function getBatcheWiseProduct(Request $request)
        {
             $data=Stock::where('product_id',$request->product_id)->where('batch_id',$request->batch_id_modal)->with('batch','product')->first();
              return response()->json($data);

        }




     public function purchaseSale(Request $request)
        {
            return view('pages.reports.sale.sale_report');
        }
     public function allSaleProducts(Request $request){
        if (request()->has('q')) {
            $product = Product::where('name','like','%'.$request->q.'%')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('stocks.quantity', '>', '0')->select('products.*','stocks.product_id')
            ->groupBy('name')->get();

            $product = $product->map(function($item,$key){
            return ['id' => $item['id'],'text' => $item['name'].' - '.$item['product_code']];
            });
            return response()->json(['items' => $product]);
        }
        return response()->json($response);
    }

    public function searchSaleReport(Request $request)
    {
        $from=$request->from_date;
        $to=$request->to_date;
         $from_date=date('Y-m-d', strtotime($from));
         $to_date=date('Y-m-d', strtotime($to));
        $new = SaleInvoice::whereBetween('date',[ $from_date,$to_date])->with('customer','branch','user')->get();
        return response()->json($new);
    }
    public function saleDetail(Request $request,$id){
         
        $sale=SaleInvoice::where('id',$id)->with('customer','branch','user')->first();
        $sale_details=SaleInvoiceDetail::where('sale_invoice_id',$id)->get();
       return view('pages.reports.sale.sale_details',compact('sale','sale_details'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'description'=>'string|nullable',
            // 'product_id'=>'required|exists:products,id',
            // 'customer_id'=>'required|exists:suppliers,id',
            // 'branch_id'=>'required|exists:branches,id', 
        ],
        [   
            'product_id.required'=> 'Please select any Product, Thank You.',
            'customer_id.required'=> 'Please select any Customer, Thank You.',
            // 'branch_id.required' => 'Please select any Branch, Thank You.',
       ]);

       $user_id=auth()->user()->id;
       $order_data=$request->only(['invoice_no', 'customer_id','date','branch_id','description','sub_total']);
       $order_data['user_id'] = $user_id;
       $order=SaleInvoice::create($order_data);
       if($order){
        $sale_invoice_detail_id=$order->id;
        $rows=$request->input('product_id');
        $branch_id=$request->input('branch_id');
    // dd($request->all());   $request->quanity  
        foreach($rows as $key=>$row) 
        {
            $purchase_price = $request->input('purchase_price')[$key];
            $after_discount = $request->input('after_discount')[$key];
            $purchase_discount = $request->input('purchase_discount')[$key];
            $quanity = $request->input('quanity')[$key];
            $product_id=$request->input('product_id')[$key];  
            $product_name=$request->input('product_name')[$key];  
            $line_total=$request->input('line_total')[$key];  
            $bonus=$request->input('bonus')[$key];  
            $sale=SaleInvoiceDetail::create([
                        'product_id'  =>$product_id,
                        'item'           =>$product_name,
                        'qty'            =>$quanity,
                        'price'          =>$purchase_price,
                        'discount'       =>$purchase_discount,
                        'after_discount' =>$after_discount,
                        'sale_invoice_id'=>$sale_invoice_detail_id,
                        'bonus'          =>$bonus,
                        'line_total'     =>$line_total,
                    ]);
                    $stock=Stock::where('id',$request->id[$key])->where('product_id',$product_id)->first();
                    $stock->quantity -= $quanity;
                    $stock->save();
                }
            }
    
        return back()->with('success',"Data Added Successfully!");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
   
    public function show(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleInvoice  $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleInvoice $saleInvoice)
    {
        //
    }
}
