<?php

namespace App\Http\Controllers;

use App\Models\branch\Branch;
use App\Models\products\Product;
use App\Models\PurchaseInvoice;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function sale_invoice($id)
    {
        $sale = SaleInvoice::where('id', $id)->with('customer', 'branch', 'user')->first();
        $sale_details = SaleInvoiceDetail::with('product', 'batch')->where('sale_invoice_id', $id)->get();
        $company = Branch::find(auth()->user()->branch_id);

        $pdf = PDF::loadView('pages.reports.sale.sale-invoice', compact('sale', 'sale_details', 'company'))
                    ->setPaper('a4', 'landscape')
                    ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream("abc.pdf", array("Attachment" => 0)); // 0 to open in browser, 1 to download
    }

    public function customer_wise_sale_pdf(Request $request)
    {
        $sale_Master = SaleInvoice::Customer_sale_report($request->from, $request->to, $request->customer, $request->trans, auth()->user()->branch_id)->get();
        $company = Branch::find(auth()->user()->branch_id);
        $from_date = $request->from;
        $to_date = $request->to;
        $pdf = PDF::loadView('pages.reports.sale.customer-wise-sale-pdf', compact('sale_Master', 'company', 'from_date', 'to_date'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream("abc.pdf", array("Attachment" => 0)); // 0 to open in browser, 1 to download
    }

    public function date_wise_stock_register(Request $request)
    {
        $product = Product::latest('name' ,'ASC')->get();
        $company = Branch::find(auth()->user()->branch_id);
        $from_date = $request->report_from_date;
        $to_date = $request->report_to_date;
        $pdf = PDF::loadView('pages.reports.stock.date-wise-stock-register', compact('product','company','from_date','to_date'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream("abc.pdf", array("Attachment" => 0)); // 0 to open in browser, 1 to download
    }

    public function purchase_invoice($id)
    {
        $purchase = PurchaseInvoice::where($id)->with('supplier','branch','user')->first();
        $purchase_detail = SaleInvoiceDetail::with('product','batch')->where('purchase_invoice_detail_id',$id)->get();
        $company = Branch::find(auth()->user()->branch_id);

        $pdf = PDF::loadView('pages.reports.purchase.purchase-invoice', compact('purchase', 'purchase_detail', 'company'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream("abc.pdf", array("Attachment" => 0)); // 0 to open in browser, 1 to download
    }

}
