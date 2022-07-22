@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">City Form </h4>
                <form class="" method="post" action="{{route('cities.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">City ID</label>
                                <input type="number" name="city_id" class="form-control" id="validationCustom01">
                                @error('city_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="validationCustom01">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!--<div class="col-lg-4">-->
                        <!--    <div class="mb-3">-->
                        <!--        <label for="formrow-inputState"  class="form-label">Region </label>-->
                        <!--        <select id="formrow-inputState"  name="region_id" class="form-select">-->
                        <!--           <option selected value="" disabled="">Choose Region</option>-->
                        <!--            foreach($regions as $region)-->
                        <!--            <option value="$region->id">$region->name</option>-->
                        <!--           endforeach-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Branch</label>
                                <select class="form-control select2" name="branch_id">
                                    <option disabled selected> Select Branch </option>
                                    @foreach($branchs as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}} | {{$branch->branch_code}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
@endpush