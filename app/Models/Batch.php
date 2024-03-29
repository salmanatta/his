<?php

namespace App\Models;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
     protected $guarded = [];
    protected $appends = ['sumQty'];
    public function stocks()
    {
        return $this->hasMany(Stock::class,'batch_id','id');
    }

    public function getSumQtyAttribute()
    {
        return $this->stocks()->sum('quantity');
    }

}
