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
       protected $appends = ['sumQty','countProduct','sumLineTotal'];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }   
    // public function store()
    // {
    //     return $this->belongsTo(Store::class,'store_transfer_id','id');
    // }
    public function branchFrom()
    {
        return $this->belongsTo(Branch::class,'from_branch_id','id');
    }
    public function branchTo()
    {
        return $this->belongsTo(Branch::class,'to_branch_id','id');
    }
    public function transferDetail()
    {
        return $this->hasMany(storeTransferDetail::class,'trans_id','id');
    }
    public function getSumQtyAttribute()
    {
        return $this->transferDetail()->sum('qty');
    }
    public function getCountProductAttribute()
    {
        return $this->transferDetail()->count('product_id');
    }
    public function getSumLineTotalAttribute()
    {
        return $this->transferDetail()->sum('line_total');
    }    

}
