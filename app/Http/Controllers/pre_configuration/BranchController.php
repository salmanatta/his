<?php

namespace App\Http\Controllers\pre_configuration;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pharmacy\LogController as LogTable;
use App\Models\branch\Branch;
use App\Models\Company;
use App\Models\region\Region;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['branches'] = Branch::all();
        return view('pages.pre_configuration.branch.index', $data);
    }
    public function getAllBranches(Request $request){

        if (request()->has('q')) {
            $branch = Branch::where('name','like','%'.$request->q.'%')->get();
            $branch = $branch->map(function($item,$key){
                return ['id' => $item['id'],'text' => $item['name'].' - '.$item['branch_code']];
            });
            return response()->json(['items' => $branch]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['regions'] = Region::all();
        $data['companies'] = Company::all();
        return view('pages.pre_configuration.branch.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $create = Branch::create($input);


        $branch = new Branch();
        $branch->logo_path = $request->logo_path->store('/', ['disk' => 'branch']);
        $branch->branch_code = $request->branch_code;
        $branch->name = $request->name;
        $branch->isActive = $request->isActive;
        $branch->company_id = $request->company_id;
        $branch->save();


        $this->logsAction(["action" => "Store", "remarks" => "Branch id " . $create->id]);
        return redirect()->route('branches.index')->with('success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branch\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branch\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['companies'] = Company::all();
        $data['regions'] = Region::all();
        $data['branch'] = Branch::find($id);
        return view('pages.pre_configuration.branch.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\branch\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Branch::find($id);
        $city->name = $request->input('name');
        // $city->region_id=$request->input('region_id');
        $city->isActive = $request->input('isActive');
        $city->save();
        $this->logsAction(["action" => "Update", "remarks" => "Branch id " . $id]);

        // return redirect('branches');
        return redirect()->route('branches.index')->with('info', 'Data Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branch\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();
        // return redirect()->route('branches.index')->with('success','Branch deleted successfully');
        $this->logsAction(["action" => "Destroy", "remarks" => "Branch id " . $id]);

        return redirect()->route('branches.index')->with('error', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
}
