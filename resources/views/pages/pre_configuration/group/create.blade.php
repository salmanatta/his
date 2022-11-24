@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Customer Group</h4>
                            @if(isset($group))
                            <form class="" method="post" action="{{ route('groups.update',$group->id) }}">
                                @method('PATCH')
                            @else
                            <form class="" method="post" action="{{route('groups.store')}}">
                            @endif
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ isset($group) ? $group->name : old('name')  }}" class="form-control"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if(isset($group))
                                        <button type="submit" class="btn btn-warning me-1">Update</button>
                                    @else
                                        <button type="submit" class="btn btn-success me-1">Save</button>
                                    @endif
                                    <a class="btn btn-danger mx-0" href="{{ route('groups.index') }}">Exit</a>
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
