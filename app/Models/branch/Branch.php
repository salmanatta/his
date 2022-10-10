<?php

namespace App\Models\branch;
use App\Models\Batch;
use App\Models\Company;
use  App\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\region\Region;
use  App\Models\SaleInvoice;
use  App\Models\User;
class Branch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

// relation of one to many
    // public function brach()
    // {
    //     return $this->hasMany(Region::class,'branch_id');
    // }
    // relation of one to many


   public function purchases()
   {
       return $this->hasMany(PurchaseInvoice::class,'branch_id','id');
   }
   public function sales()
   {
       return $this->hasMany(SaleInvoice::class,'branch_id','id');
   }
   public function user()
   {
       return $this->hasMany(User::class,'branch_id','id');
   }
   public function company()
   {
       return$this->belongsTo(Company::class,'company_id','id');
   }
}
