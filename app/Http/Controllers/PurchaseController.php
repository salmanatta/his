<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use DB;
use Illuminate\Http\Request;
use App\Models\PurchaseInvoiceDetail;
use App\Models\PurchaseInvoice;
use App\Models\Stock;
use App\Models\Batch;
use App\Models\branch\Branch;
use App\Models\purchases\Supplier;
use App\Http\Controllers\Controller;
use App\Models\products\Product;
use function PHPUnit\Framework\isNull;
class PurchaseController extends Controller
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
        // $batches=Batch::all();
        return view("pages/supplier/invoice/purchase",compact("invoice_no"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getProducts(Request $request)
    {
         $data = Product::where('id',$request->id)->first();
         return response()->json($data);
    }
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
        //  dd($request->all());
        $this->validate($request,[
            'description'=>'string|nullable',
            'product_id'=>'required|exists:products,id',
            'suplier_id'=>'required|exists:suppliers,id',
            'branch_id'=>'required|exists:branches,id', 
        ],
        [   
            'product_id.required'=> 'Please select any Product, Thank You.',
            'suplier_id.required'=> 'Please select any Supplier, Thank You.',
            'branch_id.required' => 'Please select any Branch, Thank You.',
       ]);       

        //  $batchID = Batch::pluck('id')->last();//this is save before every invoice
        //  $batchID="Batch-". $batchID;
        //   ++$batchID;
        //  $batch = new Batch();
        //  $batch->batch_no = $batchID;  
        //  $batch->date=$request->input('date');
        //  $batch->save();
        //  $batch_id=$batch->id;
         
        $user_id=auth()->user()->id;
        $order_data=$request->only(['invoice_no', 'suplier_id','date','branch_id','description','dropt','total']);
        $order_data['user_id'] = $user_id;
        $order=PurchaseInvoice::create($order_data);
        if($order){
        $purchase_invoice_detail_id=$order->id;
        $rows=$request->input('product_id');
        $branch_id=$request->input('branch_id');
        // $batch_id=$batch_id;
        foreach($rows as $key=>$row) 
        {
            $purchase_price = $request->input('purchase_price')[$key];
            $after_discount = $request->input('after_discount')[$key];
            $purchase_discount = $request->input('purchase_discount')[$key];
            $quanity = $request->input('quanity')[$key];
            $product_id=$request->input('product_id')[$key];  
            $product_name=$request->input('product_name')[$key];  
            $line_total=$request->input('line_total')[$key];  
            $bonus=$request->input('sale_tax_value')[$key];  

            PurchaseInvoiceDetail::create([
                        'product_id'     =>$product_id,
                        'item'           =>$product_name,
                        'qty'            =>$quanity,
                        'price'          =>$purchase_price,
                        'discount'       =>$purchase_discount,
                        'after_discount' =>$after_discount,
                        'purchase_invoice_detail_id'=>$purchase_invoice_detail_id,
                        'bonus'          =>$bonus,
                        'line_total'     =>$line_total,
             ]);
            $batch = Batch::where('batch_no',$request->batch)
                            ->where('date',$request->expiry_date)
                            ->get();                                        
              if($batch->isEmpty())            
              {
                $batchName  = $request->input('batch')[$key];
                $expriyDate = $request->input('expiry_date')[$key];
                $tansID = Batch::create([
                    'batch_no'  => $batchName,
                    'date'      => $expriyDate,
                ]);
                $batch_id = $tansID->id;
              }else{
                $batch = $batch->first();
                $batch_id = $batch->id;                
              }
             if($request->dropt==''){
                Stock::create([
                    'product_id' =>$product_id,
                    'quantity'   =>$quanity,
                    'price'      =>$purchase_price,
                    'batch_id'   =>$batch_id,
                    'branch_id'  =>$branch_id,
                     ]);
             }
        }
    }
        return back()->with('success',"Data Added Successfully!");
    }
    public function purchaseReport(Request $request)
    {
        return view('pages.reports.purchase.purchase_report');

    }
    public function unstokePurchaseReport(Request $request)
    {
        return view('pages.reports.purchase.unstokepurchase_report');

    }
    
    public function searchPurchaseReport(Request $request)
    {
        $from=$request->from_date;
        $to=$request->to_date;
         $from_date=date('Y-m-d', strtotime($from));
         $to_date=date('Y-m-d', strtotime($to));
        $new = PurchaseInvoice::whereBetween('date',[ $from_date,$to_date])->with('supplier','branch','user')->where('dropt','0')->get();
    
        return response()->json($new);
    }
    public function searchUnstokePufrchaseReport(Request $request)
    {
        $from=$request->from_date;
        $to=$request->to_date;
         $from_date=date('Y-m-d', strtotime($from));
         $to_date=date('Y-m-d', strtotime($to));
        $new = PurchaseInvoice::whereBetween('date',[ $from_date,$to_date])->with('supplier','branch','user')->where('dropt','1')->get();
    // dd($new );
        return response()->json($new);
    }
     public function purchaseDetail(Request $request,$id){
         
         $purchase=PurchaseInvoice::where('id',$id)->with('supplier','branch','user')->first();
         $purchase_details=PurchaseInvoiceDetail::where('purchase_invoice_detail_id',$id)->get();
        return view('pages.reports.purchase.purchase_details',compact('purchase','purchase_details'));
     }
     public function unstokePurchaseDetail(Request $request,$id){
         
        $purchase=PurchaseInvoice::where('id',$id)->with('supplier','branch','user')->first();
        $purchase_details=PurchaseInvoiceDetail::where('purchase_invoice_detail_id',$id)->get();
       return view('pages.reports.purchase.purchase_details',compact('purchase','purchase_details'));
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
