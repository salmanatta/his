@extends('layouts.main')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">permision Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('permissions.create')}}"><i class="mdi mdi-plus me-1"></i> Add permision</a>
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

                            <th class="align-middle"> #</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Company Name</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permission as $key=>$permision)
                        <tr data-id="{{$permision->id}}">

                            <td>{{$permision->key+1}}</td>
                            <td>{{$permision->name ?? ''}}</td>
                            <td>{{$permision->company->name ?? ''}}</td>

                            <td>

                                <div class="d-flex gap-3">
                                    <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-permision_id="{{$key+1}}" data-permision_name="{{$permision->name}}" data-permision_display_name="{{$permision->display_name}}" data-permision_description="{{$permision->description}}" data-company_name="{{$permision->company->name}}">
                                        View Details
                                    </a>

                                    <a href="{{route('permissions.edit',$permision->id)}}" class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('permissions.destroy',$permision->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <!-- <form method="post" action='{{route("permissions.destroy",$permision->id) }}'>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" permision="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table cellpadding="5" cellmargin="5">
                    <tr>
                        <th> permision ID </th>
                        <td> : <span class="m_permision_id"> </span> </td>
                    </tr>
                    <!--  <tr> <th> permision Code </th><td> : <span class="m_permision_code"> </span>   </td></tr> -->
                    <tr>
                        <th> permision Name </th>
                        <td> : <span class="m_permision_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Display Name </th>
                        <td> : <span class="display_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Description </th>
                        <td> : <span class="description"> </span> </td>
                    </tr>
                    <tr>
                        <th> Company Name </th>
                        <td> : <span class="company_name"> </span> </td>

                    </tr>



                    <!-- <tr> <th> Status </th><td> : <span class="m_permision_status"> </span>     </td>  </tr> -->

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
    $(document).ready(function() {

        $(document).on('click', '.detail_view_button', function() {
            // $('.m_permision_code').text($(this).data('permision_code'));
            $('.m_permision_id').text($(this).data('permision_id'));
            $('.m_permision_name').text($(this).data('permision_name'));
            $('.display_name').text($(this).data('permision_display_name'));
            $('.description').text($(this).data('permision_description'));
            $('.company_name').text($(this).data('company_name'));


        });
    });

</script>


@endpush
