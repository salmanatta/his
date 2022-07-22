@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">storeTransfer Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <!-- <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                            href="{{url('storetostore')}}"><i class="mdi mdi-plus me-1"></i> Add storeTransfer</a> -->
                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Product Name</th>
                            <th class="align-middle">Quantity</th>
                            <th class="align-middle">Price</th>
                            <th class="align-middle">From</th>
                            <th class="align-middle">To</th>
                            <th class="align-middle">Expire Date</th>
                            <!-- <th class="align-middle">Store </th> -->
                            <th class="align-middle">Decription </th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($storeTransfers as $storeTransfer)
                        <tr data-id="{{$storeTransfer->id}}">
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>{{! is_null($storeTransfer->product) ? $storeTransfer->product->short_name :''}}</td>
                            <td>{{$storeTransfer->quantity}}</td>
                            <td>{{$storeTransfer->price}}</td>
                            <td>{{$storeTransfer->branchFrom->name }}</td>
                            <td>{{$storeTransfer->branchTo->name }}</td>
                            <td>{{$storeTransfer->expire_date }}</td>
                            <td>{{$storeTransfer->description }}</td>
                            <td>
                                 <div class="d-flex gap-3">
                                    <a data-bs-toggle="modal"  class="btn btn-primary btn-sm detail_view_button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"  data-store_id="{{$storeTransfer->id}}" data-store_quantity="{{$storeTransfer->quantity}}" data-store_price="{{$storeTransfer->price}}" data-store_from="{{$storeTransfer->branchFrom->name}}" data-store_to="{{$storeTransfer->branchTo->name}}" data-store_expire_date="{{$storeTransfer->expire_date}}"
                                                data-store_description="{{$storeTransfer->description}}" 
                                                data-store_name="{{$storeTransfer->product->short_name}}" >
                                            View Details
                                        </a>
                                    <!-- <a href="{{route('storetransfers.edit',$storeTransfer->id)}}"
                                        class="text-success editbtn"><i class="mdi mdi-pencil font-size-18"></i></a> -->
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