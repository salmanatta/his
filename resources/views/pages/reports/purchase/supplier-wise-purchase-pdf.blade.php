<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 12px;
    }
</style>


<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-lg-4">
                                    {{--                                    <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="logo-light.png" height="20"/>--}}
                                </div>
                                <div style="text-align: center">
                                    <h4 style="margin-top: 0; margin-bottom: 0;" class="font-size-16">Customer Wise Sale Report</h4>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center">
                                <h4 style="margin-top: 0; margin-bottom: 0;">{{ $company->company->name }}</h4>
                                {{ $company->name }}
                            </div>
                            <div style="font-size: 12px">
                                <label for="customerName">From Date : </label>{{ date('d-m-Y', strtotime($from_date)) }}<br>
                                <label for="customerName">To Date : </label>{{ date('d-m-Y', strtotime($to_date)) }}<br>
                            </div>
                            <hr>
                            <div style="display:flex;flex-direction:row;margin-bottom: 2%">
                                <div style="float:left" >
                                    <label for="customerName">Customer Name : </label>
                                    {{ isset($purchase_Master[0]->supplier->name) ? $purchase_Master[0]->supplier->name : '' }}
                                </div>
                                <div style="float:right;width: 50% " >
                                    <label for="customerName">Address : </label>
                                    {{ isset($purchase_Master[0]->supplier->address) ? $purchase_Master[0]->supplier->address : '' }}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table style="margin-top: 2%">
                                    <thead>
                                    <tr style="background-color:#e4e6eb;">
                                        <th>#</th>
                                        <th>Invoice #</th>
                                        <th>Invoice Date</th>
                                        <th>Purchaser</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Sales Tax</th>
                                        <th>Advance Tax</th>
                                        <th>Freight</th>
                                        <th style="text-align: right">Net Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counter = 1;
                                        $net_total = 0;
                                        $adv_tax = 0;
                                        $sales_tax =0;
                                        $discount =0;
                                        $total_amount =0;
                                        $sumfreight = 0;
                                    @endphp
                                    @foreach ($purchase_Master as $item)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td style="text-align: center">{{ $item->invoice_no }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->invoice_date)) }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td style="text-align: right">{{ $item->sumLineTotal + $item->sumDiscountAmount - $item->sumAdvTaxValue - $item->sumSalesTax }}</td>
                                            <td style="text-align: center">{{ $item->sumDiscountAmount }}</td>
                                            <td style="text-align: center">{{ $item->sumSalesTax  }}</td>
                                            <td style="text-align: center">{{ $item->sumAdvTaxValue }}</td>
                                            <td style="text-align: center">{{ $item->freight }}</td>
                                            <td style="text-align: right">{{ $item->total }}</td>
                                            @php
                                                $net_total += $item->total;
                                                $adv_tax += $item->sumAdvTaxValue;
                                                $sales_tax += $item->sumSalesTax;
                                                $discount += $item->sumDiscountAmount;
                                                $sumfreight += $item->freight;
                                                $total_amount += $item->sumLineTotal + $item->sumDiscountAmount - $item->sumAdvTaxValue - $item->sumSalesTax;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <h4>Grant Total</h4></td>
                                        <td style="text-align: right"> <h4>{{ $total_amount  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $discount  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sales_tax  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $adv_tax }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumfreight }}</h4></td>
                                        <td style="text-align: right"> <h4>{{ $net_total }}</h4> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
