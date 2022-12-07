@extends('layouts.main')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Supplier Details</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary waves-effect waves-light mb-2 me-2" href="{{route('suppliers.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add Supplier</a>
                            </div>
                        </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

                           <thead class="table-light">

                                    <th class="align-middle"> Supplier ID</th>
                                    <th class="align-middle">supplier Name</th>
                                    <th class="align-middle">Address</th>
                                    <th class="align-middle">City</th>
                                    <th class="align-middle">Phone</th>
                                    <th class="align-middle">Status </th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                <tr>

                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$supplier->supplier_id}}</a> </td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->address}}</td>
                                    <td>{{ isset($supplier->get_supplier_city->name) ? $supplier->get_supplier_city->name : '' }}</td>
                                    <td>{{$supplier->phone}}</td>
                                    <td>{{($supplier->isActive==1) ? 'Active' : 'InActive'}}</td>
                                    <td>
{{--                                        <div class="d-flex gap-3">--}}
{{--                                             <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button"--}}
{{--                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"--}}
{{--                                        data-supplier_id="{{$supplier->id}}" data-supplier_name="{{$supplier->name}}"--}}
{{--                                        data-address="{{$supplier->address}}"--}}
{{--                                        data-phone="{{$supplier->phone}}"--}}
{{--                                        data-city="{{$supplier->get_supplier_city->name}}" data-status="{{$supplier->status}}">--}}
{{--                                        View Details--}}
                                    </a>
                                            <a href="{{route('suppliers.edit',$supplier->id)}}" class="text-success"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <!-- <a  href="{{route('suppliers.destroy',$supplier->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
{{--                                                     <form method="post" action='{{route("suppliers.destroy",$supplier->id) }}'>--}}
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
    <!-- end row -->
     <!-- Modal -->



<!-- Modal -->
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
                        <th> Supplier ID </th>
                        <td> : <span class="m_supplier_id"> </span> </td>
                    </tr>
                    <tr>
                        <th> Supplier Name </th>
                        <td> : <span class="m_supplier_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Address </th>
                        <td> : <span class="m_address"> </span> </td>
                    </tr>
                    <tr>
                        <th> Phone Office </th>
                        <td> : <span class="m_phone"> </span> </td>
                    </tr>
                    <tr>
                        <th> City</th>
                        <td> : <span class="m_city"> </span> </td>
                    </tr>
                    <tr>
                        <th> Status </th>
                        <td> : <span class="m_status"> </span> </td>
                    </tr>
                    <!-- <tr>
                        <th> CNIC </th>
                        <td> : <span class="m_cnic_no"> </span> </td>
                    </tr> -->
                </table>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


    @endsection
@push('script')
<script>
    $(document).ready(function(){
            $(document).on('click','.detail_view_button',function(){
               $('.m_supplier_id').text($(this).data('supplier_id'));
               $('.m_supplier_name').text($(this).data('supplier_name'));
               $('.m_address').text($(this).data('address'));
               $('.m_phone').text($(this).data('phone'));
               $('.m_city').text($(this).data('city'));
                var row_status=$(this).data('status');
               if(row_status==1)
                status='<span class="badge bg-success font-size-12"> Active</span>';
               else
                status='<span class="badge bg-danger font-size-12"> InActive</span>';
                $('.m_status').html(status);

            });
        });
</script>
@endpush
