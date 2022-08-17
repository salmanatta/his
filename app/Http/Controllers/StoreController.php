<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StoreTransferDetail;
use App\Models\StoreTransfer;
use App\Models\Store;
use App\Models\Batch;
use App\Models\Stock;
use App\Models\products\Product;
use App\Models\branch\Branch;
use DB;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stores']=Store::all();
        return view('pages.pre_configuration.store.index',$data);
    }
     public function getAllProducts(Request $request){
        if (request()->has('q')) {
            $product = Product::where('name','like','%'.$request->q.'%')->get();
            $product = $product->map(function($item,$key){
                return ['id' => $item['id'],'text' => $item['name'].' - '.$item['product_code']];
            });
            return response()->json(['items' => $product]);
        }
    }
     public function getProducts(Request $request)
        {       
          //    $first_data = Batch::select('id','date','batch_no')->first();//this is save before every invoice and droft issue
             // App\Batch::select('date')->first();
          //      $batch_id=$first_data->id;
             $data=Stock::with('product')->where('product_id',$request->id)->orderBy('id', 'ASC')->first();
             return response()->json($data);
        }
     public function productFind(Request $request)
    {
        $data=Stock::with('product')->where('branch_id',$request->branch_id)->get()->toArray();
         return response()->json($data);
    }
    public function getStock(Request $request)
    {
          $query = $request->query;
        // if($query != ''){
            // $data = Product::search($query)->limit(5)->get();
           $data=Stock::with('product')->get()->toArray();
           return response()->json($data);
    }
    public function productGet(Request $request){
        $data=Stock::with('product')->where('product_id',$request->product_id)->first();
        return response()->json($data);
    }
    public function transferProduct(Request $request){
        // dd($request);
        $request->validate(
            [
                'to_branch_id'  => 'required',
                'product_id'    =>'required|exists:products,id',
                // 'customer_id'=>'required|exists:suppliers,id',
                // 'branch_id'=>'required|exists:branches,id', 
            ],
            [
                'to_branch_id.required' => 'Please select Branch to Transfer.',
                'product_id.required'   => 'Atleast One Product Must be Selected.',
                // 'branch_id.required' => 'Please select any Branch, Thank You.',
            ]
        ); 
        dd($request);            
        // $rows=$request->input('product_id');
        // $to_branch_id=$request->input('to_branch_id');
        // $from_branch_id=$request->input('from_branch_id');
        // $expire_date=$request->input('expire_date');
        // $description=$request->input('description');
        // foreach($rows as $key=>$row) 
        // {
        //             $product_id = $request->input('product_id')[$key];
        //             $price      = $request->input('price')[$key];
        //             $quantity   = $request->input('quantity')[$key];
        //     $storeTransfer=StoreTransfer::create([
        //             'product_id' =>$product_id,
        //             'price' =>$price,
        //              'quantity' =>$quantity,
        //             'to_branch_id' =>$to_branch_id,
        //             'from_branch_id' =>$from_branch_id,
        //             'description'=>$description,
        //             'expire_date' =>$expire_date
        //      ]);
        //     $store_transfer_id=$storeTransfer->id;
        //     StoreTransferDetail::create([
        //             'store_transfer_id' =>$store_transfer_id,
        //             'product_id' =>$product_id,
        //             'price' =>$price,
        //              'quantity' =>$quantity,
        //             'to_branch_id' =>$to_branch_id,
        //             'from_branch_id' =>$from_branch_id,
        //             'description'=>$description,
        //             'expire_date' =>$expire_date
        //      ]);
        // }
         return back()->with('success', 'Data Added Successfully!');
    }
    public function transferProductUpdate(Request $request,$id){
        $customerDocumentReg=StoreTransfer::where('id',$id)->delete();
        $rows=$request->input('product_id');
        $to_branch_id=$request->input('to_branch_id');
        $from_branch_id=$request->input('from_branch_id');
        $expire_date=$request->input('expire_date');
        $description=$request->input('description');
        foreach($rows as $key=>$row) 
        {
            $product_id = $request->input('product_id')[$key];
            $price      = $request->input('price')[$key];
            $quantity   = $request->input('quantity')[$key];
            $storeTransfer=StoreTransfer::create([
                    'product_id' =>$product_id,
                    'price' =>$price,
                     'quantity' =>$quantity,
                    'to_branch_id' =>$to_branch_id,
                    'from_branch_id' =>$from_branch_id,
                    'description'=>$description,
                    'expire_date' =>$expire_date
             ]);
            $store_transfer_id=$storeTransfer->id;
            StoreTransferDetail::create([
                    'store_transfer_id' =>$store_transfer_id,
                    'product_id' =>$product_id,
                    'price' =>$price,
                     'quantity' =>$quantity,
                    'to_branch_id' =>$to_branch_id,
                    'from_branch_id' =>$from_branch_id,
                    'description'=>$description,
                    'expire_date' =>$expire_date
             ]);
        }
         return redirect()->route('storetoStoreList')->with('success', 'Data Updated Successfully!');
    }
    public function storetoStoreList(){
        $data['storeTransfers']=StoreTransfer::with('product','store','branchFrom','branchTo')->get();
         return view('pages.store_to_store_list',$data);
    }
    public function storetoStoreReport(){
        // dd('okk');
        $data['storeTransfers']=StoreTransfer::with('product','store','branchFrom','branchTo')->get();
       // dd($data['storeTransfers']);
         return view('pages.reports.transfer-product.all-report',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['branchs']=Branch::all();
         // dd('off');
         return view('pages.pre_configuration.store.create',$data);
    } 
    public function storeToStore()
    {         
         $data['branches']=Branch::whereNotIn('id',[ auth()->user()->branch_id])->get();         
         return view('pages.store_to_store',$data);
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
      $createLice=Store::create($input);
       return redirect()->route('stores.index')->with('success','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['store']=Store::find($id);
        $data['branches']=Branch::all();
         return view('pages.pre_configuration.store.edit',$data);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $store=Store::find($id);
       $store->name=$request->input('name');
       $store->address=$request->input('address');
       $store->branch_id=$request->input('branch_id');
       $store->save();
       return redirect()->route('stores.index')->with('info','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Store::find($id)->delete();
        return redirect()->route('stores.index')->with('success','Data Deleted Successfully');   
     }
}
