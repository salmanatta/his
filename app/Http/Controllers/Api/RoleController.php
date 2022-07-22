<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
     public function getAllRoles(){
        $roles=Role::all();
        return view("components/_table/_roles",compact("roles"));
    }
     public function attachRoleToUser()
    {
    $userid =request()->get("userid") ?? '';
    $roleid =request()->get("roleid") ?? '';
    
    $user=User::where("id",$userid)->first();
    $role=Role::where("id",$roleid)->first();
    // check for the permission attachement
    try{
        if(RoleUser::where(["role_id"=>$roleid,"user_id"=>$userid])->count()){
            $user->detachRole($role);
            return response()->json(["success"=>"Role Detached"]);
        }else{
            $user->attachRole($role);
            return response()->json(["success"=>"Role attached"]);
        }
    }catch(\Exception $ex){ 
        return response()->json(["danger"=>"Oops,Something goes wrong",$ex->getMessage()]);
    }
    }
}