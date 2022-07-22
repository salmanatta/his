<?php
namespace App\Http\Controllers\pre_configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerCategory;
class CustomerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customer_categories'] = CustomerCategory::all();
        return view('pages.pre_configuration.customer_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pre_configuration.customer_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $createCity = CustomerCategory::create($input);
        return redirect('customer_categories');
        return redirect()->route('customer_categories.index')->with('success','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerCategory $customerCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['customer_category'] = CustomerCategory::find($id);
        // $data['regions']=Region::all();
        return view('pages.pre_configuration.customer_category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerCategoryRequest  $request
     * @param  \App\Models\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer_category = CustomerCategory::find($id);
        $customer_category->name = $request->input('name');
        $customer_category->save();
        return redirect()->route('customer_categories.index')
            ->with('success', 'Data  Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerCategory::find($id)->delete();
        return redirect()->route('customer_categories.index')
            ->with('success', 'Data Deleted Successfully');
    }
}
