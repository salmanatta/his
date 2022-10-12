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
use App\Models\StoreTransferDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'purchReturnQty',
        'purchReturnPrice',
        'purchQty',
        'purchPrice',
        'salePrice',
        'saleQty',
        'saleReturnPrice',
        'saleReturnQty',
        'transInQty',
        'transOutQty',
        'closingQty'
    ];

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
        return $this->hasMany(PurchaseInvoiceDetail::class, 'product_id', 'id');
    }

    public function getPurchReturnQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->purch->where('purchase.invoice_date', '>=', request()->get('report_from_date'))
                                ->where('purchase.invoice_date', '<=', request()->get('report_to_date'))
                                ->where('purchase.branch_id', request()->get('report_branch_id'))
                                ->where('purchase.trans_type', 'PURCHASE RETURN')->sum('qty');
        }
        return $this->purch->where('purchase.trans_type', 'PURCHASE RETURN')->sum('qty');
    }

    public function getPurchReturnPriceAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->purch->where('purchase.invoice_date', '>=', request()->get('report_from_date'))
                                ->where('purchase.invoice_date', '<=', request()->get('report_to_date'))
                                ->where('purchase.branch_id', request()->get('report_branch_id'))
                                ->where('purchase.trans_type', 'PURCHASE RETURN')->sum('price');
        }
        return $this->purch->where('purchase.trans_type', 'PURCHASE RETURN')->sum('price');
    }

    public function getPurchQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->purch->where('purchase.invoice_date' , '>=' , request()->get('report_from_date'))
                                ->where('purchase.invoice_date' , '<=' , request()->get('report_to_date'))
                                ->where('purchase.branch_id', request()->get('report_branch_id'))
                                ->where('purchase.trans_type' , 'PURCHASE')->sum('qty');
        }
        return $this->purch->where('purchase.trans_type', 'PURCHASE')->sum('qty');
    }

    public function getPurchPriceAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->purch->where('purchase.invoice_date' , '>=' , request()->get('report_from_date'))
                                ->where('purchase.invoice_date' , '<=' , request()->get('report_to_date'))
                                ->where('purchase.branch_id', request()->get('report_branch_id'))
                                ->where('purchase.trans_type' , 'PURCHASE')->sum('price');
        }
        return $this->purch->where('purchase.trans_type', 'PURCHASE')->sum('price');
    }

    public function salesDetail()
    {
        return $this->hasMany(SaleInvoiceDetail::class, 'product_id', 'id');
    }

    public function getSaleQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->salesDetail->where('salesMaster.invoice_date' , '>=' , request()->get('report_from_date'))
                                     ->where('salesMaster.invoice_date' , '<=' , request()->get('report_from_date'))
                                     ->where('salesMaster.branch_id', request()->get('report_branch_id'))
                                     ->where('salesMaster.trans_type' , 'SALE')->sum('qty');
        }
        return $this->salesDetail->where('salesMaster.trans_type', 'SALE')->sum('qty');
    }

    public function getSalePriceAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->salesDetail->where('salesMaster.invoice_date' , '>=' , request()->get('report_from_date'))
                ->where('salesMaster.invoice_date' , '<=' , request()->get('report_from_date'))
                ->where('salesMaster.branch_id', request()->get('report_branch_id'))
                ->where('salesMaster.trans_type' , 'SALE')->sum('price');
        }
        return $this->salesDetail->where('salesMaster.trans_type', 'SALE')->sum('price');
    }

    public function getSaleReturnPriceAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->salesDetail->where('salesMaster.invoice_date' , '>=' , request()->get('report_from_date'))
                ->where('salesMaster.invoice_date' , '<=' , request()->get('report_from_date'))
                ->where('salesMaster.branch_id', request()->get('report_branch_id'))
                ->where('salesMaster.trans_type' , 'SALE RETURN')->sum('price');
        }
        return $this->salesDetail->where('salesMaster.trans_type', 'SALE RETURN')->sum('price');
    }

    public function getSaleReturnQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->salesDetail->where('salesMaster.invoice_date' , '>=' , request()->get('report_from_date'))
                ->where('salesMaster.invoice_date' , '<=' , request()->get('report_from_date'))
                ->where('salesMaster.branch_id', request()->get('report_branch_id'))
                ->where('salesMaster.trans_type' , 'SALE RETURN')->sum('qty');
        }
        return $this->salesDetail->where('salesMaster.trans_type', 'SALE RETURN')->sum('qty');
    }

    public function transferDetails()
    {
        return $this->hasMany(StoreTransferDetail::class,'product_id','id');
    }

    public function getTransInQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->transferDetails->where('transferMaster.trans_date' , '>=' , request()->get('report_from_date'))
                ->where('transferMaster.trans_date' , '<=' , request()->get('report_from_date'))
                ->where('transferMaster.to_branch_id', request()->get('report_branch_id'))
                ->where('transferMaster.trans_type' , 'Received')->sum('qty');
        }
        return $this->transferDetails->where('transferMaster.trans_type', 'Received')->sum('qty');
    }

    public function getTransOutQtyAttribute()
    {
        if (request()->has('report_from_date') && request()->has('report_to_date') && request()->has('report_branch_id')) {
            return $this->transferDetails->where('transferMaster.trans_date' , '>=' , request()->get('report_from_date'))
                ->where('transferMaster.trans_date' , '<=' , request()->get('report_from_date'))
                ->where('transferMaster.from_branch_id', request()->get('report_branch_id'))
                ->where('transferMaster.trans_type' , 'Received')->sum('qty');
        }
        return $this->transferDetails->where('transferMaster.trans_type', 'Received')->sum('qty');
    }

    public function getClosingQtyAttribute()
    {
        return $this->purchQty - $this->purchReturnQty + $this->saleQty - $this->saleReturnQty + $this->transInQty - $this->transOutqty;
    }

}

