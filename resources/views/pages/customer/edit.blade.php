@extends('layouts.main')
@section('content')




<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Customer Personal Info </h4><hr>

                <form  class="" method="post" action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        
                    <div class="col-lg-1">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label"> Old ID</label>
                             <input type="text" value="{{$customer->customer_old_code}}"  name="customer_old_code" class="form-control" id="validationCustom01" 
                            >
                        </div>
                    </div>
                    <div class="col-lg-1">
                           <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label"> ID</label>
                            <input type="text" value="{{$customer->customer_code}}" readonly="" name="customer_code" class="form-control" id="validationCustom01" 
                            >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label"> Full Name</label>
                            <input type="text" value="{{$customer->name}}" name="name" class="form-control" id="validationCustom01" 
                            >
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="formrow-inputZip" class="form-label">CNIC No</label>
                            <input type="text" value="{{$customer->cnic_no}}" class="form-control" id="validationCustom02" name="cnic_no" 
                            >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="formrow-inputZip" class="form-label">Email</label>
                            <input type="email" value="{{$customer->email}}" class="form-control" id="validationCustom02" name="email" 
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Phone Residence</label>
                        <input type="text" value="{{$customer->phone_res}}" name="phone_res" class="form-control" id="validationCustom01" 
                        >
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="formrow-inputState"  class="form-label">Postal Code</label>
                        <input type="text" value="{{$customer->postal_code}}"  name="postal_code" class="form-control" id="validationCustom01" 
                        >
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Address</label>
                        <input type="text" value="{{$customer->address}}" name="address" class="form-control" id="validationCustom01" 
                        >
                    </div>
                </div>
                 <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Customer Group</label>
                                    <select id=""   name="group_id" class="form-select select2">
                                       <option selected  value="">Choose Group</option>
                                       @foreach($groups as $group)
                                         @if($group->id==$customer->group_id)
                                        <option value="{{$group->id}}" selected="">{{$group->name}}</option>
                                        @else
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City </label>
                                    <select id=""   name="city_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose City</option>
                                       @foreach($cities as $city)
                                        @if($city->id==$customer->city_id)
                                        <option value="{{$city->id}}" selected="">{{$city->name}}</option>
                                         @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
         </div>
         <div class="row"><h4 class="card-title mb-4">Office  Info</h4><hr>
           <!--  <div class="col-md-2">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">GST Registration </label>
                    <input type="text" value="{{$customer->gst_registration}}" name="gst_registration" class="form-control" id="validationCustom01"
                    >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div> -->
            <div class="col-lg-2">
                <div class="mb-3">
                    <label for="formrow-inputZip" class="form-label">Phone Office</label>
                    <input type="text" value="{{$customer->phone_off}}" class="form-control" id="validationCustom02" name="phone_off" 
                    >
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="formrow-inputState"  class="form-label">Fax</label>
                    <input type="text" value="{{$customer->fax}}" name="fax" class="form-control" id="validationCustom01"
                    >
                </div>
            </div>

           
         <div class="col-lg-3">
            <div class="mb-3">
                <label for="formrow-inputState"  class="form-label">Region</label>
                <select id="formrow-inputState"   name="region_id" class="form-select">
                 <option selected  value="">Choose Region</option>
                 @foreach($regions as $region)
                 @if($region->id==$customer->region_id)
                 <option value="{{$region->id}}" selected="">{{$region->name}} | {{$region->region_code}}</option>
                 @else
                 <option value="{{$region->id}}">{{$region->name}} | {{$region->region_code}}</option>
                 @endif
                 @endforeach
             </select>
         </div>
     </div>
 </div>
 <div class="row">
  <h4 class="card-title mb-4">License  Registration</h4><hr>
  <div class="table-responsive" >
      <table class="table table-bordered " id="license_table">
        <thead>
            <tr>

                              <!-- <td><input width="0%" type="hidden" name="raw_row[]" value="0" id="raw_row">
                              </td> -->
                              <td><label for="formrow-inputState"  class="form-label">Form Type</label>
                              </td>
                              <td><label for="formrow-inputState"  class="form-label">License Name</label>
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                            </td>
                            <td><label for="formrow-inputState"  class="form-label">Exp Date</label></td>
                            <td><label for="formrow-inputState"  class="form-label">Upload Document</label></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="increment">
                        <?php $i=1;?>
                            @if($customerLicenses->isEmpty())
                            <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                           
                            <td class=""><select width="10%" name="license_type_id[]"  class="form-control">
                                <option  value="" selected="" >License Type</option>
                                @foreach($license_types as $license_type)

                                <option value="{{$license_type->id}}" >{{$license_type-> name}}</option>
                                @endforeach
                            </select></td>
                            <td class="license_name">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <input type="text"  id="license_name" width="5%" name="license_name[]" class="form-control license_name"/></td>
                                <td><input type="date"  id="exp_date" width="5%" name="exp_date[]" class="form-control  exp_date"/></td>
                                <td ><img src="" width="7%" />
                                    <input type="file" width="3%"  id="document"  name="document[]" class="  document"/>
                                    <input type="hidden" id="hidden_document"  name="hidden_document[]">
                                </td>

                                    <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-success btn-sm add_to">+</button></td>
                                </tr>
                           @else
                        <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                            @foreach ($customerLicenses as $data)
                            <td class=""><select width="10%" name="license_type_id[]"  class="form-control">
                                <option  value="" selected="" >License Type</option>
                                @foreach($license_types as $license_type)

                                <option value="{{$license_type->id}}" @if($license_type->id==$data->license_type_id)  {{'selected'}}@endif>{{$license_type->name}}</option>
                                @endforeach
                            </select></td>
                            <td class="license_name">
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <input type="text" value="{{$data->license_name}}" id="license_name" width="5%" name="license_name[]" class="form-control license_name"/></td>
                                <td><input type="date" value="{{$data->exp_date}}" id="exp_date" width="5%" name="exp_date[]" class="form-control  exp_date"/></td>
                                <td ><img src="{{asset('public/images/'.$data->document)}}" width="7%" />
                                    <input type="file" width="3%" value="{{$data->document}}" id="document"  name="document[]" class="  document"/>
                                    <input type="hidden" id="hidden_document" value="{{$data->document}}" name="hidden_document[]">
                                </td>

                                    <td><div ></div><button  type="button" name="add_to" id="add_to" class="btn btn-success btn-sm add_to">+</button></td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
                        <!-- <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div> -->
                        <div class="row"><h4 class="card-title mb-4">Tax  Reg</h4><hr>
                           <div class="table-responsive" >
                              <table class="table table-bordered " id="item_table">
                                <thead>
                                <tr>
                                  <!-- <td><input width="0%" type="hidden" name="raw_row[]" value="0" id="raw_row">
                                  </td> -->
                                    <td>
                                    <input  type="hidden" name="raw_row[]" value="0" id="raw_row"><label for="formrow-inputState"  class="form-label">CNIC No</label>
                                    </td>
                                    <td><label for="formrow-inputState"  class="form-label">NTN No</label></td>
                                    <td><label for="formrow-inputState"  class="form-label">SNTRN No</label></td>
                                    <td><label for="formrow-inputState"  class="form-label">Exemption</label></td>
                                     <td><label for="formrow-inputState"  class="form-label">Income Tax</label></td>
                                    <td><label for="formrow-inputState"  class="form-label">Upload Certificate</label></td>
                                    <td></td>
                               </tr>

                        <tbody id="">
                            <?php $i=1;?>
                            @if($customerDocumentRegs->isEmpty())
                          
                            <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                                <td class="cnic" >
                                    <input type="text"  id="cnic" width="8%" name="cnic[]" class="form-control cnic"/></td>
                                    <td class="ntn" >
                                        <input type="number"  id="ntn" width="8%" name="ntn[]" class="form-control  ntn"/></td>
                                        <td class="sntn" >
                                            <input type="number"  id="ntn" width="8%" name="sntn[]" class="form-control  sntn"/></td>
                                            <td class="exemption" >
                                                <input type="number" id="exemption" width="8%" name="exemption[]" class="form-control  exemption"/></td>
                                                <td class="filer"  >
                                                        <select width="10%" name="filer[]"  class="form-control">
                                                            <option  value=""  >Select Income Tax</option>
                                                            
                                                            <option value="Yes" selected="">Filer</option>
                                                            <option value="No">Non Filer</option> 
                                                        </select>
                                                    </td>
                                                    <td class="status"  >
                                                        <select width="10%" name="status[]"  class="form-control">
                                                            <option  value=""  >Select Status</option>
                                                           
                                                            <option value="1" selected="">Verified</option>
                                                            <option value="0">Non Verified</option>
                                                        </select>
                                                    </td>
                                                <td class="certificate" >
                                                    <img src="" width="14%"  />
                                                    <input type="file"  id="certificate" width="5%" name="certificate[]" class="certificate"/>
                                                <input type="hidden" id="hidden_certificate"  name="hidden_certificate[]"></td>

                                                    <td><div ></div><button  type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button></td>


                                                </tr>
                                               
                            @else
                            <tr class="table_append_rows" id="table_append_rows_{{$i}}"> 
                                @foreach ($customerDocumentRegs as $data)
                                <td class="cnic" >
                                    <input type="text" value="{{$data->cnic}}" id="cnic" width="8%" name="cnic[]" class="form-control cnic"/></td>
                                    <td class="ntn" >
                                        <input type="number" value="{{$data->ntn}}" id="ntn" width="8%" name="ntn[]" class="form-control  ntn"/></td>
                                        <td class="sntn" >
                                            <input type="number" value="{{$data->sntn}}" id="ntn" width="8%" name="sntn[]" class="form-control  sntn"/></td>
                                            <td class="exemption" >
                                                <input type="number" value="{{$data->exemption}}" id="exemption" width="8%" name="exemption[]" class="form-control  exemption"/></td>
                                                <td class="filer"  >
                                                        <select width="10%" name="filer[]"  class="form-control">
                                                            <option  value=""  >Select Income Tax</option>
                                                            @if($data->filer=='Yes')
                                                            <option value="Yes" selected="">Filer</option>
                                                            <option value="No">Non Filer</option>

                                                            @endif
                                                            @if($data->filer=='No')
                                                             <option value="Yes" >Filer</option>
                                                            <option value="No" selected="">Non Filer</option>
                                                            @endif
                                                            
                                                        </select>
                                                    </td>
                                                    <td class="status"  >
                                                        <select width="10%" name="status[]"  class="form-control">
                                                            <option  value=""  >Select Status</option>
                                                            @if($data->status=='1')
                                                            <option value="1" selected="">Verified</option>
                                                            <option value="0">Non Verified</option>

                                                            @endif
                                                            @if($data->status=='0')
                                                             <option value="1" >Verified</option>
                                                            <option value="0" selected="">Non Verified</option>
                                                            @endif
                                                            
                                                        </select>
                                                    </td>
                                                <td class="certificate" >
                                                    <img src="{{asset('public/images/'.$data->certificate)}}" width="14%"  />
                                                    <input type="file" value="{{$data->certificate}}" id="certificate" width="5%" name="certificate[]" class="certificate"/>
                                                <input type="hidden" id="hidden_certificate" value="{{$data->certificate}}" name="hidden_certificate[]"></td>

                                                    <td><div ></div><button  type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button></td>


                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                                    @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                </div>

                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->


            </div>
            <!-- end row -->

            @stop
            @push('script')
            
            <script>
                $(document).ready(function(){
    // alert('ok');
    var count =  1;

    $(document).on('click','#add',function(){
      count = count + 1;
      html += '<form method="post" id="add_name" name="add_name">';
      var html = '<tr>';
      html += '<tr  id="row'+count+'">';
   // html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/></td>';
   html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/><input type="text" width="8%" placeholder="cnic" name="cnic[]" class="form-control cnic"/></td>';
   html += '<td><input type="number" placeholder="ntn" width="8%" name="ntn[]" class="form-control ntn"/></td>';
   html += '<td><input type="number" placeholder="sntn"  name="sntn[]" class="form-control sntn"/></td>';
   html += '<td><input type="number" placeholder="exemption" width="8%" name="exemption[]" class="form-control exemption"/></td>';
    html += '<td><select width="10%" class="form-control filer"  name="filer[]"><option value="" selected="" >Select Income Tax</option><option value="Yes">Filer</option><option value="No">Non Filer</option></select></td>';
    html += '<td><select width="10%" class="form-control status"  name="status[]"><option value="" selected="" >Select Status</option><option value="1">Verified</option><option value="No">Non Verified</option></select></td>';
   html += '<td><input type="file" placeholder="certificate" width="8%" name="certificate[]" class="form-control certificate"/></td>';
  
   html += '<td ><button type="button" data-id="'+count+' " name="remove" class="btn my btn-danger btn-sm "> - </button></td>';
   html += '</tr>';
   html += '</form>';

   $('#item_table').append(html);
});
 //===============================for license======================
 $(document).on('click','#add_to',function(){
  count = count + 1;
  html += '<form method="post" id="add_name_to" name="add_name_to">';
  var html = '<tr>';
  html += '<tr  id="row'+count+'">';
   // html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/></td>';
   html += '<td><select class="form-control" placeholder="License Type" name="license_type_id[]" ><option  selected="">License Type</option>@foreach($license_types as $license_type)<option value="{{$license_type->id}}">{{$license_type->name}}</option>@endforeach</select></td>';
   html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/><input type="text" width="5%" placeholder="license_name" name="license_name[]" class="form-control license_name"/></td>';
   html += '<td><input type="date" placeholder="exp_date" width="5%" name="exp_date[]" class="form-control exp_date"/></td>';
   html += '<td><input type="file" placeholder="document" width="15%" name="document[]" class=" document"/></td>';
   html += '<td ><button type="button" data-id="'+count+' " name="remove" class="btn my_to btn-danger btn-sm "> - </button></td>';
   html += '</tr>';
   html += '</form>';

   $('#license_table').append(html);
});
 // =================###########$$$$$$$$$$$$$@@@@@@@@@@=====================
});
                $(document).on('click','.my_to',function(){

                   var count=$(this).data('id');
                   var row= $('#row'+count).remove();
                   console.log(count);

               });
                $(document).on('click','.my',function(){

                   var count=$(this).data('id');
                   var row= $('#row'+count).remove();
                   console.log(count);

               });
           </script>
           <!-- ================================START ADD  AJAX PROPERTY WORK=================== -->
           @endpush