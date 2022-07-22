@extends('layouts.main')
@section('content')




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- <h4 class="card-title">License Details</h4> -->
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                <a type="button"
                                    class="btn btn-primary  mb-2 me-2" href="{{route('license_types.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add Licence</a>
                            </div>
                        </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        
                            <thead class="table-light">
                                <tr>
                                   
                                    <th class="align-middle" width="20%"> ID</th>
                                    <th class="align-middle" width="50%">Licence Type</th>
                                    <th class="align-middle" width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($license_types as $license)
                                <tr>
                                    
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$license->id}}</a> </td>
                                    <td>{{$license->name}}</td>
                                    <td>
                                        
                                        <div class="d-flex gap-3">
                                        <a href="#" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-license_id="{{$license->id}}" data-licence_name="{{$license->name}}">
                                            View Details
                                        </a>
                                            <a  class="text-success" href="{{route('license_types.edit',$license->id)}}"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('licenses.destroy',$license->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                                     <form method="post" action='{{route("license_types.destroy",$license->id) }}'>
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
    <!-- end row -->
  
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table cellpadding="5" cellmargin="5">
                        <tr> <th> Licence ID </th><td> : <span class="m_license_id"> </span>   </td></tr>
                        <tr> <th> Licence Type </th><td> : <span class="m_licence_name"> </span>     </td>  </tr>
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
               
               $('.m_license_id').text($(this).data('license_id'));
               $('.m_licence_name').text($(this).data('licence_name'));
            });
        });
     </script>
    @endpush