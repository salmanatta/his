<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | {{env('app_name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> -->
    <!-- <meta content="Themesbrand" name="author" /> -->
    <!-- main page here -->
    <!-- this css use date packr to restrict user select specific dat -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- this css use date packr to restrict user select specific dat -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- user for toastr -->
         <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/toastr/toastr.min.css')}}">
         <!-- user for toastr -->
<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{asset('assets')}}/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

<!-- App DataTable-->
    <link href="{{asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

@section('body')
    
    <body data-topbar="dark" data-layout="horizontal">
    
@show

    <!-- Begin page -->
     <div id="layout-wrapper">
        @include('layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> 
                <!-- content -->
            </div>
           
                <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- include('layouts.right-sidebar') -->
    <!-- END Right Sidebar -->

    <!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<!-- <script src="{{asset('assets/libs/node-waves/node-waves.min.js')}}"></script> -->


<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Required datatable js -->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <!-- <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script> -->
    <!-- <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script> -->
    <!-- Datatable init js -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

    <!-- toastr init -->
        <script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>

        <!-- <script src="{{asset('assets/js/app.min.js')}}"></script> -->
        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>


         <!-- dashboard init -->
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
<script>
$('.select2').select2();
</script>
<!--  Start this js use date packr to restrict user select specific dat -->
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
 //make an 3 days of disable dates

// $("#datepickercustom").datepicker({

// });
 function disableDate() {
   alert('For Three Days Plan');
  $("#datepickercustom").datepicker({
   minDate: -3,
   maxDate: "+3D"
});
  // Also, keep in mind, use mm/dd/yy format.

 }
 function disableDateFive() {
  alert('For Five Days Plan');
  $("#datepickercustom").datepicker({
   minDate: -5,
   maxDate: "+5D"
});
}

 function disableDateSeven() {
  alert('For Seven Days Plan');
  $("#datepickercustom").datepicker({
   minDate: -7,
   maxDate: "+7D"
});
  // window.location.reload();
  // Also, keep in mind, use mm/dd/yy format.
 }
</script>
<!--END  this css use date packr to restrict user select specific dat -->

<script >
  // Session::has('error')
  // toastr.options =
  // {
  //   "closeButton" : true,
  //   "progressBar" : true
  // }
  //       toastr.error("{{ session('error') }}");
  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('info') }}");
  @endif
  @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif
    </script>

    @stack('script')
</body>
   

</html>
