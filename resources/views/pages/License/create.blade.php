@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Licence Form </h4>

                    <form  class="" method="post" action="{{route('license_types.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Licence Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01" 
                                        required>
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
    <!-- apexcharts -->
   
    
@endpush