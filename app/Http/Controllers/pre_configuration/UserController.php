<?php

namespace App\Http\Controllers\pre_configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Storage;
use Auth;
use PDF;
use Carbon\Traits\Date;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->users();
        //  dd($data['users']);
        return view('pages.pre_configuration.user.index', $data);
    }
    public function getAllUsers()
    {
        return response()->json($this->users());
    }
    public function users()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::all();
        return view('pages.pre_configuration.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data_reg = [
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'role_id'     => $request->input('role_id'),
            'password' => Hash::make($request->input('password')),
            // 'dob' => date('Y-m-d', strtotime($data['dob'])),
            // 'avatar' => "/images/" . $avatarName,
        ];
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $data_reg['avatar'] = "/images/" . $avatarName;
        }
        $user = User::create($data_reg);
        return redirect()->route('users.index')
            ->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('pages.pre_configuration.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // update(['password'=> Hash::make($request->new_password)]);
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        // dd($$request);                
        $user->name     = $request->name;        
        $user->email    = $request->email;        
        $user->role_id  = $request->role_id;
        if ($request->password != $user->password) {
            $user->password =  Hash::make($request->password);
        }
        //   $password =Hash::make($request->input('password'));
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $data_reg['avatar'] = "/images/" . $avatarName;
        }    
        $user->save();    
                                
        return redirect()->route('users.index')->with('info', 'User Updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'Data Deleted Successfully!');    //
    }
}
