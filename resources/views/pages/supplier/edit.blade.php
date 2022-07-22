@extends('layouts.main')
@section('content')

<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Supplier Update  </h4>

                    <form  class="" method="post" action="{{route('suppliers.update',$supplier->id)}}">
                        @csrf
                        @method('PUT')
                         <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="ss"  class="form-label">Supplier ID</label>
                                    <input type="text" name="supplier_id" value="{{$supplier->supplier_id}}" class="form-control" id="ss" 
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity"  class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$supplier->name}}" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02"  value="{{$supplier->email}}" name="email" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone</label>
                                    <input type="number" value="{{$supplier->phone}}"  class="form-control" id="validationCustom02" name="phone" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Customer Group</label>
                                    <select id=""  required="true" name="group_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose Group</option>
                                       @foreach($groups as $group)
                                       @if($group->id==$supplier->group_id)
                                        <option value="{{$group->id}}" selected="">{{$group->name}}</option>
                                        @else
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                        <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Fax</label>
                                    <input type="text" name="fax" value="{{$supplier->fax}}" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Url </label>
                                    <input type="text" name="url" value="{{$supplier->url}}" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City</label>
                                    <select id="formrow-inputState" required="true" name="city_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}"@if($supplier->city_id==$city->id)  {{'selected'}}@endif >{{$city->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                           

                           
                             
                        </div>
                        <div class="row">
                            
                        <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                    <input type="radio"   id="validationCustom02" value="1" name="isActive" 
                                        required @if($supplier->isActive==1)  {{'checked'}}@endif>&nbsp;Active&nbsp;&nbsp;
                                    
                                        <input type="radio"  id="validationCustom02" value="0" name="isActive" 
                                        required @if($supplier->isActive==0)  {{'checked'}}@endif>&nbsp;InActive
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                           
                           <!--  <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City</label>
                                    <select id="formrow-inputState" name="city_id" class="form-select">city 
                                       <option selected>Choose city</option>
                                        <option value="1">Kohat</option>
                                        <option value="2">Peshawar</option>
                                        <option value="3">Mardan</option>
                                    </select>
                                </div>
                            </div> -->
                            

                            <div class="col-lg-9">
                             

                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Address</label>
                                   

                                        <textarea  name="address"  class="form-control" id="validationCustom01" 
                                        required>{{$supplier->address}}</textarea>
                                </div>
                            </div>
                           
                        </div>
                         <div class="row">
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Note</label>
                                    <textarea  name="note"  class="form-control" id="validationCustom01" 
                                        required>{{$supplier->note}}</textarea>
                                   
                                </div>
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

@endsection
@push('script')
   
@endpush