@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Branch Form </h4>
                        <form class="" method="post" action="{{route('branches.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Branch Id</label>
                                        <input type="number" name="branch_code" class="form-control"
                                               placeholder="Enter Branch ID" id="validationCustom01" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Name</label>
                                        <input type="text" placeholder="Enter Branch Name" name="name"
                                               class="form-control"
                                               id="validationCustom01" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Company</label>
                                        <select id="formrow-inputState" required="true" name="company_id"
                                                class="form-select select2">Company
                                            <option selected disabled="" value="">Choose Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Branch Logo</label>
                                        <input type="file" accept=".gif,.jpg,.jpeg,.png" placeholder="Enter logo"
                                               name="logo_path" class="form-control"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 ">
                                        <label for="formrow-inputZip" class="form-label">Status </label><br>
                                        <input type="radio" id="validationCustom02" value="1" name="isActive"
                                               required checked>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio" id="validationCustom02" value="0" name="isActive"
                                               required>&nbsp;InActive
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!-- apexcharts -->
    <script type="text/javascript">
        // for third fourth guarantor
        function Function() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        function myFunction() {
            var checkBox = document.getElementById("Check");
            var txt = document.getElementById("txt");
            if (checkBox.checked == true) {
                txt.style.display = "block";
            } else {
                txt.style.display = "none";
            }
        }
    </script>

@endpush
