<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Basic Info
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="text-muted col-lg-12">
                @if(isset($product))
                    <form action="{{route('products.update',$product->id)}}" method="POST" id="infoFormId">
                    @method('PATCH')
                @else
                    <form action="{{route('products.store')}}" method="POST" id="infoFormId">
                @endif
                    @csrf
                    <input type="hidden" class="product_id" value="@if(isset($product->id)){{$product->id}} @endif" name="product_id">
                    <table class="table table-responsive">
                        <tr>
                            <td>
                                <label for="dd">Product Code *</label>
                            </td>
                            <td>
                                <input type="number" value="{{ isset($product) ? $product->product_code : old('product_code') }}" class="common" name="product_code"><br>
                                @error('product_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Name *</label></td>
                            <td> <input type="text" step="any" value="{{ isset($product) ? $product->name : old('name') }}" class="common" name="name"><br>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <label for="dd">Short Name *</label>
                            </td>
                            <td>
                                <input type="text" value="{{ isset($product) ? $product->short_name : old('short_name') }}" class="common" name="short_name"><br>
                                @error('short_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Product Type*</label></td>
                            <td> <select name="type_id" class="form-control " style="width: 170px; height: 30px;">
                                    <option selected disabled="">Product Type</option>
                                    @foreach($productTypes as $productType)
                                    <option value="{{$productType->id}} {{ isset($product) ? ($product->type_id == $productType->id ? 'selected' : '' ) : '' }}">{{$productType->name}}
                                    </option>
                                    @endforeach
                                </select><br>
                                @error('type_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Product Category*</label></td>
                            <td>
                                <select name="category_id" class=" form-control  " style="width: 170px; height: 30px;">
                                    <option selected disabled="">Product Category</option>
                                    @foreach($productcategories as $productcategory)
                                    <option value="{{$productcategory->id}}">
                                        {{$productcategory->name}}
                                    </option>
                                    @endforeach
                                </select><br>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <label for="dd">Group Sequence *</label>
                            </td>
                            <td>
                                <input type="text" value="{{ isset($product) ? $product->group_seq : old('group_seq') }}" class="common" name="group_seq"><br>
                                @error('group_seq')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Computer Sequence</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->comp_seq : old('comp_seq') }}" class="common" name="comp_seq"><br>
                                @error('comp_seq')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Pack in Box *</label></td>
                            <td> <input type="text" step="any" value="{{ isset($product) ? $product->packet : old('packet') }}" class="common" name="packet"><br>
                                @error('packet')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <label for="dd">Product Group *</label>
                            </td>
                            <td>
                                <select id="formrow-inputState" name="group_id" class="form-control  " style="width: 170px; height: 30px;">
                                    <option selected disabled="">Product Group</option>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select><br>
                                @error('group_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Computer Arted No</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->comp_artd_no : old('comp_artd_no') }}" class="common" name="comp_artd_no"><br>
                                @error('comp_artd_no')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Discount%</label>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_discount : old('purchase_discount') }}" class="common" name="purchase_discount"><br>
                                @error('purchase_discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">MaxSaleDiscount %</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->max_sale_disc : old('max_sale_disc') }}" class="common" name="max_sale_disc"><br>
                                @error('max_sale_disc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Waight </label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->weight : old('weight') }}" class="common" name="weight"><br>
                                @error('weight')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td> <label for="dd">Sales Tax Val *</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->sale_tax_value : old('sale_tax_value') }}" class="common" name="sale_tax_value"><br>
                                @error('sale_tax_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Inventory Days</label>
                            <td> <input type="text" value="{{ isset($product) ? $product->inventory_day : old('inventory_day') }}" class="common" name="inventory_day"><br>
                                @error('inventory_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Purchase Rate *</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_rate : old('purchase_rate') }}" class="common" name="purchase_rate"><br>
                                @error('purchase_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax Type*</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_tax_type : old('purchase_tax_type') }}" class="common" name="purchase_tax_type"><br>
                                @error('purchase_tax_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax Value*</label></td>
                            <td> <input type="text" value=" {{ isset($product) ? $product->purchase_tax_value : old('purchase_tax_value') }} " class="common" name="purchase_tax_value"><br>
                                @error('purchase_tax_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="dd">Advance Tax Type</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->advance_tax_type : old('advance_tax_type') }} " class="common" name="advance_tax_type"><br>
                                @error('advance_tax_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Expire Days</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->expire_day : old('expire_day') }} " class="common" name="expire_day"><br>
                                @error('expire_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_tax : old('purchase_tax') }}" class="common" name="purchase_tax"><br>
                                @error('purchase_tax')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Min Flat Rate</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->min_flat_rate : old('min_flat_rate') }}" class="common" name="min_flat_rate"><br>
                                @error('min_flat_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Max Flat Rate</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->max_flat_rate : old('max_flat_rate') }}" class="common" name="max_flat_rate"><br>
                                @error('max_flat_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Adv Tax Filer</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->adv_tax_filer : old('adv_tax_filer') }}" class="common" name="adv_tax_filer"><br>
                                @error('adv_tax_filer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Adv Tax Non Filer *</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->adv_tax_non_filer : old('adv_tax_non_filer') }}" class="common" name="adv_tax_non_filer"><br>
                                @error('adv_tax_non_filer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Adv Tax Supplier *</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->adv_tax_supplier : old('adv_tax_supplier') }}" class="common" name="adv_tax_supplier"><br>
                                @error('adv_tax_supplier')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Price</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_price : old('purchase_price') }}" class="common" name="purchase_price"><br>
                                @error('purchase_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Purchase Disc Value</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->purchase_disc_value : old('purchase_disc_value') }}" class="common" name="purchase_disc_value"><br>
                                @error('purchase_disc_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Re Order Level</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->re_order_level : old('re_order_level') }}" class="common" name="re_order_level"><br>
                                @error('re_order_level')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Product Shel Life Day</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->prod_shel_life_day : old('prod_shel_life_day') }}" class="common" name="prod_shel_life_day"><br>
                                @error('prod_shel_life_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">*Trade Price</label></td>
                            <td> <input type="text" value="{{ isset($product) ? $product->trade_price : old('trade_price') }}" class="common" name="trade_price"><br>
                                @error('trade_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                        @if(isset($product))
                            <button type="submit" id="product_info"class="btn btn-warning me-1">Update</button>
                        @else
                            <button type="submit" id="product_info"class="btn btn-success me-1">Save</button>
                        @endif
                            <a class="btn btn-danger mx-0" href="{{ url('products') }}">Exit</a>
                        </div>
                    </div>
                    <!-- <button type="submit" id="product_info" class="btn btn-primary w-md">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
