@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Company Form </h4>

                    <form  method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Branch Id</label>
                                    <input type="number" name="branch_code" class="form-control" placeholder="Enter Branch ID" id="validationCustom01"
                                        required>
                                </div>
                            </div> -->
                              <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Logo</label>
                                    <input type="file" placeholder="Enter logo" name="logo" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Company Name</label>
                                    <input type="text"  name="name" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Email</label>
                                    <input type="text"  name="email" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Phone</label>
                                    <input type="number"  name="phone" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Fax</label>
                                    <input type="number"  name="fax" class="form-control" id="validationCustom01"
                                        >
                                </div>
                            </div>

                          </div>
                             <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                    <input type="radio"  id="validationCustom02" value="1" name="isActive"
                                        required checked>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio"  id="validationCustom02" value="0" name="isActive"
                                        required>&nbsp;InActive
                                </div>
                            </div>
                             </div>
                             <div class="row">

                            <div class="col-lg-9">
                                <div class="mb-3 ">
                                     <label for="validationCustom01" class="form-label">Address </label>
                                            <textarea type="text" cols="4" rows="4" name="address" class="form-control" id="validationCustom01"
                                                required></textarea>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
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

<script type="text/javascript">
   // for third fourth guarantor
          function Function() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
function myFunction() {
  var checkBox = document.getElementById("Check");
  var txt = document.getElementById("txt");
  if (checkBox.checked == true){
    txt.style.display = "block";
  } else {
     txt.style.display = "none";
  }
}
</script>
@endpush
