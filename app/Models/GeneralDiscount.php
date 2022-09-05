<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GeneralDiscount extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeGetGeneralDiscount($query)
    {
        $query->where('branch_id',auth()->user()->branch_id)->whereDate('end_date', '>=', Carbon::now());
    }
}
