<?php

namespace App\Models;

use App\Models\products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBookingDetail extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class,'product_id','product_id');
    }
}
