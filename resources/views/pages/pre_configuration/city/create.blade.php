@extends('layouts.main')
@section('content')
 <div class="container-fluid p-0 d-flex justify-content-center">
     <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add New City</h4>
                @if(isset($city))
                <form class="" method="post" action="{{route('cities.update',$city->id) }}">
                    @method('PATCH')
                @else
                <form class="" method="post" action="{{route('cities.store')}}">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="inputCity" class="form-label">City ID</label>
                                <input type="number" name="city_id" value="{{ isset($city) ? $city->city_id : old('city_id') }}" class="form-control" id="validationCustom01">
                                @error('city_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ isset($city) ? $city->name : old('name') }}" class="form-control" id="validationCustom01">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="inputCity" class="form-label">Branch</label>
                                <select class="form-control select2" name="branch_id">
                                    <option disabled selected> Select Branch </option>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}" {{ isset($city) ? $city->branch_id == $branch->id ? 'selected' : '' : '' }}>{{$branch->name}} | {{$branch->branch_code}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        @if(isset($branch))
                            <button type="submit" class="btn btn-warning me-1">Update</button>
                        @else
                            <button type="submit" class="btn btn-success me-1">Save</button>
                        @endif
                        <a class="btn btn-danger mx-0" href="{{ route('branches.index') }}">Exit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
@endpush
