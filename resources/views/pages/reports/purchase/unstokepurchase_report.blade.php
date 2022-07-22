@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="container-fluid">
    <div class="text-center"><h3>Droft Purchase Reports</h3></div><br>
        <div class="row" >
            <form method="get" id="add_form" action="">
                <div class="row printBlock">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">From Date</label>
                            <input type="date" name="from_date" class="form-control from_date printBlock"
                                id="from_date" value='<?php echo date('Y-m-d');?>'>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">To Date</label>
                            <input type="date" name="to_date" class="form-control to_date printBlock" id="to_date" value='<?php echo date('Y-m-d');?>'>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between d-print-none">
                    <button type="button" id="search_btn"
                        class="btn btn-primary search_btn float-left printBlock">Search</button>
                    <div class="pull-right btn-group btn-group-lg hidden-print printBlock">
                        <a href="javascript:window.print()" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
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
                            <table class="table align-middle table-nowrap table-hover ">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="">#</th>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Total</th>
                                        <th scope="col" class="d-print-none">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="append_here">
                                </tbody>
                            </table>
                        </div>
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
</div>
@stop
@push('script')
<script>
    var product_count=1;
    var row_id=1;
    $("#search_btn").on('click',function(e){
    e.preventDefault();
    var from_date = $(".from_date").val(); 
    var to_date = $(".to_date").val(); 
        var formData = new FormData(document.getElementById("add_form"));
        console.log(formData);
$.ajax({
       type:'get',
       url: "{{ route('searchUnstokePurchaseReport')}}",
       data:{'from_date':from_date,
       'to_date':to_date
     },
success:function(data){
             console.log(data);
             var html="";
             var product_count=0;
             $.each(data, function(l, val)
    {
     product_count++;
     var rt="{{url('unstokepurchase_details')}}/"+val.id;
     
     html+=`<tr><td >`+product_count+`</td><td >`+val.invoice_no+`</td><td >`+val.date+`</td><td >`+val.user.name+`</td><td >`+val.supplier.name+`</td><td >`+val.branch.name+`</td><td >`+val.total+`</td><td ><a href="${rt}"  style="border-radius: 44px;" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
 View Details </a></td></tr>`;
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