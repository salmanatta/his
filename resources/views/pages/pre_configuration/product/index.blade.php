@extends('layouts.main')
@section('content')
<!-- Modal -->
<style>
       @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 90%; /* New width for default modal */
        }
    }
</style>
<div class="container">
    <div class="row">
   <div class="col-12">
    <div id="editModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" >
                <div class="modal-header">
                    {{-- <button type="button" class="close  stop" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true" data-dismiss="modal" aria-label="Close">×</span>
                    </button> --}}
                    <h4 class="modal-title" id="myModalLabel2">Product Detail</h4>
                </div>
                <div class="modal-body" >
                    <!-- <div class="table-responsive">
                        <table class="table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Short Name</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Packet</th>
                                <th>Group</th>
                                <th>Comp Artd NO</th>
                                <th>Group Seq</th>
                                <th>Comp Seq</th>
                                <th>Waight</th>
                                <th>MAX Sale Disc</th>
                                <th>Purchase Price</th>
                                <th>Purchase Tax Type</th>
                                <th>Purchase Tax Val</th>
                                <th>Sale Tax Val</th>
                                <th>Re Order Level</th>
                                <th>Product Shel life</th>
                                <th>Trade Price</th>
                                <th>Purchase Discount Val</th>
                                <th>Purchase Discount </th>
                                <th>Purchase Rate </th>
                                <th>Purchase Tax </th>
                                <th>Inventory Days</th>
                                <th>Advance Tax Type</th>
                                <th>Expire Days</th>
                            </tr>
                            <tbody>
                                <td id="id"></td>
                                <td id="name"></td>
                                <td id="code"></td>
                                <td id="short_name"></td>
                                <td ></td>
                                <td ></td>
                                <td id="packet"></td>
                                <td id="group_id"></td>
                                <td id="comp_artd_no"></td>
                                <td id="group_seq"></td>
                                <td id="comp_seq"></td>
                                <td id="weight"></td>
                                <td id="max_sale_disc"></td>
                                <td id="purchase_price"></td>
                                <td id="purchase_tax_type"></td>
                                <td id="purchase_tax_value"></td>
                                <td id="sale_tax_value"></td>
                                <td id="re_order_level"></td>
                                <td id="prod_shel_life_day"></td>
                                <td id="trade_price"></td>
                                <td id="purchase_disc_value"></td>
                                <td id="purchase_discount"></td>
                                <td id="purchase_rate"></td>
                                <td id="purchase_tax"></td>
                                <td id="inventory_day"></td>
                                <td id="advance_tax_type"></td>
                                <td ></td>
                            </tbody>
                        </table>
                    </div>  -->
                    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card"> 
                    <div class="card-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="logo-light.png"
                                        height="20" />
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="float-end font-size-16" id="id">Product ID </h4>
                                </div>
                               <!--  <div class="col-lg-4">
                                    <a href="javascript:window.print()" class="float-end btn btn-success d-print-none"><i
                                            class="fa fa-print ">Print</i></a>
                                </div> -->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                    <strong>Product:</strong><br>
                                   <p id="name"></p>
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <address class="mt-2 mt-sm-0">
                                    <strong>Product Code:</strong><br>
                                   <p id="code"></p>
                                </address>
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="col-sm-6 text-sm-end"> --}}
                                    <address>
                                        <strong>Exp Day:</strong><br>
                                       <p id="expire_day"></p>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Category:</strong><br>
                                       <p id="category_id"></p>
                                    </address>
                                </div>
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Type</strong><br>
                                       <p id="type_id"></p>
                                    </address>
                                </div>
                                 <div class="col-sm-4">
                                    <address>
                                        <strong>Inventory Days</strong><br>
                                       <p id="inventory_day"></p>
                                    </address>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Packet:</strong><br>
                                       <p id="packet"></p>
                                    </address>
                                </div>
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Re Order Level</strong><br>
                                       <p id="re_order_level"></p>
                                    </address>
                                </div>
                                 <div class="col-sm-4">
                                    <address>
                                        <strong>Comp Artd No</strong><br>
                                       <p id="comp_artd_no"></p>
                                    </address>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Group Seq:</strong><br>
                                       <p id="group_seq"></p>
                                    </address>
                                </div>
                                <div class="col-sm-4">
                                    <address>
                                        <strong>Comp Seq</strong><br>
                                       <p id="comp_seq"></p>
                                    </address>
                                </div>
                                 <div class="col-sm-4">
                                    <address>
                                        <strong>Product Shel Life Day</strong><br>
                                       <p id="prod_shel_life_day"></p>
                                    </address>
                                </div>
                            </div>

                            <div class="py-2 mt-3">
                                <h3 class="font-size-15 fw-bold text-center">Order Details</h3>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-nowrap" border="1px">
                                <thead>
                                    <tr style="background-color:#e4e6eb;">
                                        {{-- <th style="width: 70px;">No.</th> --}}
                                <!-- <td>Name</td> -->
                                <td>Price</td>
                                <td>Purchase Price</td>
                                <td>Purchase Discount</td>
                                <td>Max Sale Discount</td>
                                <td>Purchase Tax Type</td>
                                <td>Sale Tax</td>
                                <td>Purchase Rate</td>
                                <td>Purchase Tax</td>
                                <td>Advance Tax Type</td>

                                <!-- <th class="text-end">Line Total</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td id="trade_price"></td>
                                <td id="purchase_price"></td>
                                <td id="purchase_discount"></td>
                                <td id="max_sale_disc"></td>            
                                <td id="purchase_tax_type"></td>
                                <td id="sale_tax_value"></td>
                                <td id="purchase_rate"></td>
                                <td id="purchase_tax"></td>
                                <td id="advance_tax_type"></td>
                                </tr>
                                    <tr>
                                        <td colspan="4" class="border-0 text-end">
                                            <strong>Total</strong></td>
                                        <td class="border-0 text-end"><h4 class="m-0">877</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by The Blue
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger stop" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
   </div>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                            href="{{route('products.create')}}"><i class="mdi mdi-plus me-1"></i> Add Product</a>
                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox"="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th class="align-middle"> Code #</th>
                            <th class="align-middle">Product Name</th>
                            <th class="align-middle">Short Name</th>
                            <th class="align-middle">Group</th>
                            <th class="align-middle">Packet</th>
                            <th class="align-middle">Comp Artd No</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                                <input type="hidden" id="product_id" value="{{$product->id}}">
                            </td>
                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$product->product_code}}</a>
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->short_name}}</td>
                            <td>{{$product->group_id}}</td>
                            <td>{{$product->packet}}</td>
                            <td>{{$product->comp_artd_no}}</td>
                            <!-- <td>{{$product->group_seq}}</td>
                                    <td>{{$product->comp_seq}}</td> -->
                            <!-- <td>{{$product->weight}}</td>
                                    <td>{{$product->sale_price}}</td>
                                    <td>{{$product->max_sale_disc}}</td>
                                    <td>{{$product->purchase_price}}</td>
                                    <td>{{$product->purchase_tax_type}}</td>
                                    <td>{{$product->purchase_tax_value}}</td>
                                    <td>{{$product->sale_tax_value}}</td>
                                    <td>{{$product->tax3_type}}</td>
                                    <td>{{$product->tax3_value}}</td>
                                    <td>{{$product->purchase_disc_value}}</td>
                                    <td>{{$product->re_order_level}}</td>
                                    <td>{{$product->prod_shel_life_day}}</td>
                                    <td>{{$product->trade_price}}</td> -->
                            <td>
                                <div class="d-flex gap-3">
                                    <a type="button" class="btn btn-primary btn-sm detail_view_button"><i
                                            class="mdi mdi-eye font-size-18"></i>
                                    </a>
                                    <a href="{{url('getProduct/'.$product->id)}}" class="text-success"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                    <!-- <a  href="{{route('products.destroy',$product->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <form method="post" action='{{route("products.destroy",$product->id) }}'>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
