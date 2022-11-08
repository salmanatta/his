@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Stock Adjustment Approval</h3>
        </div>
        <br>

        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('adjustment-approval') }}">
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
                                        <label for="trans_type" class="form-label">Adjustment Type</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control" name="adjustment_type" id="adjustment_type">
                                            <option value="Positive Adjustment" {{ isset($_GET['adjustment_type']) ? $_GET['adjustment_type'] == 'Positive Adjustment' ? 'selected' : '' :''  }}>Positive Adjustment</option>
                                            <option value="Negative Adjustment" {{ isset($_GET['adjustment_type']) ? $_GET['adjustment_type'] == 'Negative Adjustment' ? 'selected' : '' :''  }}>Negative Adjustment</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="trans_type" class="form-label">Transaction Type</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control" name="trans_type" id="trans_type">
                                            <option value="Un-Post" {{ isset($_GET['trans_type']) ? $_GET['trans_type'] == 'Un-Post' ? 'selected' : '' :''  }}>Un-Post</option>
                                            <option value="Post" {{ isset($_GET['trans_type']) ? $_GET['trans_type'] == 'Post' ? 'selected' : '' :''  }}>Post</option>
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
                        {{--                        <div class="pull-right btn-group btn-group-lg hidden-print printBlock">--}}
                        {{--                            <a id="print" target="_blank" class="btn btn-info">--}}
                        {{--                                <i class="fa fa-print"></i> Print--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </form>
        </div>
        <!-- end page title -->


        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table align-middle table-nowrap table-hover" id="datatable-buttons">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Invoice No</th>
                            <th class="text-center">Date</th>
                            <th>User Name</th>
                            <th>Adjustment Type</th>
                            <th>Qty</th>
                            <th class="text-end">Net Amount</th>
                            <th class="text-center">Status</th>
                            <th>Edit</th>
                            <th class="text-center">View</th>
                        </tr>
                        </thead>
                        <tbody id="append_here">
                        @if(isset($adjustments))
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($adjustments as $data)
                                {{$counter++}}
                                <tr>
                                    <td style="text-align:center;">{{ $counter }}</td>
                                    <td style="text-align:center;">{{ $data->invoice_no }}</td>
                                    <td style="text-align:center;">{{ date('d-m-Y', strtotime($data->invoice_date)) }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->trans_type }}</td>
                                    <td>{{ $data->sumQty }}</td>
                                    <td style="text-align:end;">{{ $data->sumLineTotal }}</td>
                                    <td style="text-align:center;">{{ $data->inv_status }}</td>
                                    @if($data->inv_status == 'Post')
                                        <td></td>
                                    @else
                                        <td class="text-danger text-center">
                                            <a href="{{ url('stock-adjustment/'.$data->id) }}"
                                               class="mdi mdi-pencil font-size-18 waves-effect waves-light text-danger"></a>
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ url('purchase-invoice') . '/' . $data->id }}"
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

        @stop
        @push('script')
{{--            <script>                --}}
{{--                var product_count = 1;--}}
{{--                var row_id = 1;--}}
{{--                $("#search_btn").on('click', function (e) {--}}
{{--                    e.preventDefault();--}}
{{--                    var from_date = $(".from_date").val();--}}
{{--                    var to_date = $(".to_date").val();--}}
{{--                    var formData = new FormData(document.getElementById("add_form"));--}}
{{--                    console.log(formData);--}}
{{--                    $.ajax({--}}
{{--                        type: 'get',--}}
{{--                        url: "{{ route('searchPurchaseReport') }}",--}}
{{--                        data: {--}}
{{--                            'from_date': from_date,--}}
{{--                            'to_date': to_date--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            console.log(data);--}}
{{--                            var html = "";--}}
{{--                            var product_count = 0;--}}
{{--                            var linetotal = parseFloat(data.lineTotal) + parseFloat(data.sumDiscountAmount) ---}}
{{--                                parseFloat(data.sumSaleTax) - parseFloat(data.sumAdvancTax);--}}
{{--                            $.each(data, function (l, val) {--}}

{{--                                product_count++;--}}
{{--                                var rt = "{{ url('purchase_details') }}/" + val.id;--}}

{{--                                html += `<tr>--}}
{{--                <td >` + product_count + `</td>--}}
{{--                <td >` + val.invoice_no + `</td>--}}
{{--                <td >` + val.date + `</td>--}}
{{--                <td >` + val.user.name + `</td>--}}
{{--                <td >` + val.supplier.name + `</td>--}}
{{--                <td >` + val.branch.name + `</td>--}}
{{--                <td >` + linetotal + `</td>--}}
{{--                <td >` + val.sumDiscountAmount + `</td>--}}
{{--                <td >` + val.sumSaleTax + `</td>--}}
{{--                <td >` + val.sumAdvancTax + `</td>--}}
{{--                <td >` + val.freight + `</td>--}}
{{--                <td >` + val.total + `</td>--}}
{{--                <td ><a href="${rt}"  style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">--}}
{{--                View Details </a></td>--}}
{{--            </tr>`;--}}
{{--                            });--}}
{{--                            $('#append_here').empty();--}}
{{--                            $('#append_here').append(html);--}}
{{--                        },--}}
{{--                    });--}}
{{--                });--}}
{{--            </script>--}}
        @endpush

        <style type="text/css">
            @media print {
                .printBlock {
                    display: none !important;
                }

            ;
        </style>
        <th scope="col">Action</th>
