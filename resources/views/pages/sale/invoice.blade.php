@extends('layouts.main')
@section('content')
<div class="row">
    <!--  Large modal example -->
<!-- /.modal -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form class="" method="post" action="{{route('sale_invoices.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title mb-4 text-center">Sale Invoice Detail</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="_invoice_no "><span>Sale Invoice No :</span>#<span
                                                class="_invoice_no_txt">{{$invoice_no ?? ''}}<input type="hidden"
                                                    value="{{$invoice_no}}" name="invoice_no"></span></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="select2 form-control _customers_select" name="customer_id">
                                            </select>
                                            @error('customer_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                         </div>
                                        <div class="col-md-6">
                                            <div class="_invoice_header">
                                                <input type="hidden" name="branch_id" value="1">
                                                <p class=""><span><input name="date"
                                                     value="{{date('M-d-y')}}" id="datepickercustom" class="form-control _date"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <select class="select2 form-control _products_select" id="_products_select"
                                                name="product_id">
                                            </select>
                                            <!--  <input type="text" class="_products_select form-control" name="product_code_name" id="lims_productcodeSearch" placeholder="Please type product code and select..." class="form-control" /> -->
                                            @error('product_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <textarea placeholder="description" cols="12" name="description" rows="3"
                                                class="form-control _description" style="resize: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table  order-list _saleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Products</th>
                                <th>Batch</th>
                                <th>Stock Quanity</th>
                                <th>Quanity</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>After Discount</th>
                                <th>Bonus</th>
                                <th>Line Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="width:10%;text-align:right">Grand Total</td>
                                <td style="width:8%;text-align:right" class="_tfootTotal">0</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="mx-10">
                        <button type="submit" class="btn btn-primary w-md ">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"> Batch Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form >
                 <input type="hidden" name="edit_row_id">
               <input type="hidden" name="product_modal" id="product_modal"> 
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="batch_no">Batch No</label>
                    <select name="batch_id" id="edit_batch" class="form-control"> 
                    </select>
                </div>
              </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_modal">Update</button>
        </div>
</form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection
@push('script')
<script>
    // ======================for customer ===============
$("._customers_select").select2({
ajax: {
type: 'get',
url: "{{url('common_customer')}}",
dataType: 'json',
data: function (params) {
return {
q: params.term, 
};
},
processResults: function (data, params) {
console.log(data);
return {
results: data.items,
};
},
cache: true
},
placeholder: 'Search  Customer',
minimumInputLength: 2,
});
var product_count=1;
var row_id=1;
// =============================for product work select2 and onchange append row================
function custom_select2(selector,url,placeholder = false){
$(selector).select2({
ajax: {
type: 'get',
url: url,
dataType: 'json',
// delay: 250,
data: function (params) {
return {
q: params.term, // search term
};
},
processResults: function (data, params) {
return {
results: data.items,
};
},
cache: true
},
allowClear: true,
placeholder: placeholder || "custom",
minimumInputLength: 2,
// templateResult: formatRepo,
// templateSelection: formatRepoSelection
})
}
function empty_select2(selector) {
$(selector).html('').select2({data: [{id: '', text: ''}]});
}
custom_select2("._products_select","{{url('get-all-sale-products')}}",'Search for a product');
$("._products_select").on('change', function (data) {
var id=$(this).val();
console.log(id);
// var count=0;
// var total=0;
// function productSearch(data) {
$.ajax({
type: 'GET',
url: '{{url("get-stock")}}/'+id,
// data: {
//     id: id
//       },
success: function(data)  
{
console.log(data);
var table_body=$("table.order-list tbody"); // assign table body to variable used in different area   
var new_row= `<tr class="table_append_rows" id="table_append_rows_`+row_id+`" >

<td class="product_count">`+product_count+`</td>
<td class="name"><input type="hidden" name="id[]" value="`+data.productArr.id+`"/>
     <input type="hidden" id="product_id" name="product_id[]" value="`+data.productArr.product_id+`"/>
     <input type="hidden" id="product_name" name="product_name[]" value="`+data.productArr.product.name+`"/>
     `+data.productArr.product.name+`</td>
      <td class="batch_no_id"> <button type="button" id="batch_no_id" data-bs-toggle="modal" class="btn btn-primary btn-sm edit_modal batch_no_id" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-product_id="`+data.productArr.id+`" >`+data.productArr.batch.batch_no+` <i class="dripicons-document-edit"></i></button></td>
<td class="qty">
<input type="number" class="form-control all_qty" id="all_qty" min="1" value="`+data.productArr.quantity+`" step="any" readonly="" required/>
</td>
<td class="qty_sale">
<input type="number" class="form-control qty_sale" id="qty_salet" min="1"  onkeyup="do_calculation()"  name="quanity[]" value="1" step="any" required/>
</td>
<td class="purchase_price">
<input type="number" class="form-control purchase_price price" id="price" value="`+data.productArr.price+`"  name="purchase_price[]" step="any" required/>
</td>
<td class="purchase_discount">
<input type="number" class="form-control purchase_discount" id="purchase_discount" value="`+data.productArr.product.purchase_discount+`"  name="purchase_discount[]" step="any" required/>
</td>
<td class="after_discount">
<input type="number" class="form-control after_discount" id="after_discount" value="0"  name="after_discount[]" step="any" required/>
</td>
<td class="bonus">
<input type="number" class="form-control bonus" value="0" id="bonus" name="bonus[]" step="any" required/>
</td>
<td class="line_total">
<input type="number" class="form-control line_total" value="0" id="line_total"  name="line_total[]" step="any" required/>
</td>
<td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>
<input type="hidden" class="hidden_total"             name="total" value="0">
<input type="hidden" class="sub_total" name="sub_total" value="0">
</tr>`;
// <input type="hidden" class="hidden_unit_tax"        name="unit_tax[]" value="0">
table_body.append(new_row); // append new row to table body
product_count++;
row_id++;
do_calculation();
empty_select2("._products_select"); // empty the product selection after row appending
custom_select2("._products_select","{{url('get-all-sale-products')}}",'Search for a product');
}
});
});
$(document).on('click','.delete_row',function(){
$(this).closest('tr').remove();
do_calculation();
});
function do_calculation() 
{
// Declare variable for grand calculation
var line_total=0; 
var sub_total=0;
var grand_discount=0; 
var total_qty=0; 
var  product_count=1;
var  grand_subtotal=0;
$('.table_append_rows').each(function()  // run loop on all append rows for calculation and value reseting
{
$(this).find('.product_count').text(product_count);// get qty from row
var qty=$(this).find('.qty_sale').find('input').val(); // get qty from row
total_qty+=parseInt(qty);
// var purchase_price=parseInt($(this).find('.purchase_price').val()); // take unit price from row
var purchase_price=$(this).find('.purchase_price').find('input').val(); // get qty from row
//  var tax_type=$(this).find('.hidden_tax_type').val(); // get tax type from hidden filed
// var tax_percentage=$(this).find('.hidden_tax_percentage').val(); // get tax percentage from hidden 
$(this).find('.hidden_purchase_price').val(purchase_price); // put unit price in hidden input field
// var purchase_discount=parseFloat($(this).find('.purchase_discount').val());
var purchase_discount=$(this).find('.purchase_discount').find('input').val();
var all_qty=parseFloat($(this).find('.qty_sale').val());
grand_discount+=(purchase_discount*all_qty);
var price_after_discount=purchase_price-purchase_discount; // calculate unit price after discount
console.log(price_after_discount);
$(this).find('.after_discount').val(price_after_discount); // set u_price after discount in row td
var row_sub_total=parseFloat(qty*price_after_discount);
$(this).find('.sub_total').val(row_sub_total);
$(this).find('.line_total').val(row_sub_total);
grand_subtotal+=row_sub_total;
$("._tfootTotal").text(grand_subtotal);

$("input[name='total_qty']").val(total_qty);
$("input[name='item']").val(product_count);
product_count++;
});
// }
// function myFunction(){
var qty_new=$('.qty_sale').find('input').val();
var s_qty=parseFloat($('.all_qty').val());
var line=parseFloat($('.after_discount').val());
if(qty_new>s_qty){
alert("Quantity Must be less then Stock Quantity!");
$('.qty_sale').find('input').val(1);
$('.line_total').find('input').val(line);
$("._tfootTotal").text(line);
}   
}


// @@@@@@@@@@@@@@@@@@@@@@   batch @@@@@@@@@@@@@@@@
 $(document).on('click', '.edit_modal', function (){
  var row_id=$(this).closest('.table_append_rows').attr('id');
      $('input[name="edit_row_id"]').val(row_id);

   // console.log(row_id);
  // return false;
  var product_id=$(this).data('product_id');
  var product_id_modal=$(this).data('product_id');
  // console.log(product_id);
  
  $.ajax({
    type:'get',
    url: "{{ route('getBatches')}}",
    data:{'product_id':product_id},
    datatype:'json',
    success:function(data){
      console.log(data);
        var tr=$(this).parent().parent();
          var op = "";
          $('#product_modal').val(product_id_modal); //this is used to get against this product batch
          $.each(data, function(k,val)
            {
             if (val.batch.id!=null && val.batch.id!="") {
                op +="<option value='"+val.batch.id+"' data-price="+val.price+"  data-quantity="+val.quantity+">"+val.batch.batch_no+" "+" Quantity - "+val.quantity+"</option>";
            }  
            }); 
             $('input[name="edit_row_id"]').val(row_id) ;
             $('#edit_batch').html(" ");
             $('#edit_batch').append(op);
              
            },
          });
});


 // @@@@@@@@@@@@@@@@@@@@@@   batch update@@@@@@@@@@@@@@@@
// var product_count=1;
// var row_id=1;
 $(document).on('click', '.update_modal', function (){
   // var tr=$(this).closest('.table_append_rows').attr('id');
   // console.log(tr);
  var product_id=$('#product_modal').val();
  var price=$('#edit_batch :selected').data('price');
//   alert(price);
  var quantity=$('#edit_batch :selected').data('quantity');
  // var price=$('#edit_batch').data('price');
  // var quantity=$('#edit_batch').data('quantity');

  var batch_id_modal= $("#edit_batch :selected").text();
  // var batch_no_edit= $("#edit_batch :selected").text();
        // var row_id=$(this).closest('.table_append_rows').attr('id');
        //  $('input[name="edit_row_id"]').val(row_id);
        // var row_id_for_editing=$(this).closest('tr').attr('id');

  // var row_id_for_editing= $('input[name="edit_row_id"]').val();
     var row_id_for_editing= $('input[name="edit_row_id"]').val();
  console.log(row_id_for_editing);
  console.log(quantity);
  console.log(price);
  
  // $.ajax({
  //   type:'get',
  //   url: "{{ route('getBatcheWiseProduct')}}",
  //   data:{'product_id':product_id,'batch_id_modal':batch_id_modal},
  //   datatype:'json',
  //   success:function(data){
  //           console.log(data);

             $('#'+row_id_for_editing).find('.all_qty').val(quantity);
             $('#'+row_id_for_editing).find('#batch_no_id').val(batch_id_modal);
           $('#'+row_id_for_editing).find('.price').val(price);
              // $('#'+row_id_for_editing).find('#purchase_discount').find('input').val(data.product.purchase_discount);
          
 $(".bs-example-modal-lg").modal('hide');
      do_calculation();
          //   },
          // });
});
</script>

@endpush