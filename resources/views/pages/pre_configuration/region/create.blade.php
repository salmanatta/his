@extends('layouts.main')
@section('content')


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Region Preview </h4>
                    <ul id="myUL">
                        @foreach($cities as $city)
                            <li>
                                <a href="#"   id="city_{{$city->id}}}"> {{$city->name}}</a>
                                <ul>
                                    @foreach($regions as $region)
                                        @if ($city->id == $region->city_id && $region->region_id == '')
                                        <li>{{$region->name}}</li>
                                            <ul>
                                                @foreach($region->childrenRecursive as $region_l2)
                                                     <li><a class="nav_item" data-regionid="{{$region_l2->region_id}}" href="#">  {{$region_l2->name}}</a></li>
                                                    <ul>
                                                        @foreach($region_l2->childrenRecursive as $region_l3)
                                                            <li>
                                                                <a href="#" class="mav_item" data-regionid="{{$region_l3->region_id}}"  > {{$region_l3->name}}</a>
                                                                <ul>
                                                                    @foreach($region_l3->childrenRecursive as $region_l4)
                                                                        <li> <a href="#"  class="nav_item"  data-regionid="{{$region_l4->region_id}}" > {{$region_l4->name}}</a> </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                        @endforeach

                    </ul>



                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Region Form </h4>
                                <form class="" method="post" action="{{route('regions.store')}}">
                                    @csrf
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label for="formrow-inputState" class="form-label">Region ID</label>--}}
{{--                                                <input type="number" name="region_code" class="form-control"--}}
{{--                                                       id="region_code"--}}
{{--                                                       required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Region Name</label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class=" mb-3">
                                               <button class="mb-3 btn btn-primary ">Add</button>
                                            </div>
                                        </div>

                                    </div>







                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 ">
                                                <label for="formrow-inputZip" class="form-label">Has A
                                                    Parent </label><br>
                                                <input type="checkbox" id="myCheck" onclick="Function()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3 ">
                                                    <label for="level_no" class="form-label">Region Level</label><br>
                                                    <select id="level_no" name="level_no" class="form-select">
                                                        <option selected="" disabled="">Choose Region</option>
                                                        <option value="1">Level 1</option>
                                                        <option value="2">Level 2</option>
                                                        <option value="3">Level 3</option>
                                                        <option value="4">Level 4</option>
                                                        <option value="5">Level 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="text" style="display: none;">
                                                <div class="mb-3">
                                                    <label for="region_id" class="form-label">Region </label>
                                                    <select id="formrow-inputState" name="region_id"
                                                            class="form-select">
                                                        <option selected="" disabled="">Choose Region</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3 ">
                                                    <label for="formrow-inputZip" class="form-label">Status </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                                    <input type="radio" checked id="active" value="1" name="isActive"
                                                           required>&nbsp;Active&nbsp;&nbsp;
                                                    <input type="radio" id="inactive" value="0" name="isActive"
                                                           required>&nbsp;InActive
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3 ">
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                            </div>
                                            <div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
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
        $(".nav_item").click(function(){
            console.log($(this).attr('data-regionid'));

            alert("The paragraph was clicked.");
        });

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

    <!-- dashboard init -->

@endpush
