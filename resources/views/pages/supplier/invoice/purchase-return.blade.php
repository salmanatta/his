@extends('layouts.main')
@section('content')
<form class="" method="post" action="{{route('purchase_invoices.store')}}">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title mb-4">Purchase Return invoice </h4>
                            <div class="card">
                                <div class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="_invoice_header">
                                                <p class="_invoice_no"><span>Purchase Invoice No :</span>#
                                                    <span class="_invoice_no_txt">{{$invoice_no ?? ''}}
                                                        <input type="hidden" value="{{$invoice_no}}" name="invoice_no">
                                                        <input type="hidden" value="PURCHASE RETURN" name="trans_type">
                                                    </span>
                                                </p>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="InvoiceDate">Invoice Date</label>
                                                <input type="date" class="form-control _date" value="<?php echo date('Y-m-d');?>" name="date" id="InvoiceDate" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">                                            
                                            <label class="form-label" for="branch">Branch Name</label>
                                            <select class="select2 form-control _branch_select" name="branch_id" id="branch">
                                            </select>
                                            @error('branch_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror                                            
                                        </div>
                                        <div class="col-md-6 mb-1">                                            
                                            <label class="form-label" for="supplier">Supplier Name</label>
                                            <select class="select2 form-control _supplier_select" name="suplier_id" id="supplier">
                                            </select>
                                            @error('suplier_id')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <div class="mb-1">
                                                <label class="form-label" for="freight">Freight</label>
                                                <input type="text" class="form-control" onkeyup="do_calculation()" name="freight" id="freight">
                                            </div>                                           
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="mb-1">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control _description" name="description" id="description"></textarea>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="col-md-6 justify-content-center mx-auto">
                                                <div class="mb-1">
                                                    <label class="form-label" for="description">Product</label>
                                                    <select class="select2 form-control _products_select" id="_products_select" name="product_id">
                                                    </select>
                                                    @error('product_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
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
                            <th>S.NO</th>
                            <th>Item</th>
                            <th>Batch #</th>
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
                    <tbody>
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
                            <td style="width:8%;text-align:right" class="_tfootTotal">0</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1">Save</button>                        
                        <a class="btn btn-danger mx-0" href="{{ url('/') }}">Exit</a>
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
                console.log(data);
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
                console.log(data);
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
                console.log(data);
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
        <td class="qty all_qty">
        <input type="number" class="form-control all_qty" style="text-align:center" min="1" onkeyup="do_calculation()" name="quanity[]" value="1" step="any" required/>
        </td>
        <td class="purchase_price">
        <input type="number" class="form-control purchase_price" style="text-align:center" onKeyup="do_calculation()" value="` + data.purchase_price + `"  name="purchase_price[]" step="any" required/>
        </td>
        <td class="total_price">
        <input type="number" class="form-control total_price" style="text-align:right" value="` + data.purchase_price * 1 + `"  name="total_price" step="any" readonly/>
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
        </td><input type="hidden" class="hidden_total" name="total">
        <td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>       
        <input type="hidden" class="sub_total" name="sub_total" value="0">
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
        // alert('dddd');
        // Declare variable for grand calculation
        var line_total = 0;
        var sub_total = 0;
        var grand_discount = 0;
        var total_qty = 0;
        var product_count = 1;
        var grand_subtotal = 0;
        var freight = parseFloat(document.getElementById('freight').value);
        if(isNaN(freight))
        {
            freight = 0;
        }
        $('.table_append_rows').each(function() // run loop on all append rows for calculation and value reseting
            {
                $(this).find('.product_count').text(product_count); // get qty from row
                var qty = $(this).find('.qty').find('input').val(); // get qty from row
                total_qty += parseInt(qty);
                // var purchase_price=parseInt($(this).find('.purchase_price').val()); // take unit price from row
                var purchase_price = $(this).find('.purchase_price').find('input').val(); // get qty from row
                $(this).find('.hidden_purchase_price').val(purchase_price); // put unit price in hidden input field
                var total_price = parseFloat(purchase_price * qty).toFixed(2);
                var purchase_discount = $(this).find('.purchase_discount').find('input').val();
                var sale_tax_value = parseFloat($(this).find('.sale_tax_value').find('input').val()); // Get Sale Tqx value
                var adv_tax_value = parseFloat($(this).find('.adv_tax_value').find('input').val()); // Get Adv Tax Value
                var all_qty = parseFloat($(this).find('.all_qty').val());
                var price_after_discount = parseFloat((total_price * purchase_discount) / 100).toFixed(2); // calculate unit price after discount
                $(this).find('.after_discount').val(price_after_discount); // set u_price after discount in row td

                if(isNaN(sale_tax_value))
                {
                    sale_tax_value = 0;
                }
                if(isNaN(adv_tax_value))
                {
                    adv_tax_value = 0;
                }
                var row_sub_total = parseFloat(total_price - price_after_discount + sale_tax_value + adv_tax_value).toFixed(2);
                $(this).find('.sub_total').val(row_sub_total);
                $(this).find('.line_total').val(row_sub_total);
                grand_subtotal = (parseFloat(grand_subtotal) + parseFloat(row_sub_total)).toFixed(2);
                $(".total_price").val(total_price);
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

    // To restict the datepicker
    // disableDate();
</script>
@endpush