@endsection
@push('script')
<script>
    $(".detail_view_button").click(function(){
// var product_id=$('#product_id').val();
var product_id=$(this).closest('tr').find('#product_id').val();
$.ajax({
     type:'get',
     url:'getProductDetail',
     dataType:'json',
     data:{
        'product_id':product_id,
    },
     success:function(data){
          $('#id').text(data.id);
          $('#name').text(data.name);
          $('#short_name').text(data.short_name);
          $('#code').text(data.product_code);
          $('#type_id').text(data.type_id);
          $('#category_id').text(data.category_id);
          $('#packet').text(data.packet);
          $('#group_id').text(data.group_id);
          $('#comp_artd_no').text(data.comp_artd_no);
          $('#group_seq').text(data.group_seq);
          $('#comp_seq').text(data.comp_seq);
          $('#weight').text(data.weight);
          $('#max_sale_disc').text(data.max_sale_disc);
          $('#purchase_price').text(data.purchase_price);
          $('#purchase_tax_type').text(data.purchase_tax_type);
          $('#purchase_tax_value').text(data.purchase_tax_value);
          $('#sale_tax_value').text(data.sale_tax_value);
          $('#re_order_level').text(data.re_order_level);
          $('#prod_shel_life_day').text(data.prod_shel_life_day);
          $('#trade_price').text(data.trade_price);
          $('#purchase_disc_value').text(data.purchase_disc_value);
          $('#purchase_discount').text(data.purchase_discount);
          $('#purchase_rate').text(data.purchase_rate);
          $('#purchase_tax').text(data.purchase_tax);
          $('#inventory_day').text(data.inventory_day);
          $('#advance_tax_type').text(data.advance_tax_type);
          $('#expire_day').text(data.expire_day);
          $('#editModal').modal('show');
              }
});
});
$(".stop").click(function(){
 $('#editModal').modal('hide');
});
</script>
@endpush