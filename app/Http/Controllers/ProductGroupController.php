<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use App\Models\purchases\Supplier;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups =ProductGroup::all();

        return view('pages.pre_configuration.product_group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.pre_configuration.product_group.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $createCity=ProductGroup::create($input);
        return redirect()->route('product_groups.index')->with('info','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $ProductGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group =ProductGroup::find($id);
        $suppliers = Supplier::all();
        return view('pages.pre_configuration.product_group.create',compact('group','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $ProductGroup=ProductGroup::find($id);
       $ProductGroup->name =$request->input('name');
        $ProductGroup->supplier_id =$request->input('supplier_id');
       $ProductGroup->save();
       return redirect()->route('product_groups.index')->with('info','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGroup::find($id)->delete();
    return redirect()->route('product_groups.index')
                    ->with('error','Data Deleted Successfully!');
    }
}
