@extends('layouts.main')
@section('content')

<!-- Modal -->


<div class="modal fade categoryModal" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderdetailsModalLabel">Details of Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(isset($category))
                <input type="text" name="{{$category->id}}">
                <h4>Name of category</h4>
                <p>{{$category->name}}</p>
                @endif


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">category Details</h4> -->
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{route('customer_categories.create')}}"><i class="mdi mdi-plus me-1"></i> Add category</a>
                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle" width="15%"> ID</th>
                            <th class="align-middle" width="60%">category Name</th>
                            <th class="align-middle" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer_categories as $category)
                        <tr>
                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$category->id}}</a> </td>
                            <td>{{$category->name}}</td>

                            <td>

                                <div class="d-flex gap-3">
                                    <a href="#" class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-category_id="{{$category->id}}" data-category_name="{{$category->name}}">
                                        View Details
                                    </a>

                                    <a href="{{route('customer_categories.edit',$category->id)}}" class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('customer_categories.destroy',$category->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <form method="post" action='{{route("customer_categories.destroy",$category->id) }}'>
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
                    <tr>
                        <th> Category ID </th>
                        <td> : <span class="m_category_id"> </span> </td>
                    </tr>
                    <tr>
                        <th> Category Name </th>
                        <td> : <span class="m_category_name"> </span> </td>
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
    $(document).ready(function() {

        $(document).on('click', '.detail_view_button', function() {

            $('.m_category_id').text($(this).data('category_id'));
            $('.m_category_name').text($(this).data('category_name'));

        });
    });
</script>
@endpush