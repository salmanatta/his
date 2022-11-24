@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Designation Form </h4>
                            @if(isset($designation))
                                <form class="" method="post" action="{{ route('designations.update',$designation->id) }}">
                                    @method('PATCH')
                            @else
                            <form class="" method="post" action="{{route('designations.store')}}">
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ isset($designation) ? $designation->title : old('title') }}" class="form-control" id="tittle"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if(isset($designation))
                                        <button type="submit" class="btn btn-warning me-1">Update</button>
                                    @else
                                    <button type="submit" class="btn btn-success me-1">Save</button>
                                    @endif
                                    <a class="btn btn-danger mx-0" href="{{ route('designations.index') }}">Exit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')

@endpush
