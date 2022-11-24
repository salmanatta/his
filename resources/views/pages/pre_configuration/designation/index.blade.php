@extends('layouts.main')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary waves-effect waves-light mb-2 me-2" href="{{route('designations.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add Designation</a>
                            </div>
                        </div><!-- end col-->
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>

                                    <th class="text-center" width="10%"> ID</th>
                                    <th class="align-middle" width="85%">Title</th>
                                    <th class="text-center" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($designations as $designation)
                                <tr>
                                    <td class="text-center"><b>{{$designation->id}}</b></td>
                                    <td>{{$designation->title}}</td>
                                    <td class="text-center">

{{--                                        <div class="d-flex gap-3">--}}
{{--                                        <a href="#" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-designation_id="{{$designation->id}}" data-designation_title="{{$designation->title}}">--}}
{{--                                            View Details--}}
{{--                                        </a>--}}
                                            <a href="{{route('designations.edit',$designation->id)}}" class="text-success"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('designations.destroy',$designation->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
{{--                                                     <form method="post" action='{{route("designations.destroy",$designation->id) }}'>--}}
{{--                                          {{csrf_field()}}--}}
{{--                                          {{method_field('DELETE')}}--}}
{{--                                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>--}}
{{--                                        </form>--}}
{{--                                        </div>--}}
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
                        <tr> <th> Designation ID </th><td> : <span class="m_designation_id"> </span>   </td></tr>
                        <tr> <th> Designation Title </th><td> : <span class="m_designation_title"> </span>     </td>  </tr>
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

               $('.m_designation_id').text($(this).data('designation_id'));
               $('.m_designation_title').text($(this).data('designation_title'));

            });
        });
     </script>
    @endpush
