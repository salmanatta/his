@extends('layouts.main')
@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Region Preview </h4>

                <div class="row">
                    

                    <div id="jstree-basic" class="jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1" aria-busy="false">
                        <ul class="jstree-container-ul jstree-children" role="group">
                            @foreach ($treeCities as $treeCity)
                            <li role="none" data-jstree="{&quot;icon&quot; : &quot;far fa-folder&quot;}" id="j1_{{ $treeCity->id }}" class="jstree-node jstree-open">
                                <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                <a class="jstree-anchor jstree-clicked" href="#" tabindex="-1" role="treeitem" aria-selected="true" aria-level="1" aria-expanded="true" id="j1_{{ $treeCity->id }}_anchor">
                                    <i class="jstree-icon jstree-themeicon far fa-folder jstree-themeicon-custom" role="presentation"></i>
                                    <b>{{ $treeCity->name }}</b>
                                </a>
                                <ul role="group" class="jstree-children">
                                    @php
                                    $regionss =App\Models\region\Region::where(['city_id'=> $treeCity->id,'region_id'=>null])->get();
                                    @endphp
                                    @foreach ($regionss as $cdata)
                                    @if ($treeCity->id == $cdata->city_id)
                                    <li role="none" data-jstree="{&quot;icon&quot; : &quot;far fa-file-image&quot;}" id="j1_{{ $cdata->id }}" class="jstree-node  jstree-leaf">
                                        <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                        <a class="jstree-anchor showDoc" href="#" tabindex="-1" data-tree="{{ $cdata->id }}" role="treeitem" aria-selected="false" aria-level="2" id="j1_{{ $cdata->id }}_anchor">
                                            <i class="jstree-icon jstree-themeicon far fa-file-image jstree-themeicon-custom" role="presentation"></i>
                                            {{ $cdata->name }}
                                        </a>
                                    </li>
                                    @endif
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
                                    <input type="number" name="region_code" class="form-control" id="region_code" required>
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
                                    <select id="formrow-inputState " required="true" name="city_id" class="form-select select2">
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
<script src="{{asset('assets/js/ext-component-tree.min.js')}}"></script>
<script src="{{asset('assets/js/jstree.min.js')}}"></script>
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