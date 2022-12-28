<?php

namespace App\Http\Controllers;

use App\Models\branch\Branch;
use App\Models\Company;
use App\Models\employee\Employee;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseInvoiceDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceDetail;
use App\Models\products\Product;
use App\Models\Stock;
use App\Models\Batch;
use App\Models\ProductBonus;
use App\Models\ProductDiscount;
use App\Models\sales\Customer;
use Carbon\Carbon;

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
        // To get max id branch wise
        // $maxID = SaleInvoice::where('branch_id',auth()->user()->branch_id)->max('invoice_no');
        // dd($maxID);
        if (auth()->user()->employee != null && auth()->user()->employee->designation_id == 3){
            $salesmans = Employee::where('id',auth()->user()->employee_id)->get();
        }else{
            $salesmans = Employee::where('designation_id', '3')->where('branch_id', auth()->user()->branch_id)->get();
        }
        $invoice_no = mt_rand(0, 8889);
        $transType = 'SALE';
        return view("pages/sale/invoice", compact('invoice_no', 'transType','salesmans'));
    }

    public function invoiceReturn()
    {
        $invoice_no = mt_rand(0, 8889);
        $transType = 'SALE RETURN';
        $salesmans = Employee::where('designation_id', '3')
            ->where('branch_id', auth()->user()->branch_id)
            ->get();
        return view("pages/sale/invoice", compact('invoice_no', 'transType', 'salesmans'));
    }

    public function getStock(Request $request, $id)
    {
        $productArr = Stock::where('product_id', $id)
            ->where('branch_id',auth()->user()->branch_id)
            ->with('product', 'batch')
            ->whereRaw('((stocks.quantity - stocks.reserve_qty) > 0)')
            ->first();
        $batchArr = Stock::where('product_id', $id)
            ->with('batch')
            ->get()
            ->toArray();
        return response()->json(['productArr' => $productArr, 'batchArr' => $batchArr]);

        // return response()->json([$data,$data1]);
    }

    public function getBatches(Request $request)
    {
        $data = Stock::with('batch')
            ->where('product_id', $request->product_id)
            ->where('branch_id', auth()->user()->branch_id)
            ->whereRaw('((stocks.quantity - stocks.reserve_qty) > 0)')
            ->get();
//        return ($data);
        return response()->json($data);
    }

    public function getBatcheWiseProduct(Request $request)
    {
        $data = Stock::where('product_id', $request->product_id)->where('batch_id', $request->batch_id_modal)->with('batch', 'product')->first();
        return response()->json($data);
    }

    public function purchaseSale(Request $request)
    {
        $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
        if (count($request->all()) > 0) {
            $from = $request->from_date;
            $to = $request->to_date;
            $fromDate = date('Y-m-d', strtotime($from));
            $todate = date('Y-m-d', strtotime($to));

            $saleData = SaleInvoice::Customer_sale_report( $fromDate, $todate,$request->customer_id,$request->trans_type,auth()->user()->branch_id)
                                    ->with('customer', 'branch', 'user')
                                    ->orderBy('invoice_no', 'desc')
                                    ->get();

            return view('pages.reports.sale.sale_report', compact('customers','saleData'));
        } else {
            $fromDate = Carbon::now();
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $todate = Carbon::now();
            $todate = date('Y-m-d', strtotime($todate));
        }

        // dd($saleData);
        return view('pages.reports.sale.sale_report', compact('customers'));
    }

    public function allSaleProducts(Request $request)
    {
        if (request()->has('q')) {
            $product = Product::where('name', 'like', '%' . $request->q . '%')
                ->join('stocks', 'products.id', '=', 'stocks.product_id')
                ->whereRaw('((stocks.quantity - stocks.reserve_qty) > 0)')
                ->where('stocks.branch_id', '=', auth()->user()->branch_id)
                ->select('products.*')
                ->groupBy('name', 'stocks.product_id')
                ->get();
            // return $product;
            // $product = Stock::whereHas('product' , function($q) use ($request) {
            //             return $q->where('name', 'like', '%' . $request->q . '%');
            //         })->where('quantity', '>', '0')->get();


            $product = $product->map(function ($item, $key) {
                return ['id' => $item['id'],
                    'text' => $item['name'] . ' - ' . $item['product_code']
                ];

            });
            return response()->json(['items' => $product]);
        }
        return response()->json($response);
    }

    public function searchSaleReport(Request $request)
    {
        $from = $request->from_date;
        $to = $request->to_date;
        $from_date = date('Y-m-d', strtotime($from));
        $to_date = date('Y-m-d', strtotime($to));
        $new = SaleInvoice::whereBetween('invoice_date', [$from_date, $to_date])
            ->with('customer', 'branch', 'user')
            ->get();
        return response()->json($new);
    }

    public function saleDetail(Request $request, $id)
    {

        $sale = SaleInvoice::where('id', $id)->with('customer', 'branch', 'user')->first();
        $sale_details = SaleInvoiceDetail::with('product', 'batch')->where('sale_invoice_id', $id)->get();
        return view('pages.reports.sale.sale_details', compact('sale', 'sale_details'));
    }

    public function viewSaleInvoice($id)
    {
        $sale = SaleInvoice::find($id);
        $customer = Customer::find($sale->customer_id);
        $saleDetail = SaleInvoiceDetail::with('product', 'batch')->where('sale_invoice_id', $sale->id)->get();
        $salesmans = Employee::where('designation_id', '3')->where('branch_id', auth()->user()->branch_id)->get();
        $delivery_man = Employee::where('reported_to',$sale->salesman_id)->get();


        return view("pages/sale/invoice", compact('sale', 'customer', 'saleDetail', 'salesmans','delivery_man'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                // 'description' => 'string|nullable',
                // 'product_id'=>'required|exists:products,id',
                'customer_id' => 'required|exists:customers,id',
                'salesman'=>'required',
                'deliveryman' => 'required',
            ],
            [
                'delivery_man.required' => 'Please select Delivery Man.',
                'customer_id.required' => 'Please select Customer.',
                'salesman.required' => 'Please select Salesman.',
            ]
        );
        $order_data = $request->only(['customer_id', 'description', 'total', 'trans_type']);
        $maxId = SaleInvoice::maxId(auth()->user()->branch_id, $request->trans_type);
        // $maxId = $maxId + 1;
        $order_data['invoice_no'] = $maxId;
        $order_data['user_id'] = auth()->user()->id;
        $order_data['branch_id'] = auth()->user()->branch_id;
        $order_data['inv_status'] = 'Un-Post';
        $order_data['salesman_id'] = $request->salesman;
        $order_data['delivery_man'] = $request->deliveryman;
        $order_data['invoice_date'] = Carbon::createFromFormat('m/d/Y', $request->invoice_date)->format('Y-m-d');
        $order = SaleInvoice::create($order_data);
        if ($order) {
            $sale_invoice_detail_id = $order->id;
            $rows = $request->input('product_id');
            $branch_id = $request->input('branch_id');
            foreach ($rows as $key => $row) {
                $sale = SaleInvoiceDetail::create([
                    'product_id' => $request->product_id[$key],
                    'item' => $request->product_name[$key],
                    'qty' => $request->quanity[$key],
                    'price' => $request->purchase_price[$key],
                    'discount' => $request->purchase_discount[$key],
                    'after_discount' => $request->after_discount[$key],
                    'sale_invoice_id' => $sale_invoice_detail_id,
                    'bonus' => $request->bouns[$key],
                    'line_total' => $request->line_total[$key],
                    'sales_tax' => $request->sales_tax[$key],
                    'batch_id' => $request->table_batch_id[$key],
                    'adv_tax' => $request->adv_tax[$key],
                    'adv_tax_value' => $request->adv_tax_value[$key],
                ]);
                if ($request->trans_type == 'SALE') {
                    $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
                        ->where('product_id', $request->product_id[$key])
                        ->where('branch_id', auth()->user()->branch_id)
                        ->first();
                    $stock->reserve_qty += $request->quanity[$key];
                    $stock->save();
                }
//                  else {
//                    $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
//                        ->where('product_id', $request->product_id[$key])
//                        ->where('branch_id', auth()->user()->branch_id)
//                        ->first();
//                    $stock->reserve_qty -= $request->quanity[$key];
//                    $stock->save();
//                }
            }
        }
        return back()->with('success', "Data Added Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SaleInvoice $saleInvoice
     * @return \Illuminate\Http\Response
     */

    public function show(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SaleInvoice $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleInvoice $saleInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SaleInvoice $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleInvoice $saleInvoice)
    {
        // dd($request->all());
        $saleM = SaleInvoice::find($saleInvoice->id);
        $saleM->description = $request->description;
        $saleM->salesman_id = $request->salesman;
        $saleM->delivery_man = $request->deliveryman;
        if ($request->has('update-post')) {
            $saleM->inv_status = 'Post';
            $saleM->status_changed_by = auth()->user()->id;
            $saleM->status_changed_on = Carbon::now();
        }
        $inv_total = 0;
        $rows = $request->product_id;
        foreach ($rows as $key => $row) {
            if (!empty($request->id[$key])) {
                $saleDetail = SaleInvoiceDetail::find($request->id[$key]);
                $old_Qty = $saleDetail->qty;
                $saleDetail->qty =  $request->quanity[$key];
                $saleDetail->price = $request->purchase_price[$key];
                $saleDetail->discount = $request->purchase_discount[$key];
                $saleDetail->after_discount = $request->after_discount[$key];
                $saleDetail->bonus = $request->bouns[$key];
                $saleDetail->line_total = $request->line_total[$key];
                $saleDetail->sales_tax = $request->sales_tax[$key];
                $saleDetail->batch_id = $request->table_batch_id[$key];
                $saleDetail->adv_tax = $request->adv_tax[$key];
                $saleDetail->adv_tax_value = $request->adv_tax_value[$key];
                $saleDetail->save();
                $inv_total += $request->line_total[$key];
                $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
                                ->where('product_id', $request->product_id[$key])
                                ->where('branch_id', auth()->user()->branch_id)
                                ->first();
                if ($request->has('update-post')) {
                    if ($request->trans_type == 'SALE') {
                        $stock->reserve_qty = $stock->reserve_qty - $old_Qty + $request->quanity[$key];
                        $stock->quantity -= $request->quanity[$key];
                    }else{
                        $stock->quantity += $request->quanity[$key];
                    }
                }else{
                    if ($request->trans_type == 'SALE') {
                        $stock->reserve_qty = $stock->reserve_qty + $request->quanity[$key] - $old_Qty;
                    }
                }
                $stock->save();


//                    if ($request->trans_type == 'SALE') {
//                        $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
//                            ->where('product_id', $request->product_id[$key])
//                            ->where('branch_id', auth()->user()->branch_id)
//                            ->first();
//                        $stock->reserve_qty =  $stock->reserve_qty + $request->quanity[$key] - $old_Qty;
//                        $stock->quantity -= $request->quanity[$key];
//                        $stock->save();
//                    } else {
//                        $stock = Stock::where('batch_id', $request->input('table_batch_id')[$key])
//                            ->where('product_id', $request->product_id[$key])
//                            ->where('branch_id', auth()->user()->branch_id)
//                            ->first();
//                        $stock->reserve_qty += $request->quanity[$key];
//                        $stock->quantity -= $request->quanity[$key];
//                        $stock->save();
//                    }

            }
        }
        $saleM->total = $inv_total;
        $saleM->save();
        // dd($request->id);
        if ($request->has('update-post')) {
            return redirect('purchaseSale')->with('info', "Data Updated Successfully!");
        } else {
            return back()->with('info', "Data Updated Successfully!");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SaleInvoice $saleInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleInvoice $saleInvoice)
    {
        //
    }

    public function testRole()
    {
        return 'salman';
    }

    public function getProductBonus(Request $request)
    {
        $bonus = ProductBonus::join('general_bonuses', 'general_bonuses.id', '=', 'product_bonuses.bouns_id')->where('product_id', $request->product)
            ->where('general_bonuses.branch_id', auth()->user()->branch_id)
            ->groupBy('product_id')
            ->having('quantity', '<=', $request->qty)
            ->orderBy('end_date', 'desc')
            ->first();
        return response()->json($bonus);
    }

    public function getProductDiscount(Request $request)
    {
        $discount = ProductDiscount::with(['generalDiscount' => function ($q) {
            $q->whereDate('end_date', '>=', Carbon::now())->orderBy('end_date', 'desc');
        }])
            ->where('product_id', $request->product)
            ->where('branch_id', auth()->user()->branch_id)
            ->first();
//        return $discount;
        return response()->json($discount);
        // if(!empty($discount)){
        //     return $discount->generalDiscount->discount;
        // }else{
        //     return 0;
        // }
    }

    public function customer_wise_sale_view()
    {
        $customers = Customer::where('branch_id', auth()->user()->branch_id)->get();
        return view('pages.reports.sale.customer-wise-sale', compact('customers'));
    }

    public function customer_wise_sale_view_screen(Request $request)
    {

        $sale_Master = SaleInvoice::whereDate('invoice_date', '>=', $request->from_date)
            ->whereDate('invoice_date', '<=', $request->to_date)
            ->where('trans_type', $request->trans_type)
            ->where('customer_id', $request->customer_id)
            ->where('branch_id', auth()->user()->branch_id)->get();
        $customers = Customer::where('branch_id', auth()->user()->branch_id)->get();
        return view('pages.reports.sale.customer-wise-sale', compact('customers', 'sale_Master'));
    }

    public function excel_test()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

    public function get_sales_deliveryman($id)
    {
        $delivery_man = Employee::where('reported_to',$id)->get();
        return response()->json($delivery_man);
    }


}

