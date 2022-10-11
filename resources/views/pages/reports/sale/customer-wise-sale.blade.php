@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Customer Wise Sale</h3>
        </div>
        <div class="row">
            <form method="GET" action="{{ url('customer.sale.view') }}">
                <div class="row printBlock">
                    <div class="row">

                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="formrow-inputCity" class="form-label">From Date</label>
                                </div>
                                <div class="col-4">

                                    <input type="date" name="from_date" class="form-control to_date printBlock"
                                           id="from_date" value={{ isset($_GET['from_date']) ? $_GET['from_date'] :
                                    date('Y-m-d')}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="formrow-inputCity" class="form-label">To Date</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="to_date" class="form-control to_date printBlock"
                                           id="to_date" value={{ isset($_GET['to_date']) ? $_GET['to_date'] :
                                    date('Y-m-d')}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="formrow-inputCity" class="form-label">Customer</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control select2" name="customer_id" id="customer_id">
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="formrow-inputCity" class="form-label">Transaction Type</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control" name="trans_type" id="trans_type">
                                        <option value="SALE">Sale</option>
                                        <option value="SALE RETURN">Sale Return</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between d-print-none">
                    <button type="submit" id="search_btn0000" class="btn btn-primary search_btn float-left printBlock">
                        Search
                    </button>
                    <div class="pull-right btn-group btn-group-lg hidden-print printBlock">
                        <a id="print"  target="_blank" class="btn btn-info">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table align-middle table-nowrap table-hover" id="datatable-buttons">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="">#</th>
                                            <th scope="col">Invoice No</th>
                                            <th scope="col">Invoice Date</th>
                                            <th scope="col">Salesman</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Sale Tax</th>
                                            <th scope="col">Advance Tax</th>
                                            <th scope="col">Total Amount</th>
                                            <th scope="col" class="d-print-none" style="text-align: center;">View</th>
                                            <th scope="col" class="d-print-none" style="text-align: center;">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody id="append_here">
                                        @if(isset($sale_Master))
                                        @php $counter = 1 @endphp
                                        @foreach ($sale_Master as $sale)
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ $sale->invoice_no }}</td>
                                                <td>{{ date('d-m-Y', strtotime($sale->invoice_date)) }}</td>
                                                <td>{{ $sale->salesman->first_name.' '.$sale->salesman->last_name }}</td>
                                                <td>{{ $sale->sumLineTotal + $sale->sumDiscountAmount - $sale->sumAdvTaxValue - $sale->sumSalesTax }}</td>
                                                <td>{{ $sale->sumDiscountAmount }}</td>
{{--                                                <td>{{ $sale->sumLineTotal + $data->sumDiscountAmount - $data->sumAdvTaxValue - $data->sumSalesTax }}</td>--}}
                                                <td>{{ $sale->sumSalesTax  }}</td>
                                                <td>{{ $sale->sumAdvTaxValue }}</td>
                                                <td>{{ $sale->total }}</td>
                                                <td style="text-align: center;">
                                                    <a href="{{ url('sale_details/'.$sale->id) }}" class="text-primary">
                                                        <i class="mdi mdi-eye font-size-18 waves-effect waves-light d-print-none" style="border-radius: 44px;"></i>
                                                    </a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="{{ url('sale-invoice/'.$sale->id) }}" style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                                                        Print Invoice </a>
                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by The Blue
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@stop
@push('script')
    <script>
        $("body").on('click' , "#print", function (e) {

            var val = "<?= url('/') . '/customer-wise-sale-pdf' ?>";
            console.log( $("#from_date").val());
            console.log( $("#to_date").val());
            window.location = val+"?from="+  $("#from_date").val() +"&to=" + $("#to_date").val() + "&customer=" + $("#customer_id").val() + "&trans=" +  $("#trans_type").val();
        });

        var product_count = 1;
        var row_id = 1;
        $("#search_btn").on('click', function (e) {
            e.preventDefault();
            var from_date = $(".from_date").val();
            var to_date = $(".to_date").val();
            var formData = new FormData(document.getElementById("add_form"));
            console.log(formData);
            $.ajax({
                type: 'get',
                url: "{{ route('searchSaleReport') }}",
                data: {
                    'from_date': from_date,
                    'to_date': to_date
                },
                success: function (data) {
                    console.log(data);
                    var html = "";
                    var product_count = 0;
                    $.each(data, function (l, val) {
                        product_count++;
                        var rt = "{{ url('sale_details') }}/" + val.id;
                        html += `<tr>
                                    <td >` + product_count + `</td>
                                    <td >` + val.invoice_no + `</td>
                                    <td >` + val.date + `</td>
                                    <td >` + val.user.name + `</td>
                                    <td >` + val.customer.name + `</td>
                                    <td >` + val.branch.name + `</td>
                                    <td >` + val.sub_total + `</td>
                                    <td >
                                        <a href="${rt}"  style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                                        View Details </a>
                                    </td>
                                </tr>`;
                    });
                    $('#append_here').empty();
                    $('#append_here').append(html);
                },
            });
        });
    </script>
@endpush

<style type="text/css">
    @media print {
        .printBlock {
            display: none !important;
        }
</style>
