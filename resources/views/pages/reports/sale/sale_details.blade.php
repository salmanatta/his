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
                                        <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="logo-light.png"
                                            height="20" />
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="float-end font-size-16">Order #
                                            {{ !is_null($sale) ? $sale->invoice_no : '' }}</h4>
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
                                        <strong>Billed To:</strong><br>
                                        {{ !is_null($sale) ? $sale->user->name : '' }}
                                    </address>
                                </div>
                                <div class="col-sm-4">
                                    <address class="mt-2 mt-sm-0">
                                        <strong>Shipped To:</strong><br>
                                        {{ !is_null($sale) ? $sale->customer->name : '' }}
                                    </address>
                                </div>
                                <div class="col-sm-4">
                                    {{-- <div class="col-sm-6 text-sm-end"> --}}
                                    <address>
                                        <strong>Branch Name:</strong><br>
                                        {{ !is_null($sale) ? $sale->branch->name : '' }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ !is_null($sale) ? date('d-m-Y', strtotime($sale->invoice_date)) : '' }}
                                    </address>
                                </div>
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Description</strong><br>
                                        {{ !is_null($sale) ? $sale->description : '' }}
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
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Batch No</th>
                                            <th>Expiry Date</th>
                                            <th>Quantity</th>
                                            <th>Bonus</th>
                                            <th>Price</th>
                                            <th>Sales Tax</th>
                                            <th>Advance Tax</th>
                                            <th>Advance Tax Amount</th>
                                            <th>Discount %</th>
                                            <th>Discount Amount</th>
                                            <th class="text-end">Net Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 1 @endphp
                                        @foreach ($sale_details as $item)
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ $item->item }}</td>
                                                <td>{{ $item->batch->batch_no }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->batch->date)) }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->bonus }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->sales_tax }}</td>
                                                <td>{{ $item->adv_tax }}</td>
                                                <td>{{ $item->adv_tax_value }}</td>
                                                <td>{{ $item->discount }}</td>
                                                <td>{{ $item->after_discount }}</td>
                                                <td class="text-end">{{ $item->line_total }}</td>
                                            </tr>
                                            @php $counter++ @endphp
                                        @endforeach
                                        @php
                                            $subTotal = 0;
                                            $totalDiscount = 0;
                                            $get_order_details = DB::table('sale_invoice_details')
                                                ->where('sale_invoice_id', $sale->id)
                                                ->get();
                                        @endphp
                                        @foreach ($get_order_details as $row)
                                            @php
                                                $subTotal = $subTotal + $row->line_total;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="12" class="border-0 text-end">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0">{{ $subTotal }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-around mt-4">
                                <div class=" mx-6 d-flex justify-content-center text-center">
                                    {{ $sale->user->name  }} <br>
                                    ------------------------- <br>
                                    Created By
                                </div>

                                    <div class="mx-6  d-flex justify-content-center text-center">
                                        {{ isset($sale->postUser->name) ? $sale->postUser->name : ''  }} <br>
                                        ------------------------- <br>
                                        Post By
                                    </div>

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
    <script></script>
@endpush
