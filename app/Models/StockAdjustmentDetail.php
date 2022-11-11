<?php

namespace App\Models;

use App\Models\products\Product;
use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustmentDetail extends Model
{
    use HasFactory;
    protected $table="stock_adjustment_details";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(batch::class,'batch_id','id');
    }
}
