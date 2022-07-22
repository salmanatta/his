@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Region Form </h4>

                    <form  class="" method="post" action="{{route('regions.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Region ID</label>
                                     <input type="number" name="region_code" class="form-control"  id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Region Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label"> City</label>
                                    <select id="formrow-inputState " required="true" name ="city_id" class="form-select select2">
                                       <option selected disabled="" value="">Select City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}} | {{$city->city_id}}</option>
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
                                        <input type="checkbox" id="myCheck" onclick="Function()">
                                </div>
                            </div>
                             <div class="col-lg-3"  id="text" style="display: none;">
                                <div class="mb-2">
                                    <label for="formrow-inputState"  class="form-label">Region </label>
                                    <select id="formrow-inputState"   name="region_id" class="form-select">
                                       <option selected="" disabled="">Choose Region</option>
                                        @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            

                            
                        </div>

                          <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <input type="radio" checked  id="validationCustom02" value="1" name="isActive" 
                                        required>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio"  id="validationCustom02" value="0" name="isActive" 
                                        required>&nbsp;InActive
                                </div>
                            </div>
                          </div>


                        <div class="row">
                           <!--  <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label"> Modification Date</label>
                                    <input type="date" name="last_modification_date" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div> -->
                            


                          
                            

                           
                       

                        
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

@stop
@push('script')
    <!-- apexcharts -->

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
    <!-- dashboard init -->
    
@endpush