<?php

namespace App\Models;

use App\Models\products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoiceDetail extends Model
{
    use HasFactory;
     protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }
    public function salesMaster()
    {
        return $this->belongsTo(SaleInvoice::class,'sale_invoice_id','id');
    }
}
