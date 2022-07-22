@extends('layouts.main')
@section('content')



<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Employee Update </h4>

                    <form  class="" method="post" action="{{route('employees.update',$employee->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">First Name</label>
                                    <input type="text" value="{{$employee->first_name}}" name="first_name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="{{$employee->middle_name}}" name="middle_name" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Last Name</label>
                                    <input type="text" value="{{$employee->last_name}}" name="last_name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Designation</label>
                                    <select id="formrow-inputState" required="true" name="designation_id" class="form-select">
                                       <option selected disabled="" value="">Choose Designation</option>
                                         @foreach($designations as $designation)
                                         @if($designation->id==$employee->designation_id)
                                        <option value="{{$designation->id}}" selected="">{{$designation->title}}</option>
                                        @else
                                        <option value="{{$designation->id}}">{{$designation->title}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone Office</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="{{$employee->phone_off}}" name="phone_off" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Phone Residence</label>
                                    <input type="text" value="{{$employee->phone_res}}" name="phone_res" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            
                           
                            
                        </div>
                        <div class="row">
                             <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Fax</label>
                                    <input type="text" value="{{$employee->fax}}" name="fax" class="form-control" id="validationCustom01"
                                        required>
                                   
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City</label>
                                    <select id="formrow-inputState" required="true" name="city_id" class="form-select">City 
                                       <option selected disabled="" value="">Choose City</option>
                                        @foreach($cities as $city)
                                        @if($city->id==$employee->city_id)
                                        <option value="{{$city->id}}" selected="">{{$city->name}}</option>
                                        @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Postal Code</label>
                                    <input type="text" value="{{$employee->postal_code}}" name="postal_code" class="form-control" id="validationCustom01" 
                                        required>
                                   
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Emergency Name </label>
                                    <input type="text" value="{{$employee->emg_name}}" name="emg_name" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Emergency Phone</label>
                                    <input type="text" class="form-control" id="validationCustom02"  value="{{$employee->emg_phone}}" name="emg_phone" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">CNIC No</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="{{$employee->cnic_no}}" name="cnic_no" 
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            
                           
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Leave Date </label>
                                    <input type="date" name="leave_date" class="form-control" id="validationCustom01" value="{{$employee->leave_date}}"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Basic Salary</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="{{$employee->basic_salery}}" name="basic_salery"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Hire Date </label>
                                    <input type="date"  value="{{$employee->hire_date}}" name="hire_date" class="form-control" id="validationCustom01" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" value="{{$employee->email}}" name="email" 
                                        required>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Modification Date </label>
                                    <input type="date" value="{{$employee->last_modification_date}}" name="last_modification_date" class="form-control" id="validationCustom01" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                         <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Address </label>
                                    <textarea type="text" cols="4" rows="4" value="{{$employee->address}}" name="address" class="form-control" id="validationCustom01" 
                                        required>{{$employee->address}}</textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
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