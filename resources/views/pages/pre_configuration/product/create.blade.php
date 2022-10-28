@extends('layouts.main')
@section('content')


<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Product Details</h4>

                    <form  class="" method="post" action="{{route('products.store')}}">
                    	@csrf

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Product Code</label>
                                    <input type="number" name="product_code" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="short_name" class="form-label">Short Name</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="short_name"
                                        required>
                                </div>
                            </div>
                            <!-- <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Genral Name</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="genral_name"
                                        required>
                                </div>
                            </div> -->
                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Product Category</label>
                                    <select  required="true" name="category_id" class="form-select select2">
                                <option selected disabled="" value="">Choose Category</option>
                                         @foreach($productcategories as $productcategory)
                                        <option value="{{$productcategory->id}}">{{$productcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Product Type</label>
                                    <select id="formrow-inputState" required="true" name="type_id" class="form-select select2">
                                <option selected disabled="" value="">Choose Type</option>
                                         @foreach($productTypes as $productType)
                                        <option value="{{$productType->id}}">{{$productType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Product Group</label>
                                    <select id="formrow-inputState" required="true" name="group_id" class="form-select select3">
                                <option selected disabled="" value="">Choose Product Group </option>
                                         @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Trade Price </label>
                                    <input type="number" name="trade_price" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Purchase Price</label>
                                    <input type="number" name="purchase_price" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Max Sale Discount</label>
                                    <input type="number" name="max_sale_disc" class="form-control" id="validationCustom01"
                                        required>

                                </div>
                            </div>

                            <!-- <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Sale Tax</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="sale_tax_value"
                                        required>
                                </div>
                            </div>
                             <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Tax3 Type</label>
                                    <input type="text" name="tax3_type" class="form-control" id="validationCustom01"
                                        required>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">

                            <!-- <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputState"  class="form-label">Tax3 Value</label>
                                    <input type="number" name="tax3_value" class="form-control" id="validationCustom01"
                                        required>

                                </div>
                            </div> -->

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Purchase Discount Value</label>
                                    <input type="number" class="form-control" id="validationCustom03" name="purchase_disc_value"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Re Order Level </label>
                                    <input type="text" name="re_order_level" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Prod Shel Life Day</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="prod_shel_life_day"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Trade Price </label>
                                    <input type="number" name="trade_price" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Purchase Tax</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="purchase_tax_value"
                                        required>
                                </div>
                            </div>

                        </div>
                         <div class="row">

                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Packet</label>
                                    <input type="number" class="form-control" id="validationCustom03" name="packet"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Comp Artd No</label>
                                    <input type="number" class="form-control" id="validationCustom03" name="comp_artd_no"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Group Seq</label>
                                    <input type="number" class="form-control" id="validationCustom03" name="group_seq"
                                        required>
                                </div>
                            </div>
                       <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Comp Seq</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="comp_seq"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Weight</label>
                                    <input type="number" class="form-control" id="validationCustom02" name="weight"
                                         required>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputZip" class="form-label">Purchase Tax Type</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="purchase_tax_type"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="purchase_discount" class="form-label">Purchase Discount</label>
                                    <input type="number" name="purchase_discount" class="form-control" id="purchase_discount"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="purchase_rate" class="form-label">Purchase Rate</label>
                                    <input type="number" name="purchase_rate" class="form-control" id="purchase_rate"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="purchase_tax" class="form-label">Purchase Tax</label>
                                    <input type="number" name="purchase_tax" class="form-control" id="purchase_tax"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="inventory_day" class="form-label">Inventory Day</label>
                                    <input type="number" name="inventory_day" class="form-control" id="inventory_day"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="advance_tax_type" class="form-label">Advance Tax Type</label>
                                    <input type="number" name="advance_tax_type" class="form-control" id="advance_tax_type"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="expire_day" class="form-label">Expire Day</label>
                                    <input type="number" name="expire_day" class="form-control" id="expire_day"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="net_balance" class="form-label">Net Balance</label>
                                    <input type="number" name="net_balance" class="form-control" id="net_balance"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="advance_tax_type" class="form-label">Advance Tax Type</label>
                                    <input type="number" name="advance_tax_type" class="form-control" id="advance_tax_type"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="max_flat_rate" class="form-label">Max Flat Rate</label>
                                    <input type="number" name="max_flat_rate" class="form-control" id="max_flat_rate"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="min_flat_rate" class="form-label">Min Flat Rate</label>
                                    <input type="number" name="min_flat_rate" class="form-control" id="min_flat_rate"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="adv_tax_filer" class="form-label">Advance Tax Filer</label>
                                    <input type="number" name="adv_tax_filer" class="form-control" id="adv_tax_filer"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="adv_tax_non_filer" class="form-label">Advance Tax Non Filer</label>
                                    <input type="number" name=" adv_tax_non_filer" class="form-control" id="adv_tax_non_filer"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="adv_tax_supplier" class="form-label">Advance Tax Supplier</label>
                                    <input type="number" name="adv_tax_supplier" class="form-control" id="adv_tax_supplier"
                                        required>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->


    </div>
    <!-- end row -->

@endsection
@push('script')

@endpush
