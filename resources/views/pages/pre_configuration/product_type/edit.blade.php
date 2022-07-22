@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Product Type Form </h4>

                    <form  class="" method="post" action="{{route('product_types.update',$product_type->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" value="{{$product_type->name}}" name="name" class="form-control" id="validationCustom01" 
                                        required>
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