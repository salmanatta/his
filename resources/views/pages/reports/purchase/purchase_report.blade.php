@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Purchase Invoice Approval</h3>
        </div>
        <br>

        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('purchaseReport') }}">
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
                                        <label for="formrow-inputCity" class="form-label">Supplier</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control select2" name="supplier_id" id="supplier_id">
                                            <option value="" >-- Select Supplier --</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" >{{ $supplier->name }}</option>
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
                                            <option value="PURCHASE">Purchase</option>
                                            <option value="PURCHASE RETURN">Purchase Return</option>
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
                            <th scope="col">Invoice No</th>
                            <th scope="col">Date</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Discount</th>
                            <th scope="col">S.Tax</th>
                            <th scope="col">A.Tax</th>
                            <th scope="col">Freight</th>
                            <th scope="col">Net Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
                        </tr>
                        </thead>
                        <tbody id="append_here">
                        @if(isset($purchaseData))
                        @foreach ($purchaseData as $data)
                            <tr>
                                <td style="text-align:center;">{{ $data->invoice_no }}</td>
                                <td>{{ $data->invoice_date }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->supplier->name }}</td>
                                <td>{{ $data->trans_type }}</td>
                                <td>{{ $data->lineTotal + $data->sumDiscountAmount - $data->sumSaleTax - $data->sumAdvancTax }}
                                </td>
                                <td>{{ $data->sumDiscountAmount }}</td>
                                <td>{{ $data->sumSaleTax }}</td>
                                <td>{{ $data->sumAdvancTax }}</td>
                                <td>{{ $data->freight }}</td>
                                <td>{{ $data->lineTotal }}</td>
                                <td style="text-align:center;">{{ $data->inv_status }}</td>
                                @if($data->inv_status == 'Post')
                                    <td></td>
                                @else
                                    <td style="text-align:center;">
                                        <a href="{{ url('view-purchase-invoice/'.$data->id) }}"
                                           class="fas fa-check"></a>
                                    </td>
                                @endif
                                <td>
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
            <script>
                $(document).ready(function () {
                    $('#updateStatus').click(function () {
                        alert('fsdf');
                        alert($this.name);
                        // $ajax({
                        //     type : 'post',

                        // })

                    });


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
                        url: "{{ route('searchPurchaseReport') }}",
                        data: {
                            'from_date': from_date,
                            'to_date': to_date
                        },
                        success: function (data) {
                            console.log(data);
                            var html = "";
                            var product_count = 0;
                            var linetotal = parseFloat(data.lineTotal) + parseFloat(data.sumDiscountAmount) -
                                parseFloat(data.sumSaleTax) - parseFloat(data.sumAdvancTax);
                            $.each(data, function (l, val) {

                                product_count++;
                                var rt = "{{ url('purchase_details') }}/" + val.id;

                                html += `<tr>
                <td >` + product_count + `</td>
                <td >` + val.invoice_no + `</td>
                <td >` + val.date + `</td>
                <td >` + val.user.name + `</td>
                <td >` + val.supplier.name + `</td>
                <td >` + val.branch.name + `</td>
                <td >` + linetotal + `</td>
                <td >` + val.sumDiscountAmount + `</td>
                <td >` + val.sumSaleTax + `</td>
                <td >` + val.sumAdvancTax + `</td>
                <td >` + val.freight + `</td>
                <td >` + val.total + `</td>
                <td ><a href="${rt}"  style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                View Details </a></td>
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

            ;
        </style>
        <th scope="col">Action</th>
