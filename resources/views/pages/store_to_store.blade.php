@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Branch To Branch Transfer</h4>
        <form class="col s12" method="post" action="{{url('transferProduct')}}" id="tab-01-form"
          enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputState" class="form-label">From</label>
                <select name="from_branch_id" id="from_branch_id" class="form-select select2 from_branch_id">
                  <option selected disabled="" value="">Choose Branch</option>
                  @foreach($branches as $branch)
                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="">
                <label for="formrow-inputState" class="form-label"></label><br>
                <p style="text-align: center;font-size: 25px; font-weight: 20px;">Transfer To</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputState" class="form-label">To </label>
                <select name="to_branch_id" class="form-select select2">
                  <option selected disabled="" value="">Choose Branch</option>
                  @foreach($branches as $branch)
                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputState" class="form-label">Search Product </label>
                <select class=" select2 form-control product_id _products_select " name="product_code_name"
                  id="_products_select">
                  <option value="0" disabled="true" selected="true">Choose Product </option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputState" class="form-label"> </label>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputState" class="form-label">Transfer Date </label>
                <input type="date" name="expire_date" value="<?php echo date('Y-m-d')?>" class="form-control"
                  required="">
              </div>
            </div>
          </div>
          <div class="table-responsive" style="border:none;">
            <table class="table table-hover order-list">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Products</th>
                  <th>Stock Quanity</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="append_here">
              </tbody>
              <tfoot>
                <hr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-3 ">
                <label for="validationCustom01" class="form-label">Description </label>
                <textarea type="text" cols="4" rows="4" name="description" class="form-control" id="validationCustom01"
                  required></textarea>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary w-md">Transfer</button>
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
// =============================for product work select2 and onchange append row================
   $("._products_select").select2({
    ajax: {
        type: 'get',
        url: "{{url('get_all_prod')}}",
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
    placeholder: 'Search for a product',
    minimumInputLength: 2,
    }).on('change', function (data) {
     var id=$(this).val();
        console.log(id);
        $.ajax({
            type: 'GET',
            url: '{{url("get_prod")}}',
            data: {
                id: id
                  },
            success: function(data) 
            {
             console.log(data);
             var table_body=$("table.order-list tbody"); // assign table body to variable used in different area
             var table_body=$("table.order-list tbody"); // assign table body to variable used in different area
             var new_row= `<tr class="table_append_rows" id="table_append_rows_`+row_id+`">
             <td class="product_count">`+product_count+` </td>
             <td class="name"><input type="hidden" name="product_id[]" value="`+data.product.id+`"/> `+data.product.name+` </td>
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
               $("._products_select").val(''); // empty the product selection after row appending
              product_count++;
              row_id++;
            }
        });
  });
    $(document).on('click','.delete_row',function(){
        $(this).closest('tr').remove();
        // do_calculation();
    });
</script>
<!-- ================================START ADD  AJAX PROPERTY WORK=================== -->
@endpush