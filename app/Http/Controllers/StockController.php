<?php

namespace App\Http\Controllers;

use App\Models\group\Group;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['stocks']=Stock::where('branch_id',auth()->user()->branch_id)
        //                 ->sum('quantity')
        //                 ->groupBy('product_id')->get();
        $stocks = DB::table('stocks')->join('products','stocks.product_id','=','products.id')
                ->selectRaw('sum(quantity) - sum(reserve_qty) as qty,sum(price) as price,count(batch_id) as batch, products.name,stocks.batch_id,stocks.product_id')
                ->where('stocks.quantity','>','0')
                ->where('stocks.branch_id',auth()->user()->branch_id)
                ->groupBy('stocks.product_id')
                ->get(); 
        return view('pages.reports.stock.stock_detail',compact('stocks'));
    }
    public function getProductBatch(Request $request)
    {
        $product_id = $request->product_id;
        $stocks = Stock::with('batch')->where('product_id',$product_id)->where('quantity','>','0')->get();        
        return response()->json( $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
