@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3>Date Wise Stock Register</h3>
        </div>
        <br>
        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('date-wise-stock-data') }}">
                <div class="row printBlock">
                    <div class="row">
                        <div class="col-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="formrow-inputCity" class="form-label">From Date</label>
                                </div>
                                <div class="col-4">
                                    <input type="date" name="report_from_date" class="form-control to_date printBlock"
                                           id="from_date" value={{ isset($_GET['report_from_date']) ? $_GET['report_from_date'] :
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
                                    <input type="date" name="report_to_date" class="form-control to_date printBlock"
                                           id="to_date" value={{ isset($_GET['report_to_date']) ? $_GET['report_to_date'] :
                                    date('Y-m-d')}}>
                                    <input type="hidden" name="report_branch_id" value="{{ auth()->user()->branch_id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between d-print-none">
                        <button type="submit" id="search_btn000"
                                class="btn btn-primary search_btn float-left printBlock">Search
                        </button>
                        <div class="pull-right btn-group btn-group-lg hidden-print printBlock">
                            <a href="javascript:window.print()" class="btn btn-info"><i class="fa fa-print"></i>
                                Print</a>
                        </div>
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
                            <th scope="col">Item Name</th>
                            <th class="text-center">Purchase Qty</th>
                            <th class="text-center">Purchase Price</th>
                            <th class="text-center">Purchase Return Qty</th>
                            <th class="text-center">Purchase Price</th>
                            <th class="text-center">Sale Qty</th>
                            <th class="text-center">Sale Price</th>
                            <th class="text-center">Sale Ret Qty</th>
                            <th class="text-center">Sale Ret Price</th>
                            <th class="text-center">Transfer IN</th>
                            <th class="text-center">Transfer Out</th>
                            <th class="text-center">Closing Qty</th>
                            <th class="text-center">Total Amount</th>
                        </tr>
                        </thead>
                        <tbody id="append_here">
                        @foreach($product as $prod)
                            <tr>
                                <td>{{ $prod->name }}</td>
                                <td class="text-center">{{ $prod->purchQty }}</td>
                                <td class="text-center">{{ $prod->purchPrice }}</td>
                                <td class="text-center">{{ $prod->purchReturnQty }}</td>
                                <td class="text-center">{{ $prod->purchReturnPrice }}</td>
                                <td class="text-center">{{ $prod->saleQty }}</td>
                                <td class="text-center">{{ $prod->salePrice }}</td>
                                <td class="text-center">{{ $prod->saleReturnQty }}</td>
                                <td class="text-center">{{ $prod->saleReturnPrice }}</td>
                                <td class="text-center">{{ $prod->transInQty }}</td>
                                <td class="text-center">{{ $prod->transOutQty }}</td>
                                <td class="text-center">{{ $prod->closingQty }}</td>
                                <td></td>
                            </tr>
                        @endforeach
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
@endpush
