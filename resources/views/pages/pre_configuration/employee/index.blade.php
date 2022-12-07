@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Employee Details</h4>
                    <p class="card-title-desc">The  DataTables
                       provides Details
                   </p> -->
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button"
                               class="btn btn-primary waves-effect waves-light mb-2 me-2"
                               href="{{route('employees.create')}}"><i
                                    class="mdi mdi-plus me-1"></i> Add Employee</a>
                        </div>
                    </div><!-- end col-->


                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th class="align-middle"> ID</th>
                            <th class="align-middle">Employee Name</th>
                            <th class="align-middle">Contact</th>
                            <th class="align-middle">Fax</th>
                            <th class="align-middle">Email</th>
                            <!-- <th class="align-middle">Payment Method</th>
                            <th class="align-middle">View Details</th> -->
                            <th class="align-middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>

                                <td><a href="javascript: void(0);" class="text-body fw-bold">{{$employee->id}}</a></td>
                                <td>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</td>
                                <td>{{$employee->phone_off}}</td>
                                <td>{{$employee->fax}}</td>
                                <td>{{$employee->email}}</td>
                                <td>

                                    <div class="d-flex gap-3">
                                        <a href="#" class="btn btn-primary btn-sm detail_view_button"
                                           data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                                           data-employee_id="{{$employee->id}}"
                                           data-employee_name="{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}"
                                           data-phone_off="{{$employee->phone_off}}" data-fax="{{$employee->fax}}"
                                           data-email="{{$employee->email}}">
                                            View Details
                                        </a>
                                        <a href="{{route('employees.edit',$employee->id)}}" class="text-success"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('employees.destroy',$employee->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                        <form method="post" action='{{route("employees.destroy",$employee->id) }}'>
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- end row -->
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table cellpadding="5" cellmargin="5">
                        <tr>
                            <th> Employee ID</th>
                            <td> : <span class="m_employee_id"> </span></td>
                        </tr>
                        <tr>
                            <th> Employee Name</th>
                            <td> : <span class="m_employee_name"> </span></td>
                        </tr>
                        <tr>
                            <th> Contact</th>
                            <td> : <span class="m_phone_off"> </span></td>
                        </tr>
                        <tr>
                            <th> Fax</th>
                            <td> : <span class="m_fax"> </span></td>
                        </tr>
                        <tr>
                            <th> Email</th>
                            <td> : <span class="m_email"> </span></td>
                        </tr>

                    </table>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.detail_view_button', function () {
                $('.m_employee_id').text($(this).data('employee_id'));
                $('.m_employee_name').text($(this).data('employee_name'));
                $('.m_phone_off').text($(this).data('phone_off'));
                $('.m_fax').text($(this).data('fax'));
                $('.m_email').text($(this).data('email'));
            });
        });
    </script>
@endpush
