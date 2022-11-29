@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Employee Registration </h4>
                    @if(isset($employee))
                    <form  class="" method="post" action="{{route('employees.update',$employee->id)}}">
                        @method('PATCH')
                    @else
                    <form class="" method="post" action="{{route('employees.store')}}">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" name="first_name" value="{{ isset($employee) ? $employee->first_name : old('first_name') }}" class="form-control" id="firstName" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" value="{{ isset($employee) ? $employee->middle_name : old('middle_name') }}" id="middleName" name="middle_name">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ isset($employee) ? $employee->last_name : old('last_name') }}" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <select id="designation_id" required="true" name="designation_id"
                                            class="form-control select2">
                                        <option selected disabled="" value="">Choose Designation</option>
                                        @foreach($designations as $designation)
                                            <option value="{{$designation->id}}" {{ isset($employee) ? $employee->designation_id == $designation->id ? 'selected' : '' : '' }}>{{$designation->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="phoneOffice" class="form-label">Phone Off</label>
                                    <input type="text" class="form-control" value="{{ isset($employee) ? $employee->phone_off : old('phone_off') }}" id="phoneOffice" name="phone_off">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="phoneRes" class="form-label">Phone Res</label>
                                    <input type="text" name="phone_res" value="{{ isset($employee) ? $employee->phone_res : old('phone_res') }}" class="form-control" id="phoneRes">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" name="fax" value="{{ isset($employee) ? $employee->fax : old('fax') }}" class="form-control" id="fax">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <select id="city" required="true" name="city_id" class="form-select select2">City
                                        <option selected disabled="" value="">Choose City</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{ isset($employee) ? $employee->city_id == $city->id ? 'selected' : '' : '' }}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="postalCode" class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" value="{{ isset($employee) ? $employee->postal_code : old('postal_code') }}" class="form-control" id="postalCode">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="cnicNo" class="form-label">CNIC No</label>
                                    <input type="text" class="form-control" value="{{ isset($employee) ? $employee->cnic_no : old('cnic_no') }}" id="cnicNo" name="cnic_no">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="emergencyPreson" class="form-label">Emergency Contact Person </label>
                                    <input type="text" name="emg_name" value="{{ isset($employee) ? $employee->emg_name : old('emg_name') }}" class="form-control" id="emergencyPreson">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="emergencyPhone" class="form-label">Emergency Phone</label>
                                    <input type="text" class="form-control" value="{{ isset($employee) ? $employee->emg_phone : old('emg_phone') }}" id="emergencyPhone" name="emg_phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="hireDate" class="form-label">Hire Date </label>
                                    <input type="date" name="hire_date" value="{{ isset($employee) ? $employee->hire_date : old('hire_date') }}" class="form-control" id="hireDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="basicSalary" class="form-label">Basic Salary</label>
                                    <input type="text" class="form-control" value="{{ isset($employee) ? $employee->basic_salery : old('basic_salery') }}" id="basicSalary" name="basic_salery">
                                </div>
                            </div>
{{--                            <div class="col-md-2">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="leaveDate" class="form-label">Leave Date </label>--}}
{{--                                    <input type="date" name="leave_date" class="form-control" id="leaveDate"--}}
{{--                                           placeholder=" leave_date">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ isset($employee) ? $employee->email : old('email') }}" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-2" id="reportedDiv">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Reported to</label>
                                    <select id="reported_to" wname="reported_to" class="form-select select2">
                                        <option selected disabled="" value=""> -- Select Manager --</option>
                                        @foreach($manager as $mgr)
                                            <option value="{{$mgr->id}}">{{$mgr->first_name.' '.$mgr->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="adress" class="form-label">Address </label>
                                    <textarea type="text" cols="4" rows="4" name="address" class="form-control"
                                              id="adress">{{ isset($employee) ? $employee->address : old('address') }}</textarea>
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
                        <div class="d-flex justify-content-end">
                            @if(isset($employee))
                                <button type="submit" class="btn btn-warning me-1">Update</button>
                            @else
                                <button type="submit" class="btn btn-success me-1">Save</button>
                            @endif
                            <a class="btn btn-danger mx-0" href="{{ route('employees.index') }}">Exit</a>
                        </div>
                    </form>
                    @if(isset($employee))
                            {{-- ======== Tab Pages ========--}}
                            <div class="tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab" aria-selected="false">Suppliers</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab" aria-selected="false">Regions</a></li>
{{--                                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab" aria-selected="false">Messages</a></li>--}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                                        <br>
                                        <h4 class="tab-title">Select Suppliers</h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <form action=""></form>
                                                <table class="table table-bordered dt-responsive no-footer"id="datatable-buttons">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="text-center">Action</th>
                                                            <th>Supplier Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($suppliers as $supplier)

                                                        <tr>
                                                            <td class="text-center">
                                                                <input type="checkbox" name="activeCheck" {{ isset($supplier->supplier_id) ? 'checked' : '' }} id="activeCheck_{{ $supplier->id }}" onclick="getSupplier({{ $supplier->id }})">
                                                                <input type="hidden" name="supplier_id" id="supplier_id" value="supplier_id">
                                                                <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee->id }}">
                                                            </td>
                                                            <td>{{ $supplier->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <br>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1">Save</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2" role="tabpanel">
                                        <br>
                                        <h4 class="tab-title">Another one</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque
                                            penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>
                                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                                            eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                                    </div>
{{--                                    <div class="tab-pane" id="tab-3" role="tabpanel">--}}
{{--                                        <h4 class="tab-title">One more</h4>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque--}}
{{--                                            penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>--}}
{{--                                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate--}}
{{--                                            eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        {{-- ======= End Tab Pages ======--}}
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
    $(document).ready(function (){
       $('#reportedDiv').hide();
    });

    $('#designation_id').change(function(){
        console.log($('#designation_id').val());
         var desgID = $('#designation_id').val();
         if (desgID == 1){
             $('#reportedDiv').show();
         }else{
             $('#reported_to').val();
             $('#reportedDiv').hide();
         }
    });
    // ============ Employee Supplier =====
    function getSupplier(id)
    {

        // console.log($( "#activeCheck_"+id ).prop("checked", true));
        if ($("#activeCheck_"+id).is(':checked')){


            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ url('employee-supplier')}}",
                data: {
                    'id': id,
                    'employee_id': $('#employee_id').val(),
                    _token: token,
                },
                success: function (data) {
                     console.log(data);
                    // location.reload(true);
                },
            });
        }else
        {
            console.log('Un-Checked');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ url('employee-supplier-delete')}}",
                data: {
                    'id': id,
                    'employee_id': $('#employee_id').val(),
                    _token: token,
                },
                success: function (data) {
                    console.log(data);
                    // location.reload(true);
                },
            });
        }
    };
    </script>
@endpush
