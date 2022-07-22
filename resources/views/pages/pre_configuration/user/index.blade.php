    @extends('layouts.main')
    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button" class="btn btn-primary waves-effect waves-light mb-2 me-2" href="{{route('users.create')}}"><i class="mdi mdi-plus me-1"></i> Add New</a>
                        </div>
                    </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

                        <thead class="table-light">
                            <tr>

                                <th class="align-middle"> #</th>
                                <th class="align-middle" width="15%">Image</th>
                                <th class="align-middle" width="40%">user Name</th>

                                <th class="align-middle">Email</th>
                                <th class="align-middle">Role</th>
                                <!-- <th class="align-middle">City</th> -->

                                <th class="align-middle" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr data-id="{{$user->id}}">

                                <!-- <td><a href="javascript: void(0);" class="text-body fw-bold">$user->id</a> </td> -->
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->avater}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email }}</td>
                                <td>{{$user->role->name }}</td>



                                <td>
                                    <div class="d-flex gap-3">
                                        <a data-modal="role" data-userid="{{$user->id ?? ''}}" class="btn btn-info btn-sm btn_assgn_role_to_user">
                                            Assign Role to this user
                                        </a>

                                        <a data-modal="permission" data-userid="{{$user->id ?? ''}}" class="btn btn-info btn-sm btn_assgn_permission_to_user">
                                            Assign Permission to this user
                                        </a>


                                        <a href="#" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-user_code="{{$user->id}}" data-user_name="{{$user->name}}" data-user_email="{{$user->email}}" data-user_role="{{$user->role->name}}">
                                            View Details
                                        </a>
                                        <a href="{{route('users.edit',$user->id)}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <!-- <a  href="{{route('users.destroy',$user->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                        <form method="post" action='{{route("users.destroy",$user->id) }}'>
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    <!-- end row -->
    <!-- Modal -->


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table cellpadding="5" cellmargin="5">
                        <tr>
                            <th> User ID </th>
                            <td> : <span class="m_user_code"> </span> </td>
                        </tr>
                        <tr>
                            <th> User Name </th>
                            <td> : <span class="m_user_name"> </span> </td>
                        </tr>
                        <tr>
                            <th> Email </th>
                            <td> : <span class="m_user_email"> </span> </td>
                        </tr>
                        <tr>
                            <th> User Role </th>
                            <td> : <span class="m_user_role"> </span> </td>
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
    @include('components/_models/_permissions')
    @include('components/_models/_roles')


    @endsection
    @push('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.detail_view_button', function() {

                $('.m_user_code').text($(this).data('user_code'));
                $('.m_user_name').text($(this).data('user_name'));
                $('.m_user_email').text($(this).data('user_email'));
                $('.m_user_role').text($(this).data('user_role'));
            });
            var userid = "";

            $("body").on("click", ".btn_assgn_role_to_user,.btn_assgn_permission_to_user", function() {
                userid = $(this).data("userid");
                var modal = $(this).data("modal");
                if (modal == "role") {
                    $(".mdl_permission").modal("hide");
                    $(".mdl_roles").modal("show");
                    rolesAndPermission("role");
                } else {
                    $(".mdl_roles").modal("hide");
                    $(".mdl_permission").modal("show");
                    rolesAndPermission("permission");
                }


            });

            function rolesAndPermission(condition) {
                $.ajax({
                    type: "GET"
                    , url: condition == "role" ? "{{url('api/get-all-roles')}}" : "{{url('api/get-all-permissions')}}"
                    , success: function(res) {
                        if (condition == "role") {
                            $(".mdl_roles_body").html(res);
                        } else {
                            $(".mdl_permission_body").html(res);
                        }

                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }
            $("body").on("click", ".btn_assing_role_permission_to_role", function() {
                var permission_id = $(this).data("permission_id");
                $.ajax({
                    type: "POST"
                    , url: "{{url('api/attach-permission-to-user')}}"
                    , data: {
                        userid
                        , permission_id
                    , }
                    , success: function(res) {
                        if (res.success) {
                            toastr.info(res.success);
                            $(".mdl_permission").modal("hide");

                        }
                        if (res.danger) {
                            toastr.error(res.danger);
                        }

                    }
                    , error: function(err) {
                        console.log(err)
                    }
                });
            });

            $("body").on("click", ".btn_assing_role_to_user", function() {
                var roleid = $(this).data("roleid");
                $.ajax({
                    type: "POST"
                    , url: "{{url('api/attach-role-to-user')}}"
                    , data: {
                        userid
                        , roleid
                    , }
                    , success: function(res) {
                        if (res.success) {
                            toastr.info(res.success);
                            $(".mdl_roles").modal("hide");
                        }
                        if (res.danger) {
                            toastr.error(res.danger);
                        }

                    }
                    , error: function(err) {
                        console.log(err)
                    }
                });
            });



        });

    </script>
    @endpush
