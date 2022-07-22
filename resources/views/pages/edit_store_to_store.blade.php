@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Update  Branch To Branch Transfer</h4>

        <form class="col s12" method="post" action="{{route('transferProduct.Update',$storeTransfer->id)}}" id="tab-01-form" enctype="multipart/form-data">
          @csrf
          @method('PUT')


          <div class="row">
                            <!-- <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Branch Id</label>
                                    <input type="number" name="branch_code" class="form-control" placeholder="Enter Branch ID" id="validationCustom01" 
                                        required>
                                </div>
                              </div> -->
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label for="formrow-inputState"  class="form-label">From</label>
                                  <select  name="from_branch_id" onchange="getProduct()" id="from_branch_id" class="form-select select2 from_branch_id">
                                   <option selected disabled="" value="">Choose Branch</option>
                                   @foreach($branches as $branch)
                                   @if($branch->id==$storeTransfer->from_branch_id)
                                   <option value="{{$branch->id}}" selected="">{{$branch->name}}</option>
                                   @else
                                   <option value="{{$branch->id}}">{{$branch->name}}</option>
                                   @endif
                                   @endforeach
                                 </select>
                               </div>
                             </div>
                             <div class="col-lg-4">
                              <div class="">
                                <label for="formrow-inputState"  class="form-label"></label><br>
                                <p style="text-align: center;font-size: 25px; font-weight: 20px;">Transfer To</p>
                              </div></div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label for="formrow-inputState"  class="form-label">To </label>
                                  <select  name="to_branch_id" class="form-select select2">
                                   <option selected disabled="" value="">Choose Branch</option>
                                   @foreach($branches as $branch)
                                    @if($branch->id==$storeTransfer->to_branch_id)
                                   <option value="{{$branch->id}}" selected="">{{$branch->name}}</option>
                                   @else
                                   <option value="{{$branch->id}}">{{$branch->name}}</option>
                                   @endif
                                   @endforeach
                                 </select>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                            <div class="col-lg-4">
                              <div class="mb-3">

                                <label for="formrow-inputState"  class="form-label">Search Product </label>
                                <select class=" select2 form-control product_id  _products_select" name="product_code_name" id="_products_select">
                                  <option value="0" disabled="true" selected="true">Choose Product </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="mb-3">
                                <label for="formrow-inputState"  class="form-label"> </label>
                               
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="mb-3">
                                <label for="formrow-inputState"  class="form-label">Transfer Date  </label>
                                <input type="date" name="expire_date" value="<?php echo date('Y-m-d')?>" class="form-control" required="">
                              </div>
                            </div>
                          </div>
                              <!-- <div class="db-2-com db-2-main">
           
               
                        
                          <div class="db-2-main-com db2-form-pay db2-form-com">
                              @csrf
                              <input type="hidden" name="property_id" > -->

                              <div class="table-responsive" style="border:none;">
                                <table class="table table-hover order-list">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Item</th>
                                      <th>Stock Quanity</th>
                                      <th>Qty</th>
                                      <th>Price</th>
                                <!-- <th>Discount</th>
                                <th>After Discount</th>
                                <th>Bonus</th> -->
                                <!-- <th>Line Total</th> -->
                              </tr>
                            </thead>
                            <tbody id="append_here">
                            <?php $i=1; ?>
                              <tr>

                                <td>{{$i}}</td>
                                <td><input type="hidden" name="product_id[]" value="{{$storeTransfer->product->id}}"/><button type="button" class="edit-product btn btn-link">{{$storeTransfer->product->name}} <i class="dripicons-document-edit"></i></button></td>
                                <td>24</td> <!-- work on after  -->
                                <td><input type="number" class="form-control"   name="quantity[]" value="{{$storeTransfer->quantity}}" step="any" /></td>
                                <td>
                                  <input type="number" class="form-control"   name="price[]" value="{{$storeTransfer->price}}" step="any" /></td>
                                  <td><button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button></td>

                              </tr>

                            </tbody>
                            <tfoot>
                              <hr>

                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <!-- <td></td>
                                <td></td>
                                <td></td> -->
                                <!-- <td style="width:8%;text-align:right" class="_tfootTotal">Rs :0</td>
                                  <th style="width:10%;text-align:right">Grand Total</th> -->

                                </tr>



                              </tfoot>
                            </table>
                          </div>
               <!-- <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-info">Add Menu</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div> -->
                <!-- </form> -->
                <!-- </div> -->

                <div class="row">

                  <div class="col-lg-6">
                    <div class="mb-3 ">
                     <label for="validationCustom01" class="form-label">Description </label>
                     <textarea type="text" cols="4" rows="4" name="description" class="form-control"  id="validationCustom01" 
                     required>{{$storeTransfer->description}}</textarea>
                     <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>

              </div>

              <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
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


    @stop
    @push('script')
    <script>
     var products = [];
     function getProduct(){
      var branch_id=$(".from_branch_id").val();
      $.ajax({
        type:'get',
        // url:'{!!URL::to('categoryFind')!!}',
        url: '/productFind',
        data:{'branch_id':branch_id},
        success:function(data){
          var op = "<option value=''>Choose</option>";
          $.each(data, function(k, v)
          {
            var id = data[k].id;
            var val = data[k].product.name;
            op += "<option value='"+id+"'>"+val+"</option>";
          });
          $('#product_id').html(" ");
          $('#product_id').append(op);
        },
        error:function(){
        }
      });
    }


 // Initialize select2
 $(".product_id").select2({
  ajax: {
    url: "{{ route('getStock') }}",
    type: "get",
    minimumInputLength: 3,
    delay: 250,
    dataType: 'json',
    data: function (params) {
      return {

        query: params.term
      };
    },
    processResults: function (data) { 
     return {

       results: $.map(data, function(obj) {
        return { id: obj.id, text: obj.product.name };
      })
    };
  },
  cache: true

}
});

 var product_count=1;
 var row_id=1;
 $(document).on('change', '.product_id', function (){
  var product_id=$(this).val();
  console.log(product_id);
  
  $.ajax({
    type:'get',
    url: "{{ route('productGet')}}",
    data:{'product_id':product_id},
    datatype:'json',
    success:function(data){
      console.log(data);
               // temp_unit_name = (data[6]).split(',');
             var table_body=$("table.order-list tbody"); // assign table body to variable used in different area
             var new_row= `<tr class="table_append_rows" id="table_append_rows_`+row_id+`">
             <td class="product_count">`+product_count+` </td>
             <td class="name"><input type="hidden" name="product_id[]" value="`+data.product.id+`"/> <button type="button" class="edit-product btn btn-link">`+data.product.name+`  <i class="dripicons-document-edit"></i></button></td>
             <td class="unit_cost_after_discount" >`+data.quantity+`</td>
             <td class="qty">
             <input type="number" class="form-control all_qty" min="1"  name="quantity[]" value="1" step="any" required/>
             </td> 
             <td class="price">
             <input type="number" class="form-control"   name="price[]" value="`+data.price+`" step="any" required/>
             </td> 
             <td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>
             </tr>`;
             table_body.append(new_row); // append new row to table body
             $("#product_id").val($("#product_id option:first").val());
              // $("input[name='product_code_name']").val(''); // empty the product selection after row appending
              product_count++;
              row_id++;
            },
          });
});
 $(document).on('click','.delete_row',function(){
  $(this).closest('tr').remove();
});
</script>
<!-- ================nnnnnnnnnew================START ADD  AJAX PROPERTY WORK=================== -->

