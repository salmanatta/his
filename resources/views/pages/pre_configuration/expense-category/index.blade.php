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
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('expense_categories.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add New</a>
                            </div>
                        </div><!-- end col-->
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle"> #</th>
                                    <th class="align-middle"> Name</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expense_categories as $expense_category)
                                <tr data-id="{{$expense_category->id}}">
                             
                                   
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$loop->iteration}}</a> </td>
                                    <td>{{$expense_category->name}}</td>
                                   
                                    <td>
                                        
                                        <div class="d-flex gap-3">
                                             <a data-bs-toggle="modal"  class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-expense_category_id="{{$expense_category->id}}" data-expense_category_name="{{$expense_category->name}}" >
                                            View Details
                                        </a>
                                     <a href="{{route('expense_categories.edit',$expense_category->id)}}"  class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                     <form method="post" action='{{route("expense_categories.destroy",$expense_category->id) }}'>
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
                        <tr> <th>  ID </th><td> : <span class="m_expense_category_id"> </span>   </td></tr>
                        <tr> <th> Name </th><td> : <span class="m_expense_category_name"> </span>     </td>  </tr>
                       
                        
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
               
               // $('.m_expense_category_code').text($(this).data('expense_category_code'));
               $('.m_expense_category_id').text($(this).data('expense_category_id'));
               $('.m_expense_category_name').text($(this).data('expense_category_name'));
               // var row_status=$(this).data('expense_category_status');
               // if(row_status==1)
               //  status='<span class="badge bg-success font-size-12"> Active</span>';
               // else
               //  status='<span class="badge bg-danger font-size-12"> InActive</span>';
               //  $('.m_expense_category_status').html(status);
            });
        });
     </script>

   
@endpush