@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users Logs Detail</h4>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div id="usersSelect" style="margin-bottom:10px;width:77%">
                            <select class="form-control select2" name="users">
                            </select>

                        </div>


                    </div>
                </div>


                <div id="logTableBody">


                </div>
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
    $(function() {
        $("body").on("change", "select[name='users']", function() {
            var user_id = $(this).val();
            console.log("testing", user_id)
            getAllLogs(user_id);

        })
    })
    $(window).on("load", function() {
        getAllLogs();
        getAllUsers();
    });



    function getAllLogs(user_id = null) {
        $.ajax({
            type: "GET"
            , url: "{{url('get-all-logs')}}"
            , data: {
                _token: "{{csrf_token()}}"
                , user_id
            }
            , success: function(res) {
                    $("#logTableBody").html(res);
                }

            , error: function(err) {
                console.log(err);
            }
        });
    }



    function getAllUsers() {
        $.ajax({
            type: "GET"
            , url: "{{url('get-all-users')}}"
            , data: {
                _token: "{{csrf_token()}}"
            }
            , success: function(res) {
                var option = "<option>please Select User</option>";
                for (var i = 0; i < res.length; i++) {
                    option += "<option value='" + res[i].id + "'>" + (res[i].name).charAt(0).toUpperCase() + (res[i].name).slice(1); + "</option>";
                }
                $("select[name='users']").html(option)


            }
            , error: function(err) {
                console.log(err);
            }
        });
    }

</script>

@endpush
