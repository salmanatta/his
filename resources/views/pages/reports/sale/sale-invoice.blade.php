<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sale Invoice</title>

    <style type="text/css">

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            /*text-align: center;*/
            border-bottom: 1px solid #ddd;
            font-size: 12px;
        }
    </style>

</head>
<body style="margin-bottom: 0;margin-top: 0">

<table style="margin-bottom: 0;margin-top: 0" >
    <tr>
        {{--        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>--}}
        <td align="left" style="font-size: 20px">
            <h4>Sale Invoice</h4>
        </td>
        <td align="right" style="font-size: 20px">
            <h4 style="margin-top: 0; margin-bottom: 0;">{{ $company->company->name }}</h4>
            {{ $company->name }}
        </td>
    </tr>

</table>
<h4 style="text-align: center;margin-top: 0;margin-bottom: 0">{{ !is_null($sale) ? $sale->inv_status : '' }}</h4>
<table  width="100%">
    <tr>
        <td style="border-bottom:0"><strong>Invoice #:</strong> {{ !is_null($sale) ? $sale->invoice_no : '' }}</td>
        <td style="border-bottom:0"><strong>Invoice Date :</strong> {{ !is_null($sale) ? $sale->invoice_date : '' }}</td>
    </tr>
    <tr style="border-bottom:0">
        @php
            $filer;
             if ($sale->customer->isfiler == 0){
                 $filer = 'Non-Filer';
            }elseif ($sale->customer->isfiler == 1){
                 $filer = 'Filer';
            }else{
                 $filer = 'Exempted';
            }
        @endphp
        <td style="border-bottom:0"><strong>Customer Name:</strong> {{ !is_null($sale) ? $sale->customer->name.' ( '.$filer.' )' : '' }}</td>
        <td style="border-bottom:0"><strong>Salesman :</strong> {{ !is_null( $sale->salesman) ? $sale->salesman->first_name.' '.$sale->salesman->last_name : '' }}</td>
    </tr>
{{--    <tr>--}}
{{--        --}}
{{--        <td style="border-bottom: 0"><strong>Status :</strong> {{ !is_null($sale) ? $filer : '' }}</td>--}}

{{--    </tr>--}}

</table>

<br/>

<table>
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
        <th style="text-align: right">Net Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $counter = 1;
     @endphp
    @foreach ($sale_details as $item)
        <tr>
            <td>{{ $counter }}</td>
            <td>{{ $item->item }}</td>
            <td>{{ $item->batch->batch_no }}</td>
            <td style="text-align: center">{{ date('d-m-Y', strtotime($item->batch->date)) }}</td>
            <td style="text-align: center">{{ $item->qty }}</td>
            <td style="text-align: center">{{ $item->bonus }}</td>
            <td style="text-align: center">{{ $item->price }}</td>
            <td style="text-align: center">{{ $item->sales_tax }}</td>
            <td style="text-align: center">{{ $item->adv_tax }}</td>
            <td style="text-align: center">{{ $item->adv_tax_value }}</td>
            <td style="text-align: center">{{ $item->discount }}</td>
            <td style="text-align: center">{{ $item->after_discount }}</td>
            <td style="text-align: right">{{ $item->line_total }}</td>
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
    <tr style="margin-bottom:0;margin-top:0">
        <td></td>
        <td></td>
        <td></td>
        <td>
            <h4>Total</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumQty }}</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumBonus }}</h4>
        </td>
        <td></td>
        <td style="text-align: center">
            <h4>{{ $sale->sumSalesTax }}</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumAdvTax }}</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumAdvTaxValue }}</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumDiscount }}</h4>
        </td>
        <td style="text-align: center">
            <h4>{{ $sale->sumDiscountAmount }}</h4>
        </td>
        <td class="border-0 text-end">
            <h4 style="text-align: right">{{ $subTotal }}</h4>
        </td>
    </tr>
    </tbody>
</table>
<div style="display:flex;flex-direction:row;margin-top: 2%">
    <div style="float:left" >
        <div style="text-align: right;margin-bottom:0;margin-top:0;width: 50%">{{ isset($sale->user->name) ? $sale->user->name : '' }}</div>
        <div style="text-align: center">_____________________</div>
        <div style="text-align: center">Created By</div>
    </div>
    <div style="float:right">
        <div style="text-align: right;margin-bottom:0;margin-top:0;width: 50%">{{ isset($sale->postUser->name) ? $sale->postUser->name : '' }}</div>
        <div style="text-align: center;margin-bottom:0;margin-top:0;">_____________________</div>
        <div style="text-align: center;margin-bottom:0;margin-top:0;">Post By</div>
    </div>
</div>

</div>

</body>
</html>
