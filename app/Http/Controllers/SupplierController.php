<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\purchases\Supplier;
use App\Models\city\City;
use App\Models\group\Group;
use App\Models\employee\Employee;
// use App\Models\Distributor;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['suppliers']=Supplier::all();
        return view('pages.supplier.index',$data);
    }
    public function getAllSupliers(Request $request)
    {
        if (request()->has('q')) {
            $supplier = Supplier::where('name','like','%'.$request->q.'%')->get();
            $supplier = $supplier->map(function($item,$key){
                return ['id' => $item['id'],'text' => $item['name'].' - '.$item['supplier_id']];
            });
            return response()->json(['items' => $supplier]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['distributators']=Distributor::all();
        $data['employees']=Employee::all();
        $data['cities']=City::all();
        $data['groups']=Group::all();
        return view('pages.supplier.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create($request->all());
         return redirect()->route('suppliers.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchases\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchases\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['supplier']=Supplier::find($id);
        // $data['distributators']=Distributor::all();
        $data['employees']=Employee::all();
        $data['cities']=City::all();
        $data['groups']=Group::all();

        return view('pages.supplier.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierRequest  $request
     * @param  \App\Models\purchases\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier=Supplier::find($id);
        $supplier->update($request->all());
         return redirect()->route('suppliers.index')->with('info','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchases\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
       
        return redirect()->route('suppliers.index')->with('success','Data Deleted Successfully!');
    }
}
