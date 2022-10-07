<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="float-end font-size-16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$purchase->inv_status}}</h4>
                                    <h4 class="float-end font-size-16">Order # {{$purchase->invoice_no}}</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{$purchase->user->name}}
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <address class="mt-2 mt-sm-0">
                                    <strong>Shipped To:</strong><br>
                                    {{$purchase->supplier->name}}
                                </address>
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="col-sm-6 text-sm-end"> --}}
                                <address>
                                    <strong>Branch Name:</strong><br>
                                    {{$purchase->branch->name}}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                    <strong>Invoice Date:</strong><br>
                                    {{$purchase->invoice_date}}
                                </address>
                            </div>
                            <div class="col-sm-6">
                                <address>
                                    <strong>Description</strong><br>
                                    {{$purchase->description}}
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
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Discount %</th>
                                    <th>Discount Amount</th>
                                    <th>Sales Tax</th>
                                    <th>Advance Tax</th>
                                    <th class="text-end">Line Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter = 1 ?>
                                @foreach ($purchase_details as $item)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$item->item}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td class="text-center">{{$item->qty * $item->price}}</td>
                                        <td>{{$item->discount}}</td>
                                        <td class="text-center">{{$item->after_discount}}</td>
                                        <td>{{$item->sales_tax}}</td>
                                        <td>{{$item->adv_tax}}</td>
                                        <td class="text-end">{{$item->line_total}}</td>
                                        <?php $counter++ ?>
                                    </tr>
                                @endforeach
                                @php
                                    $subTotal=0;
                                    $totalDiscount=0;
                                    $get_order_details=DB::table('purchase_invoice_details')->where('purchase_invoice_detail_id',$purchase->id)->get();
                                @endphp
                                @foreach($get_order_details as $row)
                                    @php
                                        $subTotal= $subTotal + $row->line_total ;
                                        // $totalDiscount= $totalDiscount + $discount;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="9" class="border-0 text-end">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="border-0 text-end">
                                        <h4 class="m-0">{{$purchase->total}}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end me-2">
                            <strong>Freight Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                            <h4 class="m-0">{{$purchase->freight}}</h4>
                        </div>
                        <br>
                        <div class="col-md-12 d-flex justify-content-end me-2">
                            <strong>Gross Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                            <h4 class="m-0">{{$purchase->total - $purchase->freight}}</h4>
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
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by The Blue
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
