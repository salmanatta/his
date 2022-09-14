<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sales\Customer;
use App\Models\employee\Employee;
use App\Models\region\Region;
use App\Models\group\Group;
use App\Models\city\City;
use App\Models\CustomerDocumentReg;
use App\Models\CustomerCategory;
use App\Models\CustomerLicense;
use App\Models\LicenseType;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['customers']=Customer::where('branch_id',auth()->user()->branch_id)->get();
    return view('pages.customer.index',$data);
    }
    public function commonCustomer(Request $request){
        if (request()->has('q')) {
            $customer = Customer::where('name','like','%'.$request->q.'%')->where('branch_id',auth()->user()->branch_id)->get();
            $customer = $customer->map(function($item,$key){
                return ['id' => $item['id'],
                        'text' => $item['name'].' - '.$item['customer_code'],
                        'filer' => $item['isfiler'],
                    ];
            });
            return response()->json(['items' => $customer]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['license_types']=LicenseType::all();
        $data['regions']=Region::all();
        $data['cities']=City::all();
        $data['groups']=Group::all();
         $data['customer_old_id'] = Customer::pluck('id')->last();//this is save before every customer
         // $customer_old_id="Batch-". $customer_old_id;
          // ++$customer_old_id;
          ++$data['customer_old_id'];
          // dd($data['customer_old_id']);
         return view('pages.customer.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());        
        $createCustomer=Customer::create([
            'name'              => $request->name,
            'customer_code'     => $request->customer_code,
            'customer_old_code' => $request->customer_old_code,
            'address'           => $request->address,
            'phone_off'         => $request->phone_off,
            'phone_res'         => $request->phone_res,
            'fax'               => $request->fax,
            'email'             => $request->email,
            'postal_code'       => $request->postal_code,
            'cnic_no'           => $request->cnic_no,            
            'group_id'          => $request->group_id,
            'city_id'           => $request->city_id,
            'region_id'         => $request->region_id,            
            'isfiler'           => $request->isfiler,
            'branch_id'           => $request->branch_id,
        ]);
        $customer_id=$createCustomer->id;
        $rows=$request->input('cnic');
        $rows_to=$request->input('license_name');
        $checked=$request->input('license_type_id');
                   
                    // $customer_id = $customer_id;
                    // $exemption = $request->input('exemption');
                   
        foreach($rows as $key=>$row) 
        {

                   
                    $cnic = $request->input('cnic')[$key];
                    $exemption = $request->input('exemption')[$key];
                    $ntn = $request->input('ntn')[$key];
                    $sntn = $request->input('sntn')[$key];
                    $filer = $request->input('filer')[$key];
                    $status = $request->input('status')[$key];
                    // $certificate=$request->file('certificate')[$key];
            // dd($cnic);
                  if($request->hasFile('certificate')){
                    $file = $request->file('certificate')[$key];
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                     $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }
            CustomerDocumentReg::create([
                    'cnic' =>$cnic,
                    'status' =>$status,
                     'ntn' =>$ntn,
                    'sntn' =>$sntn,
               'exemption' =>$exemption,
              'customer_id'=>$customer_id,
                   'filer' =>$filer,
             'certificate' =>$file_name ?? ''
             ]);
        }
            if ($checked!='' || $checked!=null) {
               foreach($rows_to as $key=>$row) 
        {
                   
                      $license_name = $request->input('license_name')[$key];
                   $exp_date = $request->input('exp_date')[$key];
                   $license_type_id = $request->input('license_type_id')[$key];
                   if($request->hasFile('document')){
                    $file = $request->file('document')[$key];
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
            }else{
                $file_name=null;
            }
            CustomerLicense::create([
                    'document' =>$file_name,
                    'license_name' =>$license_name,
                     'exp_date' =>$exp_date,
                    'customer_id' =>$customer_id,
               'license_type_id' =>$license_type_id
             ]);
                   
                   
        }
            }
            
         return redirect()->route('customers.index')->with('success','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data['license_types']=LicenseType::all();
        $data['regions']=Region::all();
        // $data['cities']=City::all();
        $data['groups']=Group::all();
        $data['customer']=Customer::find($id);

        $data['customerLicenses']=CustomerLicense::where('customer_id',$id)->get();
        $data['customerDocumentRegs']=CustomerDocumentReg::where('customer_id',$id)->get();
        // dd($data);
        $data['employees']=Employee::all();
         $data['cities']=City::all();

        return view('pages.customer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $customer=Customer::find($id);
        $customer->update($request->except('cnic','exemption','ntn','sntn','filer','certificate','_token','_method','raw_row','license_name','exp_date','license_type_id','form_type','document','customer_code','customer_old_code','hidden_document','hidden_certificate','status'));
        $customer_id=$customer->id;
        $customerDocumentReg=CustomerDocumentReg::where('customer_id',$id)->delete();
        $customerLicenses=CustomerLicense::where('customer_id',$id)->delete();
         $rows=$request->input('ntn');

         $rows_to=$request->input('license_name');
         foreach($rows as $key=>$row) 
        {

                   
                    $cnic = $request->input('cnic')[$key];
                    $exemption = $request->input('exemption')[$key];
                    $ntn = $request->input('ntn')[$key];
                    $sntn = $request->input('sntn')[$key];
                    $filer = $request->input('filer')[$key];
                    $status = $request->input('status')[$key];
                    // $certificate=$request->file('certificate')[$key];
            // dd($cnic);
                    $file_name='';
                  if($request->hasFile('certificate')){
                    if(array_key_exists($key, $request->file('certificate'))){
                        $file = $request->file('certificate')[$key];
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
                    }
                    
            }else{
                $file_name='';
            }
            CustomerDocumentReg::create([
                    'cnic' =>$cnic,
                    'status' =>$status,
                     'ntn' =>$ntn,
                    'sntn' =>$sntn,
               'exemption' =>$exemption,
              'customer_id'=>$customer_id,
                   'filer' =>$filer,
             'certificate' =>$file_name 
             ]);
        }
             foreach($rows_to as $key=>$row) 
        {
                   $file_name='';
                   $license_name = $request->input('license_name')[$key];
                   $exp_date = $request->input('exp_date')[$key];
                   $license_type_id = $request->input('license_type_id')[$key];
                   if($request->hasFile('document'))
                   {
                    if(array_key_exists($key, $request->file('document')))
                    {
                    $file = $request->file('document')[$key];
                    // $fileName = $file->getClientOriginalName() ;
                    $extension = $file->getClientOriginalExtension(); 
                    // $destinationPath = 'images/' ; // for online link will be
                    $destinationPath = 'public/images/' ; //for local link will be 
                    $datetime = date('mdYhisa', time());
                    $complete_name=$destinationPath.$datetime.'.'.$extension;
                    $file_name=$datetime.'.'.$extension;
                    $file->move($destinationPath,$file_name);
                    }
                    
                    }else{
                        $file_name='';

                    }
            CustomerLicense::create([
                    'document' =>$file_name,
                    'license_name' =>$license_name,
                     'exp_date' =>$exp_date,
                    'customer_id' =>$customer_id,
               'license_type_id' =>$license_type_id
             ]);
        }

        return redirect()->route('customers.index')->with('info','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Customer::find($id)->delete();
       return redirect()->route('customers.index')
                    ->with('success','Data Deleted Successfully!');
    }
}
