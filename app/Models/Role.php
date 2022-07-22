<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use HasFactory;
    //  protected $guarded = [];    
    protected $fillable=["name","display_name","description","company_id"];

public function users()
    {
        return $this->hasMany(User::class);
    }   
    public function company(){
        return $this->belongsTo(Company::class,"company_id");
    }

}