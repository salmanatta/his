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

    protected $appends = ['sumSaleTax','sumAdvancTax','sumDiscountAmount','sumQty','lineTotal'];

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
    public function scopeReportData($query,$fromDate,$todate)
    {
        return $query->whereBetween('date',[ $fromDate,$todate])                    
                     ->where('dropt','0');
    }
    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseInvoiceDetail::class,'purchase_invoice_detail_id','id');
    }

    public function getSumSaleTaxAttribute()
    {
        return $this->purchaseDetail()->sum('sales_tax');
    }
    public function getFreightAttribute()
    {
        return $this->attributes['freight'] ?? 0;
    }
    public function getSumDiscountAmountAttribute()
    {
        return $this->purchaseDetail()->sum('after_discount');
    }
    public function getSumAdvancTaxAttribute()
    {
        return $this->purchaseDetail()->sum('adv_tax');
    }
    public function getSumQtyAttribute()
    {
        return $this->purchaseDetail()->sum('qty');
    
    }
    public function getLineTotalAttribute()
    {
        return $this->purchaseDetail()->sum('line_total');
    }
}   