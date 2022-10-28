@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Product Group </h4>
                        @if(isset($group))
                        <form  class="" method="post" action="{{route('product_groups.update',$group->id)}}">
                            @method('PATCH')
                        @else
                        <form class="" method="post" action="{{route('product_groups.store')}}">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Name</label>
                                        <input type="text" value="{{ isset($group) ? $group->name : old('name') }}" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="supplier_id" class="form-label">Group Supplier</label>
                                        <select id="supplier_id" required="true" name="supplier_id"
                                                class="form-select select2">Company
                                            <option selected disabled="" value="">-- Select Supplier --</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" {{ isset($group) ? ($group->supplier_id == $supplier->id ? 'selected' : '') : '' }}>{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if(isset($group))
                                    <button type="submit" class="btn btn-warning w-md">Update</button>
                                @else
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')

@endpush
