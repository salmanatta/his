<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
class ProductBonus extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
