<?php

namespace App\Http\Controllers;

use App\Models\employee\Employee;
use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    public function sales_target()
    {
//        $employees = Employee::all();
//        return view('pages.pre_configuration.employee.index',compact('employees'));
        return view('pages.sales-target.salesgit sta_target');
    }
}
