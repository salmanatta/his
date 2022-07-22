@extends('layouts.main')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Role Details</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-lg-6">
                        <select class="form-control select2 role_select">
                            <option>Please select Role</option>
                            @foreach($roles as $key => $role)
                            <option value="{{$role->id}}">{{$role->name ?? ''}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{url('users')}}"><i class="fa fa-arrow-left"></i> Checkout Users list</a>

                    </div>
                </div><!-- end col-->
                <div id="roles_attached_permissions"></div>


            </div>

        </div>

    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
<!-- end row -->
<!-- Modal -->



@endsection
@push('script')
<script>
    $("body").on("change", ".role_select", function() {
        var role_id = $(this).val();
        getAllRelatedPermissions(role_id);

    });
    $(window).on("load", function() {
        var role_id = $(".role_select").find("option:eq(1)").val();
        getAllRelatedPermissions(role_id);
    });

    function getAllRelatedPermissions(role_id) {
        $.ajax({
            type: "GET"
            , url: "{{url('api/get-all-role-related-permissions')}}"
            , data: {
                role_id
            }
            , success: function(res) {
                $("#roles_attached_permissions").html(res);
            }
            , error: function(err) {
                console.log(err);
            }
        });
    }

</script>



@endpush
