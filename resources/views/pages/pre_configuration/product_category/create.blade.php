@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            @if(isset($product_category))
                                <h4 class="card-title mb-4">Edit Product Category </h4>
                             <form  class="" method="post" action="{{route('product_categories.update',$product_category->id)}}">
                                 @method('PATCH')
                            @else
                                 <h4 class="card-title mb-4">Add New Product Category </h4>
                            <form class="" method="post" action="{{route('product_categories.store')}}">
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Name</label>
                                            <input type="text" value="{{ isset($product_category) ? $product_category->name : "" }}" placeholder="Enter Name" name="name" class="form-control"
                                                    required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if(isset($product_category))
                                        <button type="submit" class="btn btn-warning me-1">Update</button>
                                    @else
                                        <button type="submit" class="btn btn-success me-1">Save</button>
                                    @endif
                                    <a class="btn btn-danger mx-0" href="{{ route('product_categories.index') }}">Exit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
