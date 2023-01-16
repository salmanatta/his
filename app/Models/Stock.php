<?php

namespace App\Models;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;
use App\Models\branch\Branch;
class Stock extends Model
{
    use HasFactory;
      protected $guarded = [];
      protected $appends = ['currentQty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id' , 'id');
    }
    public function latestbatch()
    {
        return $this->belongsTo(Batch::class , 'batch_id' , 'id')->orderBy('date' , 'ASC');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function getCurrentQtyAttribute()
    {
        return $this->quantity - $this->reserve_qty;
    }

}
