<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;
use App\Models\Company;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    protected $fillable=["name","display_name","description","company_id"];


    public function company(){
        return $this->belongsTo(Company::class,"company_id");
    }

}