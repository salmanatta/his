<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Employee;
use App\Models\Designation;
use App\Models\city\City;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees']=Employee::all();
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
        Employee::create($request->all());
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
