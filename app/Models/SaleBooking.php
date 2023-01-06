<?php

namespace App\Models;

use App\Models\employee\Employee;
use App\Models\sales\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBooking extends Model
{
    use HasFactory;
    protected $appends = ['countItems'];

    public function scopeMaxId($query, $branch)
    {
        $this->invoice_no ?? 0;
        return $query->where('branch_id', $branch)->max('invoice_no') + 1;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function salesman()
    {
        return $this->belongsTo(Employee::class,'salesman_id','id');
    }

    public function saleBookingDetail()
    {
        return $this->hasMany(SaleBookingDetail::class,'sale_booking_id','id');
    }

    public function getCountItemsAttribute()
    {
        return $this->saleBookingDetail()->count('sale_booking_id');

    }

}
