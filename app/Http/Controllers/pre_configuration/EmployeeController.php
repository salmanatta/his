<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use App\Models\EmployeeRegions;
use App\Models\EmployeeSupplier;
use App\Models\purchases\Supplier;
use App\Models\region\Region;
use Illuminate\Http\Request;
use App\Models\employee\Employee;
use App\Models\Designation;
use App\Models\city\City;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
    return view('pages.pre_configuration.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        $designations = Designation::all();
        $manager = Employee::where('designation_id',2)->where('branch_id',auth()->user()->branch_id)->get();
         return view('pages.pre_configuration.employee.create',compact('cities','designations','manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Employee::create($request->all());

        $employee = new Employee();
        $employee->first_name       = $request->first_name;
        $employee->middle_name      = $request->middle_name;
        $employee->last_name        = $request->last_name;
        $employee->address          = $request->address;
        $employee->phone_off        = $request->phone_off;
        $employee->phone_res        = $request->phone_res;
        $employee->fax              = $request->fax;
        $employee->email            = $request->email;
        $employee->city_id          = $request->city_id;
        $employee->postal_code      = $request->postal_code;
        $employee->cnic_no          = $request->cnic_no;
        $employee->emg_name         = $request->emg_name;
        $employee->emg_phone        = $request->emg_phone;
        $employee->hire_date        = $request->hire_date;
//        $employee->leave_date       = $request->leave_date;
        $employee->basic_salery     = $request->basic_salery;
        $employee->isAtive          = 1;
//        $employee->last_modification_date  = $request->last_modification_date;
        $employee->designation_id   = $request->designation_id;
        $employee->branch_id        = auth()->user()->branch_id;
        if ($request->designation_id == 1){
            $employee->reported_to      = $request->reported_to;
        }else{
            $employee->reported_to      = '';
        }
        $employee->save();
        if($request->createUser == 1){
            $user = new User();
            $user->name                 = $request->first_name." ".$request->last_name;
            $user->email                = $request->email;
            $user->email_verified_at    = Carbon::now();
            $user->password             = Hash::make("password");
            $user->branch_id            = auth()->user()->branch_id;
            $user->employee_id         = $employee->id;
            $user->save();
        }

        return redirect()->route('employees.edit' , $employee->id)->with('success','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employee']=Employee::find($id);
        $data['cities']=City::all();
        $data['designations']=Designation::all();
        $data['manager'] = Employee::where('designation_id',2)->where('branch_id',auth()->user()->branch_id)->get();
//        $data['suppliers'] = Supplier::all();
        $data['suppliers'] = Supplier::all();
//            DB::select(DB::raw('select s.id SUP_ID , s.name , es.employee_id , es.supplier_id , e.id , e.first_name from suppliers s left join employee_suppliers es on s.id = es.supplier_id left join employees e on e.id = es.employee_id where e.id = '.$id.' or 1=1'));
        $data['regions'] = Region::where('region_id','0')->get();
        return view('pages.pre_configuration.employee.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::find($id);
         $employee->update($request->except('createUser'));
//        $employee->update($request->all())->except('createUser');

         return redirect()->route('employees.index')->with('info','Data Updated Successfully!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Employee::find($id)->delete();
        return redirect()->route('employees.index')->with('success','Data Deleted Successfully!');
    }

    public function employee_supplier_store(Request $request)
    {
        EmployeeSupplier::create([
            'employee_id' => $request->employee_id,
            'supplier_id' => $request->id,
            'batch_id' => auth()->user()->branch_id,
        ]);
        return $request;
    }

    public function employee_supplier_delete(Request $request)
    {
        $empSup = EmployeeSupplier::where('employee_id',$request->employee_id)
            ->where('supplier_id',$request->id)
            ->where('batch_id',auth()->user()->branch_id)
            ->first();
        $empSup->delete();
        return 1;
    }
    public function getMasterRegion($id,$emp)
    {
        $regions = Region::where('main_region_id',$id)->where('level_no',0)->get();
        $arr = [];
        foreach($regions as $region) {
            $arr[] = ['region_id' => $region->id , 'region_name' => $region->name , 'exists' => EmployeeRegions::whereEmployeeId($emp)->whereRegionId($region->id)->count() ? 1 : 0];
        }
//          $regions = DB::table('regions')->leftJoin('employee_regions','regions.id','=','employee_regions.region_id')
//              ->where('main_region_id',$id)->where('level_no',0)
//              ->select('regions.id','employee_regions.region_id','regions.name')->get();
        return $arr;
    }

    public function employee_region_store(Request $request)
    {
        if ($request->type == 'insert') {
            EmployeeRegions::create([
                'employee_id' => $request->employee_id,
                'region_id'   => $request->id,
                'branch_id'   => auth()->user()->branch_id,
            ]);
            return 1;
        }else{
            $empReg = EmployeeRegions::where('region_id',$request->id)->where('employee_id',$request->employee_id)->where('branch_id',auth()->user()->branch_id)->first();
            $empReg->delete();
            return 0;
        }
    }

    public function get_employee_reported_to($id)
    {
        if ($id == 1){
            $employees = Employee::where('designation_id',2)->get();
            return response()->json($employees);
        }elseif ($id == 4){
            $employees = Employee::where('designation_id',3)->get();
            return response()->json($employees);
        }else{
            return null;
        }

    }
}
