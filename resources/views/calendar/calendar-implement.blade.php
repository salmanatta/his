@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Implement Date Plan</h4>
                    <form class="" method="post" action="{{url('calendar.implement/'.$cal_implement->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="form_name">Feature Name</label>
                                    <input type="text" class="form-control" name="form_name" id="form_name"
                                           value="{{ isset($cal_implement) ? $cal_implement->form_name : old('form_name')  }}"
                                           placeholder="Enter Description" readonly>
                                    <input type="hidden" name="id"
                                           value="{{ isset($cal_implement) ? $cal_implement->id : '' }}">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="calendar_id" class="form-label">Plan Description</label>
                                    <select class="form-control select2" id="calendar_id" name="calendar_id">
                                        @foreach($date_plans as $date_plan)
                                            <option value="{{ $date_plan->id }}" {{ isset($cal_implement) ? ($cal_implement->calendar_id == $date_plan->id ? 'selected' : '' ) : '' }}>
                                                {{ $date_plan->name.' (Min Days => '.$date_plan->min_days.' Max Days => '.$date_plan->max_days.' )' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('calendar_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning me-1" name="update">Update</button>
                                    <a class="btn btn-danger mx-0" href="{{ url('calendar.implement.list') }}">Exit</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>


@endsection
