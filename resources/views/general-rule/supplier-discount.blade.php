@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> Supplier Discount </h4>
                            @if(isset($supplierDiscount))
                                <form method="post" action="{{ route('license_types.update',$license->id) }}">
                                    @method('PATCH')
                                    @else
                                        <form method="post" action="{{ url('supplier-discount-create')}}">
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Supplier</label>
                                                        <select name="supplier_id" class="form-select select2" >
                                                        <option disabled selected> -- Select Supplier -- </option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" >{{ $supplier->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('supplier_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Amount</label>
                                                        <input type="number" name="amount" value="{{ isset($supplierDiscount) ? $supplierDiscount->amount : old('amount') }}"
                                                               class="form-control">
                                                        @error('amount')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Start Date</label>
                                                        <input type="date" name="start_date"
                                                               value="{{ isset($supplierDiscount) ? $license->start_date : old('start_date') }}"
                                                               class="form-control">
                                                        @error('start_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">End Date</label>
                                                        <input type="date" name="end_date"
                                                               value="{{ isset($supplierDiscount) ? $supplierDiscount->end_date : old('end_date') }}"
                                                               class="form-control">
                                                        @error('end_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                @if(isset($license))
                                                    <button type="submit" class="btn btn-warning me-1">Update</button>
                                                @else
                                                    <button type="submit" class="btn btn-success me-1">Save</button>
                                                @endif
                                                <a class="btn btn-danger mx-0"
                                                   href="{{ url('supplier-discount-grid') }}">Exit</a>
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
    <!-- apexcharts -->


@endpush
