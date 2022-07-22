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
                                    <h4 class="float-end font-size-16">Stock Detail</h4>
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
                                    <strong>User:</strong><br>
                                    {{\Auth::user()->name}}
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <address class="mt-2 mt-sm-0">
                                    <strong>Shipped To:</strong><br>
                                  
                                </address>
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="col-sm-6 text-sm-end"> --}}
                                    <address>
                                        <strong>Branch Name:</strong><br>
                                    </address>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                    </address>
                                </div>
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Description</strong><br>
                                    </address>
                                </div>
                            </div> -->
                            <div class="py-2 mt-3">
                                <h3 class="font-size-15 fw-bold text-center">Stock Details</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap" border="1px">
                                    <thead>
                                        <tr style="background-color:#e4e6eb;">
                                            {{-- <th style="width: 70px;">No.</th> --}}
                                            <th>Product</th>
                                            <th>Batch</th>
                                            <th >Branch</th>
                                            <th class="text-end">Price</th>
                                            <th class="text-end">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                          <?php $total_qty=0;
                                          $subTotal=0;
                                        $totalDiscount=0; ?>
                                       
                                        @foreach ($stocks as $stock)
                                        <tr>
                                           
                                             <?php $total_qty+=$stock->quantity;
                                            $subTotal+=$stock->price; ?>
                                           
                                           
                                            <td>{{$stock->product->name}}</td>
                                            <td>{{$stock->batch->batch_no}}</td>
                                            <td >{{$stock->branch->name}}</td>
                                            <td class="text-end">{{$stock->price}}</td>
                                            <td class="text-end">{{$stock->quantity}}</td>
                                        </tr>
                                        @endforeach
                                        
                                        <tr style="background-color:#e4e6eb;">
                                            <td  colspan="3" class="border-0 ">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="border-0  text-end">
                                                <h4 class="m-0">{{$subTotal}}</h4>
                                            </td>
                                            <td  class="border-0 text-end">
                                                <h4 class="m-0">{{$total_qty}}</h4>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
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