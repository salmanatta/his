<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
class ProductDiscount extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function generalDiscount()
    {
        return $this->belongsTo(GeneralDiscount::class,'discount_id','id');
    }
}
