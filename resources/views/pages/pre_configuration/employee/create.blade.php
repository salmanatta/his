@extends('layouts.main')
@section('content')


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Employee Form </h4>
                <form class="" method="post" action="{{route('employees.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="firstName" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="middleName" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" name="middle_name" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="lastName" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <select id="designation" required="true" name="designation_id" class="form-control select2">
                                    <option selected disabled="" value="">Choose Designation</option>
                                    @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="phoneOffice" class="form-label">Phone Off</label>
                                <input type="text" class="form-control" id="phoneOffice" name="phone_off" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="phoneRes" class="form-label">Phone Res</label>
                                <input type="text" name="phone_res" class="form-control" id="phoneRes" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="fax" class="form-label">Fax</label>
                                <input type="text" name="fax" class="form-control" id="fax" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select id="city" required="true" name="city_id" class="form-select select2">City
                                    <option selected disabled="" value="">Choose City</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" id="postalCode" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="cnicNo" class="form-label">CNIC No</label>
                                <input type="text" class="form-control" id="cnicNo" name="cnic_no" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="emergencyPreson" class="form-label">Emergency Contact Preson </label>
                                <input type="text" name="emg_name" class="form-control" id="emergencyPreson" >                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="emergencyPhone" class="form-label">Emergency Phone</label>
                                <input type="text" class="form-control" id="emergencyPhone" name="emg_phone" >                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="hireDate" class="form-label">Hire Date </label>
                                <input type="date" name="hire_date" class="form-control" id="hireDate" >                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="basicSalary" class="form-label">Basic Salary</label>
                                <input type="text" class="form-control" id="basicSalary" name="basic_salery" >                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="leaveDate" class="form-label">Leave Date </label>
                                <input type="date" name="leave_date" class="form-control" id="leaveDate" placeholder=" leave_date" >                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="notificationDate" class="form-label"> Modification Date </label>
                                <input type="date" name="last_modification_date" class="form-control" id="notificationDate" >                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="adress" class="form-label">Address </label>
                                <textarea type="text" cols="4" rows="4" name="address" class="form-control" id="adress" ></textarea>                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                            <label for="formrow-inputZip" class="form-label">Create User </label><br>                                    
                                    <input type="radio" value="1" name="createUser" required>&nbsp;Yes&nbsp;&nbsp;
                                    <input type="radio" value="0" name="createUser" required checked>&nbsp;No
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