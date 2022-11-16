<?php

namespace App\Models;

use App\Models\branch\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;
    protected $table="stock_adjustments";
    protected $guarded = [];
    protected $appends = [
        'sumQty',
        'sumLineTotal'
    ];

    public function scopeMaxId($query,$branch,$transType)
    {
        $this->invoice_no ?? 0;
        return $query->where('branch_id', $branch)->where('trans_type', $transType)->max('invoice_no') + 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function postUser()
    {
        return $this->belongsTo(User::class, 'status_changed_by', 'id');
    }

    public function adjustment_detail()
    {
        return $this->hasMany(StockAdjustmentDetail::class,'stock_adjustments_id','id');

    }
    public function getSumQtyAttribute()
    {
        return $this->adjustment_detail()->sum('qty');
    }

    public function getSumLineTotalAttribute()
    {
        return $this->adjustment_detail()->sum('line_total');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
