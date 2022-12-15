<?php

namespace App\Http\Controllers;
use App\Models\purchases\Supplier;
use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    public function sales_target()
    {
        $suppliers = Supplier::all();
        return view('pages.sales-target.sales_target',compact('suppliers'));
    }
    public function sales_target_store(Request $request)
    {
        dd($request->all());
    }
}
