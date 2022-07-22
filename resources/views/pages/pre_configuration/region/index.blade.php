@extends('layouts.main')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Region Details</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary waves-effect waves-light mb-2 me-2" href="{{route('regions.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add Region</a>
                            </div>
                        </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        
                            <thead class="table-light">
                                <tr>
                                    
                                    <!-- <th class="align-middle"> ID</th> -->
                                    <th class="align-middle" width="15%">Region Code</th>
                                    <th class="align-middle" width="40%">Region Name</th>
                                 
                                    <th class="align-middle">Parent Region</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">City</th>
                                     
                                    <th class="align-middle" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($regions as $region)
                                <tr>
                                    
                                    <!-- <td><a href="javascript: void(0);" class="text-body fw-bold">$region->id</a> </td> -->
                                    <td>{{$region->region_code}}</td>
                                    <td>{{$region->name}}</td>
                                    <td>
                                            {{ $region->belong_to_region->name ?? '' }}
                                    </td>
                                    @if($region->isActive==1)
                                    <td><span class="badge bg-success font-size-12"> Active</span></td>
                                    @else
                                    <td><span class="badge bg-danger font-size-12"> InActive</span></td>
                                    @endif
                                    <td>{{$region->belong_cities->name}}</td>
                                     
                                    <td>
                                        <div class="d-flex gap-3">
                                             <a href="#" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-region_code="{{$region->region_code}}" data-region_name="{{$region->name}}" data-city_name="{{$region->belong_cities->name}}" data-region_status="{{$region->isActive}}">
                                            View Details
                                        </a>
                                            <a href="{{route('regions.edit',$region->id)}}" class="text-success"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('regions.destroy',$region->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                                     <form method="post" action='{{route("regions.destroy",$region->id) }}'>
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
                        <tr> <th> Region Code </th><td> : <span class="m_region_code"> </span>   </td></tr>
                        <tr> <th> Region name </th><td> : <span class="m_region_name"> </span>     </td>  </tr>
                        <tr> <th> City   </th><td> : <span class="m_city_name"> </span>     </td>  </tr>
                        <tr> <th> Status   </th><td> : <span class="m_region_status"> </span>     </td>  </tr>
                         
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
               
               $('.m_region_code').text($(this).data('region_code'));
               $('.m_region_name').text($(this).data('region_name'));
               $('.m_city_name').text($(this).data('city_name'));
               var row_status=$(this).data('region_status');

               if(row_status==1)
                status='<span class="badge bg-success font-size-12"> Active</span>';
               else
                status='<span class="badge bg-danger font-size-12"> InActive</span>';
                $('.m_region_status').html(status);
            });
        });
     </script>
    @endpush