@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">branch Details</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button"
                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               href="{{route('branches.create')}}">
                                <i class="mdi mdi-plus me-1"></i> Add branch
                            </a>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center"> Branch ID</th>
                            <th class="align-middle">Branch Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $branch)
                            <tr>
                                <td class="text-center" width="10%">{{$branch->branch_code}}</td>
                                <td width="50%">{{$branch->name}}</td>
                                @if($branch->isActive==1)
                                    <td class="text-center" width="10%"><span class="badge bg-success font-size-12"> Active</span></td>
                                @else
                                    <td class="text-center" width="10%"><span class="badge bg-danger font-size-12"> InActive</span></td>
                                @endif
                                <td class="text-center" width="5%">
{{--                                    <div class="d-flex gap-3">--}}
{{--                                        <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button"--}}
{{--                                           data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"--}}
{{--                                           data-branch_id="{{$branch->id}}" data-branch_name="{{$branch->name}}"--}}
{{--                                           data-branch_status="{{$branch->isActive}}"--}}
{{--                                           data-branch_code="{{$branch->branch_code}}">--}}
{{--                                            View Details--}}
{{--                                        </a>--}}
                                        <a href="{{route('branches.edit',$branch->id)}}" class="text-success editbtn"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('branches.destroy',$branch->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
{{--                                        <form method="post" action='{{route("branches.destroy",$branch->id) }}'>--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            {{method_field('DELETE')}}--}}
{{--                                            <button type="submit" class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="fa fa-trash"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table cellpadding="5" cellmargin="5">
                        <tr>
                            <th> Branch ID</th>
                            <td> : <span class="m_branch_id"> </span></td>
                        </tr>
                        <tr>
                            <th> Branch Code</th>
                            <td> : <span class="m_branch_code"> </span></td>
                        </tr>
                        <tr>
                            <th> Branch Name</th>
                            <td> : <span class="m_branch_name"> </span></td>
                        </tr>
                        <tr>
                            <th> Status</th>
                            <td> : <span class="m_branch_status"> </span></td>
                        </tr>
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
        $(document).ready(function () {
            $(document).on('click', '.detail_view_button', function () {
                $('.m_branch_code').text($(this).data('branch_code'));
                $('.m_branch_id').text($(this).data('branch_id'));
                $('.m_branch_name').text($(this).data('branch_name'));
                var row_status = $(this).data('branch_status');
                if (row_status == 1)
                    status = '<span class="badge bg-success font-size-12"> Active</span>';
                else
                    status = '<span class="badge bg-danger font-size-12"> InActive</span>';
                $('.m_branch_status').html(status);
            });
        });
    </script>
@endpush
