@extends('layouts.main')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">Role Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('roles.create')}}"><i class="mdi mdi-plus me-1"></i> Add role</a>
                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <!-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> -->

                            <th class="align-middle"> #</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Company Name</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key=>$role)
                        <tr data-id="{{$role->id}}">

                            <td>{{$role->key+1}}</td>
                            <td>{{$role->name ?? ''}}</td>
                            <td>{{$role->company->name ?? ''}}</td>

                            <td>

                                <div class="d-flex gap-3">
                                    <a href="{{url('attached-permissins')}}/{{$role->id ?? ''}}" class="btn btn-success btn-sm">
                                        Roles attached Permissions
                                    </a>
                                    <a data-bs-toggle="modal" data-roleid="{{$role->id ?? ''}}" class="btn btn-info btn-sm btn_assgn_role">
                                        Assign Permission to Role
                                    </a>

                                    <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-role_id="{{$role->id}}" data-role_name="{{$role->name}}" data-role_display_name="{{$role->display_name}}" data-role_description="{{$role->description}}" data-company_name="{{$role->company->name}}">
                                        View Details
                                    </a>


                                    <a href="{{route('roles.edit',$role->id)}}" class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('roles.destroy',$role->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <!-- <form method="post" action='{{route("roles.destroy",$role->id) }}'>
                                          {{csrf_field()}}
                                          {{method_field('DELETE')}}
                                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form> -->
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
                        <th> Role ID </th>
                        <td> : <span class="m_role_id"> </span> </td>
                    </tr>
                    <!--  <tr> <th> role Code </th><td> : <span class="m_role_code"> </span>   </td></tr> -->
                    <tr>
                        <th> Role Name </th>
                        <td> : <span class="m_role_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Display Name </th>
                        <td> : <span class="display_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Description </th>
                        <td> : <span class="description"> </span> </td>
                    </tr>
                    <tr>
                        <th> Company Name </th>
                        <td> : <span class="company_name"> </span> </td>

                    </tr>



                    <!-- <tr> <th> Status </th><td> : <span class="m_role_status"> </span>     </td>  </tr> -->

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



@endsection
@push('script')

<!-- ==================Start Of Edit Footer=============== -->
<script>
    $(document).ready(function() {

        $(document).on('click', '.detail_view_button', function() {
            // $('.m_role_code').text($(this).data('role_code'));
            $('.m_role_id').text($(this).data('role_id'));
            $('.m_role_name').text($(this).data('role_name'));
            $('.display_name').text($(this).data('role_display_name'));
            $('.description').text($(this).data('role_description'));
            $('.company_name').text($(this).data('company_name'));
        });
        var role_id = "";
        $("body").on("click", ".btn_assgn_role", function() {
            role_id = $(this).data("roleid");
            $(".mdl_permission").modal("show");
            getAllPermissions();
        });

        function getAllPermissions() {
            $.ajax({
                type: "GET"
                , url: "{{url('api/get-all-permissions')}}"

                , success: function(res) {
                    $(".mdl_permission_body").html(res);
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
                , url: "{{url('api/attach-detach-role')}}"
                , data: {
                    role_id
                    , permission_id
                , }
                , dataType: "json"
                , success: function(res) {

                    if (res.success) {
                        toastr.info(res.success);
                        $(".mdl_permission").modal("hide");
                        role_id = "";
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
