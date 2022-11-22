<?php
namespace app\Traits;

use App\Models\PurchaseInvoiceDetail;

trait InsertPurchaseDetail{
    public function store_purchase_detail($paramaters)
    {
        PurchaseInvoiceDetail::create([
            'product_id'                => $paramaters['product_id'],
            'item'                      => $paramaters['item'],
            'qty'                       => $paramaters['qty'],
            'price'                     => $paramaters['price'],
            'discount'                  => $paramaters['discount'],
            'after_discount'            => $paramaters['after_discount'],
            'purchase_invoice_detail_id'=> $paramaters['masterId'],
            'line_total'                => $paramaters['line_total'],
            'sales_tax'                 => $paramaters['sales_tax'],
            'adv_tax'                   => $paramaters['adv_tax'],
            'batch_id'                  => $paramaters['batch_id'],
        ]);
    }
}


