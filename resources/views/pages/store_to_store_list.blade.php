@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Store Transfer Details</h4>
                <br><br>
                <table id="datatable-buttons" class="table table-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="align-middle">Transfer From</th>
                            <th class="align-middle">Transfer Date</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle">Total Items</th>
                            <th class="align-middle">Total Qty</th>
                            <th class="align-middle">Net Amount</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                        <tr data-id="{{$transfer->id}}">
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ $transfer->branchFrom->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($transfer->trans_date)) }}</td>
                            <td>{{ $transfer->remarks }}</td>
                            <td>{{ $transfer->countProduct }}</td>
                            <td>{{ $transfer->sumQty }}</td>
                            <td>{{ $transfer->sumLineTotal }}</td>
                            @if($transfer->trans_status == 'Pending')
                            <td style="font-size: 25px; text-align:center;">
                                <a  href="{{ url('approve-store-transfer/'.$transfer->id) }}" class="bx bx-check" ></a>
                                <a style="color: red;" href="{{ url('reject-store-transfer/'.$transfer->id) }}" class="bx bx-x" ></a>
                            </td>
                            @elseif($transfer->trans_status == 'Approved' && $transfer->from_branch_id == auth()->user()->branch_id)
                                <td style="text-align:center;">{{ $transfer->trans_status }}</td>
                            @elseif($transfer->trans_status == 'Approved' && $transfer->to_branch_id == auth()->user()->branch_id)
                            <td style="font-size: 25px; text-align:center;">
                                <a  href="{{ url('receive-store-transfer/'.$transfer->id) }}" class="bx bx-check" ></a>
                                <a style="color: red;" href="{{ url('reject-store-transfer/'.$transfer->id) }}" class="bx bx-x" ></a>
                            </td>
                            @else
                                <td style="text-align:center;">{{ $transfer->trans_status }}</td>
                            @endif
                            <td style="text-align: center">
                                <a href="{{ url('store-transfer-view').'/'.$transfer->id }}" style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                                    View Details </a>
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
                        <tr> <th> company ID </th><td> : <span class="m_store_id"> </span>   </td>
                        </tr>
                        <tr>
                            <th> Product Name </th><td> : <span class="m_store_name"> </span>     </td>
                          </tr>
                        <tr>
                            <th> Quantity</th><td> : <span class="m_store_quantity"> </span>   </td>
                        </tr>
                        <tr>
                            <th> Price </th><td> : <span class="m_store_price"> </span>   </td>
                        </tr>
                        <tr>
                            <th> From </th><td> : <span class="m_store_from"> </span>   </td>
                        </tr>
                        <tr>
                            <th> To</th><td> : <span class="m_store_to"> </span>   </td>
                        </tr>
                        <!-- <tr> <th> Status </th><td> : <span class="m_company_status"> </span>     </td>  </tr> -->

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
        $(document).ready(function(){

            $(document).on('click','.detail_view_button',function(){

              $('.m_store_id').text($(this).data('store_id'));
               // var row_status=$(this).data('store_id');
               // console.log(row_status);
               $('.m_store_name').text($(this).data('store_name'));
               $('.m_store_quantity').text($(this).data('store_quantity'));
               $('.m_store_price').text($(this).data('store_price'));
               $('.m_store_from').text($(this).data('store_from'));
               $('.m_store_to').text($(this).data('store_to'));


            });
        });
     </script>
@endpush
