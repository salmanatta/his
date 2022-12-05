<?php
namespace App\Http\Controllers\pre_configuration;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pharmacy\LogController as LogTable;
use App\Models\city\City;
use App\Models\employee\Employee;
use App\Models\region\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['regions'] = Region::with('belong_to_region')->get();
        // dd($data);
        return view('pages.pre_configuration.region.index',$data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities  = City::all();
        $treeCities  = City::all();
        $regions = Region::whereNull('region_id')->get();
//        $regions = Region::all();

//        return view('pages.pre_configuration.region.create', compact('cities','regions','treeCities'));

        return view('pages.pre_configuration.region.region');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('region_id')) {
            $data = ['region_code' => $request->region_code, 'name' => $request->name, 'city_id' => $request->city_id, 'isActive' => $request->isActive, 'region_id' => $request->region_id];
        } else {
            $data = ['region_code' => $request->region_code, 'name' => $request->name, 'city_id' => $request->city_id, 'isActive' => $request->isActive];
        }

        $create = Region::create($data);
        $this->logsAction(["action" => "Store", "remarks" => "Region id " . $create->id]);

        return redirect()->route('regions.index')->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\region\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\region\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employees'] = Employee::all();
        $data['cities'] = City::all();
        $data['regions'] = Region::all();
        $data['region'] = Region::find($id);
        // dd($data);
        return view('pages.pre_configuration.region.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegionRequest  $request
     * @param  \App\Models\region\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($region);
        $region = Region::find($id);
        $region->region_code = $request->region_code;
        $region->name = $request->name;
        $region->city_id = $request->city_id;
        $region->isActive = $request->isActive;
        if (isset($request->has_parent)) {
            $region->region_id = $request->region_id;
        } else {
            $region->region_id = null;
        }

        // $region->update($request->all());
        $region->save();
        $this->logsAction(["action" => "Update", "remarks" => "Region id " . $id]);

        return redirect()->route('regions.index')->with('info', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\region\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "Region id " . $id]);

        return redirect()->route('regions.index')
            ->with('success', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }
     public function all_regions_report()
    {
        $citys = City::all();
        $regions = Region::whereNull('region_id')->get();
        // $data['regions']=Region::with('belong_to_region')->get();
        // dd($citys);
       return view('pages/reports/city_wise_regions',compact('citys','regions'));
    }
    public function getData($id) {
        return response()->json([
            'data' => Region::where('region_id' , $id)->get()
        ]);
    }
    public function saveRegion(Request $request) {
        $region = new Region();
        $region->name = $request->name;
        $region->region_code = $region->code;
        $region->region_id = $request->region;
        $region->isActive = 1;
//        $region->city_id =1;
        $region->level_no = $region->level_no;
        $region->save();
    }
}

