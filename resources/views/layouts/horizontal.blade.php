<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset ('/assets/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <a href="{{url('/')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset ('/assets/images/logo-light.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset ('/assets/images/logo-light.png') }}" alt="" height="19">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="@lang('translation.Search')">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            <!-- <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    <span key="t-megamenu">@lang('translation.Mega_Menu')</span>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-8">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="font-size-14 mt-0" key="t-ui-components">@lang('translation.UI_Components')</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);" key="t-lightbox">@lang('translation.Lightbox')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-range-slider">@lang('translation.Range_Slider')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-sweet-alert">@lang('translation.Sweet_Alert')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-rating">@lang('translation.Rating')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-forms">@lang('translation.Forms')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-tables">@lang('translation.Tables')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-charts">@lang('translation.Charts')</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="font-size-14 mt-0" key="t-applications">@lang('translation.Applications')</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);" key="t-ecommerce">@lang('translation.Ecommerce')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-calendar">@lang('translation.Calendar')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-email">@lang('translation.Email')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-projects">@lang('translation.Projects')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-tasks">@lang('translation.Tasks')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-contacts">@lang('translation.Contacts')</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="font-size-14 mt-0" key="t-extra-pages">@lang('translation.Extra_Pages')</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);" key="t-light-sidebar">@lang('translation.Light_Sidebar')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-compact-sidebar">@lang('translation.Compact_Sidebar')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-horizontal">@lang('translation.Horizontal_layout')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-maintenance">@lang('translation.Maintenance')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-coming-soon">@lang('translation.Coming_Soon')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-timeline">@lang('translation.Timeline')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-faqs">@lang('translation.FAQs')</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="font-size-14 mt-0" key="t-ui-components">@lang('translation.UI_Components')</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);" key="t-lightbox">@lang('translation.Lightbox')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-range-slider">@lang('translation.Range_Slider')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-sweet-alert">@lang('translation.Sweet_Alert')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-rating">@lang('translation.Rating')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-forms">@lang('translation.Forms')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-tables">@lang('translation.Tables')</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" key="t-charts">@lang('translation.Charts')</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-sm-5">
                                    <div>
                                        <img src="{{ URL::asset ('/assets/images/megamenu-img.png') }}" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="@lang('translation.Search')" aria-label="Search input">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @switch(Session::get('lang'))
                    @case('ru')
                    <img src="{{ URL::asset('/assets/images/flags/russia.jpg')}}" alt="Header Language" height="16"> <span class="align-middle">Russian</span>
                    @break
                    @case('it')
                    <img src="{{ URL::asset('/assets/images/flags/italy.jpg')}}" alt="Header Language" height="16"> <span class="align-middle">Italian</span>
                    @break
                    @case('de')
                    <img src="{{ URL::asset('/assets/images/flags/germany.jpg')}}" alt="Header Language" height="16"> <span class="align-middle">German</span>
                    @break
                    @case('es')
                    <img src="{{ URL::asset('/assets/images/flags/spain.jpg')}}" alt="Header Language" height="16"> <span class="align-middle">Spanish</span>
                    @break
                    @default
                    <img src="{{ URL::asset('/assets/images/flags/us.jpg')}}" alt="Header Language" height="16"> <span class="align-middle">English</span>
                    @endswitch
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a href="{{ url('index/en') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{ URL::asset ('/assets/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="{{ url('index/it') }}" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ URL::asset ('/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
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
                    <!--  <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1" key="t-your-order">@lang('translation.Your_order_is_placed')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">@lang('translation.If_several_languages_coalesce_the_grammar')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">@lang('translation.3_min_ago')</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{ URL::asset ('/assets/images/users/avatar-3.jpg') }}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">@lang('translation.James_Lemire')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-simplified">@lang('translation.It_will_seem_like_simplified_English')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">@lang('translation.1_hours_ago')</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1" key="t-shipped">@lang('translation.Your_item_is_shipped')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">@lang('translation.If_several_languages_coalesce_the_grammar')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">@lang('translation.3_min_ago')</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{ URL::asset ('/assets/images/users/avatar-4.jpg') }}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">@lang('translation.Salena_Layfield')</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-occidental">@lang('translation.As_a_skeptical_Cambridge_friend_of_mine_occidental')</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">@lang('translation.1_hours_ago')</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">@lang('translation.View_More')</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ (Auth::user()->avatar !='') ? asset(Auth::user()->avatar) : asset('/images/avatar.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="contacts-profile"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">@lang('translation.Profile')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16assets align-middle me-1"></i> <span key="t-my-wallet">@lang('translation.My_Wallet')</span></a>
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal" data-bs-target=".change-password"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">@lang('translation.Settings')</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">@lang('translation.Lock_screen')</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div> -->

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
                            <a href="{{route('cities.index')}}" class="dropdown-item" key="t-default">City </a>
                            <a href="{{route('regions.index')}}" class="dropdown-item" key="t-saas">Region </a>
                            <a href="{{route('groups.index')}}" class="dropdown-item" key=" t-default">Group </a>
                            <a href="{{route('designations.index')}}" class="dropdown-item" key="t-saas">Designation </a>
                            <a href="{{route('employees.index')}}" class="dropdown-item" key="t-saas">Employee </a>
                            <a href="{{route('license_types.index')}}" class="dropdown-item" key="t-saas">License Type </a>
                            <a href="{{route('product_types.index')}}" class="dropdown-item" key="t-saas">Product Type </a>
                            <a href="{{route('product_categories.index')}}" class="dropdown-item" key="t-saas">Product Category </a>
                            <a href="{{route('product_groups.index')}}" class="dropdown-item" key=" t-default">Product Group </a>
                            <a href="{{url('general')}}" class="dropdown-item" key=" t-default">Define Product Rule</a>
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
                            <a href="{{url('/purchase/invoice')}}" class="dropdown-item" key="t-saas">Purchase Invoice </a>
                            <a href="{{url('/purchase/return')}}" class="dropdown-item" key="t-saas">Purchase Return Invoice </a>
                            <a href="{{url('purchaseReport')}}" class="dropdown-item" key="t-form-elements">View Purchase Invoice </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Sales</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('sale/invoice')}}" class="dropdown-item" key="t-saas"> Sale Invoice </a>
                            <a href="{{url('sale/invoiceReturn')}}" class="dropdown-item" key="t-saas"> Sale Return Invoice </a>
                            <a href="{{url('purchaseSale')}}" class="dropdown-item" key="t-saas"> View Sale Reports</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Stock Transfer</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('storetostore')}}" class="dropdown-item" key="t-saas">Product Transfer </a>
                            <a href="{{url('storetoStoreList')}}" class="dropdown-item" key="t-saas">Product Transfer Approval </a>
                            <a href="{{url('receive-product-transfer')}}" class="dropdown-item" key="t-saas">Receive Product Transfer </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Expense</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                            <a href="{{route('expense_categories.index')}}" class="dropdown-item" key="t-default">Expense Categories</a>
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
                            <a href="{{url('roles/attached/permissions')}}" class="dropdown-item" key="t-saas">Roles & Attached Permissions </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="bx bx-collection me-2"></i><span key="t-components">Reports</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <span key="t-forms">Regions</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{url('all_regions_report')}}" class="dropdown-item" key="t-form-elements">All Regions</a>
                                </div>
                            </div>
                            {{-- <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <span key="t-forms">Purchase Reports</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{url('unstokepurchaseReport')}}" class="dropdown-item" key="t-form-elements">Drop Purchase</a>
                                </div>
                            </div> --}}
                            <a href="{{url('logs')}}" class="dropdown-item" key="t-saas">Logs</a>
                            {{-- <a href="{{url('storetoStoreReport')}}" class="dropdown-item" key="t-saas">Transfer Product Reports</a> --}}
                            <a href="{{url('stock_detail')}}" class="dropdown-item" key="t-saas">Current Stock Reports</a>
                            <a href="{{url('stock-report')}}" class="dropdown-item" key="t-saas">Item Ledger</a>
                        </div>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="bx bx-collection me-2"></i><span key="t-components">Orders</span>
                            <div class="arrow-down"></div>
                        </a>
                         <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <span key="t-forms">Pending Order</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="form-elements" class="dropdown-item" key="t-form-elements">Order Complete</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Setting</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{url('backup')}}" class="dropdown-item" key="t-default">Full Backup</a>
                            <a href="{{url('list-backups')}}" class="dropdown-item" key="t-saas">Restore</a>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form" role="button">
                                    <span key="t-forms">Date Setting</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="{{ url('calendar-List') }}"  class="dropdown-item" key="t-form-elements">Date Plan</a>
                                    <a href="#"  class="dropdown-item" key="t-form-elements">Assign Date Plan</a>
{{--                                    <a href="#"  class="dropdown-item" key="t-form-elements">Seven Days</a>--}}
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
<div class="modal fade change-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <input id="current-password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password" placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="{{ Auth::user()->id }}" type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
