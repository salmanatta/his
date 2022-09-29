@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="logo-light.png"
                                        height="20" />
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="float-end font-size-16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$transfer->trans_status}}</h4>
                                    <h4 class="float-end font-size-16">Order # {{$transfer->trans_id}}</h4>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <a href="javascript:window.print()"
                                        class="float-end btn btn-success d-print-none"><i
                                            class="fa fa-print ">Print</i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                    <strong>Transfer To:</strong><br>
                                    {{$transfer->branchTo->name}}
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <address class="mt-2 mt-sm-0">
                                    <strong>Transfer From:</strong><br>
                                    {{$transfer->branchFrom->name}}
                                </address>
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="col-sm-6 text-sm-end"> --}}
                                    <address>
                                        <strong>Transfer By:</strong><br>
                                        {{$transfer->user->name}}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Transfer Date:</strong><br>
                                        {{$transfer->trans_date}}
                                    </address>
                                </div>
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Description</strong><br>
                                        {{$transfer->remarks}}
                                    </address>
                                </div>
                            </div>
                            <div class="py-2 mt-3">
                                <h3 class="font-size-15 fw-bold text-center">Order Details</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap" border="1px">
                                    <thead>
                                        <tr style="background-color:#e4e6eb;">
                                            <!-- {{-- <th style="width: 70px;">No.</th> --}} -->
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Batch</th>
                                            <th>Expiry Date</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $counter = 1 ?>
                                        @foreach ($transferDetail as $item)
                                        <tr>                                        
                                            <td>{{$counter}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->batch->batch_no}}</td>
                                            <td>{{$item->batch->date}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->qty}}</td>                                                                                        
                                            <td>{{$item->line_total}}</td>
                                            <?php $counter++ ?>
                                        </tr> 
                                        @endforeach                                       
                                        <tr>
                                            <td colspan="6" class="border-0 text-end">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="border-0">
                                                <h4 class="m-0">{{$transfer->sumLineTotal}}</h4>
                                            </td>
                                        </tr>                                        
                                    </tbody>                                    
                                </table>                                
                            </div>                                                         
                        </div>

                        <div class="d-flex justify-content-around mt-4">
                            <div class=" mx-6 d-flex justify-content-center text-center">
                                {{ isset($transfer->approvedUser->name) ? $transfer->approvedUser->name : ''  }} <br>
                                    ------------------------- <br>
                                    Approved By                                
                            </div>

                                <div class="mx-6  d-flex justify-content-center text-center">
                                    {{ isset($transfer->receivedUser->name) ? $transfer->receivedUser->name : ''  }} <br>
                                    ------------------------- <br>
                                    Received By
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by The Blue
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @stop
    @push('script')
    @endpush