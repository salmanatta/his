<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
use App\Models\Batch;
use App\Models\branch\Branch;
class Stock extends Model
{
    use HasFactory;
      protected $guarded = [];
 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

}