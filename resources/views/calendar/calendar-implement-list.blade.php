@extends('layouts.main')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="text-sm-end">--}}
{{--                            <a type="button"--}}
{{--                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2"--}}
{{--                               href="{{url('create-Date-Plan')}}">--}}
{{--                                <i class="mdi mdi-plus me-1"></i>Add New Plan--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div><!-- end col-->--}}
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th style="text-align: center" width="10%"> ID</th>
                            <th class="align-middle" width="30%">Feature</th>
                            <th class="align-middle" width="30%">Plan Description</th>
                            <th style="text-align: center" width="10%">Minimum Days</th>
                            <th style="text-align: center" width="10%">Maximum Days</th>
                            <th style="text-align: center" width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calendar_implements as $calendar_implement)
                            <tr>
                                <td style="text-align: center">
                                    <a class="text-body fw-bold">{{$calendar_implement->id}}</a>
                                </td>
                                <td>{{$calendar_implement->form_name}}</td>
                                <td>{{$calendar_implement->CalendarSetup->name}}</td>
                                <td style="text-align: center">{{$calendar_implement->CalendarSetup->min_days}}</td>
                                <td style="text-align: center">{{$calendar_implement->CalendarSetup->max_days}}</td>
                                <td style="text-align: center">
                                    <a href="{{url('calendar.implement',$calendar_implement->id)}}" class="text-success editbtn">
                                        <i class="mdi mdi-pencil font-size-18"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
