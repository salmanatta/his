<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles']=Role::all();
        return view('pages.pre_configuration.role.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('pages.pre_configuration.role.create');
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
          Role::where("id",$hidden_id)->update($input);
           return redirect()->route('roles.index')->with('success','Data updated Successfully!');
      }else{
          Role::create($input);
           return redirect()->route('roles.index')->with('success','Data Added Successfully!');
      }
      
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        return view('pages.pre_configuration.role.create',compact("role"));

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
          Role::find($id)->delete();
        return redirect()->route('roles.index')->with('success','Data Deleted Successfully!');
    }
    public function rolesAttachedPermission()
    {
        $roles=Role::get();

       return view("pages/pre_configuration/role/roles_attached_permissions",compact("roles"));
    }
}