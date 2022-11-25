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
                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               href="{{route('product_categories.create')}}">
                                <i class="mdi mdi-plus me-1"></i>
                                Add Product Category
                            </a>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center" width="10%"> ID</th>
                            <th class="align-middle" width="85%">Product Category</th>
                            <th class="text-center" width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product_categories as $product_category)
                            <tr data-id="{{$product_category->id}}">
                                <td class="text-center"><b>{{ $product_category->id }}</b></td>
                                <td>{{$product_category->name}}</td>
                                <td class="text-center">
                                    {{--                                    <div class="d-flex gap-3">--}}
                                    {{--                                        <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button"--}}
                                    {{--                                           data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"--}}
                                    {{--                                           data-product_category_id="{{$product_category->id}}"--}}
                                    {{--                                           data-product_category_name="{{$product_category->name}}">--}}
                                    {{--                                            View Details--}}
                                    {{--                                        </a>--}}

                                    <a href="{{route('product_categories.edit',$product_category->id)}}"
                                       class="text-success editbtn"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                <!-- <a  href="{{route('product_categories.destroy',$product_category->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    {{--                                        <form method="post"--}}
                                    {{--                                              action='{{route("product_categories.destroy",$product_category->id) }}'>--}}
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
                            <th> Product Category ID</th>
                            <td> : <span class="m_product_category_id"> </span></td>
                        </tr>
                        <tr>
                            <th> Product Category Name</th>
                            <td> : <span class="m_product_category_name"> </span></td>
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

                // $('.m_product_category_code').text($(this).data('product_category_code'));
                $('.m_product_category_id').text($(this).data('product_category_id'));
                $('.m_product_category_name').text($(this).data('product_category_name'));
                // var row_status=$(this).data('product_category_status');
                // if(row_status==1)
                //  status='<span class="badge bg-success font-size-12"> Active</span>';
                // else
                //  status='<span class="badge bg-danger font-size-12"> InActive</span>';
                //  $('.m_product_category_status').html(status);
            });
        });
    </script>


@endpush
