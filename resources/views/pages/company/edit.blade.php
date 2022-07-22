@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Company Update </h4>

                    <form  class="" method="post" action="{{route('companies.update',$company->id)}}">
                        @csrf
                        @method("PUT")

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
                                    <label for="formrow-inputCity" class="form-label">Logo</label>
                                    <input type="file" value="{{$company->logo}}" name="logo" class="form-control" id="validationCustom01">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" value="{{$company->name}}" name="name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>

                            </div>
                             <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Email</label>
                                    <input type="text" value="{{$company->email}}" name="email" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Phone</label>
                                    <input type="number" value="{{$company->phone}}" name="phone" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Fax</label>
                                    <input type="number" value="{{$company->fax}}" name="fax" class="form-control" id="validationCustom01" 
                                        >
                                </div>
                            </div>
                             
                            </div>
                             <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                    <input type="radio"  id="validationCustom02" value="1" name="isActive"
                                        required @if($company->isActive==1) {{'checked'}} @endif>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio"  id="validationCustom02" value="0" name="isActive" 
                                        required @if($company->isActive==0) {{'checked'}} @endif>&nbsp;InActive
                                </div>
                            </div>
                           
                            
                          </div>
                          <div class="row">
                               <div class="col-lg-9">
                                <div class="mb-3 ">
                             <label for="validationCustom01" class="form-label">Address </label>
                                    <textarea type="text" cols="8" rows="4" name="address"  class="form-control" id="validationCustom01" 
                                        required>{{$company->address}}</textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                  </div>
                                </div>
                          </div>
                        
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
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