<?php

namespace App\Http\Controllers;
use App\Models\purchases\Supplier;
use App\Models\SalesTarget;
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
        $salesID = new SalesTarget();
        $salesID->start_date    = $request->start_date;
        $salesID->end_date      = $request->end_date;
        $salesID->supplier_id   = $request->supplier_id;
        $salesID->branch_id     = $request->branch_id;
        $salesID->remarks       = $request->remarks;
        $salesID->created_by    = $request->created_by;
        $salesID->save();
        dd($request->all());

    }
}
