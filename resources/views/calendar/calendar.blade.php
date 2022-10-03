@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Date Plan</h4>
                    <form class="" method="post" action="{{url('create-Date-Plan')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Description</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($purchaseM) ? $purchaseM->freight : old('name')  }}" placeholder="Enter Description" required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="row">
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="min_days" class="form-label">Minimum Days</label>
                                    <input type="number" name="min_days" class="form-control" id="min_days" id="min_days" required>
                                    @error('min_days')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="max_days" class="form-label">Maximum Days</label>
                                    <input type="number" name="max_days" class="form-control" id="max_days" id="max_days" required>
                                    @error('branch_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-end">
                                    {{--                                    <button type="submit" class="btn btn-primary me-1" name="update">Update</button>--}}
                                    {{--                                    <button type="submit" class="btn btn-warning me-1" name="update-post">Update & Post</button>--}}
                                    {{--                                    <a class="btn btn-danger mx-0" href="{{ url('purchaseReport') }}">Exit</a>--}}

                                    <button type="submit" class="btn btn-success me-1">Save</button>
                                    <a class="btn btn-danger mx-0" href="{{ url('calendar-List') }}">Exit</a>

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
