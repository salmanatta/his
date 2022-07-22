@extends('layouts.main')
@section('content')

<!-- Modal -->
    
    <!-- end modal -->

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   
                   <!-- <h4 class="card-title">City Details</h4> -->
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('cities.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add City</a>
                            </div>
                        </div><!-- end col-->
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle" width="10%"> City Code</th>
                                    <th class="align-middle" width="60%">City Name</th>
                                    <th class="align-middle" width="60%">Branch Name</th>
                                    <th class="align-middle" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $citys)
                                
                                <tr>
                                   
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$citys->city_id}}</a> </td>
                                    <td>{{$citys->name}}</td>
                                    <td>{{$citys->branch->name}}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                             <a data-bs-toggle="modal"  class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-city_id="{{$citys->id}}" data-city_name="{{$citys->name}}" data-branch_name="{{$citys->branch->name}}" data-city_code="{{$citys->city_id}}">
                                            View Details
                                        </a>
                                       
                                        <a href="{{route('cities.edit',$citys->id)}}"  class="text-success editbtn"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('cities.destroy',$citys->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                                     <form method="post" action='{{route("cities.destroy",$citys->id) }}'>
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
                        <tr> <th> City Code</th><td> : <span class="m_city_code"> </span>   </td></tr>
                        <tr> <th> City Name </th><td> : <span class="m_city_name"> </span>     </td>  </tr>
                        <tr> <th> Branch Name </th><td> : <span class="m_branch_name"> </span>     </td>  </tr>
                        
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
    <script>
        $(document).ready(function(){
           
            $(document).on('click','.detail_view_button',function(){
               
               $('.m_city_code').text($(this).data('city_code'));
               $('.m_city_name').text($(this).data('city_name'));
               $('.m_branch_name').text($(this).data('branch_name'));
            });
        });
     </script>
    @endpush