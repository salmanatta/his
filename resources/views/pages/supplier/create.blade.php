@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Supplier Details  </h4>

                    <form  class="" method="post" action="{{route('suppliers.store')}}">
                        @csrf
                          <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Supplier ID</label>
                                    <input type="number" name="supplier_id" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="phone" 
                                        required>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Customer Group</label>
                                    <select id=""  required="true" name="group_id" class="form-select select2">
                                       <option selected disabled="" value="">Choose Group</option>
                                       @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            
                        <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Fax</label>
                                    <input type="text" name="fax" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                           
                             <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Url </label>
                                    <input type="text" name="url" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City</label>
                                    <select id="formrow-inputState" required="true" name="city_id" class="form-select">
                                       <option selected disabled="" value="">Choose City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                             <!-- <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Modification Date</label>
                                    <input type="date" class="form-control" id="validationCustom02" name="last_modification_date" 
                                        required>
                                </div>
                            </div> -->
                            
                        </div>

                        <div class="row">
                        <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                    <input type="radio"  checked id="validationCustom02" value="1" name="isActive" 
                                        required>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio"  id="validationCustom02" value="0" name="isActive" 
                                        required>&nbsp;InActive
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                           
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Address</label>
                                    <textarea  name="address" class="form-control" id="validationCustom01" 
                                        ></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Note</label>
                                    <textarea  name="note" class="form-control" id="validationCustom01" 
                                        ></textarea>
                                   
                                </div>
                            </div>
                           
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
                            

                             <!-- <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Employee</label>
                                    <select id="formrow-inputState" required="true" name="employee_id" class="form-select">
                                       <option selected disabled="" value="">Choose Employee</option>
                                       @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div> -->
                            
                            
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

@endsection
@push('script')
    
@endpush