<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
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
        $data['groups']=ProductGroup::all();
        return view('pages.pre_configuration.product_group.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.pre_configuration.product_group.create');
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
          $data['group']=ProductGroup::find($id);
     
        return view('pages.pre_configuration.product_group.edit',$data);
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
