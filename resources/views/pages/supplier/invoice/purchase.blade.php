@extends('layouts.main')
@section('content')
@if(isset($purchaseM))
    <form method="post" action="{{route('purchase_invoices.update',$purchaseM->id)}}">
    @method('PATCH')
@else
    <form method="post" action="{{route('purchase_invoices.store')}}">
@endif
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    @if(isset($purchaseM))
                                    @if($purchaseM->trans_type == 'PURCHASE' )
                                    <h4 class="card-title mb-4 text-center">Purchase Invoice Detail</h4>
                                    @else
                                    <h4 class="card-title mb-4 text-center">Purchase Invoice Return Detail</h4>
                                    @endif
                                    @else
                                    @if($transType == 'PURCHASE')
                                    <h4 class="card-title mb-4 text-center">Purchase Invoice Detail</h4>
                                    @else
                                    <h4 class="card-title mb-4 text-center">Purchase Invoice Return Detail</h4>
                                    @endif
                                    @endif                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <h3><b><label class="form-label" for="invStatus" style="color:red">Un-Post</label></b></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="font-weight-bold">
                                        <b><label class="form-label" for="InvoiceNo">Invoice No # {{isset($purchaseM) ? $purchaseM->invoice_no : ''}}</label></b>
                                        <input type="hidden" value="{{ isset($purchaseM) ? $purchaseM->trans_type : $transType }}" name="trans_type">
                                        <input type="hidden" value="Un-Post" name="inv_status">
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="InvoiceDate">Invoice Date</label>
                                                <input type="text" class="form-control" value="{{ isset($purchaseM) ? $purchaseM->invoice_date : date('m/d/Y') }}" name="invoiceDate" id="fiveDays" />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="supplier">Supplier Name</label>
                                                @if(isset($purchaseM))
                                                <input type="text" class="form-control" name="" value="{{ isset($purchaseM) ? $purchaseM->supplier->name : '' }}" readonly>
                                                @else
                                                <select class="select2 form-control _supplier_select" name="suplier_id" id="supplier">
                                                </select>
                                                @error('suplier_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="freight">Freight</label>
                                                <input type="text" class="form-control" onkeyup="do_calculation()" name="freight" id="freight" value="{{ isset($purchaseM) ? $purchaseM->freight : ''  }}">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                @if(!isset($purchaseM))
                                                <label class="form-label" for="description">Product</label>
                                                <select class="select2 form-control _products_select" id="_products_select" name="product_id">
                                                </select>
                                                @error('product_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="branch">Branch Name</label>
                                                @if(isset($purchaseM))
                                                <input type="text" class="form-control" name="" value="{{ isset($purchaseM) ? $purchaseM->branch->name : '' }}" readonly>
                                                <input type="hidden" value="{{ isset($purchaseM) ? $purchaseM->branch->id : ''  }}" name="branch_id">
                                                @else
                                                <select class="select2 form-control _branch_select" name="branch_id" id="branch">
                                                </select>
                                                @error('branch_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" rows="8">{{ isset($purchaseM) ? $purchaseM->description : old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table  order-list _purchaseTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Batch No</th>
                                <th>Exp. Date</th>
                                <th>Quanity</th>
                                <th>Price</th>
                                <th>Total Rate</th>
                                <th>Discount %</th>
                                <th>Discount Amount</th>
                                <th>Sale Tax</th>
                                <th>Adv. Tax</th>
                                <th>Line Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $granttotal = 0; ?>
                        <tbody>
                            @if(isset($purchaseD))
                            <?php $counter = 1;
                            $row_id = 1;
                            ?>
                            @foreach($purchaseD as $purchase)
                            <tr class="table_append_rows" id="table_append_rows_{{$row_id}}">
                                <td>{{ $counter }}</td>
                                <td class="name"> 
                                    {{ $purchase->product->name }}
                                    <input type="hidden" name="id[]" value="{{ $purchase->id }}">
                                    <input type="hidden" name="product_id[]" value="{{ $purchase->product_id }}" />                                    
                                </td>
                                <td class="batch_no">
                                    <input type="text" class="form-control batch_no" style="text-align:center" value="{{ $purchase->batch->batch_no }}" name="batch[]" step="any" readonly />
                                    <input type="hidden" value="{{ $purchase->batch->id }}" name="batch_id[]">
                                </td>
                                <td class="expiry_date">
                                    <input type="date" class="form-control expiry_date" value="{{ $purchase->batch->date }}" name="expiry_date[]" step="any" readonly />
                                </td>
                                <td class="quanity">
                                    <input type="number" class="form-control quanity" style="text-align:center" min="1" onKeyup="do_calculation()" name="quanity[]" value="{{ $purchase->qty }}" step="any" required />
                                </td>
                                <td class="purchase_price">
                                    <input type="number" class="form-control purchase_price" style="text-align:center" onKeyup="do_calculation()" value="{{ $purchase->price }}" name="purchase_price[]" step="any" required />
                                </td>
                                <td class="total_price">
                                    <input type="number" class="form-control total_price" style="text-align:right" value="{{  $purchase->qty * $purchase->price }}" name="total_price[]" step="any" readonly />
                                </td>
                                <td class="purchase_discount">
                                    <input type="number" class="form-control purchase_discount" onKeyup="do_calculation()" value="{{ $purchase->discount }}" name="purchase_discount[]" step="any" />
                                </td>
                                <td class="after_discount">
                                    <input type="number" class="form-control after_discount" style="text-align:right" value="{{ $purchase->after_discount  }}" name="after_discount[]" step="any" readonly />
                                </td>
                                <td class="sale_tax_value">
                                    <input type="number" class="form-control sale_tax_value" onKeyup="do_calculation()" value="{{ $purchase->sales_tax }}" name="sale_tax_value[]" step="any" />
                                </td>
                                <td class="adv_tax_value">
                                    <input type="number" class="form-control adv_tax_value" onKeyup="do_calculation()" value="{{ $purchase->adv_tax }}" name="adv_tax_value[]" step="any" />
                                </td>
                                <td class="line_total">
                                    <input type="number" class="form-control line_total" style="text-align:right" value="{{ $purchase->line_total }}" name="line_total[]" step="any" readonly />
                                </td>
                                <td></td>                              
                            </tr>
                            <?php $counter++;
                            $row_id++;
                            $granttotal += $purchase->line_total;
                            ?>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="width:10%;text-align:right">Grand Total</td>
                                <td style="width:8%;text-align:right" class="_tfootTotal">{{ $granttotal }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                        @if(isset(($purchase)))
                            <button type="submit" class="btn btn-primary me-1" name="update">Update</button>    
                            <button type="submit" class="btn btn-warning me-1" name="update-post">Update & Post</button>    
                            <a class="btn btn-danger mx-0" href="{{ url('purchaseReport') }}">Exit</a>
                        @else
                            <button type="submit" class="btn btn-success me-1">Save</button>
                            <a class="btn btn-danger mx-0" href="{{ url('/') }}">Exit</a>
                        @endif
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</form>
<!-- end row -->
@endsection
@push('script')
<script>
    $("._branch_select").select2({
        ajax: {
            type: 'get',
            url: "{{url('get-all-branches')}}",
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                };
            },
            processResults: function(data, params) {
                // console.log(data);
                return {
                    results: data.items,
                };
            },
            cache: true
        },
        placeholder: '-- Select Branch --',
        minimumInputLength: 2,
    });
    //***********  Get all suppliers
    $("._supplier_select").select2({
        ajax: {
            type: 'get',
            url: "{{url('/get-all-suppliers')}}",
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                };
            },
            processResults: function(data, params) {
                console.log(data);
                return {
                    results: data.items,
                };
            },
            cache: true
        },
        placeholder: '-- Select Supplier --',
        minimumInputLength: 2,
    });
    //////////////////***************************************
    var row_id = 1;
    var count = 1;
    var product_count = 1;
    $("._products_select").select2({
        ajax: {
            type: 'get',
            url: "{{url('/get-all-products')}}",
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                };
            },
            processResults: function(data, params) {
                // console.log(data);
                return {
                    results: data.items,
                };
            },
            cache: true
        },
        placeholder: 'Search for a product',
        minimumInputLength: 2,
    }).on('change', function(data) {
        var id = $(this).val();
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '{{url("get_purchase-product")}}',
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                var table_body = $("table.order-list tbody");
                var new_row = `<tr class="table_append_rows" id="table_append_rows_` + row_id + `">
        <td class="product_count">` + product_count + ` </td>
        <td class="name"> <input type="hidden" name="product_id[]" value="` + data.id + `"/>
        <input type="hidden" name="product_name[]" value="` + data.name + `"/>` + data.name + `</td>
        <td class="batch_no">
        <input type="text" class="form-control batch_no" style="text-align:center" value="" name="batch[]" step="any" required/>
        </td>
        <td class="expiry_date">
        <input type="date" class="form-control expiry_date" value="" name="expiry_date[]" step="any" required/>
        </td>
        <td class="quanity">
        <input type="number" class="form-control quanity" style="text-align:center" min="1" onKeyup="do_calculation()" name="quanity[]" value="1" step="any" required/>
        </td>
        <td class="purchase_price">
        <input type="number" class="form-control purchase_price" style="text-align:center" onKeyup="do_calculation()" value="` + data.purchase_price + `"  name="purchase_price[]" step="any" required/>
        </td>
        <td class="total_price">
        <input type="number" class="form-control total_price" style="text-align:right" value=""  name="total_price[]" step="any" readonly/>
        </td>
        <td class="purchase_discount">
        <input type="number" class="form-control purchase_discount" onKeyup="do_calculation()" value="` + data.purchase_discount + `"  name="purchase_discount[]" step="any"/>
        </td>
        <td class="after_discount">
        <input type="number" class="form-control after_discount" style="text-align:right" value="` + (data.purchase_price - data.purchase_discount) + `"  name="after_discount[]" step="any" readonly/>
        </td>
        <td class="sale_tax_value">
        <input type="number" class="form-control sale_tax_value" onKeyup="do_calculation()" value="` + data.sale_tax_value + `"  name="sale_tax_value[]" step="any"/>
        </td>
        <td class="adv_tax_value">
        <input type="number" class="form-control adv_tax_value" onKeyup="do_calculation()" value="` + data.adv_tax_non_filer + `"  name="adv_tax_value[]" step="any"/>
        </td>
        <td class="line_total">
        <input type="number" class="form-control line_total" style="text-align:right" value="` + (data.purchase_price) + `"  name="line_total[]" step="any" readonly/> 
        </td>
        <td>
        <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>                 
        <input type="hidden" class="sub_total" name="sub_total" value="0">
        <input type="hidden" class="hidden_total" name="total">
        </td>        
        </tr>`;
                table_body.append(new_row);
                $("._products_select").val('');
                product_count++;
                row_id++;
                do_calculation();
            }
        });
    });
    $(document).on('click', '.delete_row', function() {
        $(this).closest('tr').remove();
        do_calculation();
    });

    function do_calculation() {
        var line_total = 0;
        var sub_total = 0;
        var grand_discount = 0;
        var total_qty = 0;
        var product_count = 1;
        var grand_subtotal = 0;
        var freight = parseFloat(document.getElementById('freight').value);
        if (isNaN(freight)) {
            freight = 0;
        }
        $('.table_append_rows').each(function() {            
            $(this).find('.product_count').text(product_count);
            var quanity = $(this).find('.quanity').find('input').val();
            var purchase_price = $(this).find('.purchase_price').find('input').val();
            var total_price = parseFloat(purchase_price * quanity).toFixed(2);
            $(this).find(".total_price").val(total_price);
            var purchase_discount = $(this).find('.purchase_discount').find('input').val();
            var sale_tax_value = parseFloat($(this).find('.sale_tax_value').find('input').val());
            var adv_tax_value = parseFloat($(this).find('.adv_tax_value').find('input').val());
            var price_after_discount = parseFloat((total_price * purchase_discount) / 100).toFixed(2);
            $(this).find('.after_discount').val(price_after_discount);
            if (isNaN(sale_tax_value)) {
                sale_tax_value = 0;
            }
            if (isNaN(adv_tax_value)) {
                adv_tax_value = 0;
            }
            var row_sub_total = parseFloat(total_price - price_after_discount + sale_tax_value + adv_tax_value).toFixed(2);
            $(this).find('.sub_total').val(row_sub_total);
            $(this).find('.line_total').val(row_sub_total);
            grand_subtotal = (parseFloat(grand_subtotal) + parseFloat(row_sub_total)).toFixed(2);

            $(".hidden_total").val(grand_subtotal);
            $("._tfootTotal").text(grand_subtotal);
            $("input[name='total_qty']").val(total_qty);
            $("input[name='item']").val(product_count);
            product_count++;

        });
    }
    $("input[type='checkbox']").on("change", function() {
        if ($(this).is(":checked"))
            $(this).val("1");
        else
            $(this).val("0");
    });
    $(document).ready(function() {
        $("#fiveDays").datepicker({
            minDate: -5,
            maxDate: "+5D"
        });

    })
</script>
@endpush