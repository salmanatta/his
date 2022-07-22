<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\PermissionUser;
        
use App\Models\PermissionRole;

class PermissionController extends Controller
{
    public function getAllPermissions()
    {
        $permissions=Permission::all();
        return view("components/_table/_permissions",compact("permissions"));
    }
    public function attachDetachPermission()
    {
        $role_id =request()->get("role_id") ?? '';
        $permission_id =request()->get("permission_id") ?? '';
        
        $role=Role::where("id",$role_id)->first();
        $permission=Permission::where("id",$permission_id)->first();
        // check for the permission attachement
        try{
            if(PermissionRole::where(["role_id"=>$role_id,"permission_id"=>$permission_id])->count()){
                $role->detachPermission($permission); 
                return response()->json(["success"=>"Permission Detached"]);
            }else{
                $role->attachPermission($permission);
                return response()->json(["success"=>"Permission attached"]);
            }
        }catch(\Exception $ex){
            return response()->json(["danger"=>"Oops,Something goes wrong",$ex->getMessage()]);
        }
    }
    public function attachPermissionToUser()
    {
    $userid =request()->get("userid") ?? '';
    $permission_id =request()->get("permission_id") ?? '';
    
    $user=User::where("id",$userid)->first();
    $permission=Permission::where("id",$permission_id)->first();
    // check for the permission attachement
    try{
        if(PermissionUser::where(["permission_id"=>$permission_id,"user_id"=>$userid])->count()){
            $user->detachPermission($permission);
            return response()->json(["success"=>"Permission Detached"]);
        }else{
            $user->attachPermission($permission);
            return response()->json(["success"=>"Permission attached"]);
        }
    }catch(\Exception $ex){ 
        return response()->json(["danger"=>"Oops,Something goes wrong",$ex->getMessage()]);
    }
    }
    public function getAllRoleRelatedPermissions()
    {
        $role_id=request()->get("role_id") ?? '';
        $role_permissions=PermissionRole::where("role_id",$role_id)->get();
        return view("components/_table/_roles_permissions",compact("role_permissions"));
    }
        

}