<?php

namespace App\Http\Controllers\pre_configuration;

use App\Http\Controllers\Controller;
use App\Models\ProductBonus;
use App\Models\ProductDiscount;
use App\Models\ProductMaxSalQuantity;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductInfo;
use App\Models\products\Product;
use App\Models\ProductType;
use App\Models\purchases\Supplier;
use App\Models\Stock;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Pharmacy\LogController as LogTable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->searchData != '') {
//            dd($request->all());
            $data['products'] = Product::where('name', 'like', '%' . $request->searchData . '%')->orderBy('name')->paginate(15);
            return view('pages.pre_configuration.product.index', $data);

        }else{
            $data['products'] = Product::orderBy('name')->paginate(15);
            return view('pages.pre_configuration.product.index', $data);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['productTypes'] = ProductType::all();
        $data['products'] = Product::all();
        $data['productcategories'] = ProductCategory::all();
//        $data['groups'] = ProductGroup::all();
        $data['suppliers'] = Supplier::all();
        return view('pages.pre_configuration.product.details', $data);
    }
    public function getAllProducts(Request $request)
    {
        if (request()->has('q')) {
//            $product = Product::where('name', 'like', '%' . $request->q . '%')
                $product = Product::where('name', 'like', $request->q . '%')
                    ->where('supplier_id',$request->supplier)
                    ->get();
                // ->join('stocks', 'products.id', '=', 'stocks.product_id')
                // ->select('products.*','stocks.batch_id')

            $product = $product->map(function ($item, $key) {
                return ['id' => $item['id'], 'text' => $item['name'] . ' - ' . $item['product_code']];
            });
            return response()->json(['items' => $product]);
        }
        return response()->json($response);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'type_id'               => 'required|exists:product_types,id',
                'category_id'           => 'required|exists:product_categories,id',
                'group_id'              => 'required|exists:product_groups,id',
                'name'                  => 'required',
                'product_code'          => 'required',
                'supplier_id'           => 'required',
                'short_name'            => 'nullable',
                'genral_name'           => 'string|nullable',
                'product_id'            => 'nullable',
                'group_seq'             => 'nullable',
                'packet'                => 'nullable',
                'sale_price'            => 'nullable',
                'comp_artd_no'          => 'nullable',
                'comp_seq'              => 'nullable',
                'weight'                => 'nullable',
                'max_sale_disc'         => 'nullable',
                'purchase_price'        => 'nullable',
                'purchase_tax_type'     => 'nullable',
                'purchase_tax_value'    => 'nullable',
                'sale_tax_value'        => 'nullable',
                're_order_level'        => 'nullable',
                'prod_shel_life_day'    => 'nullable',
                'trade_price'           => 'nullable',
                'purchase_disc_value'   => 'nullable',
                'tax3_value'            => 'nullable',
                'purchase_discount'     => 'nullable',
                'purchase_rate'         => 'nullable',
                'purchase_tax'          => 'nullable',
                'inventory_day'         => 'nullable',
                'tax3_type'             => 'nullable',
                'advance_tax_type'      => 'nullable',
                'expire_day'            => 'nullable',
                'net_balance'           => 'nullable',
                'max_flat_rate'         => 'nullable',
                'min_flat_rate'         => 'nullable',
                'adv_tax_filer'         => 'nullable',
                'adv_tax_non_filer'     => 'nullable',
                'adv_tax_supplier'      => 'nullable',
            ],
            [
                'type_id.required' => 'Please select any Product Type, Thank You.',
                'category_id.required' => 'Please select any Product Category, Thank You.',
                'group_id.required' => 'Please select any Product Group, Thank You.',
                'supplier_id.required' => 'Please select supplier, Thank You.',
            ]
        );
        $data = $request->except('product_id');
        $create_product = Product::create($data);
        $product_id = $create_product->id;
        return redirect()->route('getProduct', ['id' => $product_id])->with('success', 'Product Added Successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        $product            = Product::where('id', $id)->first();
        $discounts          = ProductDiscount::with('generalDiscount')->where('product_id', $id)->where('branch_id', auth()->user()->branch_id)->get();
        $bonus              = ProductBonus::with('bonuses')->where('product_id', $id)->where('branch_id', auth()->user()->branch_id)->get();
        $productTypes       = ProductType::all();
        $productcategories  = ProductCategory::all();
        $groups             = ProductGroup::where('supplier_id',$product->supplier_id)->get();
        $max_sale_qty       = ProductMaxSalQuantity::where('product_id', $id)->get();
        $suppliers          = Supplier::all();
        return view('pages.pre_configuration.product.details', compact('product','discounts','bonus','productTypes','productcategories','groups','max_sale_qty','suppliers'));
    }
    public function show(Product $product)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['productTypes'] = ProductType::all();
        $data['productcategories'] = ProductCategory::all();
        $data['groups'] = ProductGroup::all();
        $data['product'] = Product::where('id', $id)->first();
        $data['bonuses'] = ProductBonus::where('product_id', $id)->orwhere('id', $id)->get();
        $data['discounts'] = ProductDiscount::where('product_id', $id)->where('id', $id)->get();
        // dd($data['discounts']);
        $data['max_sale_qtys'] = ProductMaxSalQuantity::where('product_id', $id)->orwhere('id', $id)->get();
        return view('pages.pre_configuration.product.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $this->logsAction(["action" => "Update", "remarks" => "Product id " . $id]);
        return redirect()->route('products.index')->with('info', 'Data Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        $this->logsAction(["action" => "Destroy", "remarks" => "Product id " . $id]);
        return redirect()->route('products.index')->with('success', 'Data Deleted Successfully!');
    }
    public function logsAction($data)
    {
        LogTable::store(["action" => $data["action"], "remarks" => $data['remarks'], "action_date" => date("Y-m-d"), "action_time" => date("H:i:s"), "user_id" => auth()->user()->id]);
    }

    public function date_wise_stock_view()
    {
        $product = Product::latest('name' ,'ASC')->get();
        return view('pages.reports.purchase.item_report' , compact('product'));
    }

    public function date_wise_stock_data(Request $request)
    {
//        dd($request);
        $product = Product::latest('name' ,'ASC')->get();
        return view('pages.reports.purchase.item_report' , compact('product'));
    }

    public function get_supplier_group($id)
    {
        $group = ProductGroup::where('supplier_id',$id)->get();
        return response()->json($group);
    }
    public function get_group_product($id)
    {
        $product = Stock::whereHas('product' , function ($q) use ($id) {
            $q->where('group_id',$id);
        })->with(['product' => function($q) use ($id){
            $q->where('group_id',$id);
        }])->get();
        return response()->json($product);
    }
}
