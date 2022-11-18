@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Transfer Branch To</h4>
        <form class="col s12" method="post" action="{{url('transferProduct')}}" id="tab-01-form" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-4">
              <div class="col-md-10">
                <div class="mb-3">
                  <label for="trans_date" class="col-md-2 col-form-label">Transfer Date </label>
                  <input type="text" name="trans_date" value="<?php echo date('m/d/Y') ?>" class="form-control" required="" id="fiveDays" >
                </div>
              </div>
              <div class="col-md-10">
                <div class="mb-3">
                  <label for="formrow-inputState" class="form-label">Search Product </label>
                  <select class=" select2 form-control product_id _products_select " name="product_id" id="_products_select">
                    <option value="0" disabled="true" selected="true">Choose Product </option>
                  </select>
                  @error('product_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
              <div class="col-md-10">
                <div class="mb-3">
                  <label for="formrow-inputState" class="form-label">To </label>
                  <select name="to_branch_id" class="form-select select2">
                    <option selected disabled="" value="">Choose Branch</option>
                    @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                  </select>
                  @error('to_branch_id')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-10">
                <div class="mb-3 ">
                  <label for="description" class="form-label">Description </label>
                  <textarea type="text" cols="4" rows="4" name="description" class="form-control" id="description"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table mb-0 order-list _saleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Products</th>
                      <th>Batch</th>
                      <th>Expiry Date</th>
                      <th>Current Qty</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Line Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="append_here">
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
              </div>
            </div>
          </div>
          <div class="row">
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-success me-1">Save</button>
              <a class="btn btn-danger mx-0" href="{{ url('/') }}">Exit</a>
            </div>
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


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"> Batch Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_modal" data-bs-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
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
      data: function(params) {
        return {
          query: params.term
        };
      },
      processResults: function(data) {
        return {
          results: $.map(data, function(obj) {
            return {
              id: obj.id,
              text: obj.product.name
            };
          })
        };
      },
      cache: true
    }
  });
  var product_count = 1;
  var row_id = 1;
  // =============================for product work select2 and onchange append row================
  $("._products_select").select2({
    ajax: {
      type: 'get',
      url: "{{url('get-all-sale-products')}}", // get_all_prod
      dataType: 'json',
      data: function(params) {
        return {
          q: params.term,
        };
      },
      processResults: function(data, params) {
        // console.log(data);
        return {
          results: data.items,
        };
      },
      cache: true
    },
    placeholder: 'Search for a product',
    minimumInputLength: 2,
  }).on('change', function(data) {
    var id = $(this).val();
    // console.log(id);
    $.ajax({
      type: 'GET',
      url: '{{url("get-stock")}}/' + id, // get_prod
      // data: {
      //   id: id
      // },
      success: function(data)
      {
          // console.log(data);
        var table_body = $("table.order-list tbody"); // assign table body to variable used in different area
        var new_row = `<tr class="table_append_rows" id="table_append_rows_` + row_id + `" >
        <td class="product_count">` + product_count + `</td>
        <td class="name">
            <input type="hidden" name="id[]" value="` + data.productArr.id + `"/>
            <input type="hidden" id="product_id" name="product_id[]" value="` + data.productArr.product_id + `"/>
            <input type="hidden" id="product_name" name="product_name[]" value="` + data.productArr.product.name + `"/>` + data.productArr.product.name + `
        </td>
        <td class="batch_no_id">
            <button type="button" id="batch_no_id" data-bs-toggle="modal" class="btn btn-primary btn-sm edit_modal batch_no_id" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-product_id="` + data.productArr.product_id + `" >` + data.productArr.batch.batch_no + `
                <i class="dripicons-document-edit"></i>
            </button>
        </td>
        <td width="10%">
            <input type="text" class="form-control expiry_date text-center"  value="` + data.productArr.batch.date  + `" name="expiry_date[]" step="any" readonly/>
        </td>
        <td class="stockQty">
        <input type="number" class="form-control text-center stockQty" id="stockQty" min="1" value="` + data.productArr.currentQty + `" step="any" readonly/>
        </td>
        <td class="transferQty">
        <input type="number" class="form-control text-center transferQty" id="transferQty" min="1" onkeyup="do_calculation()" name="transferQty[]" value="1" step="any" required/>
        </td>
        <td class="purchase_price">
        <input type="number" class="form-control text-end purchase_price price" id="purchase_price" onkeyup="do_calculation()" value="` + data.productArr.price + `"  name="purchase_price[]" step="any" required/>
        <input type="hidden" id="total_rate" class="total_rate" name=total_rate[] value="` + (data.productArr.quantity * data.productArr.price) + `"/>
        </td>
        <td class="line_total">
        <input type="number" class="form-control text-end line_total" value="0" id="line_total"  name="line_total[]" step="any" readonly/>
        </td>
        <td> <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> </td>
        <input type="hidden" class="hidden_total" name="total" value="0">
        <input type="hidden" class="sub_total" name="sub_total" value="0">
        <input type="hidden" class="table_batch_id" name="table_batch_id[]" value="` + data.productArr.batch_id + `">
        </tr>`;
        table_body.append(new_row); // append new row to table body
        product_count++;
        row_id++;
        do_calculation();
      }
    });
  });


  $(document).on('click', '.delete_row', function() {
    $(this).closest('tr').remove();
    do_calculation();
  });
   // @@@@@@@@@@@@@@@@@@@@@@ batch  @@@@@@@@@@@@@@@@
   $(document).on('click', '.edit_modal', function() {
        var row_id = $(this).closest('.table_append_rows').attr('id');
        $('input[name="edit_row_id"]').val(row_id);
        var product_id = $(this).data('product_id');
        var product_id_modal = $(this).data('product_id');
        $.ajax({
            type: 'get',
            url: "{{ route('getBatches')}}",
            data: {
                'product_id': product_id
            },
            datatype: 'json',
            success: function(data) {
              // console.log(data);
                var tr = $(this).parent().parent();
                var op = "";
                $('#product_modal').val(product_id_modal); //this is used to get against this product batch
                $.each(data, function(k, val) {
                    if (val.batch.id != null && val.batch.id != "") {
                        op += "<option value='" + val.batch.id + "' data-price=" + val.price + " data-quantity=" + val.currentQty + " data-batch_name='" + val.batch.batch_no + "'>" + val.batch.batch_no + " " + " | Quantity -> " + val.currentQty + " " + " | Expiry Date -> " + val.batch.date + "</option>";
                    }
                });
                $('input[name="edit_row_id"]').val(row_id);
                $('#edit_batch').html(" ");
                $('#edit_batch').append(op);

            },
        });
    });
    // @@@@@@@@@@@@@@ batch update @@@@@@@@@@@@@@@@
    $(document).on('click', '.update_modal', function() {
        var product_id = $('#product_modal').val();
        var price = $('#edit_batch :selected').data('price');
        var quantity = $('#edit_batch :selected').data('quantity');
        var batch_name = $('#edit_batch :selected').data('batch_name');
        var batchId = $('#edit_batch :selected').val();
        var batch_id_modal = $("#edit_batch :selected").text();
        var row_id_for_editing = $('input[name="edit_row_id"]').val();
        $('#' + row_id_for_editing).find('.stockQty').val(quantity);
        // $('#' + row_id_for_editing).find('#batch_no_id').val(batch_id_modal);
        $('#' + row_id_for_editing).find('.purchase_price').val(price);
        $('#' + row_id_for_editing).find('.table_batch_id').val(batchId);

        // $('#' + row_id_for_editing).find('.batch_no_id').text(batch_name);


        $(".bs-example-modal-lg").modal('hide');
        do_calculation();
    });
    function do_calculation()
    {
      var product_count = 1;
      var grand_subtotal = 0;
      $('.table_append_rows').each(function() {
        var qty_new = parseInt($(this).find('.transferQty').find('input').val());
        var s_qty   = parseInt($(this).find('.stockQty').find('input').val());
        if (qty_new > s_qty)
        {
          alert("Quantity Must be less then Stock Quantity!");
          $(this).find('.transferQty').find('input').val(1);
        }
        var qty = $(this).find('.transferQty').find('input').val();
        var purchase_price = parseFloat($(this).find('.purchase_price').find('input').val());
        total_rate = parseFloat(purchase_price * qty).toFixed(2);
        $(this).find('#total_rate').val(total_rate);
        $(this).find('#line_total').val(total_rate);
        grand_subtotal = (parseFloat(grand_subtotal) + parseFloat(total_rate)).toFixed(2);
        $("._tfootTotal").text(grand_subtotal);
        $(".hidden_total").val(grand_subtotal);
        product_count++;
      });
    }


  $(document).ready(function() {
      $.ajax({
          type: 'GET',
          url: '{{url("getCalendarSetup")}}',
          data: {
              transType: "TRANSFER",
          },
          success: function (data) {
              // console.log(data);
              var minDays = data.calendar_setup.min_days;
              var maxDays = data.calendar_setup.max_days;

              $("#fiveDays").datepicker({
                  minDate: -minDays,
                  maxDate: +maxDays,
              });
          }
      });
  });



</script>
<!-- ================================START ADD  AJAX PROPERTY WORK=================== -->
@endpush
