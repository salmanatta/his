<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\branch\Branch;
use App\Models\User;
use App\Models\sales\Customer;
use App\Models\employee\Employee;
use Illuminate\Database\Eloquent\Scope;

class SaleInvoice extends Model
{
    use HasFactory;
     protected $guarded = [];
     protected $appends = ['sumLineTotal','sumDiscountAmount','sumSalesTax','sumAdvTax','sumAdvTaxValue'];

     public function setDateAttribute($date) {//get method same the set method
        $this->attributes['invoice_date']=\Carbon\Carbon::now();//this mutator is used to convert formate before the store data into db
      }
       public function branch()
      {
          return $this->belongsTo(Branch::class,'branch_id','id');
      }
      public function user()
      {
          return $this->belongsTo(User::class,'user_id','id');
      }
      public function postUser()
      {
          return $this->belongsTo(User::class,'status_changed_by','id');
      }
      public function customer()
      {
          return $this->belongsTo(Customer::class,'customer_id','id');
      }
      public function salesman()
      {
          return $this->belongsTo(Employee::class,'salesman_id','id');
      }
      public function saleDetail()
      {
        return $this->hasMany(SaleInvoiceDetail::class,'sale_invoice_id','id');
      }
      public function getSumLineTotalAttribute()
      {
        return $this->saleDetail()->sum('line_total');
      }
      public function getSumDiscountAmountAttribute()
      {
        return $this->saleDetail()->sum('after_discount');
      }
      public function getSumSalesTaxAttribute()
      {
        return $this->saleDetail()->sum('sales_tax');
      }
      public function getSumAdvTaxAttribute()
      {
        return $this->saleDetail()->sum('adv_tax');
      }
      public function getSumAdvTaxValueAttribute()
      {
        return $this->saleDetail()->sum('adv_tax_value');
      }
      public function scopeMaxId($query,$branch,$transType)
      {
        $this->invoice_no ?? 0;
        return $query->where('branch_id',$branch)->where('trans_type',$transType)->max('invoice_no')+1;
      }
}
