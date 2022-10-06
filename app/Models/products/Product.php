<?php

namespace App\Models\products;
use App\Models\Stock;
use App\Models\ProductType;
use App\Models\ProductBonus;
use App\Models\ProductCategory;
use App\Models\ProductDiscount;
use App\Models\ProductMaxSalQuantity;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseInvoiceDetail;
use App\Models\SaleInvoiceDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = [ 'purchReturnQty' , 'purchReturnPrice' , 'purchQty' , 'purchPrice'];

    public function stocks()
    {
      return $this->hasMany(Stock::class);
    }
    public function bonus()
    {
      return $this->belongsTo(ProductBonus::class);
    }
    public function productType()
    {
      return $this->belongsTo(ProductType::class);
    }
    public function PCategory()
    {
      return $this->belongsTo(ProductCategory::class);
    }
    public function discount()
    {
      return $this->belongsTo(ProductDiscount::class);
    }
    public function ProductMaxSalQuantity()
    {
      return $this->belongsTo(ProductMaxSalQuantity::class);
    }
    public function purch()
    {
      return $this->hasMany(PurchaseInvoiceDetail::class , 'product_id' , 'id');
    }
    public function getPurchReturnQtyAttribute()
    {
      return $this->purch->where('purchase.trans_type' , 'PURCHASE RETURN')->sum('qty');
    }
    public function getPurchReturnPriceAttribute()
    {
        if (request()->has('from_date') && request()->has('to_date')) {
            return $this->purch->where('purchase.invoice_date' , '>=' , request()->get('from_date'))->where('purchase.invoice_date' , '<=' , request()->get('to_date'))->where('purchase.trans_type' , 'PURCHASE RETURN')->sum('price');
        }
      return $this->purch->where('purchase.trans_type' , 'PURCHASE RETURN')->sum('price');
    }
    public function getPurchQtyAttribute()
    {
      return $this->purch->where('purchase.trans_type' , 'PURCHASE')->sum('qty');
    }
    public function getPurchPriceAttribute()
    {
      return $this->purch->where('purchase.trans_type' , 'PURCHASE')->sum('price');
    }
    public function salesDetail()
    {
        return $this->hasMany(SaleInvoiceDetail::class , 'product_id' , 'id');
    }
}

