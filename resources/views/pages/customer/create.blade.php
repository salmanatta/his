@extends('layouts.main')
@section('content')

<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Customer Personal Info </h4><hr>
                    <form  class="" method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-lg-1">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label"> Old ID</label>
                                    <input type="text" name="customer_old_code"  class="form-control" id="validationCustom01">
                                </div>
                            </div>
                             <div class="col-lg-1">
                                 <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label"> ID</label>
                                    <input type="text" name="customer_code" value="{{$customer_old_id}}" readonly="readonly" class="form-control" id="validationCustom01">
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01">
                                </div>
                            </div>
                           
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">CNIC No</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="cnic_no">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email">
                                </div>
                            </div>
                         </div>
                        <div class="row">
                          <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Phone Residence</label>
                                    <input type="text" name="phone_res" class="form-control" id="validationCustom01">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control" id="validationCustom01">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="validationCustom01">
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Customer Group</label>
                                    <select id=""   name="group_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose Group</option>
                                       @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
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
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row"><h4 class="card-title mb-4">Office  Info</h4><hr>
                            
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone Office</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="phone_off" 
                                        >
                                </div>
                            </div>
                             
                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Fax</label>
                                    <input type="text" name="fax" class="form-control" id="validationCustom01"
                                        >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-"  class="form-label">Region</label>
                                    <select id=""   name="region_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose Region</option>
                                       @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}} | {{$region->region_code}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                           <div class="col-lg-4">
                                <div class="mb-4 ">
                                    <label for="formrow-inputZip" class="form-label">Allow In All Region </label><br>&nbsp;&nbsp;
                                    <input type="radio"  id="validationCustom02" value="1" name="flag"
                                        required >&nbsp;Yes&nbsp;&nbsp;
                                        <input type="radio"  id="validationCustom02" value="0" name="flag" 
                                        required>&nbsp;No
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <h4 class="card-title mb-4">License  Reg</h4><hr>
                             <div class="table-responsive" >
                          <table class="table table-bordered " id="license_table">
                            <tr>
                              <!-- <td><input width="0%" type="hidden" name="raw_row[]" value="0" id="raw_row">
                              </td> -->
                              <td>
                             
                                  <label for="formrow-inputlicense_type_id"  class="form-label">Form Type</label><br>
                                    <select  name="license_type_id[]"  class="form-control select2" >
                                    <option  selected="" disabled="">License Type</option>
                                    @foreach($license_types as $license_type)
                                    <option value="{{$license_type->id}}">{{$license_type->name}}</option>
                                    @endforeach
                                </select>
                              
                            </td>
                              <td><label for="formrow-inputState"  class="form-label">License Name</label>
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row">
                                <input type="text" placeholder="license Name" id="license_name" width="8%" name="license_name[]" class="form-control license_name"/></td>
                                <td><label for="formrow-inputState"  class="form-label">Exp Date</label><input type="date" placeholder="exp_date" id="exp_date" width="8%" name="exp_date[]" value="<?php echo date('Y-m-d') ?>" class="form-control  exp_date"/></td>
                                <td><label for="formrow-inputState"  class="form-label">Upload Document</label><input type="file" placeholder="document" id="document" width="8%" name="document[]" class="form-control  document"/></td>
                                <td><div style="padding-top: 29px;"></div><button  type="button" name="add_to" id="add_to" class="btn btn-success btn-sm add_to">+</button></td>
                              </tr>
                             </table>
                          </div>
                        </div>
                        <!-- <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div> -->
                        <div class="row"><h4 class="card-title mb-4">Tax  Reg</h4><hr>
                             <div class="table-responsive" >
                          <table class="table table-bordered " id="item_table">
                            <tr>
                              <!-- <td><input width="0%" type="hidden" name="raw_row[]" value="0" id="raw_row">
                              </td> -->
                              
                              <td>
                                <input  type="hidden" name="raw_row[]" value="0" id="raw_row"><label for="formrow-inputState"  class="form-label">CNIC No</label>
                                <input type="text" placeholder="CNIC No" id="cnic" width="8%" name="cnic[]" class="form-control cnic"/></td>
                                <td><label for="formrow-inputState"  class="form-label">NTN No</label><input type="number" placeholder="NTN No" id="ntn" width="8%" name="ntn[]" class="form-control  ntn"/></td>
                                <td><label for="formrow-inputState"  class="form-label">STRN No</label><input type="number" placeholder="STRN No" id="ntn" width="8%" name="sntn[]" class="form-control  sntn"/></td>
                                <td><label for="formrow-inputState"  class="form-label">Exemption</label><input type="number" placeholder="exemption" id="exemption" width="8%" name="exemption[]" class="form-control  exemption"/></td>
                                <td><label for="formrow-inputState"  class="form-label">Upload Certificate</label><input type="file" placeholder="certificate" id="certificate" width="8%" name="certificate[]" class="form-control  certificate"/></td>
                                <td><label for="formrow-inputState"  class="form-label">Income Tax</label><select  name="filer[]"  class="form-control select2">
                                    <option  value="" selected="" >Select Income Tax</option>
                                    <option value="Yes">Filer</option>
                                    <option value="No">Non Filer</option>
                                </select></td>
                                <td><label for="formrow-inputState"  class="form-label">Status</label>
                                <select  name="status[]"  class="form-control select2">
                                    <option  value="" selected="">Select Statu</option>
                                    <option value="1">Verified</option>
                                    <option value="0">Non Verified</option>
                                </select></td>

                                
                                <td><div style="padding-top: 29px;"></div><button  type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button></td>
                              </tr>
                             </table>
                          </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
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
   html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/><input type="text" width="8%" placeholder="CNIC No" name="cnic[]" class="form-control cnic"/></td>';
  html += '<td><input type="number" placeholder="NTN No" width="8%" name="ntn[]" class="form-control ntn"/></td>';
   
   html += '<td><input type="number" placeholder="STRN No" width="8%" name="sntn[]" class="form-control Sntn"/></td>';
   html += '<td><input type="number" placeholder="Exemption"  name="exemption[]" class="form-control exemption"/></td>';
   html += '<td><input type="file" placeholder="certificate" width="8%" name="certificate[]" class="form-control certificate"/></td>';
  html += '<td><select width="10%" class="form-control filer"  name="filer[]"><option value="" selected="" disabled="">Select Filer</option><option value="Yes">Filer</option><option value="No">Non Filer</option></select></td>';
  html += '<td><select width="10%" class="form-control select2"  name="status[]"><option value="" selected="" disabled="">Select Status</option><option value="1">Verified</option><option value="0">Non Verified</option></select></td>';
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
   html += '<td><select class="form-control select2" placeholder="License Type" name="license_type_id[]" ><option disabled="" selected="">License Type</option>@foreach($license_types as $license_type)<option value="{{$license_type->id}}">{{$license_type->name}}</option>@endforeach</select></td>';
   html += '<td><input type="hidden" name="raw_row[]" class="form-control raw_row"/><input type="text" width="8%" placeholder="license Name" name="license_name[]" class="form-control license_name"/></td>';
  html += '<td><input type="date" placeholder="exp_date" width="8%" name="exp_date[]" class="form-control exp_date"/></td>';
  html += '<td><input type="file" placeholder="document" width="8%" name="document[]" class="form-control document"/></td>';
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