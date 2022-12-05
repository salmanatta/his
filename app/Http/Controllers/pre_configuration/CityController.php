<?php
namespace App\Http\Controllers\pre_configuration;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pharmacy\LogController as LogTable;
use App\Models\branch\Branch;
use App\Models\city\City;
use App\Models\region\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('okk');
        $data['cities'] = City::all();
        return view('pages.pre_configuration.city.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['branches'] = Branch::where('isActive', 1)->get();
        return view('pages.pre_configuration.city.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'branch_id'=>'required',
            'city_id'=>'required',
            'name'=>'required',
        ],
        [
            'city_id.required'=> 'Please select City ID, Thank You.',
            'name.required'=> 'Please enter city name, Thank You.',
            'branch_id.required' => 'Please select any Branch, Thank You.',
       ]);
        $city=$request->only(['branch_id', 'city_id','name']);
        City::create($city);
        // $branch_id = $request->input('branch_id');
        // $city_id = $request->input('city_id');
        // $name = $request->input('name');
        // $create = City::create([
        //     'city_id' => $city_id,
        //     'name' => $name,
        //     'branch_id' => $branch_id,
        // ]);
        // $this->logsAction(["action" => "Create", "remarks" => "City id " . $create->id]);
        return redirect()->route('cities.index')->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\city\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['city'] = City::find($id);
        $data['branches'] = Branch::where('isActive', 1)->get();
        return view('pages.pre_configuration.city.create', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\city\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $this->validate($request,[
            'branch_id'=>'required',
            'city_id'=>'required',
            'name'=>'required',
        ],
        [
            'city_id.required'=> 'Please select City ID, Thank You.',
            'name.required'=> 'Please enter city name, Thank You.',
            'branch_id.required' => 'Please select any Branch, Thank You.',
       ]);
        $data=$request->all();
        $city->fill($data)->save();
        // $city = City::find($id);
        // $city->branch_id = $request->input('branch_id');
        // $city->city_id = $request->input('city_id');
        // $city->name = $request->input('name');
        // $city->save();
        // $this->logsAction(["action" => "Update", "remarks" => "City id " . $id]);

        return redirect()->route('cities.index')->with('info', 'Data Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "City id " . $id]);

        return redirect()->route('cities.index')
            ->with('success', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
}
