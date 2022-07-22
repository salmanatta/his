<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\group\Group;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['groups']=Group::all();
       return view('pages.pre_configuration.group.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['city']=City::find($id);
       return view('pages.pre_configuration.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input=$request->all();
      $createCity=Group::create($input);
       return redirect()->route('groups.index')->with('info','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['group']=Group::find($id);
       return view('pages.pre_configuration.group.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\group\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group=Group::find($id);
       $group->name=$request->input('name');
       $group->save();
       return redirect()->route('groups.index')->with('info','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('okk');
         Group::find($id)->delete();
          return redirect()->route('groups.index')->with('info','Data Deleted Successfully!');

    }
}
