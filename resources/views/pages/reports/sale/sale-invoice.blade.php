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
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        {{--        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>--}}
        <td align="right">
            <h3>Sale Invoice</h3>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>Invoice #:</strong> {{ !is_null($sale) ? $sale->invoice_no : '' }}</td>
        <td><strong>Invoice Date :</strong> {{ !is_null($sale) ? $sale->invoice_date : '' }}</td>
    </tr>
    <tr>
        <td><strong>Customer Name:</strong> {{ !is_null($sale) ? $sale->customer->name : '' }}</td>
        <td><strong>Invoice Date :</strong> {{ !is_null($sale) ? $sale->invoice_date : '' }}</td>
    </tr>

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
    @php $counter = 1 @endphp
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
<div style="display:flex;flex-direction:row;margin-top: 2%">
    <div style="float:left" >
        <div style="text-align: center;margin-bottom:0%">{{ isset($sale->user->name) ? $sale->user->name : '' }}</div>
        <br><div style="text-align: center">_____________________</div><br>
        <div style="text-align: center">Created By</div>
    </div>
    <div style="float:right;width: 50% " >
        {{ isset($sale->postUser->name) ? $sale->postUser->name : '' }}
        <br><div style="text-align: center">_____________________</div><br>
        <div style="text-align: center">Post By</div>
    </div>
</div>

</div>

</body>
</html>
