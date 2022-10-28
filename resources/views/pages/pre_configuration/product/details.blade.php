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
                <div class="accordion accordion-margin" id="accordionExample">
                    @include('pages.pre_configuration.product.tab-info.basic-info')
                    @if(isset($product))
                        @include('pages.pre_configuration.product.tab-info.bonus')
                        @include('pages.pre_configuration.product.tab-info.discount')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script>
    // ====================Start show disc========================
    $(document).on('click', '#showdiscount', function() {
        $.ajax({
            method: 'get',
            url: "{{ url('showGeneralDiscount')}}",
            success: function(data) {
                $('#discount_id').empty();
                var html = "<option selected value=''>Choose Discount</option>";
                for (var i = 0; i < data.discount.length; i++) {
                    html += '<option value="' + data.discount[i].id + '" data-discount="' + data.discount[i].discount + '" data-start_date="' + data.discount[i].start_date + '" data-end_date="' + data.discount[i].end_date + '">Discount -> ' + data.discount[i].discount + ' | From: ' + data.discount[i].start_date + ' To: ' + data.discount[i].end_date + '</option>';
                }
                $('#discount_id').append(html);
            },
        });
    });
    // ==================== End show Discount ========================
    // ==================== Inset Discount and fill table ========================
    $(document).on('click', '.add_discount', function() {
        var data = $('#discount_form').serialize();
        $.ajax({
            method: 'post',
            data: data,
             url: "{{ url('insertProductDiscount')}}",
             success: function(response) {
                // console.log(response);
                $('#discount_append_here').empty();
                var html = "";
                var counter = 1;
                // $('#bonus_model').modal('toggle');
                for (var di = 0; di < response.length; di++) {
                    html += `<tr><td> `+ counter +`</td><td> ` + response[di].general_discount.discount + `</td><td >` + response[di].general_discount.start_date + `</td><td >` + response[di].general_discount.end_date + `</td></tr>`;
                    counter++;
                }
                $('#discount_append_here').append(html);
             },
         });
    });
    // ==================== End Inset Discount and fill table ========================
    // ====================Start add disc========================
    $(document).on('click', '.add_max_sale_qty_btn', function() {
        var data = new FormData($('#max_sale_qty_form')[0]);
        $.ajax({
            method: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            url: "{{ route('store_max_sale_quantity')}}",
            success: function(response) {
                $('#max_over_all_model').modal('hide');
                var html = "";
                if (response.status == 'success') {
                    html += `<tr><td>` + mi + `</td><td >` + response.start_date + `</td><td >` + response.end_date + `</td><td >` + response.quantity + `</td></tr>`;
                    location.reload();
                }
                // else{
                // alert('Please First Select Product!!!');
                // }
                // $('#append_here').empty();
                $('#maximum_over_all_quantity_area').append(html);
                mi++;
            },
        });
    });
    // ====================End add disc========================

    // ============== Show available Bonus in dropdown =========================

    $(document).on('click','#addBonus', function() {
        $.ajax({
            method: 'get',
            url: "{{ url('showGeneralBonus')}}",
            success: function(data) {
                $('#bonus_id').empty();
                var html = "<option selected value=''>Choose Bonus</option>";
                for (var i = 0; i < data.bonuses.length; i++) {
                    html += '<option value="' + data.bonuses[i].id + '" data-bonus="' + data.bonuses[i].bonus + '" data-b_start_date="' + data.bonuses[i].start_date + '" data-b_end_date="' + data.bonuses[i].end_date + '" data-quantity="' + data.bonuses[i].quantity + '">Bonus -> ' + data.bonuses[i].bonus + ' | Quantity -> ' + data.bonuses[i].quantity + ' | From: ' + data.bonuses[i].start_date + ' To: ' + data.bonuses[i].end_date + '</option>';
                }
                $('#bonus_id').append(html);
            },
        });
    });
    // ============== End Show available Bonus in dropdown =====================
    // ==================== Inset Bonus and fill table ========================
    $(document).on('click', '.add_bonus', function() {
        var data = $('#bonus_form').serialize();
        $.ajax({
            method: 'post',
            data: data,
             url: "{{ url('insertProductBonus')}}",
             success: function(response) {
                $('#bonus_append_here').empty();
                var html = "";
                var counter = 1;
                // $('#bonus_model').modal('toggle');
                for (var bi = 0; bi < response.length; bi++) {
                    html += `<tr><td> `+ counter +`</td><td> ` + response[bi].bonuses.bonus + `</td><td >` + response[bi].bonuses.quantity + `</td><td >` + response[bi].bonuses.start_date + `</td><td >` + response[bi].bonuses.end_date + `</td></tr>`;
                    counter++;
                }
                $('#bonus_append_here').append(html);
             },
         });
    });
    // ==================== End Inset Bonus and fill table ========================
    // ==================== Start Group depended dropdown ========================
    $('#supplier_id').change(function(){
        var supplier = $('#supplier_id').val();
        $.ajax({
            url : "{{ url('getSupplierGroup') }}"+"/"+supplier,
            method: 'get',
            success : function (data){
                $('#group_id').empty();
                var grouphtml = `<option value="">-- Select Group --</option>`;
                for (var group = 0; group < data.length ; group++) {
                    grouphtml += `<option value="` + data[group].id + `">`+ data[group].name +`</option>`;
                }
                $('#group_id').append(grouphtml);
            },
        });
    });
    // ==================== End  Group depended dropdown ========================
</script>
@endpush
