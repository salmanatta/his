<?php

namespace App\Models\sales;
use App\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sales()
    {
        return $this->hasMany(SaleInvoice::class,'branch_id','id');
    }
}
