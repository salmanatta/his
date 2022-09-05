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
                                <input type="number" value="@if(isset($product->product_code)){{$product->product_code}} @endif" class="common" name="product_code"><br>
                                @error('product_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Name *</label></td>
                            <td> <input type="text" step="any" value="@if(isset($product->name)){{$product->name}} @endif" class="common" name="name"><br>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <label for="dd">Short Name *</label>
                            </td>
                            <td>
                                <input type="text" value="@if(isset($product->short_name)){{$product->short_name}} @endif" class="common" name="short_name"><br>
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
                                    <option value="{{$productType->id}}">{{$productType->name}}
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
                                <input type="text" value="@if(isset($product->group_seq)){{$product->group_seq}} @endif" class="common" name="group_seq"><br>
                                @error('group_seq')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Computer Sequence</label></td>
                            <td> <input type="text" value="@if(isset($product->comp_seq)){{$product->comp_seq}} @endif" class="common" name="comp_seq"><br>
                                @error('comp_seq')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Pack in Box *</label></td>
                            <td> <input type="text" step="any" value="@if(isset($product->packet)){{$product->packet}} @endif" class="common" name="packet"><br>
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
                            <td> <input type="text" value="@if(isset($product->comp_artd_no)){{$product->comp_artd_no}} @endif" class="common" name="comp_artd_no"><br>
                                @error('comp_artd_no')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Discount%</label>
                            <td> <input type="text" value="@if(isset($product->purchase_discount)){{$product->purchase_discount}} @endif" class="common" name="purchase_discount"><br>
                                @error('purchase_discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">MaxSaleDiscount %</label></td>
                            <td> <input type="text" value="@if(isset($product->max_sale_disc)){{$product->max_sale_disc}} @endif" class="common" name="max_sale_disc"><br>
                                @error('max_sale_disc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Waight </label></td>
                            <td> <input type="text" value="@if(isset($product->weight)){{$product->weight}} @endif" class="common" name="weight"><br>
                                @error('weight')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td> <label for="dd">Sales Tax Val *</label></td>
                            <td> <input type="text" value="@if(isset($product->sale_tax_value)){{$product->sale_tax_value}} @endif" class="common" name="sale_tax_value"><br>
                                @error('sale_tax_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Inventory Days</label></td>
                            <td> <input type="text" value="@if(isset($product->inventory_day)){{$product->inventory_day}} @endif" class="common" name="inventory_day"><br>
                                @error('inventory_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Purchase Rate *</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_rate)){{$product->purchase_rate}} @endif" class="common" name="purchase_rate"><br>
                                @error('purchase_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax Type*</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_tax_type)){{$product->purchase_tax_type}} @endif" class="common" name="purchase_tax_type"><br>
                                @error('purchase_tax_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax Value*</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_tax_value)){{$product->purchase_tax_value}} @endif" class="common" name="purchase_tax_value"><br>
                                @error('purchase_tax_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="dd">Advance Tax Type</label></td>
                            <td> <input type="text" value="@if(isset($product->advance_tax_type)){{$product->advance_tax_type}} @endif" class="common" name="advance_tax_type"><br>
                                @error('advance_tax_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Expire Days</label></td>
                            <td> <input type="text" value="@if(isset($product->expire_day)){{$product->expire_day}} @endif" class="common" name="expire_day"><br>
                                @error('expire_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Tax</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_tax)){{$product->purchase_tax}} @endif" class="common" name="purchase_tax"><br>
                                @error('purchase_tax')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Min Flat Rate</label></td>
                            <td> <input type="text" value="@if(isset($product->min_flat_rate)){{$product->min_flat_rate}} @endif" class="common" name="min_flat_rate"><br>
                                @error('min_flat_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Max Flat Rate</label></td>
                            <td> <input type="text" value="@if(isset($product->max_flat_rate)){{$product->max_flat_rate}} @endif" class="common" name="max_flat_rate"><br>
                                @error('max_flat_rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Adv Tax Filer</label></td>
                            <td> <input type="text" value="@if(isset($product->adv_tax_filer)){{$product->adv_tax_filer}} @endif" class="common" name="adv_tax_filer"><br>
                                @error('adv_tax_filer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Adv Tax Non Filer *</label></td>
                            <td> <input type="text" value="@if(isset($product->adv_tax_non_filer)){{$product->adv_tax_non_filer}} @endif" class="common" name="adv_tax_non_filer"><br>
                                @error('adv_tax_non_filer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Adv Tax Supplier *</label></td>
                            <td> <input type="text" value="@if(isset($product->adv_tax_supplier)){{$product->adv_tax_supplier}} @endif" class="common" name="adv_tax_supplier"><br>
                                @error('adv_tax_supplier')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Purchase Price</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_price)){{$product->purchase_price}} @endif" class="common" name="purchase_price"><br>
                                @error('purchase_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">Purchase Disc Value</label></td>
                            <td> <input type="text" value="@if(isset($product->purchase_disc_value)){{$product->purchase_disc_value}} @endif" class="common" name="purchase_disc_value"><br>
                                @error('purchase_disc_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Re Order Level</label></td>
                            <td> <input type="text" value="@if(isset($product->re_order_level)){{$product->re_order_level}} @endif" class="common" name="re_order_level"><br>
                                @error('re_order_level')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><label for="dd">Product Shel Life Day</label></td>
                            <td> <input type="text" value="@if(isset($product->prod_shel_life_day)){{$product->prod_shel_life_day}} @endif" class="common" name="prod_shel_life_day"><br>
                                @error('prod_shel_life_day')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dd">*Trade Price</label></td>
                            <td> <input type="text" value="@if(isset($product->trade_price)){{$product->trade_price}} @endif" class="common" name="trade_price"><br>
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