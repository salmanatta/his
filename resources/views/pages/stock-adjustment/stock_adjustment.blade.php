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
                                            <input type="text" name="invoice_date"
                                                   value="{{ date('m/d/Y') }}"
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
                                                        class="select2 form-control products_select"
                                                        id="products_select" name="product_id">
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
                                        <table class="table mb-0 order-list _saleTable">
                                            <thead>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th scope="row">Products</th>
                                                <th scope="row">Batch</th>
                                                <th scope="row">Stock Quantity</th>
                                                <th scope="row">Quantity</th>
                                                <th scope="row">Price</th>
                                                <th scope="row">Line Total</th>
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
                    <h5 class="modal-title" id="myLargeModalLabel"> Batch Details</h5>
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
    function empty_select2(selector) {
        $(selector).html('').select2({
            data: [{
                id: '',
                text: ''
            }]
        });
    }
    $('#products_select').on('change',function (data){
        console.log('hree');
        empty_select2("#products_select");
        custom_select2("#products_select","{{url('get-all-sale-products')}}", 'Search for a product')
    });

</script>
@endpush
