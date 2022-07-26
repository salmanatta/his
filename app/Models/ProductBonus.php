<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\Product;

use App\Models\GeneralBonus;

class ProductBonus extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function bonuses()
    {
        return $this->belongsTo(GeneralBonus::class,'bouns_id','id');
    }
}
