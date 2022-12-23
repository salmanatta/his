@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Supplier Details </h4>
                    @if(isset($supplier))
                    <form  class="" method="post" action="{{route('suppliers.update',$supplier->id)}}">
                    @method('PUT')
                    @else
                    <form class="" method="post" action="{{route('suppliers.store')}}">
                    @endif

                        @csrf
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Supplier ID</label>
                                    <input type="number" name="supplier_id" class="form-control" value="{{ isset($supplier) ? $supplier->supplier_id : old('supplier_id') }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ isset($supplier) ? $supplier->name : old('name') }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email"
                                           value="{{ isset($supplier) ? $supplier->email : old('email') }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="phone"
                                           value="{{ isset($supplier) ? $supplier->phone : old('phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Supplier Group</label>
                                    <select id="" required="true" name="group_id" class="form-select">
                                        <option selected disabled value=""> -- Choose Group --</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}" {{ isset($supplier) ? $supplier->group_id == $group->id ? 'selected' : '' : '' }}>{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Fax</label>
                                    <input type="text" name="fax" class="form-control" id="validationCustom01"
                                           value="{{ isset($supplier) ? $supplier->fax : old('fax') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Url </label>
                                    <input type="text" name="url" class="form-control" id="validationCustom01"
                                           value="{{ isset($supplier) ? $supplier->url : old('url') }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">City</label>
                                    <select id="formrow-inputState" required="true" name="city_id" class="form-select">
                                        <option selected disabled value=""> -- Choose City --</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{ isset($supplier) ? $supplier->city_id == $city->id ? 'selected' : '' : '' }} >{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="advTaxBeforeSales" class="form-label">Adv Tax Before SalesTax </label>
                                    <select name="advTaxBeforeSales" class="form-select">
                                        <option value="" selected disabled >-- Select --</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="taxesOn" class="form-label">Taxes On </label>
                                    <select name="taxesOn" class="form-select">
                                        <option value="" selected disabled >-- Select --</option>
                                        <option value="Cost">Cost Price</option>
                                        <option value="Sale">Sale Price</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="FtaxOn" class="form-label">F.Tax on </label>
                                    <select name="FtaxOn" class="form-select">
                                        <option value="" selected disabled >-- Select --</option>
                                        <option value="Bonus">Bonus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3 ">
                                    <label for="formrow-inputZip" class="form-label">Status </label>
                                    <input type="radio" checked id="validationCustom02" value="1" name="isActive"
                                           required>&nbsp;Active&nbsp;&nbsp;
                                    <input type="radio" id="validationCustom02" value="0" name="isActive"
                                           required>&nbsp;InActive
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="validationCustom01">
                                        {{ isset($supplier) ? $supplier->address : old('address') }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Note</label>
                                    <textarea name="note" class="form-control" id="validationCustom01"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            @if(isset($supplier))
                                <button type="submit" class="btn btn-warning me-1" >Update</button>
                            @else
                                <button type="submit" class="btn btn-success me-1">Save</button>
                            @endif
                                <a class="btn btn-danger mx-0" href="{{ url('suppliers') }}">Exit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
