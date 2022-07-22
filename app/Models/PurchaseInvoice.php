<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\purchases\Supplier;
use App\Models\branch\Branch;
use App\Models\User;
class PurchaseInvoice extends Model
{
    use HasFactory;
     protected $guarded = ['id'];

      public function setDateAttribute($date) {//get method same the set method
      $this->attributes['date']=\Carbon\Carbon::now();//this mutator is used to convert formate before the store data into db
    }
     public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'suplier_id','id');
    }
}   