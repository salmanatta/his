@extends('layouts.main')
@section('content')


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Region Preview </h4>
                    <div class="row">
                    <!-- <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                        </div>
                        <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="{{url('/assets/images/megamenu-img.png')}}" class="d-block w-100" alt="First slide">
                        </div>
                        <div class="carousel-item active">
                            <img src="{{url('/assets/images/profile-img.png')}}" class="d-block w-100" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{url('/assets/images/verification-img.png')}}" class="d-block w-100" alt="Third slide">
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div> -->

                        <div id="jstree-basic" class="jstree jstree-1 jstree-default" role="tree"
                             aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1" aria-busy="false">
                            <ul class="jstree-container-ul jstree-children" role="group">
                                @foreach ($treeCities as $pdata)
                                    <li role="none" data-jstree="{&quot;icon&quot; : &quot;far fa-folder&quot;}"
                                        id="j1_{{ $pdata->id }}" class="jstree-node jstree-open">
                                        <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                        <a class="jstree-anchor jstree-clicked" href="#" tabindex="-1" role="treeitem"
                                           aria-selected="true" aria-level="1" aria-expanded="true"
                                           id="j1_{{ $pdata->id }}_anchor">
                                            <i class="jstree-icon jstree-themeicon far fa-folder jstree-themeicon-custom"
                                               role="presentation"></i>
                                            <b>{{ $pdata->name }}</b>
                                        </a>
                                        <ul role="group" class="jstree-children">
                                            @foreach ($treeRegions as $cdata)
                                                @if ($pdata->id == $cdata->city_id && $cdata->region_id == '')
                                                    <li role="none"
                                                        data-jstree="{&quot;icon&quot; : &quot;far fa-file-image&quot;}"
                                                        id="j1_{{ $cdata->id }}" class="jstree-node  jstree-leaf">
                                                        <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                                        <a class="jstree-anchor showDoc" href="#" tabindex="-1"
                                                           data-tree="{{ $cdata->id }}" role="treeitem"
                                                           aria-selected="false" aria-level="2"
                                                           id="j1_{{ $cdata->id }}_anchor">
                                                            <i class="jstree-icon jstree-themeicon far fa-file-image jstree-themeicon-custom"
                                                               role="presentation"></i>
                                                            {{ $cdata->name }}
                                                        </a>
                                                        <ul role="group" class="jstree-children">
                                                            @foreach($cdata->childrenRecursive as $cdata_L2)
                                                                @if ($cdata->id == $cdata_L2->region_id)
                                                                    <li role="none"
                                                                        data-jstree="{&quot;icon&quot; : &quot;far fa-file-image&quot;}"
                                                                        id="j1_{{ $cdata_L2->id }}"
                                                                        class="jstree-node  jstree-leaf">
                                                                        <i class="jstree-icon jstree-ocl"
                                                                           role="presentation"></i>
                                                                        <a class="jstree-anchor showDoc" href="#"
                                                                           tabindex="-1" data-tree="{{ $cdata_L2->id }}"
                                                                           role="treeitem" aria-selected="false"
                                                                           aria-level="3"
                                                                           id="j1_{{ $cdata_L2->id }}_anchor">
                                                                            <i class="jstree-icon jstree-themeicon far fa-file-image jstree-themeicon-custom"
                                                                               role="presentation"></i>
                                                                            {{ $cdata_L2->name }}
                                                                        </a>
                                                                        <ul role="group" class="jstree-children">
                                                                            @foreach($cdata_L2->childrenRecursive as $cdata_L3)
                                                                                @if ($cdata_L2->id == $cdata_L3->region_id)
                                                                                    <li role="none"
                                                                                        data-jstree="{&quot;icon&quot; : &quot;far fa-file-image&quot;}"
                                                                                        id="j1_{{ $cdata_L3->id }}"
                                                                                        class="jstree-node  jstree-leaf">
                                                                                        <i class="jstree-icon jstree-ocl"
                                                                                           role="presentation"></i>
                                                                                        <a class="jstree-anchor showDoc"
                                                                                           href="#" tabindex="-1"
                                                                                           data-tree="{{ $cdata_L3->id }}"
                                                                                           role="treeitem"
                                                                                           aria-selected="false"
                                                                                           aria-level="4"
                                                                                           id="j1_{{ $cdata_L3->id }}_anchor">
                                                                                            <i class="jstree-icon jstree-themeicon far fa-file-image jstree-themeicon-custom"
                                                                                               role="presentation"></i>
                                                                                            {{ $cdata_L3->name }}
                                                                                        </a>
                                                                                        <ul role="group"
                                                                                            class="jstree-children">
                                                                                            @foreach($cdata_L3->childrenRecursive as $cdata_L4)
                                                                                                @if ($cdata_L3->id == $cdata_L4->region_id)
                                                                                                    <li role="none"
                                                                                                        data-jstree="{&quot;icon&quot; : &quot;far fa-file-image&quot;}"
                                                                                                        id="j1_{{ $cdata_L4->id }}"
                                                                                                        class="jstree-node  jstree-leaf">
                                                                                                        <i class="jstree-icon jstree-ocl"
                                                                                                           role="presentation"></i>
                                                                                                        <a class="jstree-anchor showDoc"
                                                                                                           href="#"
                                                                                                           tabindex="-1"
                                                                                                           data-tree="{{ $cdata_L3->id }}"
                                                                                                           role="treeitem"
                                                                                                           aria-selected="false"
                                                                                                           aria-level="5"
                                                                                                           id="j1_{{ $cdata_L4->id }}_anchor">
                                                                                                            <i class="jstree-icon jstree-themeicon far fa-file-image jstree-themeicon-custom"
                                                                                                               role="presentation"></i>
                                                                                                            {{ $cdata_L4->name }}
                                                                                                        </a>
                                                                                                        @endif
                                                                                                    </li>
                                                                                                    @endforeach
                                                                                        </ul>
                                                                                        @endif
                                                                                    </li>
                                                                                    @endforeach
                                                                        </ul>
                                                                        @endif
                                                                    </li>
                                                                    @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Region Form </h4>
                        <form class="" method="post" action="{{route('regions.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Region ID</label>
                                        <input type="number" name="region_code" class="form-control" id="region_code"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Region Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label"> City</label>
                                        <select id="formrow-inputState " required="true" name="city_id"
                                                class="form-select select2">
                                            <option selected disabled="" value="">Select City</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}
                                                    | {{$city->city_id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3 ">
                                        <label for="formrow-inputZip" class="form-label">Has A Parent </label><br>
                                        <input type="checkbox" id="myCheck" onclick="Function()">
                                    </div>
                                </div>
                                <div class="col-lg-12" id="text" style="display: none;">
                                    <div class="mb-2">
                                        <label for="formrow-inputState" class="form-label">Region </label>
                                        <select id="formrow-inputState" name="region_id" class="form-select">
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
                                        <input type="radio" checked id="active" value="1" name="isActive" required>&nbsp;Active&nbsp;&nbsp;
                                        <input type="radio" id="inactive" value="0" name="isActive" required>&nbsp;InActive
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
