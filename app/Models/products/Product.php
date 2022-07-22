<?php

namespace App\Models\products;
use App\Models\Stock;
use App\Models\ProductType;
use App\Models\ProductBonus;
use App\Models\ProductCategory; 
use App\Models\ProductDiscount;
use App\Models\ProductMaxSalQuantity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    public function bonus()
    {
        return $this->belongsTo(ProductBonus::class);
    }
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function PCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function discount()
    {
        return $this->belongsTo(ProductDiscount::class);
    }

    public function ProductMaxSalQuantity()
    {
        return $this->belongsTo(ProductMaxSalQuantity::class);
    }
}

