@extends('base.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">branch Form </h4>

                    <form  class="" method="post" action="{{route('branches.update',$branch->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                          <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-input branch" class="form-label">Branch Code</label>
                                    <input type="text" value="{{$branch->branch_code}}" name="branch_code" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-input branch" class="form-label">Name</label>
                                    <input type="text" value="{{$branch->name}}" name="name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Company</label>
                                    <select id="formrow-inputState" required="true" name="company_id" class="form-select select2">Company 
                                       <option selected disabled="" value="">Choose Company</option>
                                        @foreach($companies as $company)
                                        @if($company->id==$branch->company_id)
                                        <option value="{{$company->id}}" selected="">{{$company->name}}</option>
                                        @else
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                   
                                    <input type="radio"  id="validationCustom02"   value="1" name="isActive" 
                                        required @if($branch->isActive==1) {{'checked'}} @endif>&nbsp;Active&nbsp;&nbsp;
                                     
                                        <input type="radio"    id="validationCustom02" value="0" name="isActive" 
                                        required @if($branch->isActive===0) {{'checked'}} @endif>&nbsp;InActive
                                        
                                </div>
                            </div>
                            
                            
                            <!-- <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                    @if($branch->isActive==1)
                                    <input type="radio"  id="validationCustom02" checked="" value="1" name="isActive" 
                                        required>&nbsp;Active&nbsp;&nbsp;
                                        @else
                                        <input type="radio" checked=""  id="validationCustom02" value="0" name="isActive" 
                                        required>&nbsp;InActive
                                        @endif
                                </div>
                            </div> -->
                            
                       
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