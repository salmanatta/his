<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Employee;
use App\Models\Designation;
use App\Models\city\City;
use App\Models\User;
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
        $data['employees'] = Employee::all();
    return view('pages.pre_configuration.employee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities']=City::all();
        $data['designations']=Designation::all();
         return view('pages.pre_configuration.employee.create',$data);
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
        $employee->leave_date       = $request->leave_date;
        $employee->basic_salery     = $request->basic_salery;
        $employee->isAtive          = 1;
        $employee->last_modification_date  = $request->last_modification_date;
        $employee->designation_id   = $request->designation_id;
        $employee->branch_id        = auth()->user()->branch_id;
        $employee->save();
        if($request->createUser == 1){
            $user = new User();
            $user->name                 = $request->first_name." ".$request->last_name;
            $user->email                = $request->email;
            $user->email_verified_at    = Carbon::now();
            $user->password             = Hash::make("password");
            $user->branch_id            = auth()->user()->branch_id;
            $user->save();
        }
        return redirect()->route('employees.index')->with('success','Data Added Successfully!');
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

        return view('pages.pre_configuration.employee.edit',$data);
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
         $employee->update($request->all());
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
}
