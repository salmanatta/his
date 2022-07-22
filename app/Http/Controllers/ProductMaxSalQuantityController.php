<?php

namespace App\Http\Controllers;

use App\Models\ProductMaxSalQuantity;
use Illuminate\Http\Request;

class ProductMaxSalQuantityController extends Controller
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
        $data=$request->all();
        $ProductMaxSalQuantity=ProductMaxSalQuantity::create($data);
        return back()->with('info', 'Maximun Sale Quantity Updated Successfully!');
        // $ProductMaxSalQuantity=$ProductMaxSalQuantity->id;
        // return redirect()->route('getProduct', ['id' => $product_id])->with('info', 'Maximun Sale Quantity Updated Successfully!');
        // return view('pages.pre_configuration.product.details',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProducMaxSalQuantity  $producMaxSalQuantity
     * @return \Illuminate\Http\Response
     */
    public function show(ProducMaxSalQuantity $producMaxSalQuantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProducMaxSalQuantity  $producMaxSalQuantity
     * @return \Illuminate\Http\Response
     */
    public function edit(ProducMaxSalQuantity $producMaxSalQuantity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProducMaxSalQuantity  $producMaxSalQuantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producMaxSalQuantity = ProductMaxSalQuantity::find($id);
        $producMaxSalQuantity->update($request->all());
        return back()->with('info', 'Maximun Sale Quantity Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProducMaxSalQuantity  $producMaxSalQuantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProducMaxSalQuantity $producMaxSalQuantity)
    {
        //
    }
}
