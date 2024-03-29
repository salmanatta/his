<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components/_head')
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
                </div> <!-- content -->
            </div>
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
    @include('components/_scripts')
    @stack('script')
</body>

</html>
