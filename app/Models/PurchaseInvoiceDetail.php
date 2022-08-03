<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function purchase()
    {
        return $this->belongsTo(PurchaseInvoice::class , 'purchase_invoice_detail_id' , 'id');
    }
}
