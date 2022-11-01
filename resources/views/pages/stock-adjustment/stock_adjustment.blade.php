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
                                    <h4 class="card-title mb-4 text-center">Stock Adjustment</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <h3>
                                            <b>
                                                <label class="form-label" for="invStatus"
                                                       style="color:red">{{ isset($sale) ? $sale->inv_status : 'Un-Post' }}</label>
                                            </b>
                                        </h3>
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
                                            <label class="form-label"
                                                   for="Customer">Invoice Date</label>
                                            <input type="text" name="invoice_date" value="{{ date('m/d/Y') }}"
                                                   id="fiveDays" class="form-control">
                                        </span>
                                                        </p>
                                                        <input type="hidden" name="trans_type">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label"
                                                           for="description">Product</label>
                                                    <select
                                                        class="select2 form-control" id="products_select"
                                                        name="product_id">
                                                    </select>
                                                    @error('product_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-4"></div>
                                            <div class="col-4">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label" for="Customer">Adjustment Type</label>
                                                    <select class="form-control" name="customer_id">
                                                        <option value="">Positive Adjustment</option>
                                                        <option value="">Negative Adjustment</option>
                                                    </select>
                                                    @error('customer_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label"
                                                           for="description">Remarks</label>
                                                    <textarea placeholder="Remarks" name="description"
                                                              rows="5"
                                                              class="form-control _description">{{ isset($sale) ? $sale->description : old('description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 order-list">
                                            <thead>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th scope="row">Products</th>
                                                <th scope="row">Batch</th>
                                                <th scope="row" class="text-center">Expiry Date</th>
                                                <th scope="row">Current Quantity</th>
                                                <th scope="row">Quantity</th>
                                                <th scope="row" class="text-end">Price</th>
                                                <th scope="row" class="text-end">Line Total</th>
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
                                                <td style="width:10%;text-align:right">Grand Total</td>
                                                <td style="width:8%;text-align:right"
                                                    class="_tfootTotal"> {{ 0 }}</td>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Batch Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        <button type="button" class="btn btn-primary update_modal" data-bs-dismiss="modal">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('script')
    <script>
        function custom_select2(selector, url, placeholder = false) {
            $(selector).select2({
                ajax: {
                    type: 'get',
                    url: url,
                    dataType: 'json',
                    // delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                        };
                    },
                    processResults: function (data, params) {
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

        custom_select2("#products_select", "{{url('get-all-sale-products')}}", 'Search for a product');
        // function empty_select2(selector) {
        //     $(selector).html('').select2({
        //         data: [{
        //             id: '',
        //             text: ''
        //         }]
        //     });
        // }
        var row_id = 1;
        var product_count = 1;
        $('#products_select').on('change', function (data) {
            var id = $(this).val();
            // console.log(id);
            if (id != null) {
                $.ajax({
                    type: 'GET',
                    url: '{{url("get-stock")}}/' + id,
                    success: function (data) {
                        // console.log(data);
                        var table_body = $("table.order-list tbody");
                        var new_row = `<tr class="table_append_rows" id="table_append_rows_` + row_id + `">
        <td width="5%" class="product_count">` + product_count + ` </td>
        <td width="25%" class="name">
            <input type="hidden" name="product_id[]" value="` + data.productArr.product.id + `"/>
            <input type="hidden" name="product_name[]" value="` + data.productArr.product.name + `"/>` + data.productArr.product.name + `
        </td>
        <td width="15%" class="batch_no">
            <button type="button" data-bs-toggle="modal" class="btn btn-primary btn-sm edit_modal batch_no_id" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-product_id="` + data.productArr.product_id + `" >` + data.productArr.batch.batch_no + `
                <i class="dripicons-document-edit"></i>
            </button>
        </td>
        <td width="10%" class="expiry_dater">
            <input type="text" class="form-control expiry_date text-center"  value="` + data.productArr.batch.date + `" name="expiry_date[]" step="any" readonly/>
        </td>
        <td width='10%' class="text-center">
            <input type="number" class="form-control all_qty" min="1" value="` + data.productArr.currentQty + `" step="any" readonly/>
        </td>
        <td width='10%' class="quanity">
            <input type="number" class="form-control quanity" style="text-align:center" min="1" onKeyup="do_calculation()" name="quanity[]" value="1" step="any" required/>
        </td>
        <td width='10%' class="purchase_price">
            <input type="number" class="form-control trade_price text-end" style="text-align:center" onKeyup="do_calculation()" value="` + data.productArr.product.trade_price + `"  name="purchase_price[]" step="any" required/>
        </td>
        <td width="10%" class="line_total text-end">
            <input type="number" class="form-control line_total text-end" style="text-align:right" value="` + (data.purchase_price) + `"  name="line_total[]" step="any" readonly/>
        </td>
        <td width="5%">
            <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
            <input type="hidden" class="sub_total" name="sub_total" value="0">
            <input type="hidden" class="hidden_total" name="total">
        </td>
        </tr>`;
                        table_body.append(new_row);
                        product_count++;
                        row_id++;
                    }
                })
            };
        });
$(document).on('click','.edit_modal',function (){
    var row_id = $(this).closest('.table_append_rows').attr('id');
    var product_id = $(this).data('product_id');
    $.ajax({
        type: 'get',
        url: "{{ route('getBatches')}}",
        data: {
            'product_id': product_id
        },
        datatype: 'json',
        success: function (data) {
            var tr = $(this).parent().parent();
            var op = "";
            $('#product_modal').val(product_id); //this is used to get against this product batch
            $.each(data, function (k, val) {
                if (val.batch.id != null && val.batch.id != "") {
                    op += "<option value='" + val.batch.id + "' data-price=" + val.price + "  data-quantity=" + val.currentQty + "data-expiry=" + val.batch.date + ">" + val.batch.batch_no + " " + " | Quantity -> " + val.currentQty + " " + " | Expiry Date -> " + val.batch.date + "</option>";
                }
            });
            $('input[name="edit_row_id"]').val(row_id);
            $('#edit_batch').html(" ");
            $('#edit_batch').append(op);
        },
    });
});
    </script>
@endpush
