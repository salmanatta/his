@extends('layouts.main')
@section('content')



<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   
                   <h4 class="card-title">Product Category Details</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('expenses.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add New</a>
                            </div>
                        </div><!-- end col-->
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle"> #</th>
                                    <th class="align-middle"> Payment To</th>
                                    <th class="align-middle"> Date</th>
                                    <th class="align-middle">Expense  Category</th>
                                    <th class="align-middle"> Amount</th>
                                    <th class="align-middle"> Extra Note</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr data-id="{{$expense->id}}">
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$loop->iteration}}</a> </td>
                                    <td>{{$expense->name}}</td>
                                    <td>{{$expense->date}}</td>
                                    <td>{{$expense->category->name}}</td>
                                    <td>{{$expense->amount}}</td>
                                    <td>{{$expense->note}}</td>
                                    <td>
                                        
                                        <div class="d-flex gap-3">
                                             <a data-bs-toggle="modal"  class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-expense_id="{{$expense->id}}" data-expense_name="{{$expense->name}}" data-expense_date="{{$expense->date}}" data-expense_note="{{$expense->note}}" data-expense_amount="{{$expense->amount}}" data-expense_category_id="{{$expense->category->name}}"  >
                                            View Details
                                        </a>
                                       
                                      <a href="{{route('expenses.edit',$expense->id)}}"  class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a>

                                                     <form method="post" action='{{route("expenses.destroy",$expense->id) }}'>
                                          {{csrf_field()}}
                                          {{method_field('DELETE')}}
                                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- end row -->
<!-- Modal -->
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table cellpadding="5" cellmargin="5">
                        <tr> <th>  ID </th><td> : <span class="m_expense_id"> </span>   </td></tr>
                        <tr> <th> Name </th><td> : <span class="m_expense_name"> </span>     </td>  </tr>
                        <tr> <th> Date </th><td> : <span class="m_expense_date"> </span>     </td>  </tr>
                        <tr> <th> Category </th><td> : <span class="m_expense_category_id"> </span>     </td>  </tr>
                        <tr> <th> Amount </th><td> : <span class="m_expense_amount"> </span>     </td>  </tr>
                        <tr> <th> Extra Note </th><td> : <span class="m_expense_note"> </span>     </td>  </tr>
                        
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div>



    @endsection
@push('script')
 
     <!-- ==================Start Of Edit Footer=============== -->
 <script>
        $(document).ready(function(){
           
            $(document).on('click','.detail_view_button',function(){
               
               // $('.m_expense_code').text($(this).data('expense_code'));
               $('.m_expense_id').text($(this).data('expense_id'));
               $('.m_expense_name').text($(this).data('expense_name'));
               $('.m_expense_date').text($(this).data('expense_date'));
               $('.m_expense_category_id').text($(this).data('expense_category_id'));
               $('.m_expense_amount').text($(this).data('expense_amount'));
               $('.m_expense_note').text($(this).data('expense_note'));
               // var row_status=$(this).data('expense_status');
               // if(row_status==1)
               //  status='<span class="badge bg-success font-size-12"> Active</span>';
               // else
               //  status='<span class="badge bg-danger font-size-12"> InActive</span>';
               //  $('.m_expense_status').html(status);
            });
        });
     </script>

   
@endpush