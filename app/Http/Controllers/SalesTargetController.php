<?php

namespace App\Http\Controllers;
use App\Models\purchases\Supplier;
use App\Models\SalesTarget;
use App\Models\SalesTargetDetail;
use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    public function sales_target_grid(Request $request)
    {
        if(count($request->all()) > 0){
            $sales = SalesTarget::whereBetween('start_date',[$request->from_date,$request->to_date])->where('branch_id',$request->branch_id)->get();
            return view('pages.sales-target.sales_target_grid',compact('sales'));
        }else{
            return view('pages.sales-target.sales_target_grid');
        }

    }
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
        $rows = $request->product_id;
        foreach ($rows as $key=>$row)
        {
            if (!empty($request->target_qty[$key]))
            {
                SalesTargetDetail::create([
                    'sales_target_id'   => $salesID->id,
                    'product_id'        => $request->product_id[$key],
                    'target_qty'        => $request->target_qty[$key],
                ]);
            }
        }
        return redirect()->back()->with('success','Data Saved Successfully');

    }
}
