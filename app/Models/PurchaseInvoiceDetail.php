<?php

namespace App\Models;

use App\Models\products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function purchase()
    {
        return $this->belongsTo(PurchaseInvoice::class , 'purchase_invoice_detail_id' , 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function batch()
    {
        return $this->belongsTo(batch::class,'batch_id','id');
    }
}
