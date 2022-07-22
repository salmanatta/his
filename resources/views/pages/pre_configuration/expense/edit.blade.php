@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Expense  Form </h4>

                    <form  class="" method="post" action="{{route('expenses.update',$expense->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Payment To</label>
                                    <input type="text" name="name" value="{{$expense->name}}" class="form-control" id="validationCustom01" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Date</label>
                                    <input type="date"  name="date" value="{{$expense->date}}"  class="form-control" 
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Amount</label>
                                    <input type="number"  name="amount" value="{{$expense->amount}}"  class="form-control"  
                                        required>
                                </div>
                            </div>
                             
                            </div>
                             <div class="row">
                             
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Category</label>
                                   <select name="category_id" required="true" class="form-control">
                                    <option selected="" value="" disabled="">Choose</option>t
                                    @foreach($expense_categories as $category)
                                    @if($category->id==$expense->category_id)
                                       <option value="{{$category->id}}" selected="">{{$category->name}}</option>
                                       @else
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endif
                                       @endforeach
                                   </select>
                                </div>
                            </div>
                             <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Extra Note</label>
                                    <textarea type="text" value="{{$expense->note}}" rows="4" name="note" class="form-control" >
                                            {{$expense->note}}
                                        </textarea> 
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