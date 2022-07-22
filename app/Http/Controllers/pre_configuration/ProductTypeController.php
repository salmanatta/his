<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product_types']=ProductType::all();
      return view('pages.pre_configuration.product_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pre_configuration.product_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
      $createCity=ProductType::create($input);
       return redirect()->route('product_types.index')->with('success','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['product_type']=ProductType::find($id);
         return view('pages.pre_configuration.product_type.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTypeRequest  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $city=ProductType::find($id);
       $city->name=$request->input('name');
       // $city->region_id=$request->input('region_id');
       // $city->isActive=$request->input('isActive');
       $city->save();
       return redirect()->route('product_types.index')->with('info','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ProductType::find($id)->delete();
           return redirect()->route('product_categories.index')
                    ->with('success','Data Deleted Successfully!');

    }
}
