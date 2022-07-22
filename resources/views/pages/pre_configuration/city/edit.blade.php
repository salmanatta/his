@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit City Form </h4>
                <form class="" method="post" action="{{route('cities.update',$city->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">City ID</label>
                                <input type="text" value="{{$city->city_id}}" name="city_id" class="form-control"
                                    id="validationCustom01">
                                @error('city_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Name</label>
                                <input type="text" value="{{$city->name}}" name="name" class="form-control"
                                    id="validationCustom01">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Branch</label>
                                <select class="form-control select2" name="branch_id">
                                    <option> Select Branch </option>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}" @if($branch->id==$city->branch_id) {{'selected'}}
                                        @endif>{{$branch->name}} </option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
@endpush