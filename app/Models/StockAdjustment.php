<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;
    protected $table="stock_adjustments";
    protected $guarded = [];

    public function scopeMaxId($query,$branch,$transType)
    {
        $this->invoice_no ?? 0;
        return $query->where('branch_id', $branch)->where('trans_type', $transType)->max('invoice_no') + 1;
    }
}
