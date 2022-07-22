<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\branch\Branch;
use App\Models\User;
use App\Models\sales\Customer;
class SaleInvoice extends Model
{
    use HasFactory;
     protected $guarded = [];

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
      public function customer()
      {
          return $this->belongsTo(Customer::class,'customer_id','id');
      }
}
