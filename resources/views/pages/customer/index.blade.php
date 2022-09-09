@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                            href="{{route('customers.create')}}"><i class="mdi mdi-plus me-1"></i> Add Customer</a>
                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table align-middle table-nowrap table-hover dataTable no-footer">
                    <thead class="table-light">
                        <tr>
                            <!-- <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>                             -->
                            <th class="align-middle"> ID</th>
                            <th class="align-middle">Customer Name</th>
                            <th class="align-middle">Address</th>
                            <th class="align-middle">Phone Office</th>
                            <th class="align-middle">Phone Residence</th>
                            <th class="align-middle"> Fax</th>
                            <th class="align-middle">CNIC</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <!-- <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td> -->
                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$customer->id}}</a> </td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->phone_off}}</td>
                            <td>{{$customer->phone_res}}</td>
                            <td>{{$customer->fax}}</td>
                            <td>{{$customer->cnic_no}}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a data-bs-toggle="modal" class="btn btn-primary btn-sm detail_view_button"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                                        data-customer_id="{{$customer->id}}" data-customer_name="{{$customer->name}}"
                                        data-address="{{$customer->address}}"
                                        data-phone_office="{{$customer->phone_off}}"
                                        data-phone_res="{{$customer->phone_res}}" data-fax="{{$customer->fax}}"
                                        data-cnic_no="{{$customer->cnic_no}}">
                                        View Details
                                    </a>
                                    <a href="{{route('customers.edit',$customer->id)}}" class="text-success"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('customers.destroy',$customer->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <form method="post" action='{{route("customers.destroy",$customer->id) }}'>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></button>
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
                        <th> Customer ID </th>
                        <td> : <span class="m_customer_id"> </span> </td>
                    </tr>
                    <tr>
                        <th> Customer Name </th>
                        <td> : <span class="m_customer_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Address </th>
                        <td> : <span class="m_address"> </span> </td>
                    </tr>
                    <tr>
                        <th> Phone Office </th>
                        <td> : <span class="m_phone_office"> </span> </td>
                    </tr>
                    <tr>
                        <th> Phone Residence </th>
                        <td> : <span class="m_phone_office"> </span> </td>
                    </tr>
                    <tr>
                        <th> Fax </th>
                        <td> : <span class="m_fax"> </span> </td>
                    </tr>
                    <tr>
                        <th> CNIC </th>
                        <td> : <span class="m_cnic_no"> </span> </td>
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
<!-- end row -->
@endsection
@push('script')
<script>
    $(document).ready(function(){
            $(document).on('click','.detail_view_button',function(){
               $('.m_customer_id').text($(this).data('customer_id'));
               $('.m_customer_name').text($(this).data('customer_name'));
               $('.m_address').text($(this).data('address'));
               $('.m_phone_office').text($(this).data('phone_office'));
               $('.m_phone_res').text($(this).data('phone_res'));
               $('.m_fax').text($(this).data('fax'));
               $('.m_cnic_no').text($(this).data('cnic_no'));
            });
        });
</script>
@endpush