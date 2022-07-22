<?php

namespace App\Http\Controllers;

use App\Models\ProductBonus;
use Illuminate\Http\Request;

class ProducBonusController extends Controller
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
       $data=ProductBonus::create($request->all());
       $data=ProductBonus::all()->toArray();
      //  echo "<pre>";
      // print_r($data);
      // die();
       return response()->json($data);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProducBonus  $producBonus
     * @return \Illuminate\Http\Response
     */
    public function show(ProducBonus $producBonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProducBonus  $producBonus
     * @return \Illuminate\Http\Response
     */
    public function edit(ProducBonus $producBonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProducBonus  $producBonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProducBonus $producBonus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProducBonus  $producBonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProducBonus $producBonus)
    {
        //
    }
}
