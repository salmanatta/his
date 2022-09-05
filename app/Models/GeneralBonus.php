<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GeneralBonus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeGetGeneralBonus($query)
    {
        $query->where('branch_id',auth()->user()->branch_id)->whereDate('end_date', '>=', Carbon::now());
    }

    public function productBonus(){
        return $this->hasMany(ProductBonus::class , 'bouns_id', 'id');
    }

}
