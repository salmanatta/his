<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adjustment Invoice</title>

    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            /* text-align: center; */
            /* border: 1px solid #ddd; */
            font-size: 12px;
        }
        .invoice_tab td {
            text-align: center;
        }
    </style>

</head>

<body style="margin-bottom: 0;margin-top: 0">
<h2 style="margin-top: 0; margin-bottom: 0;text-align:center">{{!is_null($company) ? $company->company->name : '' }}</h2>
<p style="margin-top: 2; margin-bottom: 0;text-align:center">{{!is_null($company) ? $company->name : '' }}</p>
{{--<p style="margin-top: 2; margin-bottom: 0;text-align:center">Address: Mustafa Plaza , Ring Road Peshawar</p>--}}
<table style="margin-bottom: 0;margin-top: 10px">
    <tr>
        <td align="left" style="border-top:1px solid;border-bottom:1px solid;">
            <p style = "text-align:center;margin-top:0;margin-bottom:0;font-size: 20px">Adjustment Report</p>
        </td>
    </tr>

</table>
<h4 style="text-align: center;margin-top: 0;margin-bottom: 0">{{ !is_null($adjustment_Master) ? $adjustment_Master->inv_status : '' }}</h4>
<table width="100%">
    <tr>
        <td >
            <strong>Invoice #:</strong> {{ !is_null($adjustment_Master) ? $adjustment_Master->invoice_no : '' }}
        </td>
        <td style="text-align: right;">
            <strong>Invoice Date :</strong> {{ !is_null($adjustment_Master) ? date('d-m-Y', strtotime($adjustment_Master->invoice_date)) : '' }}
        </td>
    </tr>
    <tr >
        <td ><strong>User Name:</strong>
            {{ !is_null($adjustment_Master) ? $adjustment_Master->user->name : '' }}</td>
        <td  style="text-align: right;"><strong>Adjustment Type :</strong> {{!is_null($adjustment_Master) ? $adjustment_Master->trans_type : '' }}</td>
    </tr>
    <tr>
        <td ><strong>Remarks :</strong> {{ !is_null($adjustment_Master) ? $adjustment_Master->remarks : '' }}</td>
        <td></td>
    </tr>
</table>
<br/>

<table class="invoice_tab">
    <thead>
    <tr style="background-color:#e4e6eb;">
        <th>#</th>
        <th style="text-align:left">Product Name</th>
        <th>Batch</th>
        <th>Expiry Date</th>
        <th>Qty</th>
        <th style="text-align:right">Unit Price</th>
        <th style="text-align:right">Total Price </th>
    </tr>
    </thead>
    <tbody>
    @if(isset($adjustment_detail))
        @php
            $counter = 1;
            $total_amount = 0;
        @endphp
        @foreach($adjustment_detail as $data)
    <tr>
        <td> {{ $counter }}</td>
        <td style="text-align:left"> {{ $data->product->name }}</td>
        <td> {{ $data->batch->batch_no }}</td>
        <td> {{ date('d-m-Y', strtotime($data->batch->date)) }}</td>
        <td> {{ $data->qty }}</td>
        <td style="text-align:right"> {{ $data->cost_price }}</td>
        <td style="text-align:right"> {{ $data->cost_price * $data->qty }}</td>
        @php
            $counter++;
            $total_amount += ($data->cost_price * $data->qty);
        @endphp
    </tr>
        @endforeach
    <tr style="margin-bottom:0;margin-top:0">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right">
            <p> <span style="font-weight: bold"> Total Amount: </span>  {{ $total_amount }}</p>
        </td>
    </tr>
    @endif
    </tbody>
</table>
<div style="display:flex;flex-direction:row;margin-top: 2%">
    <div style="float:left" >
        <div style="text-align: right;margin-bottom:0;margin-top:0;width: 50%">{{ isset($adjustment_Master->user->name) ? $adjustment_Master->user->name : '' }}</div>
        <div style="text-align: center">_____________________</div>
        <div style="text-align: center">Created By</div>
    </div>
    <div style="float:right">
        <div style="text-align: right;margin-bottom:0;margin-top:0;width: 50%">{{ isset($adjustment_Master->postUser->name) ? $adjustment_Master->postUser->name : '' }}</div>
        <div style="text-align: center;margin-bottom:0;margin-top:0;">_____________________</div>
        <div style="text-align: center;margin-bottom:0;margin-top:0;">Post By</div>
    </div>
</div>
</body>
</html>