<script type="text/javascript">
  var product_count=1;
    var row_id=1;

// =============================for product work select2 and onchange append row================
   $("._products_select").select2({
    ajax: {
        type: 'get',
        url: "{{url('get-all-products')}}",
        dataType: 'json',
        // delay: 250,
        data: function (params) {
        return {
            q: params.term, // search term
            // page: params.page
        };
        },
        processResults: function (data, params) {
            console.log(data);
            // productSearch(data);
            // appendRow(data);
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        // params.page = params.page || 1;

        return {
            results: data.items,
            // pagination: {
            // more: (params.page * 30) < data.total_count
            // }
            };
            
        },
        cache: true
    },
    placeholder: 'Search for a product',
    minimumInputLength: 3,
    // templateResult: formatRepo,
    // templateSelection: formatRepoSelection
    }).on('change', function (data) {
     var id=$(this).val();
        console.log(id);


    // var count=0;
    // var total=0;
    // function productSearch(data) {
        $.ajax({
            type: 'GET',
            url: '{{url("/get_product")}}',
            data: {
                id: id
                  },
            success: function(data) 
            {
                console.log(data);

             var table_body=$("table.order-list tbody"); // assign table body to variable used in different area
             var new_row= `<tr class="table_append_rows" id="table_append_rows_`+row_id+`">
                                
                                <td class="product_count">`+product_count+` </td>
                                <td class="name"> <input type="hidden" name="product_id[]" value="`+data.id+`"/><input type="hidden" name="product_name[]" value="`+data.name+`"/><button type="button"  class="edit-product btn btn-link"> <i class="dripicons-document-edit"></i>`+data.name+`</button></td>
                                <td class="qty">
                                    <input type="number" class="form-control all_qty" min="1" onkeyup="do_calculation()" name="quanity[]" value="1" step="any" required/>
                                </td>

                                <td class="purchase_price">
                                    <input type="number" class="form-control purchase_price" value="`+data.purchase_price+`"  name="purchase_price[]" step="any" required/>
                                </td>
                                <td class="purchase_discount">
                                    <input type="number" class="form-control purchase_discount" value="`+data.purchase_discount+`"  name="purchase_discount[]" step="any" required/>
                                </td>
                                 <td class="after_discount">
                                    <input type="number" class="form-control after_discount" value="0"  name="after_discount[]" step="any" required/>
                                </td>
                                <td class="bonus">
                                    <input type="number" class="form-control bonus" value="0"  name="bonus[]" step="any" required/>
                                </td>
                                <td class="line_total">
                                    <input type="number" class="form-control line_total" value="0"  name="line_total[]" step="any" required/>
                                </td>
                                

                                <td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>
                               

                                
                                <input type="hidden" class="hidden_total"             name="total" value="0">
                                <input type="hidden" class="sub_total" name="sub_total" value="0">

                             </tr>`;
                                // <input type="hidden" class="hidden_unit_tax"        name="unit_tax[]" value="0">
             table_body.append(new_row); // append new row to table body
               $("._products_select").val(''); // empty the product selection after row appending
              product_count++;
              row_id++;
            }
        });
  });


    $(document).on('click','.delete_row',function(){
        $(this).closest('tr').remove();
        do_calculation();
    });
    
</script>



@endpush