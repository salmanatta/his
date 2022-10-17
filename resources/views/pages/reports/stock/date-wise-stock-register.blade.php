<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 10px;
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
                            <div class="table-responsive">
                                <table style="margin-top: 1%">
                                    <thead>
                                    <tr style="background-color:#e4e6eb;">
                                        <th>#</th>
                                        <th style="text-align: left">Item Name</th>
                                        <th>Purchase Price</th>
                                        <th>Purchase Qty</th>
                                        <th>Purchase Return Qty</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Qty</th>
                                        <th>Sale Price</th>
                                        <th>Sale Ret Qty</th>
                                        <th>Sale Ret Price</th>
                                        <th>Transfer IN</th>
                                        <th>Transfer Out</th>
                                        <th>Closing Qty</th>
                                        <th style="text-align: right">Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counter = 1;
                                        $sumPurchQty         = 0;
                                        $sumPurchPrice       = 0;
                                        $sumPurchReturnQty   = 0;
                                        $sumPruchReturnPrice = 0;
                                        $sumSaleQty          = 0;
                                        $sumSalePrice        = 0;
                                        $sumSaleReturnQty    = 0;
                                        $sumSaleReturnPrice  = 0;
                                        $sumTransInQty       = 0;
                                        $sumTransOutQty      = 0;
                                        $sumClosingQty       = 0;
                                    @endphp
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td style="text-align: left">{{ $item->name }}</td>
                                            <td>{{ $item->purchQty }}</td>
                                            <td>{{ $item->purchPrice }}</td>
                                            <td>{{ $item->purchReturnQty }}</td>
                                            <td>{{ $item->purchReturnPrice }}</td>
                                            <td>{{ $item->saleQty }}</td>
                                            <td>{{ $item->salePrice  }}</td>
                                            <td>{{ $item->saleReturnQty }}</td>
                                            <td>{{ $item->saleReturnPrice }}</td>
                                            <td>{{ $item->transInQty }}</td>
                                            <td>{{ $item->transOutQty }}</td>
                                            <td>{{ $item->closingQty }}</td>
                                            <td></td>
                                            @php
                                                $sumPurchQty          += $item->purchQty;
                                                $sumPurchPrice        += $item->purchPrice;
                                                $sumPurchReturnQty    += $item->purchReturnQty;
                                                $sumPruchReturnPrice  += $item->purchReturnPrice;
                                                $sumSaleQty           += $item->saleQty;
                                                $sumSalePrice         += $item->salePrice;
                                                $sumSaleReturnQty     += $item->saleReturnQty;
                                                $sumSaleReturnPrice   += $item->saleReturnPrice;
                                                $sumTransInQty        += $item->transInQty;
                                                $sumTransInQty        += $item->transInQty;
                                                $sumTransOutQty       += $item->transOutQty;
                                                $sumClosingQty        += $item->closingQty;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td> <h4>Grant Total</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumPurchQty  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumPurchPrice  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumPurchReturnQty  }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumPruchReturnPrice }}</h4></td>
                                        <td style="text-align: center"> <h4>{{ $sumSaleQty }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumSalePrice }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumSaleReturnQty }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumSaleReturnPrice }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumTransInQty }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumTransOutQty }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ $sumClosingQty }}</h4> </td>
                                        <td style="text-align: center"> <h4>{{ 0 }}</h4> </td>

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
