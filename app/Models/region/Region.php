<?php

namespace App\Models\region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\branch\Branch;
use App\Models\city\City;
class Region extends Model
{
    use HasFactory;
    protected $guarded = [];

//invers relation of one to many
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function belong_to_region()
    {
        return $this->belongsTo(Self::class,'region_id');
    }


    // relation of one to many
    public function belong_cities()
    {
        return $this->belongsTo(City::class,'city_id');
    }
     public function childrenRegion()
    {
        return $this->hasMany(Self::class, 'region_id');
    }
    public function childrenRecursive()
    {
       return $this->childrenRegion()->with('childrenRecursive');
    }
}
