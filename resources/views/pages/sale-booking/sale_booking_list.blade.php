@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Sale Booking Detail</h3>
        </div>
        <br>
        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('sale-booking') }}">
                <div class="row">
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
                                        <label for="customer_id" class="form-label">Customer</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control select2" name="customer" id="customer">
                                            <option value="">-- Select Customer --</option>
                                            @if(isset($customers))
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="formrow-inputCity" class="form-label">Salesman</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control select2" name="salesman" id="salesman">
                                            <option value="">-- Select Salesman --</option>
                                            @if(isset($salesman))
                                                @foreach($salesman as $data)
                                                    <option value="{{ $data->id }}">{{ $data->first_name.' '.$data->last_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between d-print-none">
                        <button type="submit" id="search"
                                class="btn btn-primary search_btn float-left printBlock">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 col-md-12">
                            <table class="table align-middle table-nowrap table-hover" id="datatable-buttons">
                                <thead class="table-light">
                                <tr>
                                    <th style="text-align: center;">Booking No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Salesman</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total Items</th>
                                    <th scope="col" class="d-print-none" style="text-align: center;">View</th>
                                    <th scope="col" class="d-print-none" style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="append_here">
                                @if(isset($booking))
                                    @foreach ($booking as $data)
                                        <tr>
                                            <td style="text-align: center;">{{ $data->invoice_no }}</td>
                                            <td>{{ date('d-m-Y', strtotime($data->sale_date)) }}</td>
                                            <td>{{ $data->customer->name }}</td>
                                            <td>{{ $data->salesman->first_name.' '. }}</td>
                                            <td>{{ $data->trans_type }}</td>
                                            @if($data->inv_status == 'Un-Post' )
                                                <td style="text-align: center;">
                                                    <a href="{{ url('viewSaleInvoice/'.$data->id) }}"
                                                       class="text-danger">
                                                        <i class="mdi mdi-pencil font-size-18 waves-effect waves-light"
                                                           style="border-radius: 44px;"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td style="text-align: center;">

                                                <a href="{{ url('sale-invoice/'.$data->id)}}"
                                                   style="border-radius: 44px;"
                                                   class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                                                    Print Invoice </a>
                                            </td>
                                        </tr>
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

