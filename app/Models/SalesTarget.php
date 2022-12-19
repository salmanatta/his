<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTarget extends Model
{
    use HasFactory;
    protected $appends = ['sumQty','countProduct'];
    public function salesDetail()
    {
        return $this->hasMany(SalesTargetDetail::class,'sales_target_id','id');
    }
    public function getSumQtyAttribute()
    {
        return $this->salesDetail()->sum('target_qty');
    }
    public function getCountProductAttribute()
    {
        return $this->salesDetail()->count('product_id');
    }
}
