<?php

namespace App\Models\city;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\branch\Branch;
use App\Models\region\Region;
class City extends Model
{
    use HasFactory;
    protected $guarded = [];


    //invers relation of one to many
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
     public function city_has_regions()
    {
    	return $this->hasMany(Region::class,'city_id');
    }
    //   public function childrenRegion()
    // {
    //     return $this->hasMany(Region::class, 'region_id');
    // }
    //  public function childrenRecursive()
    // {
    //    return $this->childrenRegion()->with('childrenRecursive');
    // }

}
