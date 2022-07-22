<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRole extends Model
{
    protected $table="permission_role";
    use HasFactory;
    public function permissions(){
        return $this->belongsTo(Permission::class,"permission_id");
    }
    public function roles(){
        return $this->belongsTo(Role::class,"role_id");
    }
}