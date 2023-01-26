@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-6">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Company Form </h4>
                        @if(isset($company))
                        <form  class="" method="post" action="{{route('companies.update',$company->id)}}" enctype="multipart/form-data">
                            @method("PATCH")
                        @else
                        <form method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Logo</label>
                                        <input type="file" placeholder="Enter logo" name="logo" class="form-control"
                                               required value="{{ isset($company) ? $company->logo : old('logo') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Company Name</label>
                                        <input type="text" name="name" class="form-control" id="validationCustom01"
                                               required value="{{ isset($company) ? $company->name : old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="validationCustom01"
                                               required value="{{ isset($company) ? $company->email : old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="validationCustom01"
                                               required value="{{ isset($company) ? $company->phone : old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Fax</label>
                                        <input type="number" name="fax" class="form-control" id="validationCustom01" value="{{ isset($company) ? $company->fax : old('fax') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 ">
                                        <label for="formrow-inputZip" class="form-label">Status </label><br>
                                        <input type="radio" id="validationCustom02" value="1" name="isActive"
                                               required {{ isset($company) ? $company->isActive == 1 ? 'checked' : '' : '' }}>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio" id="validationCustom02" value="0" name="isActive"
                                               required {{ isset($company) ? $company->isActive == 0 ? 'checked' : '' : '' }}>&nbsp;InActive
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 ">
                                        <label for="validationCustom01" class="form-label">Address </label>
                                        <textarea type="text" cols="4" rows="4" name="address" class="form-control"
                                                  id="validationCustom01"
                                                  required>{{ isset($company) ? $company->address : old('address') }}</textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if(isset($company))
                                    <button type="submit" class="btn btn-warning me-1">Update</button>
                                @else
                                    <button type="submit" class="btn btn-success me-1">Save</button>
                                @endif
                                <a class="btn btn-danger mx-0" href="{{ route('companies.index') }}">Exit</a>

                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
        </div>
    </div>



@endsection
@push('script')

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
