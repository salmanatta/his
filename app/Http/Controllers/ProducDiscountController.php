<?php

namespace App\Http\Controllers;

use App\Models\ProductDiscount;
use Illuminate\Http\Request;

class ProducDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->all());
        $data=ProductDiscount::create($request->all());
    //    $data=ProductDiscount::all()->toArray(); 
    return back()->with('success', 'Discount Updated Successfully!');
    //    return redirect()->route('products.index')->with('info', 'Maximun Sale Quantity Updated Successfully!');
      
    //    return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProducDiscount  $producDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(ProducDiscount $producDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProducDiscount  $producDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(ProducDiscount $producDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProducDiscount  $producDiscount
     * @return \Illuminate\Http\Response  
     */
    public function update(Request $request, $id)
    {
        $discount = ProductDiscount::find($id);
        $discount->update($request->all());
        return back()->with('info', 'Discount Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProducDiscount  $producDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProducDiscount $producDiscount)
    {
        //
    }
}
