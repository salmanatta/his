@extends('layouts.main')
@section('content')
<!-- <link href="{{asset('assets')}}/libs/select2/select2.min.css" rel="stylesheet" type="text/css" /> -->
<style type="text/css">
    .e_class {
        padding-left: 20px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Basic Info
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse " aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="text-muted col-lg-12">
                                    <form action="{{route('products.update',$product->id)}}" method="POST" id="infoFormId">
                                        @csrf 
                                        @method('PATCH')
                                       
                                        <table class="table table-responsive">
                                            <tr>
                                                <td>
                                                    <label for="dd">Product Code *</label>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        value="@if(isset($product->product_code)){{$product->product_code}} @endif"
                                                        class="common" name="product_code" required>
                                                </td>
                                                <td><label for="dd">Name *</label></td>
                                                <td> <input type="text" step="any"
                                                        value="@if(isset($product->name)){{$product->name}} @endif"
                                                        class="common" name="name" required>
                                                </td>
                                                <td>
                                                    <label for="dd">Short Name *</label>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        value="@if(isset($product->short_name)){{$product->short_name}} @endif"
                                                        class="common" name="short_name" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Product Type*</label></td>
                                                <td> <select required="true" name="type_id" class="form-control "
                                                        style="width: 170px; height: 30px;">
                                                        @foreach($productTypes as $productType)
                                                        <option value="{{$productType->id}}" {{(($product->type_id==$productType->id)? 'selected':'')}}>
                                                            {{$productType->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><label for="dd">Product Category*</label></td>
                                                <td>
                                                    <select required="true" name="category_id"
                                                        class=" form-control  " style="width: 170px; height: 30px;">
                                                       
                                                        @foreach($productcategories as $productcategory)
                                                      
                                                        <option value="{{$productcategory->id}}" {{(($product->category_id==$productcategory->id)? 'selected':'')}}>
                                                            {{$productcategory->name}}</option>                                                               
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <label for="dd">Group Sequence *</label>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        value="@if(isset($product->group_seq)){{$product->group_seq}} @endif"
                                                        class="common" name="group_seq" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Computer Sequence</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->comp_seq)){{$product->comp_seq}} @endif"
                                                        class="common" name="comp_seq" required>
                                                </td>
                                                <td><label for="dd">Pack in Box *</label></td>
                                                <td> <input type="text" step="any"
                                                        value="@if(isset($product->packet)){{$product->packet}} @endif"
                                                        class="common" name="packet" required>
                                                </td>
                                                <td>
                                                    <label for="dd">Product Group *</label>
                                                </td>
                                                <td>
                                                    <select id="formrow-inputState" required="true" name="group_id"
                                                        class="form-control  " style="width: 170px; height: 30px;">
                                                       
                                                        @foreach($groups as $group)
                                                        <option value="{{$group->id}}" {{(($product->group_id==$group->id)? 'selected':'')}}>
                                                            {{$group->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Computer Arted No</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->comp_artd_no)){{$product->comp_artd_no}} @endif"
                                                        class="common" name="comp_artd_no" required>
                                                </td>
                                                <td><label for="dd">Purchase Discount%</label>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_discount)){{$product->purchase_discount}} @endif"
                                                        class="common" name="purchase_discount" required>
                                                </td>
                                                <td><label for="dd">MaxSaleDiscount %</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->max_sale_disc)){{$product->max_sale_disc}} @endif"
                                                        class="common" name="max_sale_disc" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Waight </label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->weight)){{$product->weight}} @endif"
                                                        class="common" name="weight" >
                                                </td>
                                                <td> <label for="dd">Sales Tax Val *</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->sale_tax_value)){{$product->sale_tax_value}} @endif"
                                                        class="common" name="sale_tax_value" >
                                                </td>
                                                <td><label for="dd">Inventory Days</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->inventory_day)){{$product->inventory_day}} @endif"
                                                        class="common" name="inventory_day" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Purchase Rate *</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_rate)){{$product->purchase_rate}} @endif"
                                                        class="common" name="purchase_rate" required>
                                                </td>
                                                <td><label for="dd">Purchase Tax Type*</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_tax_type)){{$product->purchase_tax_type}} @endif"
                                                        class="common" name="purchase_tax_type" required>
                                                </td>
                                                <td><label for="dd">Purchase Tax Value*</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_tax_value)){{$product->purchase_tax_value}} @endif"
                                                        class="common" name="purchase_tax_value" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <label for="dd">Advance Tax Type</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->advance_tax_type)){{$product->advance_tax_type}} @endif"
                                                        class="common" name="advance_tax_type" required>
                                                </td>
                                                <td><label for="dd">Expire Days</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->expire_day)){{$product->expire_day}} @endif"
                                                        class="common" name="expire_day" required>
                                                </td>
                                                <td><label for="dd">Purchase Tax</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_tax)){{$product->purchase_tax}} @endif"
                                                        class="common" name="purchase_tax" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Min Flat Rate</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->min_flat_rate)){{$product->min_flat_rate}} @endif"
                                                        class="common" name="min_flat_rate" required>
                                                </td>
                                                <td><label for="dd">Max Flat Rate</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->max_flat_rate)){{$product->max_flat_rate}} @endif"
                                                        class="common" name="max_flat_rate" required>
                                                </td>
                                                <td><label for="dd">Adv Tax Filer</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->adv_tax_filer)){{$product->adv_tax_filer}} @endif"
                                                        class="common" name="adv_tax_filer" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Adv Tax Non Filer *</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->adv_tax_non_filer)){{$product->adv_tax_non_filer}} @endif"
                                                        class="common" name="adv_tax_non_filer" required>
                                                </td>
                                                <td><label for="dd">Adv Tax Supplier *</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->adv_tax_supplier)){{$product->adv_tax_supplier}} @endif"
                                                        class="common" name="adv_tax_supplier" required>
                                                </td>
                                                <td><label for="dd">Purchase Price</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_price)){{$product->purchase_price}} @endif"
                                                        class="common" name="purchase_price" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">Purchase Disc Value</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->purchase_disc_value)){{$product->purchase_disc_value}} @endif"
                                                        class="common" name="purchase_disc_value" required>
                                                </td>
                                                <td><label for="dd">Re Order Level</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->re_order_level)){{$product->re_order_level}} @endif"
                                                        class="common" name="re_order_level" required>
                                                </td>
                                                <td><label for="dd">Product Shel Life Day</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->prod_shel_life_day)){{$product->prod_shel_life_day}} @endif"
                                                        class="common" name="prod_shel_life_day" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="dd">*Trade Price</label></td>
                                                <td> <input type="text"
                                                        value="@if(isset($product->trade_price)){{$product->trade_price}} @endif"
                                                        class="common" name="trade_price" required>
                                                </td>
                                            </tr>
                                        </table>
                                        <button type="submit" id="product_info"
                                            class="btn btn-primary w-md">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bonus
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="text-muted">
                                    <!-- <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal"
                                        id="product_bonus" data-bs-target="#bonus_model"> <i class="dripicons-document-edit"></i> Update </button> -->
                                        <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal"
                                        id="product_bonus" data-bs-target="#bonus_model"> <i class="dripicons-document-edit"></i> Add </button>
                                    <div class="table-responsive col-lg-12">
                                        <!-- <h4> Bonus</h4> -->
                                        <table class="table table-editable table-nowrap align-middle table-edits">
                                            <thead>
                                                <tr>
                                                    <th>Start Date</th>
                                                    <th>Stop Date</th>
                                                    <th>Qty</th>
                                                    <th>Bonus</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bonus_append_here">
                                                <?php $bi=1; ?>
                                                 @foreach($bonuses as $bonus)
                                                <tr data-id="1">
                                                    <td data-field="name">{{$bonus->start_date}}</td>
                                                    <td data-field="age">{{$bonus->end_date}}</td>
                                                    <td data-field="gender">{{$bonus->quantity}}</td>
                                                    <td data-field="gender">{{$bonus->bonus}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Discount
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="text-muted">
                                    <!-- <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal"
                                        id="product_discount" data-bs-target=".discount_model"><i class="dripicons-document-edit">Update</i>  </button> -->
                                        <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal"
                                        id="product_discount" data-bs-target=".discount_model"><i class="dripicons-document-edit">Add</i>  </button>
                                    <div class="table-responsive col-lg-12">
                                        <table class="table table-editable table-nowrap align-middle table-edits"
                                            id="Example">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Start Date</th>
                                                    <th>Stop Date</th>
                                                    <th>Discount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="append_here">
                                                <?php $di=1; ?>
                                                 @foreach($discounts as $discount)
                                                <tr>
                                                    <td data-field="name">{{$discount->start_date}}</td>
                                                    <td data-field="age">{{$discount->end_date}}</td>
                                                    <td data-field="gender">{{$discount->discount}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                Maximun Sale Quantity OverAll
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="text-muted">
                                    <button type="button" id="product_quantity" class="btn btn-info btn-sm "
                                        data-bs-toggle="modal" data-bs-target="#max_over_all_model"> <i class="dripicons-document-edit">Add</i></button>
                                    <div class="table-responsive col-lg-12">
                                        <table class="table table-editable table-nowrap align-middle table-edits">
                                            <thead>
                                                <tr>
                                                    <th>Start Date</th>
                                                    <th>Stop Date</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody id="maximum_over_all_quantity_area">
                                                <?php $mi=1; ?>
                                                @foreach($max_sale_qtys as $max_sale_qty)
                                                <tr>
                                                    <td data-field="name">{{$max_sale_qty->start_date}}</td>
                                                    <td data-field="age">{{$max_sale_qty->end_date}}</td>
                                                    <td data-field="gender">{{$max_sale_qty->quantity}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end accordion -->
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade  discount_model" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body"> 
                                 
                                <form action="{{route('discounts.store')}}" method="POST">
                                    @csrf 
                                <input type="hidden" class="product_id" name="product_id"
                                    value="@if(isset($product->id)){{$product->id}} @endif">
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item="" class="row" style="">
                                        <div class="mb-3 col-lg-3">
                                            <label for="name">Start Date</label>
                                            <input type="date" id="name" name="start_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label for="email">Stop Date</label>
                                            <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" id="email" class="form-control">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label for="subject">Discount</label>
                                            <input type="text" name="discount"  id="discount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 align-self-center">
                                            <div class="d-grid">
                                                <button type="submit"
                                                class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true"
    id="bonus_model">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel2">Bonus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card"> 
                            <div class="card-body">
                               

                                <form action="{{route('bonus.store')}}" method="POST">
                                    @csrf 
                                <div data-repeater-list="group-a">
                                    <input type="hidden" name="product_id"
                                        value="@if(isset($product->id)){{$product->id}} @endif">
                                    <div data-repeater-item="" class="row" style="">
                                        <div class="mb-3 col-lg-3">
                                            <label for="name">Start Date</label>
                                            <input type="date"  name="start_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label for="email">Stop Date</label>
                                            <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label for="subject">Qty</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label for="subject">Bonus</label>
                                            <input type="number" name="bonus" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 align-self-center">
                                            <div class="d-grid">
                                                
                                                <button type="submit"
                                                class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true"
    id="max_over_all_model">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel2">Maximum Sale Quantity Over all</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <form action="{{route('max_sale_qtyes.store')}}" method="POST">
                                    @csrf 
                                    <div data-repeater-list="group-a">
                                        <input type="hidden" name="product_id"
                                            value="@if(isset($product->id)){{$product->id}} @endif">
                                        <div data-repeater-item="" class="row" style="">
                                            <div class="mb-3 col-lg-3">
                                                <label for="name">Start Date</label>
                                                <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="email">Stop Date</label>
                                                <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="subject">Qty</label>
                                                <input type="number" name="quantity" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 align-self-center">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                    class="btn btn-primary w-md">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script>
    var bi="{{$bi}}";
var di="{{$di}}";
var mi="{{$mi}}";
// ====================Start add disc========================    
$(document).on('click', '#add_disc', function (){
// var data = $('#discModelId').serialize();
var data = new FormData($('#discModelId')[0]);
console.log(data);
var product_id=$('.product_id').val();
console.log(product_id);
var token = $("meta[name='csrf-token']").attr("content");
$.ajax({
method:'post',
cache : false,
contentType: false,
processData: false,
url: "{{ route('discountFind')}}",
data: data,

success:function(response){
var html="";
$('.discount_model').modal('hide');
if (response.status=='success')
{
// console.log(response);
html+=`<tr> <td> `+di+`</td><td >`+response.start_date+`</td><td >`+response.end_date+`</td><td>`+response.discount+`</td></tr>`;
location.reload();
}
else{
alert('Please First Select Product!!!');
} 
$('#append_here').append(html);
di++;
},                   
});
});
// ====================Start add disc========================    
// $(document).on('click', '.add_bonus', function (){
// // var data = $('#bonus_form').serialize();
// var data = new FormData($('#bonus_form')[0]);
// console.log(data);
// var product_id=$('.product_id').val();
// // alert(product_id);
// console.log(product_id);
// var token = $("meta[name='csrf-token']").attr("content");
// $.ajax({
// method:'post',
// cache : false,
// contentType: false,
// processData: false,
// data: data,
// url: "{{ route('store_bonuses')}}",
// success:function(response){
// var html="";
// $('.bonus_model').modal('hide');
// if (response.status=='success')
// {
// html+=`<tr><td> `+di+`</td><td >`+response.start_date+`</td><td >`+response.end_date+`</td><td >`+response.quantity+`</td><td >`+response.bonus+`</td></tr>`;

// location.reload();
// }
// else{
// alert('Please First Select Product!!!');
// } 
// $('#bonus_append_here').append(html);
// di++;

// },                   
// });
// });     
// ====================Start add disc========================    
$(document).on('click', '.add_max_sale_qty_btn', function (){
var data = new FormData($('#max_sale_qty_form')[0]);
$.ajax({
method:'post',
cache : false,
contentType: false,
processData: false,
data: data,
url: "{{ route('store_max_sale_quantity')}}",
success:function(response){
$('#max_over_all_model').modal('hide');
var html="";
if (response.status=='success')
{
html+=`<tr><td>`+mi+`</td><td >`+response.start_date+`</td><td >`+response.end_date+`</td><td >`+response.quantity+`</td></tr>`;
location.reload();
}else{
alert('Please First Select Product!!!');
}
// $('#append_here').empty();
$('#maximum_over_all_quantity_area').append(html);
mi++;
},                   
});
});     
// ====================End add disc========================      
</script>
@endpush