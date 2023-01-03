<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBooking extends Model
{
    use HasFactory;

    public function scopeMaxId($query, $branch)
    {
        $this->invoice_no ?? 0;
        return $query->where('branch_id', $branch)->max('invoice_no') + 1;
    }
}
