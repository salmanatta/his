<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
use App\Models\branch\Branch;
class StoreTransfer extends Model
{
    use HasFactory;

       protected $guarded = [];


public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
   
    public function store()
    {
        return $this->belongsTo(Store::class,'store_transfer_id','id');
    }
    public function branchFrom()
    {
        return $this->belongsTo(Branch::class,'from_branch_id','id');
    }
    public function branchTo()
    {
        return $this->belongsTo(Branch::class,'to_branch_id','id');
    }

}
