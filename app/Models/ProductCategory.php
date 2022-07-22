<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
class ProductCategory extends Model
{
    use HasFactory;
      protected $guarded = ['id'];

      public function product()
      {
          return $this->hasMany(Product::class);
      }
}
