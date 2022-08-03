@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="text-center">
        <h3> Item Report</h3>
    </div><br>
    <div class="row">
        <!-- <form method="get" id="add_form" action=""> -->
        <form method="GET" action="">
            <div class="row printBlock">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">From Date</label>
                        <input type="date" name="from_date" class="form-control from_date printBlock" id="from_date" value='<?php echo date('Y-m-d'); ?>'>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">To Date</label>
                        <input type="date" name="to_date" class="form-control to_date printBlock" id="to_date" value='<?php echo date('Y-m-d'); ?>'>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between d-print-none">
                <button type="submit" id="search_btn000" class="btn btn-primary search_btn float-left printBlock">Search</button>
                <div class="pull-right btn-group btn-group-lg hidden-print printBlock">
                    <a href="javascript:window.print()" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
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
                            <th scope="col">Pur Qty</th>
                            <th scope="col">Pur Price</th>
                            <th scope="col">Pur Ret Qty</th>
                            <th scope="col">Pur Price</th>
                            <th scope="col">Sale Qty</th>
                            <th scope="col">Sale Ret Qty</th>
                            <th scope="col">Closeing Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Amount</th>

                        </tr>
                    </thead>
                    <tbody id="append_here">
                        @foreach($product as $prod)
                            <tr>
                                <td>{{ $prod->name }}</td>
                                <td>{{ $prod->purchQty }}</td>
                                <td>{{ $prod->purchPrice }}</td>
                                <td>{{ $prod->purchReturnQty }}</td>
                                <td>{{ $prod->purchReturnPrice }}</td>
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
                    </script> © Skote.
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