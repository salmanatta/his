@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Expense  Category </h4>

                    <form  class="" method="post" action="{{route('expense_categories.update',$expense_category->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$expense_category->name}}" id="validationCustom01" 
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