<?php

namespace App\Models;

use App\Models\purchases\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

     protected $guarded = [];
     // protected $table = 'product_groups';

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
