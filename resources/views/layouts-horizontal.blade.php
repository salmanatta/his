@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
{{--                <div class="bg-primary bg-soft">--}}
                    <div class="row">
                        <div class="col-12">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Haroon Enterprises - {{ auth()->user()->branch->name }}</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-start">
{{--                            <img src="{{  url('storage/app/public/company/'.$company[0]->logo) }}" style="width: 200px;height: 100px" alt="" class="img-fluid">--}}
{{--                            <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">--}}
                        </div>
{{--                    </div>--}}
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                            <p class="text-muted mb-0 text-truncate">Application Admin</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">125</h5>
                                        <p class="text-muted mb-0">Sale Records</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">PKR 1245</h5>
                                        <p class="text-muted mb-0">Revenue</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Earning</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">This month</p>
                            <h3>PKR34,252</h3>
                            <p class="text-muted"><span class="text-success me-2"> 112% <i class="mdi mdi-arrow-up"></i>
                                </span> From previous period</p>

                            <div class="mt-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-4 mt-sm-0">
                                <div id="radialBar-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mb-0">Deals in Pharma across multiple cities.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Purchase</p>
                                    <h4 class="mb-0">PKR {{$purchase_invoices}}</h4>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Sale</p>
                                    <h4 class="mb-0">PKR {{$sale_invoices}}</h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Stocks</p>
                                    <h4 class="mb-0">{{$quantity}}</h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <h4 class="card-title mb-4">Transaction Trends</h4>
                        <div class="ms-auto">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Year</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Top Employees</h4>

                    <div class="text-center">
                        <div class="mb-4">
                            <i class="bx bx-map-pin text-primary display-4"></i>
                        </div>
                        <h3>1,288</h3>
                        <p>Farman Ali</p>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                            <tr>
                                <td style="width: 30%">
                                    <p class="mb-0">Farman Ali</p>
                                </td>
                                <td style="width: 25%">
                                    <h5 class="mb-0">1,288</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-primary rounded" role="progressbar"
                                             style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mb-0">Shahzeb Khan</p>
                                </td>
                                <td>
                                    <h5 class="mb-0">1,853</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-success rounded" role="progressbar"
                                             style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mb-0">Ishan Ullah</p>
                                </td>
                                <td>
                                    <h5 class="mb-0">1,845</h5>
                                </td>
                                <td>
                                    <div class="progress bg-transparent progress-sm">
                                        <div class="progress-bar bg-warning rounded" role="progressbar"
                                             style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title mb-4">Social Source</h4>--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="avatar-sm mx-auto mb-4">--}}
{{--                            <span class="avatar-title rounded-circle bg-primary bg-soft font-size-24">--}}
{{--                                <i class="mdi mdi-facebook text-primary"></i>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <p class="font-16 text-muted mb-2"></p>--}}
{{--                        <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a>--}}
{{--                        </h5>--}}
{{--                        <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero--}}
{{--                            venenatis faucibus tincidunt.</p>--}}
{{--                        <a href="#" class="text-primary font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-4">--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="social-source text-center mt-3">--}}
{{--                                <div class="avatar-xs mx-auto mb-3">--}}
{{--                                    <span class="avatar-title rounded-circle bg-primary font-size-16">--}}
{{--                                        <i class="mdi mdi-facebook text-white"></i>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-15">Facebook</h5>--}}
{{--                                <p class="text-muted mb-0">125 sales</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="social-source text-center mt-3">--}}
{{--                                <div class="avatar-xs mx-auto mb-3">--}}
{{--                                    <span class="avatar-title rounded-circle bg-info font-size-16">--}}
{{--                                        <i class="mdi mdi-twitter text-white"></i>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-15">Twitter</h5>--}}
{{--                                <p class="text-muted mb-0">112 sales</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <div class="social-source text-center mt-3">--}}
{{--                                <div class="avatar-xs mx-auto mb-3">--}}
{{--                                    <span class="avatar-title rounded-circle bg-pink font-size-16">--}}
{{--                                        <i class="mdi mdi-instagram text-white"></i>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-15">Instagram</h5>--}}
{{--                                <p class="text-muted mb-0">104 sales</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Activity</h4>
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-14">22 Nov <i
                                            class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <div>
                                        Responded to need “Volunteer Activities
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-14">17 Nov <i
                                            class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <div>
                                        Everyone realizes why a new common language would be desirable... <a href="#">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list active">
                            <div class="event-timeline-dot">
                                <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-14">15 Nov <i
                                            class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <div>
                                        Joined the group “Boardsmanship Forum”
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-14">12 Nov <i
                                            class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <div>
                                        Responded to need “In-Kind Opportunity”
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mt-4"><a href="" class="btn btn-primary waves-effect waves-light btn-sm">View
                            More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Top Branches</h4>

                    <div class="text-center">
                        <div class="mb-4">
                            <i class="bx bx-map-pin text-primary display-4"></i>
                        </div>
                        <h3>1,456</h3>
                        <p>Noshera Branch</p>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <tr>
                                    <td style="width: 30%">
                                        <p class="mb-0">Noshera Branch</p>
                                    </td>
                                    <td style="width: 25%">
                                        <h5 class="mb-0">1,456</h5>
                                    </td>
                                    <td>
                                        <div class="progress bg-transparent progress-sm">
                                            <div class="progress-bar bg-primary rounded" role="progressbar"
                                                style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Mardan Branch</p>
                                    </td>
                                    <td>
                                        <h5 class="mb-0">1,123</h5>
                                    </td>
                                    <td>
                                        <div class="progress bg-transparent progress-sm">
                                            <div class="progress-bar bg-success rounded" role="progressbar"
                                                style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Charsadda Branch</p>
                                    </td>
                                    <td>
                                        <h5 class="mb-0">1,026</h5>
                                    </td>
                                    <td>
                                        <div class="progress bg-transparent progress-sm">
                                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                                style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    <!-- end row -->

    <!-- Transaction Modal -->
    <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                    <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{ URL::asset('/assets/images/product/img-7.png') }}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{ URL::asset('/assets/images/product/img-4.png') }}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{asset('assets/js/pages/dashboard.init.js') }}"></script>
@endsection
