<!DOCTYPE html>
<html lang="en">
<head>
    <title> Haroon | Pharmacy</title>
    <link href="{{asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">


    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets')}}/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/css/ext-component-tree.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> -->
    <link href="{{asset('assets/css/jstree.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

{{--    <title>Document</title>--}}
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('template.main-header')
    <!-- @include('template.sidebar') -->

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('section')
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('template.footer')

</body>
</html>
