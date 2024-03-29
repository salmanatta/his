<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\purchases\Supplier;
use App\Models\branch\Branch;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['sumSaleTax', 'sumAdvancTax', 'sumDiscountAmount', 'sumQty', 'lineTotal'];

    public function setDateAttribute($date)
    {//get method same the set method
        $this->attributes['date'] = \Carbon\Carbon::now();//this mutator is used to convert formate before the store data into db
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postUser()
    {
        return $this->belongsTo(User::class, 'status_changed_by', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suplier_id', 'id');
    }

    public function scopeReportData($query, $fromDate, $todate, $branch, $trans, $supllier)
    {
        if ($supllier != '') {
            return $query->whereBetween('invoice_date', [$fromDate, $todate])
                ->where('branch_id', $branch)
                ->where('trans_type', $trans)
                ->where('suplier_id', $supllier);

        }
        return $query->whereBetween('invoice_date', [$fromDate, $todate])
            ->where('branch_id', $branch)
            ->where('trans_type', $trans);

    }

    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseInvoiceDetail::class, 'purchase_invoice_detail_id', 'id');
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

    public function scopeMaxId($query, $branch, $transType)
    {
        $this->invoice_no ?? 0;
        return $query->where('branch_id', $branch)->where('trans_type', $transType)->max('invoice_no') + 1;
    }
}
