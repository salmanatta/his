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
use Carbon\Carbon;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
        
    }
    public function index()
    {
        
    }
    public function render()
    {
        $invoice_no=mt_rand(0,8889);
        // $batches=Batch::all();
        return view("pages/supplier/invoice/purchase",compact("invoice_no"));
    }
    public function pruchaseReturn()
    {
        $invoice_no=mt_rand(0,8889);
        
        return view("pages/supplier/invoice/purchase-return",compact("invoice_no"));

    }
    public function pruchaseReturnInsert(Request $request)
    {
        // dd($request->all());
        
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
        // dd($request);
        $this->validate($request,[            
            'product_id'=>'required|exists:products,id',
            'suplier_id'=>'required|exists:suppliers,id',
            'branch_id'=>'required|exists:branches,id', 
        ],
        [   
            'product_id.required'=> 'Please select any Product, Thank You.',
            'suplier_id.required'=> 'Please select any Supplier, Thank You.',
            'branch_id.required' => 'Please select any Branch, Thank You.',
       ]);

        $order=PurchaseInvoice::create(
            [
                'invoice_no'    =>PurchaseInvoice::maxId(auth()->user()->branch_id,$request->trans_type),
                'suplier_id'    =>$request->suplier_id,
                'invoice_date'  =>Carbon::createFromFormat('m/d/Y', $request->invoiceDate)->format('Y-m-d'),
                'branch_id'     =>$request->branch_id,
                'description'   =>$request->description,
                'trans_type'    =>$request->trans_type,
                'inv_status'    =>$request->inv_status,
                'freight'       =>$request->freight,
                'user_id'       =>auth()->user()->id,
                'total'         =>$request->total,
            ]);
        if($order){
        $purchase_invoice_detail_id=$order->id;
        $rows=$request->input('product_id');
        $branch_id=$request->input('branch_id');        
        foreach($rows as $key=>$row) 
        {
            $purchase_price = $request->input('purchase_price')[$key];
            $after_discount = $request->input('after_discount')[$key];
            $purchase_discount = $request->input('purchase_discount')[$key];
            $quanity = $request->input('quanity')[$key];
            $product_id=$request->input('product_id')[$key];  
            $product_name=$request->input('product_name')[$key];  
            $line_total=$request->input('line_total')[$key];  
            // $bonus=$request->input('sale_tax_value')[$key];

            $batch = Batch::where('batch_no',$request->batch)
                            ->where('date',$request->expiry_date)
                            ->where('branch_id',auth()->user()->branch_id)
                            ->get();                                        
              if($batch->isEmpty())            
              {
                $batchName  = $request->input('batch')[$key];
                $expriyDate = $request->input('expiry_date')[$key];
                $tansID = Batch::create([
                    'batch_no'  => $batchName,
                    'date'      => $expriyDate,
                    'branch_id' => auth()->user()->branch_id,
                ]);
                $batch_id = $tansID->id;
              }else{
                $batch = $batch->first();
                $batch_id = $batch->id;                
              }

            PurchaseInvoiceDetail::create([
                        'product_id'     =>$product_id,
                        'item'           =>$product_name,
                        'qty'            =>$quanity,
                        'price'          =>$purchase_price,
                        'discount'       =>$purchase_discount,
                        'after_discount' =>$after_discount,
                        'purchase_invoice_detail_id'=>$purchase_invoice_detail_id,                        
                        'line_total'     =>$line_total,
                        'sales_tax'      =>$request->input('sale_tax_value')[$key],
                        'adv_tax'        =>$request->input('adv_tax_value')[$key],
                        'batch_id'       =>$batch_id,
             ]);
            if($request->inv_status == 'Post')
            {
                $stock = Stock::where('product_id',$product_id)
                           ->where('batch_id',$batch_id)
                           ->where('branch_id',$branch_id)
                           ->get();
                if($stock->isEmpty())
                {
                    Stock::create([
                        'product_id' =>$product_id,
                        'quantity'   =>$quanity*-1,
                        'price'      =>$purchase_price,
                        'batch_id'   =>$batch_id,
                        'branch_id'  =>$branch_id,
                    ]);
                }else{
                    $stock = $stock->first();
                    $stock->quantity -= $quanity;
                    $stock->save();
                }
            }
        }
    }
        return back()->with('success',"Data Added Successfully!");
    }
    public function purchaseReport(Request $request)
    {
        if(count($request->all()) > 0) 
        {
            $from=$request->from_date;
            $to=$request->to_date;
            $fromDate=date('Y-m-d', strtotime($from));
            $todate=date('Y-m-d', strtotime($to));
        }else{
            $fromDate = Carbon::now();
            $fromDate =date('Y-m-d', strtotime($fromDate));
            $todate = Carbon::now();
            $todate =date('Y-m-d', strtotime($todate));
        }
        $transType = 'PURCHASE';
        $purchaseData = PurchaseInvoice::ReportData($fromDate,$todate,$transType)
                                        ->with('supplier','branch','user')
                                        ->get();        
        //return $purchaseData;
        return view('pages.reports.purchase.purchase_report',compact('purchaseData'));

    }
    public function unstokePurchaseReport(Request $request)    
    {

        return view('pages.reports.purchase.unstokepurchase_report');

    }
    
    public function searchPurchaseReport(Request $request)
    {
        $from=$request->from_date;
        $to=$request->to_date;
        $fromDate=date('Y-m-d', strtotime($from));
        $todate=date('Y-m-d', strtotime($to));
        $new = PurchaseInvoice::ReportData($fromDate,$todate)
                                ->with('supplier','branch','user')                                
                                ->get();    
        return response()->json($new);
    }
    public function searchUnstokePufrchaseReport(Request $request)
    {
        $from=$request->from_date;
        $to=$request->to_date;
         $from_date=date('Y-m-d', strtotime($from));
         $to_date=date('Y-m-d', strtotime($to));
        $new = PurchaseInvoice::whereBetween('date',[$from_date,$to_date])->with('supplier','branch','user')->where('dropt','1')->get();
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
    public function update(Request $request,PurchaseInvoice $PurchaseInvoice)
    {
        //  dd($request->all());
        
        $purchaseM = PurchaseInvoice::find($PurchaseInvoice->id);
        
        $purchaseM->description = $request->description;

        if($request->has('update-post')){
            $purchaseM->inv_status = 'Post';
            $purchaseM->status_changed_by = auth()->user()->id;
            $purchaseM->status_changed_on = Carbon::now();
        }
        $purchaseM->save();
        $rows = $request->product_id;        
        foreach ($rows as $key => $row) {            
            if(!empty($request->id[$key])){            
                $purchaseDetail = PurchaseInvoiceDetail::find($request->id[$key]);   
                $purchaseDetail->qty            = $request->quanity[$key];
                $purchaseDetail->price          = $request->purchase_price[$key];
                $purchaseDetail->discount       = $request->purchase_discount[$key];
                $purchaseDetail->after_discount = $request->after_discount[$key];                
                $purchaseDetail->line_total     = $request->line_total[$key];
                $purchaseDetail->sales_tax      = $request->sale_tax_value[$key];                
                $purchaseDetail->adv_tax        = $request->adv_tax_value[$key];                
                $purchaseDetail->save();            

                // if($request->trans_type == 'SALE')
                // {
                //     $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
                //                   ->where('product_id', $request->product_id[$key])
                //                   ->where('branch_id',auth()->user()->branch_id)
                //                   ->first();
                //     $stock->reserve_qty -= $request->quanity[$key];
                //     $stock->quantity += $request->quanity[$key];
                //     $stock->save();
                // }else{
                //     $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
                //                   ->where('product_id', $request->product_id[$key])
                //                   ->where('branch_id',auth()->user()->branch_id)
                //                   ->first();
                //     $stock->reserve_qty += $request->quanity[$key];
                //     $stock->quantity -= $request->quanity[$key];
                //     $stock->save();
                // }
            }
        }
        if($request->has('update-post')){
            return redirect('purchaseReport')->with('info', "Data Updated Successfully!");
        }else{
            return back()->with('info', "Data Updated Successfully!");
        }
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
    public function currentStockReport()
    {
        $product = Product::all();
        return view('pages.reports.purchase.item_report' , compact('product'));
    }
    public function updatePurchaseStatus($id)
    {
        $purchaseMaster = PurchaseInvoice::find($id);
        $purchaseMaster->inv_status = 'Post';
        $purchaseMaster->status_changed_by = auth()->user()->id;
        $purchaseMaster->status_changed_on = Carbon::now();
        $purchaseMaster->update();        

        $purchaseD = PurchaseInvoiceDetail::where('purchase_invoice_detail_id',$id)->get();
        foreach($purchaseD as $purchaseData)
        {
            Stock::create([
                'product_id' =>$purchaseData->product_id,
                'quantity'   =>$purchaseData->qty,
                'price'      =>$purchaseData->price,
                'batch_id'   =>$purchaseData->batch_id,
                'branch_id'  =>$purchaseMaster->branch_id,
            ]);
        }
        return back()->with('success',"Invoice Status Updated Successfully!");
    }
    public function viewPurchaseInvoice($id)
    {
        $purchaseM = PurchaseInvoice::find($id);
        $purchaseD = PurchaseInvoiceDetail::with('product','batch')->where('purchase_invoice_detail_id',$id)->get();
        
        return view("pages/supplier/invoice/purchase",compact('purchaseM','purchaseD'));
        


    }
}
