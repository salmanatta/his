<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StockAdjustment;
use App\Models\StockAdjustmentDetail;

class StockAdjustmentsController extends Controller
{
    public function stock_adjustment()
    {
        return view('pages.stock-adjustment.stock_adjustment');
    }

    public function store_stock_adjustment(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'invoice_date'      =>'required',
            'trans_type'        =>'required',
            'product_id'        =>'required|exists:products,id',
        ],
            [
                'invoice_date.required' => 'Invoice Date must be entered.',
                'trans_type.required'   => 'Transaction Type must be selected.',
                'product_id.required'   => 'Atleast one product must be entered.',
            ]);
        $stock_adjustment = StockAdjustment::create([
            'invoice_no'            => StockAdjustment::maxId(auth()->user()->branch_id,$request->trans_type),
            'invoice_date'          => Carbon::createFromFormat('m/d/Y', $request->invoice_date)->format('Y-m-d'),
            'remarks'               => $request->remarks,
            'user_id'               => auth()->user()->id,
            'branch_id'             => auth()->user()->branch_id,
            'trans_type'            => $request->trans_type,
            'inv_status'            => 'Un-Post',
        ]);
        if($stock_adjustment){
            $detail_id = $stock_adjustment->id;
            $rows = $request->product_id;

        foreach ($rows as $key=>$row)
            {
                StockAdjustmentDetail::create([
                    'stock_adjustments_id'  => $detail_id,
                    'product_id'            => $request->product_id[$key],
                    'qty'                   => $request->qty[$key],
                    'batch_id'              => $request->table_batch_id[$key],
                    'cost_price'            => $request->trade_price[$key],
                    'line_total'            => $request->line_total[$key],
                ]);
            }
        }
        return back()->with('success',"Data Added Successfully!");
    }

    public function adjustment_approval(Request $request)
    {

        if(count($request->all()) > 0)
        {
            $adjustments = StockAdjustment::whereBetween('invoice_date',[$request->from_date,$request->to_date])
                                        ->where('branch_id',auth()->user()->branch_id)
                                        ->where('trans_type',$request->adjustment_type)
                                        ->where('inv_status',$request->trans_type)->get();
            return view('pages.stock-adjustment.adjustment_approval',compact('adjustments'));
        }
        return view('pages.stock-adjustment.adjustment_approval');
    }

    public function view_stock_adjustment($id)
    {
        $adjustment = StockAdjustment::find($id);
        $adjustmentDetail = StockAdjustmentDetail::with('product','batch')->where('stock_adjustments_id',$id)->get();
//        dd($adjustmentDetail);
        return view('pages.stock-adjustment.stock_adjustment',compact('adjustment','adjustmentDetail'));
    }

    public function update_stock_adjustment(Request $request,$id)
    {
//        dd($request->all());
        $adjustment = StockAdjustment::find($id);
        $adjustment->invoice_date = Carbon::createFromFormat('m/d/Y', $request->invoice_date)->format('Y-m-d');
        $adjustment->remarks = $request->remarks;
        if ($request->has('update-post')){
            $adjustment->inv_status = 'Post';
            $adjustment->status_changed_by = auth()->user()->id;
            $adjustment->status_changed_on = Carbon::now();
        }
        $adjustment->save();
        $rows = $request->product_id;
        foreach ($rows as $key => $row){
            if (!empty($request->id[$key])){
                $adjustmentDetail                  = StockAdjustmentDetail::find($request->id[$key]);
                $adjustmentDetail->product_id      = $request->product_id[$key];
                $old_Qty = $adjustmentDetail->qty;
                $adjustmentDetail->qty             = $request->qty[$key];
                $adjustmentDetail->batch_id        = $request->table_batch_id[$key];
                $adjustmentDetail->cost_price      = $request->trade_price[$key];
                $adjustmentDetail->line_total      = $request->line_total[$key];
                $adjustmentDetail->save();
            }else{
                StockAdjustmentDetail::create([
                    'stock_adjustments_id'  => $id,
                    'product_id'            => $request->product_id[$key],
                    'qty'                   => $request->qty[$key],
                    'batch_id'              => $request->table_batch_id[$key],
                    'cost_price'            => $request->trade_price[$key],
                    'line_total'            => $request->line_total[$key],
                ]);
                $stock = Stock::where('batch_id', $request->table_batch_id[$key])
                    ->where('product_id', $request->product_id[$key])
                    ->where('branch_id', auth()->user()->branch_id)
                    ->first();
                if ($request->has('update-post')) {
                    if ($request->trans_type == 'Positive Adjustment') {
//                        $stock->reserve_qty = $stock->reserve_qty - $old_Qty - $request->quanity[$key];
                        $stock->quantity += $request->quanity[$key];
                    }else{
//                        $stock->reserve_qty = $stock->reserve_qty - $old_Qty + $request->quanity[$key];
                        $stock->quantity -= $request->quanity[$key];
                    }
                }
            }
        }
        return back()->with('info',"Data Updated Successfully!");
    }

    public function batch_adjustment(Request $request)
    {
        if(count($request->all()) > 0){
            $batches = Batch::where('branch_id',auth()->user()->branch_id)
                ->whereBetween('date',[$request->from_date,$request->to_date])->get();
            return view('pages.stock-adjustment.batch_adjustment',compact('batches'));
        }else{
//            $batches = Batch::where('branch_id',auth()->user()->branch_id)
//                ->where('date','>=',Carbon::now())
//                ->get();
            return view('pages.stock-adjustment.batch_adjustment');
        }



    }

    public function batch_update(Request $request,$id)
    {
        $batch = Batch::find($id);
        $batch->batch_no = $request->batch_no;
        $batch->date =  $request->batch_date;
        $batch->save();
        return $batch;

    }
}
