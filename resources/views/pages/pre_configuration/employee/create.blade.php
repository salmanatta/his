@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Employee Form </h4>

                    <form  class="" method="post" action="{{route('employees.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                           

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="middle_name" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Designation</label>
                                    <select id="" required="true" name="designation_id" class="form-control select2">
                                       <option selected disabled="" value="">Choose Designation</option>
                                        @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->title}}</option>
                                       @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone Off</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="phone_off" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Phone Res</label>
                                    <input type="text" name="phone_res" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Fax</label>
                                    <input type="text" name="fax" class="form-control" id="validationCustom01"
                                        required>
                                 
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">City</label>
                                    <select id="formrow-inputState" required="true" name="city_id" class="form-select select2">City 
                                       <option selected disabled="" value="">Choose City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control" id="validationCustom01" 
                                        required>
                                   
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">CNIC No</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="cnic_no" 
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Emergency Name </label>
                                    <input type="text" name="emg_name" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Emergency Phone</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="emg_phone" 
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
                                    <label for="validationCustom01" class="form-label">Hire Date </label>
                                    <input type="date" name="hire_date" class="form-control" id="validationCustom01" 
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                       <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Basic Salery</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="basic_salery"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Leave Date </label>
                                    <input type="date" name="leave_date" class="form-control" id="validationCustom01" placeholder=" leave_date"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email" 
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label"> Modification Date </label>
                                    <input type="date" name="last_modification_date" class="form-control" id="validationCustom01" 
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
                                    <textarea type="text" cols="4" rows="4" name="address" class="form-control" id="validationCustom01" 
                                        required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
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

@endsection
@push('script')
   
@endpush