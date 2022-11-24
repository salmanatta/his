@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Group List</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button"
                               class="btn btn-primary  mb-2 me-2" href="{{route('groups.create')}}">
                                <i class="mdi mdi-plus me-1"></i> Add Group
                            </a>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center" width="10%"> ID</th>
                            <th width="85%">Group Name</th>
                            <th class="text-center" width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td class="text-center"><b>{{$group->id}}</b></td>
                                <td>{{$group->name}}</td>
                                <td class="text-center">
                                    {{--                                <div class="d-flex gap-3">--}}
                                    {{--                                        <a href="#" class="btn btn-primary btn-sm detail_view_button"--}}
                                    {{--                                           data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"--}}
                                    {{--                                           data-group_id="{{$group->id}}" data-group_name="{{$group->name}}">--}}
                                    {{--                                            View Details--}}
                                    {{--                                        </a>--}}
                                    <a class="text-success" href="{{route('groups.edit',$group->id)}}"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                <!-- <a  href="{{route('groups.destroy',$group->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    {{--                                        <form method="post" action='{{route("groups.destroy",$group->id) }}'>--}}
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
                            <th> Group ID</th>
                            <td> : <span class="m_group_id"> </span></td>
                        </tr>
                        <tr>
                            <th> Group Name</th>
                            <td> : <span class="m_group_name"> </span></td>
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
    <script>
        $(document).ready(function () {

            $(document).on('click', '.detail_view_button', function () {

                $('.m_group_id').text($(this).data('group_id'));
                $('.m_group_name').text($(this).data('group_name'));
            });
        });
    </script>
@endpush
