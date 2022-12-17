@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if(isset($sale))
                    <form method="post" action="{{route('sale_invoices.update',$sale->id)}}">
                    @method('PATCH')
                    @else
                    <form method="post" action="{{ url('sales-target') }}">
                    @endif
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title mb-4 text-center">Sales Target </h3>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label"
                                                           for="Customer">Target Start Date</label>
                                                    <input type="date" name="start_date"
                                                           value="{{ isset($sale)? date('d/m/Y', strtotime($sale->invoice_date)) : date('m/d/Y') }}"
                                                            class="form-control" required>
                                                    <input type="hidden" name="branch_id" value="{{ auth()->user()->branch_id }}">
                                                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label"
                                                           for="Customer">Target End Date</label>
                                                    <input type="date" name="end_date"
                                                           value="{{ isset($sale)? date('d/m/Y', strtotime($sale->invoice_date)) : date('m/d/Y') }}"
                                                           class="form-control" required>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label"
                                                           for="Customer">Supplier</label>
                                                    <select class="form-control select2" id="supplier"
                                                            name="supplier_id" required>
                                                        <option disabled selected> Select Supplier</option>
                                                        @foreach($suppliers as $data)
                                                            <option
                                                                value="{{ $data->id }}" {{ isset($sale) ? ($sale->salesman_id == $saleman->id ? 'selected' : '' ) : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label" for="group">Group</label>
                                                    <select class="form-control" id="group" name="group">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4"></div>
                                            <div class="col-4">

                                                <div class="col-12 mb-3">
                                                    <label class="form-label"
                                                           for="description">Remarks</label>
                                                    <textarea placeholder="Remarks" name="remarks" rows="12"
                                                              class="form-control">{{ isset($sale) ? $sale->description : old('remarks') }}</textarea>
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
                                            <th scope="row">#</th>
                                            <th scope="row">Products</th>
                                            <th scope="row">Target Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-body table_append_rows">
                                        </tbody>
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
            </div>
        </div>
    </div>
@stop

@push('script')
    <script>
        // ==================== Start Group depended dropdown ========================
        $('#supplier').change(function () {
            var supplier = $('#supplier').val();
            $.ajax({
                url: "{{ url('getSupplierGroup') }}" + "/" + supplier,
                method: 'get',
                success: function (data) {
                    $('#group').empty();
                    var grouphtml = `<option value="">-- Select Group --</option>`;
                    for (var group = 0; group < data.length; group++) {
                        grouphtml += `<option value="` + data[group].id + `">` + data[group].name + `</option>`;
                    }
                    $('#group').append(grouphtml);
                },
            });
        });
        // ==================== End  Group depended dropdown ========================
        $('#group').change(function () {
            var group = $('#group').val();
            $.ajax({
                url: "{{ url('getGroupProduct') }}" + "/" + group,
                method: 'get',
                success: function (data) {
                    console.log(data);
                    $('.table_append_rows').empty();
                    var row_id = 1;
                    for (var i = 0; i < data.length; i++) {

                        var html = '<tr>' +
                            '<td>' + row_id + '</td>' +
                            '<td>' + data[i].product.name +
                            '<input name="product_id[]" type="hidden" value="' + data[i].product_id + '">' +
                            '</td>' +
                            '<td><input style="border:none" class="form-control" name="target_qty[]" type="text" value=""></td>' +
                            '</tr>';
                        $('.table_append_rows').append(html);
                        row_id++;
                    }

                },
            });
        });
    </script>
@endpush
