<?php
namespace App\Http\Controllers;
use App\Models\products\Product;
use App\Models\ProductDiscount;
use App\Models\ProductBonus;
use App\Models\ProductMaxSalQuantity;
use Illuminate\Http\Request;
class ProductInfoController extends Controller
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
    public function getProductDetail(Request $request)
    {
 $data=Product::where('id',$request->product_id)->first();
// $data=Product::all();
return response()->json($data);
    }
public function infoFind(Request $request)
    {
        // dd(json_decode($request->all));
        if (!empty($request->product_id)) {
            // $prodInfo=ProductInfo::find($request->product_id);
           Product::where('id',$request->product_id)->update($request->except(['_token','product_id']));
           $data = array(
            'status' => 'success',
            'message' => 'Record Add Successfully!',
            'data'=>false
            );
         return response()->json($data);
        }else{
         // $prodCheck=ProductInfo::where('product_id',$request->product_id)->get();
          // $inputs=$request->all()->except('_token');
        $data1=Product::create($request->except(['_token','product_id']));
        $data = array(
            'status' => 'success',
            'message' => 'Record Add Successfully!',
            'data'=>$data1
            );
return response()->json($data);

        }
    }
    public function discountFind(Request $request)
    {
         $prodCheck=ProductDiscount::where('product_id',$request->product_id)->get();
        $inputs=$request->all();
        $data=ProductDiscount::create($inputs);
        return response()->json($data);
    }
    public function store_bonuses(Request $request)
    {
        $inputs=$request->all();
        $data=ProductBonus::create($inputs);
        return response()->json($data);
    }
     public function store_max_sale_quantity(Request $request)
    {   
        $inputs=$request->all();
        $data=ProductMaxSalQuantity::create($inputs);
        return response()->json($data);
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
        $ProducBonus=ProductBonus::create($data);
        return back()->with('info', 'Action Successfully Done!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ProductInfo $productInfo)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductInfo $productInfo)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = ProductBonus::find($id);
        $product->update($request->all());
        return back()->with('info', 'Bonus Updated Successfully!');
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductInfo $productInfo)
    {
        //
    }
}
