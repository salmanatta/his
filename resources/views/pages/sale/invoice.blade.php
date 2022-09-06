@extends('layouts.main')
@section('content')
<div class="row">
    <!--  Large modal example -->
    <!-- /.modal -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('sale_invoices.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                @if($transType == 'SALE')
                                <h4 class="card-title mb-4 text-center">Sale Invoice Detail</h4>
                                @else
                                <h4 class="card-title mb-4 text-center">Sale Invoice Return Detail</h4>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <p>
                                        <span>Sale Invoice No # {{$invoice_no ?? ''}}
                                            <input type="hidden" value="{{$invoice_no}}" name="invoice_no">
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="col-md-12 mb-3">
                                                <div class="_invoice_header">
                                                    <p class="">
                                                        <span>
                                                            <label class="form-label" for="Customer">Invoice Date</label>
                                                            <input type="date" name="invoice_date" value="<?php echo date('Y-m-d'); ?>" id="datepickercustom" class="form-control _date">
                                                        </span>
                                                    </p>
                                                    <input type="hidden" name="trans_type" value="{{ $transType }}">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label" for="description">Product</label>
                                                <select class="select2 form-control _products_select" id="_products_select" name="product_id">
                                                </select>
                                                @error('product_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class="col-12 mb-3">
                                                <label class="form-label" for="Customer">Customer Name</label>
                                                <select class="select2 form-control _customers_select" name="customer_id">
                                                </select>
                                                @error('customer_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea placeholder="description" name="description" rows="4" class="form-control _description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 order-list _saleTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Products</th>
                                            <th>Batch</th>
                                            <th>Stock Quanity</th>
                                            <th>Quanity</th>
                                            <th>Price</th>
                                            <th>Bonus</th>
                                            <th>Discount</th>
                                            <th>After Discount</th>
                                            <th>Sales Tax</th>
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
                                            <td style="width:10%;text-align:right">Grand Total</td>
                                            <td style="width:8%;text-align:right" class="_tfootTotal">0</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-1">Save</button>
                            <a class="btn btn-danger mx-0" href="{{ url('/') }}">Exit</a>
                        </div>
                    </div>

                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"> Batch Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="edit_row_id">
                    <input type="hidden" name="product_modal" id="product_modal">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="batch_no">Batch No</label>
                            <select name="batch_id" id="edit_batch" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_modal" data-bs-dismiss="modal">Update</button>
                    </div>
                    <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection
@push('script')
<script>
    // ======================for customer ===============
    $("._customers_select").select2({
        ajax: {
            type: 'get',
            url: "{{url('common_customer')}}",
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
        placeholder: 'Search  Customer',
        minimumInputLength: 2,
    });
    var product_count = 1;
    var row_id = 1;
    // =============================for product work select2 and onchange append row================
    function custom_select2(selector, url, placeholder = false) {
        $(selector).select2({
            ajax: {
                type: 'get',
                url: url,
                dataType: 'json',
                // delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function(data, params) {
                    return {
                        results: data.items,
                    };
                },
                cache: true
            },
            allowClear: true,
            placeholder: placeholder || "custom",
            minimumInputLength: 2,            
        })
    }

    function empty_select2(selector) {
        $(selector).html('').select2({
            data: [{
                id: '',
                text: ''
            }]
        });
    }
    custom_select2("._products_select", "{{url('get-all-sale-products')}}", 'Search for a product');
    $("._products_select").on('change', function(data) {
        var id = $(this).val();        
        $.ajax({
            type: 'GET',
            url: '{{url("get-stock")}}/' + id,            
            success: function(data) {                
                var table_body = $("table.order-list tbody"); // assign table body to variable used in different area   
                var new_row = `<tr class="table_append_rows" id="table_append_rows_` + row_id + `" >

<td class="product_count">` + product_count + `</td>
<td class="name">
    <input type="hidden" name="id[]" value="` + data.productArr.id + `"/>
     <input type="hidden" id="product_id" name="product_id[]" value="` + data.productArr.product_id + `"/>
     <input type="hidden" id="product_name" name="product_name[]" value="` + data.productArr.product.name + `"/>` + data.productArr.product.name + `
</td>
<td class="batch_no_id">
    <button type="button" id="batch_no_id" data-bs-toggle="modal" class="btn btn-primary btn-sm edit_modal batch_no_id" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-product_id="` + data.productArr.product_id + `" >` + data.productArr.batch.batch_no + `
        <i class="dripicons-document-edit"></i>
    </button>
</td>
<td class="qty">
<input type="number" class="form-control all_qty" id="all_qty" min="1" value="` + data.productArr.quantity + `" step="any" required/>
</td>
<td class="qty_sale">
<input type="number" class="form-control qty_sale" id="qty_sale" min="1" onkeyup="do_calculation()" name="quanity[]" value="1" step="any" required/>
</td>
<td class="purchase_price">
<input type="number" class="form-control purchase_price price" id="price" onkeyup="do_calculation()" value="` + data.productArr.price + `"  name="purchase_price[]" step="any" required/>
<input type="hidden" id="total_rate" class="total_rate" name=total_rate[] value="` + (data.productArr.quantity * data.productArr.price) + `"/>
</td>
<td class="bouns">
<input type="number" class="form-control bouns" onkeyup="do_calculation()" value="0" id="bouns" name="bouns[]" step="any"/>
</td>
<td class="purchase_discount">
<input type="number" class="form-control purchase_discount" id="purchase_discount" onkeyup="do_calculation()" value="` + data.productArr.product.purchase_discount + `"  name="purchase_discount[]" step="any"/>
</td>
<td class="after_discount">
<input type="number" class="form-control after_discount" id="after_discount" value="0"  name="after_discount[]" step="any" readonly/>
</td>
<td class="sales_tax">
<input type="number" class="form-control sales_tax" onkeyup="do_calculation()" value="` + data.productArr.product.sale_tax_value + `" id="sales_tax" name="sales_tax[]" step="any" required/>
</td>
<td class="line_total">
<input type="number" class="form-control line_total" value="0" id="line_total"  name="line_total[]" step="any" readonly/>
</td>
<td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>
<input type="hidden" class="hidden_total" name="total" value="0">
<input type="hidden" class="sub_total" name="sub_total" value="0">
<input type="hidden" class="table_batch_id" name="table_batch_id[]" value="` + data.productArr.batch_id + `">
</tr>`;
                // <input type="hidden" class="hidden_unit_tax"        name="unit_tax[]" value="0">
                table_body.append(new_row); // append new row to table body
                product_count++;
                row_id++;
                do_calculation();
                empty_select2("._products_select"); // empty the product selection after row appending
                custom_select2("._products_select", "{{url('get-all-sale-products')}}", 'Search for a product');
            }
        });
    });
    $(document).on('click', '.delete_row', function() {
        $(this).closest('tr').remove();
        do_calculation();
    });

    function do_calculation() {
        // Declare variable for grand calculation
        var line_total = 0;
        var sub_total = 0;
        var grand_discount = 0;
        var total_qty = 0;
        var product_count = 1;
        var grand_subtotal = 0;
        var total_rate = 0;


        $('.table_append_rows').each(function() {
            $(this).find('.product_count').text(product_count);
            var qty = $(this).find('.qty_sale').find('input').val();
            total_qty += parseInt(qty);
            var purchase_price = parseFloat($(this).find('.purchase_price').find('input').val());
            var sale_qty = parseInt($(this).find('#qty_sale').val());
            $(this).find('.hidden_purchase_price').val(purchase_price);
            total_rate = parseFloat(purchase_price * sale_qty).toFixed(2);
            $(this).find('#total_rate').val(total_rate);
            purchase_discount = $(this).find('.purchase_discount').find('input').val();
            var price_after_discount = parseFloat((total_rate * purchase_discount) / 100).toFixed(2);
            $(this).find('.after_discount').val(price_after_discount);
            var all_qty = parseFloat($(this).find('.qty_sale').val());
            grand_discount += (purchase_discount * all_qty);
            var sales_tax = parseFloat($(this).find('#sales_tax').val());
            if (isNaN(sales_tax)) {
                sales_tax = 0;
            }
            var row_sub_total = parseFloat(total_rate - price_after_discount + sales_tax).toFixed(2);
            $(this).find('.sub_total').val(row_sub_total);
            $(this).find('.line_total').val(row_sub_total);
            grand_subtotal = (parseFloat(grand_subtotal) + parseFloat(row_sub_total)).toFixed(2);
            $("._tfootTotal").text(grand_subtotal);
            $(".hidden_total").val(grand_subtotal);
            $("input[name='total_qty']").val(total_qty);
            $("input[name='item']").val(product_count);
            product_count++;
        });        
        var qty_new = $('.qty_sale').find('input').val();
        var s_qty = parseFloat($('.all_qty').val());
        var line = parseFloat($('.after_discount').val());
        if (qty_new > s_qty) {
            alert("Quantity Must be less then Stock Quantity!");
            $('.qty_sale').find('input').val(1);
            $('.line_total').find('input').val(line);
            $("._tfootTotal").text(line);
        }
    }
    // @@@@@@@@@@@@@@@@@@@@@@   batch  @@@@@@@@@@@@@@@@
    $(document).on('click', '.edit_modal', function() {
        var row_id = $(this).closest('.table_append_rows').attr('id');
        $('input[name="edit_row_id"]').val(row_id);
        var product_id = $(this).data('product_id');
        var product_id_modal = $(this).data('product_id');
        $.ajax({
            type: 'get',
            url: "{{ route('getBatches')}}",
            data: {
                'product_id': product_id
            },
            datatype: 'json',
            success: function(data) {                
                var tr = $(this).parent().parent();
                var op = "";
                $('#product_modal').val(product_id_modal); //this is used to get against this product batch
                $.each(data, function(k, val) {
                    if (val.batch.id != null && val.batch.id != "") {
                        op += "<option value='" + val.batch.id + "' data-price=" + val.price + "  data-quantity=" + val.quantity + ">" + val.batch.batch_no + " " + " | Quantity -> " + val.quantity + " " + " | Expiry Date -> " + val.batch.date + "</option>";
                    }
                });
                $('input[name="edit_row_id"]').val(row_id);
                $('#edit_batch').html(" ");
                $('#edit_batch').append(op);
            },
        });
    });


    // @@@@@@@@@@@@@@@@@@@@@@ batch update @@@@@@@@@@@@@@@@    
    $(document).on('click', '.update_modal', function() {        
        var product_id = $('#product_modal').val();
        var price = $('#edit_batch :selected').data('price');
        var quantity = $('#edit_batch :selected').data('quantity');
        var batchId = $('#edit_batch :selected').val();
        var batch_id_modal = $("#edit_batch :selected").text();
        var row_id_for_editing = $('input[name="edit_row_id"]').val();
        $('#' + row_id_for_editing).find('.all_qty').val(quantity);
        $('#' + row_id_for_editing).find('#batch_no_id').val(batch_id_modal);
        $('#' + row_id_for_editing).find('.price').val(price);
        $('#' + row_id_for_editing).find('.table_batch_id').val(batchId);
        $(".bs-example-modal-lg").modal('hide');
        do_calculation();
    });
</script>

@endpush