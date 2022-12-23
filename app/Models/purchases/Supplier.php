<?php

namespace App\Models\purchases;

use App\Models\region\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\city\City;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function get_supplier_city()
    {
        return $this->belongsTo(City::class,'city_id');
        // return $this->hasOne(Phone::class);
    }
      // relation of one to many
      public function purchases()
      {
          return $this->hasMany(Purchase::class,'supplier_id','id');
      }

      public function regions()
      {
          return $this->belongsTo(Region::class,'city_id','id');
      }
}
