@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Region</h4>

                    <form  class="" method="post" action="{{route('regions.update',$region->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Region Code</label>
                                    <input type="text" name="region_code" value="{{$region->region_code}}" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$region->name}}" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Select City</label>
                                    <select id="formrow-inputState" required="true" name ="city_id" class="form-select">
                                       <option selected disabled="" value="">Select City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if($city->id==$region->city_id) {{'selected'}} @endif>{{$city->name}}</option>
                                       @endforeach 
                                    </select>
                                </div>
                            </div>
                             </div>

                            <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Has A Parent </label><br>
                                    <!-- <input type="checkbox"  onclick="myFunction()"  id="Check" value="1" name="isActive" 
                                        required>&nbsp;Yes&nbsp;&nbsp; -->
                                        <input type="checkbox" name="has_parent" id="myCheck" onclick="Function()" @if($region->region_id) {{'checked'}} @endif >
                                </div>
                            </div>
                            <div class="col-lg-3" id="text" style="@if($region->region_id==null) {{'display: none'}} @endif" >
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Parent Region</label>
                                    <select id="formrow-inputState"   name="region_id" class="form-select">
                                       <option selected value="">Choose Region</option>
                                         @foreach($regions as $value)
                                         @if($value->id==$region->region_id)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                        <option value="{{$value->id}}" >{{$value->name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>

                           <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label><br>
                                   
                                    <input type="radio"  id="validationCustom02"  @if($region->isActive==1) {{'checked'}} @endif value="1" name="isActive" 
                                        required>&nbsp;Active&nbsp;&nbsp;
                                     
                                        <input type="radio"  @if($region->isActive==0) {{'checked'}} @endif  id="validationCustom02" value="0" name="isActive" 
                                        required>&nbsp;InActive
                                        
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