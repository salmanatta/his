@extends('layouts.main')
@section('content')



<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   
                   <h4 class="card-title">company Details</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('companies.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add company</a>
                            </div>
                        </div><!-- end col-->
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <!-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> -->

                                    <th class="align-middle">#</th>
                                    <th class="align-middle">company Name</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Phone</th>
                                    <th class="align-middle">Fax</th>
                                    <!-- <th class="align-middle">Address</th> -->
                                    <th class="align-middle">Status</th>
                                    
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr data-id="{{$company->id}}">
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                   
                                   
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->fax}}</td>
                                    <!-- <td>{{$company->address}}</td> -->
                                    @if($company->isActive==1)
                                    <td><span class="badge bg-success font-size-12"> Active</span> </td>
                                    @else
                                    <td><span class="badge bg-danger font-size-12"> InActive</span></td>
                                    @endif
                                   
                                    
                                   
                                    
                                   
                                    <td>
                                        
                                        <div class="d-flex gap-3">
                                             <a data-bs-toggle="modal"  class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-company_id="{{$company->id}}" data-company_name="{{$company->name}}" data-company_status="{{$company->isActive}}" data-company_email="{{$company->email}}" data-company_phone="{{$company->phone}}"
                                             	data-company_address="{{$company->address}}" 
                                             	data-company_fax="{{$company->fax}}" >
                                            View Details
                                        </a>
                                       
                                        <a href="{{route('companies.edit',$company->id)}}"  class="text-success editbtn"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('companies.destroy',$company->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                                     <!-- <form method="post" action='{{route("companies.destroy",$company->id) }}'>
                                          {{csrf_field()}}
                                          {{method_field('DELETE')}}
                                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form> -->
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
                        <tr> <th> company ID </th><td> : <span class="m_company_id"> </span>   </td>
                        </tr>
                        <tr> 
                        	<th> company Name </th><td> : <span class="m_company_name"> </span>     </td>
                          </tr>
                        <tr> 
                        	<th> company Email </th><td> : <span class="m_company_email"> </span>   </td>
                        </tr>
                        <tr> 
                        	<th> company Phone </th><td> : <span class="m_company_phone"> </span>   </td>
                        </tr>
                        <tr> 
                        	<th> company Fax </th><td> : <span class="m_company_fax"> </span>   </td>
                        </tr>
                        <tr> 
                        	<th> company Address </th><td> : <span class="m_company_address"> </span>   </td>
                        </tr>
                        <tr> <th> Status </th><td> : <span class="m_company_status"> </span>     </td>  </tr>
                        
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
               
               $('.m_company_id').text($(this).data('company_id'));
               $('.m_company_name').text($(this).data('company_name'));
               $('.m_company_email').text($(this).data('company_email'));
               $('.m_company_phone').text($(this).data('company_phone'));
               $('.m_company_fax').text($(this).data('company_fax'));
               $('.m_company_address').text($(this).data('company_address'));
               var row_status=$(this).data('company_status');
               if(row_status==1)
                status='<span class="badge bg-success font-size-12"> Active</span>';
               else
                status='<span class="badge bg-danger font-size-12"> InActive</span>';
                $('.m_company_status').html(status);
            });
        });
     </script>
@endpush