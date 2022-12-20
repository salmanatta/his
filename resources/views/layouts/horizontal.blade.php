<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <!-- LOGO -->

            <div class="navbar-brand-box">
{{--                <a href="{{url('/')}}" class="logo logo-dark">--}}
{{--                    <span class="logo-sm">--}}
{{--                        <img src="{{ URL::asset ('/assets/images/logo.svg') }}" alt="" height="22">--}}
{{--                    </span>--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="" height="17">--}}
{{--                    </span>--}}
{{--                </a>--}}
                <a href="{{url('/')}}" class="logo logo-light">
{{--                    <span class="logo-sm">--}}
{{--                        <img src="{{ URL::asset ('/assets/images/logo-light.svg') }}" alt="" height="22">--}}
{{--                    </span>--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="{{ URL::asset ('/assets/images/logo-light.png') }}" alt="" height="19">--}}
{{--                    </span>--}}
                   <h3 class="mt-2" style="color:white">Haroon Enterprises</h3>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="@lang('translation.Search')">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="@lang('translation.Search')"
                                       aria-label="Search input">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    @switch(Session::get('lang'))
                        @case('ru')
                        <img src="{{ URL::asset('/assets/images/flags/russia.jpg')}}" alt="Header Language" height="16">
                        <span class="align-middle">Russian</span>
                        @break
                        @case('it')
                        <img src="{{ URL::asset('/assets/images/flags/italy.jpg')}}" alt="Header Language" height="16">
                        <span class="align-middle">Italian</span>
                        @break
                        @case('de')
                        <img src="{{ URL::asset('/assets/images/flags/germany.jpg')}}" alt="Header Language"
                             height="16"> <span class="align-middle">German</span>
                        @break
                        @case('es')
                        <img src="{{ URL::asset('/assets/images/flags/spain.jpg')}}" alt="Header Language" height="16">
                        <span class="align-middle">Spanish</span>
                        @break
                        @default
                        <img src="{{ URL::asset('/assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                        <span class="align-middle">English</span>
                    @endswitch
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a href="{{ url('index/en') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{ URL::asset ('/assets/images/flags/us.jpg') }}" alt="user-image" class="me-1"
                             height="12"> <span class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="{{ url('index/it') }}" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ URL::asset ('/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1"
                             height="12"> <span class="align-middle">Italian</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> @lang('translation.Notifications') </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> @lang('translation.View_All')</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span
                                key="t-view-more">@lang('translation.View_More')</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ (Auth::user()->avatar !='') ? asset(Auth::user()->avatar) : asset('/images/avatar.jpg') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="contacts-profile"><i
                            class="bx bx-user font-size-16 align-middle me-1"></i> <span
                            key="t-profile">@lang('translation.Profile')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16assets align-middle me-1"></i>
                        <span key="t-my-wallet">@lang('translation.My_Wallet')</span></a>
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
                       data-bs-target=".change-password"><span class="badge bg-success float-end">11</span><i
                            class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                            key="t-settings">@lang('translation.Settings')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                        <span key="t-lock-screen">@lang('translation.Lock_screen')</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Configuration</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{route('companies.index')}}" class="dropdown-item" key="t-saas">Company </a>
                            <a href="{{route('branches.index')}}" class="dropdown-item" key="t-saas">Branch </a>
{{--                            <a href="{{route('cities.index')}}" class="dropdown-item" key="t-default">City </a>--}}
                            <a href="{{route('regions.index')}}" class="dropdown-item" key="t-saas">Region </a>
                            <a href="{{route('groups.index')}}" class="dropdown-item" key=" t-default">Customer Group </a>
                            <a href="{{route('designations.index')}}" class="dropdown-item" key="t-saas">Designation </a>
                            <a href="{{route('employees.index')}}" class="dropdown-item" key="t-saas">Employee </a>
                            <a href="{{route('license_types.index')}}" class="dropdown-item" key="t-saas">License Type </a>
                            <a href="{{route('product_types.index')}}" class="dropdown-item" key="t-saas">Product Type </a>
                            <a href="{{route('product_categories.index')}}" class="dropdown-item" key="t-saas">Product Category </a>
                            <a href="{{route('product_groups.index')}}" class="dropdown-item" key=" t-default">Product Group </a>
                            <a href="{{url('general')}}" class="dropdown-item" key=" t-default">Define Product Rule</a>
                            <a href="{{ url('supplier-discount-grid') }}" class="dropdown-item" key=" t-default">Supplier Discount</a>
                            <a href="{{url('apply-rule')}}" class="dropdown-item" key=" t-default">Apply Product Rule</a>
                            <a href="{{route('customers.index')}}" class="dropdown-item" key="t-saas">Customer </a>
                            <a href="{{route('suppliers.index')}}" class="dropdown-item" key="t-saas">Supplier </a>
                            <a href="{{route('products.index')}}" class="dropdown-item" key="t-saas">Product </a>
                        </div>
                    </li>

                    @if(auth()->user()->hasRole(['purchase']))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Purchases</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-purchase"></div>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Purchase </span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('/purchase/invoice')}}" class="dropdown-item" key="t-saas">Purchase
                                Invoice </a>
                            <a href="{{url('/purchase/return')}}" class="dropdown-item" key="t-saas">Purchase Return
                                Invoice </a>
                            <a href="{{url('purchaseReport')}}" class="dropdown-item" key="t-form-elements">
                                Purchase Invoice Approval
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Sales</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('sale/invoice')}}" class="dropdown-item" key="t-saas"> Sale Invoice </a>
                            <a href="{{url('sale/invoiceReturn')}}" class="dropdown-item" key="t-saas"> Sale Return
                                Invoice </a>
                            <a href="{{url('purchaseSale')}}" class="dropdown-item" key="t-saas">Sale Invoice Approval</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Stock Transfer</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('storetostore')}}" class="dropdown-item" key="t-saas">Product Transfer </a>
                            <a href="{{url('storetoStoreList')}}" class="dropdown-item" key="t-saas">Product Transfer
                                Approval </a>
                            <a href="{{url('receive-product-transfer')}}" class="dropdown-item" key="t-saas">Receive
                                Product Transfer </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Adjustment</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('stock-adjustment')}}" class="dropdown-item" key="t-saas">Stock Adjustment </a>
                            <a href="{{url('adjustment-approval')}}" class="dropdown-item" key="t-saas">Stock Adjustment Approval </a>
                            <a href="{{url('batch-adjustment')}}" class="dropdown-item" key="t-saas">Batch Adjustment</a>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Expense</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{route('expense_categories.index')}}" class="dropdown-item" key="t-default">Expense
                                Categories</a>
                            <a href="{{route('expenses.index')}}" class="dropdown-item" key="t-default">Expenses</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Users</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{route('users.index')}}" class="dropdown-item" key="t-saas">User </a>
                            <a href="{{route('roles.index')}}" class="dropdown-item" key="t-saas">Role </a>
                            <a href="{{route('permissions.index')}}" class="dropdown-item" key="t-saas">Permission </a>
                            <a href="{{url('roles/attached/permissions')}}" class="dropdown-item" key="t-saas">Roles &
                                Attached Permissions </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="bx bx-collection me-2"></i><span key="t-components">Reports</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                   role="button">
                                    <span key="t-forms">Regions</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{url('all_regions_report')}}" class="dropdown-item" key="t-form-elements">All
                                        Regions</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                   role="button">
                                    <span key="t-forms">Sale Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{url('customer.sale')}}" class="dropdown-item" key="t-form-elements">Customer
                                        Wise Sale Report</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                   role="button">
                                    <span key="t-forms">Purchase Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{url('supplier-wise-purchase')}}" class="dropdown-item" key="t-form-elements">Supplier
                                        Wise Purchase Report</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                   role="button">
                                    <span key="t-forms">Stock Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('stock_detail') }}" class="dropdown-item" key="t-form-elements">Current
                                        Stock Register</a>
                                    <a href="{{ url('date-wise-stock-view') }}" class="dropdown-item"
                                       key="t-form-elements">Date
                                        Wise Stock Register</a>
                                </div>
                            </div>
                            <a href="{{url('logs')}}" class="dropdown-item" key="t-saas">Logs</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Setting</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('sales-target-grid')}}" class="dropdown-item" key="t-default">Sale Target</a>
                            <a href="{{url('backup')}}" class="dropdown-item" key="t-default">Full Backup</a>
                            <a href="{{url('list-backups')}}" class="dropdown-item" key="t-saas">Restore</a>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                   role="button">
                                    <span key="t-forms">Date Setting</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('calendar-List') }}" class="dropdown-item" key="t-form-elements">Date
                                        Plan</a>
                                    <a href="{{ url('calendar.implement.list') }}" class="dropdown-item"
                                       key="t-form-elements">Assign Date Plan</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               name="current_password" autocomplete="current_password"
                               placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                                data-id="{{ Auth::user()->id }}" type="submit">Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
