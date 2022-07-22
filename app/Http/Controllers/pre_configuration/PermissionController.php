<?php

namespace App\Http\Controllers\pre_configuration;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permission']=Permission::all();
        return view('pages.pre_configuration.permission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('pages.pre_configuration.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input=$request->except("_token");
      $hidden_id=$input["hidden_id"] ?? '';
      if($hidden_id!=""){
          unset($input["hidden_id"]);
          Permission::where("id",$hidden_id)->update($input);
           return redirect()->route('permissions.index')->with('success','Data updated Successfully!');
      }else{
          Permission::create($input);
           return redirect()->route('permissions.index')->with('success','Data Added Successfully!');
      }
      
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission=Permission::find($id);
          return view('pages.pre_configuration.permission.create',compact("permission"));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Permission::find($id)->delete();
        return redirect()->route('permission.index')->with('success','Data Deleted Successfully!');
    }
    public function attachedPermissions($role_id)
    {
      $roles_permission=PermissionRole::where("role_id",$role_id)->where("role_id",$role_id)->get();
      // print_r($roles_permission->toArray());die;
      return view("pages/pre_configuration/role/roles_permissions",compact("roles_permission"));
    }
}