<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\PermissionRole;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {     
        $controllerAction = class_basename(Route::currentRouteAction());
        $permission = false;
        $permission_id_id = 0;
        $permission_result  = Permission::where('name',$controllerAction)->exists();
        $permission_id      = Permission::where('name',$controllerAction)->first();
        $HasPremission      = PermissionUser::where('permission_id',$permission_id->id)->where('user_id',auth()->id())->exists();
        if($HasPremission){
            return $next($request);
        }            
        $permissionRoles = PermissionRole::where('permission_id',$permission_id->id)->get();
        foreach($permissionRoles as $permissionRole){
            $userRole = RoleUser::where('role_id',$permissionRole->role_id)->where('user_id',auth()->id())->exists();
            if($userRole == true){
                return $next($request);
                break;
            }
        }
        return abort(403);
    }
}
