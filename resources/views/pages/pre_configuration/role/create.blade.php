@extends('layouts.main')
@section('content')


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Role Form </h4>

                <form class="" method="post" action="{{route('roles.store')}}">
                    @csrf

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <input type="hidden" value="{{$role->company_id ?? ''}}" class="hidden_company_id">
                                <input type="hidden" name="hidden_id" value="{{$role->id ?? ''}}" class="hidden_id">
                                <label for="formrow-inputCity" class="form-label">Company name</label>
                                <select class="form-control select2" name="company_id">

                                </select>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Name</label>
                                <input type="text" value="{{$role->name ?? ''}}" name="name" class="form-control" id="" required>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Display Name</label>
                                <input type="text" value="{{$role->display_name ?? ''}}" name="display_name" class="form-control" id="" required>


                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Description</label>
                                <textarea style="resize: none" type="text" name="description" class="form-control" id="" required>{{$role->description ?? ''}}</textarea>
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
<script>
    var company_id = $(".hidden_company_id").val();


    getAllCompanies();

    function getAllCompanies() {

        $.ajax({
            type: "GET"
            , url: "{{url('api/get-all-companies')}}"
            , success: function(res) {
                console.log("res", res)
                var option = "<option>Please Select company</option>";
                for (var i = 0; i < res.length; i++) {
                    if (company_id == res[i].id) {
                        option += "<option selected value='" + res[i].id + "'>" + (res[i].name).charAt(0).toUpperCase() + (res[i].name).slice(1); + "</option>";

                    } else {
                        option += "<option value='" + res[i].id + "'>" + (res[i].name).charAt(0).toUpperCase() + (res[i].name).slice(1); + "</option>";
                    }


                }
                $("select[name='company_id' ]").html(option)

            }
            , error: function(err) {
                console.log(err);
            }
        });
    }

</script>

@endpush
