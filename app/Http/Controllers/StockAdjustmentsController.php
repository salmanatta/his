<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockAdjustmentsController extends Controller
{
    public function stock_adjustment()
    {
        return view('pages.stock-adjustment.stock_adjustment');
    }

    public function store_stock_adjustment(Request $request)
    {
        dd($request->all());
    }
}
