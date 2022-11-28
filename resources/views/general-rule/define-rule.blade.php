@extends('layouts.main')
@section('content')
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg bonus" id="bonusModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Bonus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product_bonuses.store')}}" id="bonusFormId" method="POST">
                        @csrf
                        Bonus Qty <input type="number" class="form-control" name="bonus">
                        <br>
                        Quantity <input type="number" name="quantity" class="form-control">
                        <br>
                        Start Date<input type="date" name="start_date" class="form-control">
                        <br>
                        End Date<input type="date" name="end_date" class="form-control">
                        <br><br>
                        <div class="text-sm-end ">
                            <a type="button"
                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2 mr-3 bonus_add"
                               data-bs-dismiss="modal"> Add</a>
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg discount" tabindex="-1" id="discountModal" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="discountFormId" method="POST">
                        @csrf
                        Discount % <input type="number" class="form-control" name="discount">
                        Start Date <input type="date" name="start_date" class="form-control">
                        End Date<input type="date" name="end_date" class="form-control">
                        <br><br>
                        <div class="text-sm-end ">
                            <a type="button"
                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2 mr-3 discount_add"
                               data-bs-dismiss="modal"> Add</a>
                        </div>
                    </form>
                    <br> <br>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bonus Rules</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               data-bs-toggle="modal" data-bs-target=".bonus">
                                <i class="mdi mdi-plus me-1"></i> Add</a>
                        </div>
                    </div><!-- end col-->
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table class="table align-middle table-nowrap table-hover no-footer" id="datatable-buttons"
                               role="grid" aria-describedby="datatable-buttons_info">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center"> #</th>
                                <th class="text-center">Bonus Qty</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="append_here">
                            @foreach($bonuses as $value)
                                <tr data-id="{{$value->id}}">
                                    <td class="text-center"><b>{{$value->id}}</b></td>
                                    <td>
                                        <input type="number" class="form-control text-center" style="border: 0px none;background: white" id="bonus_qty_{{$value->id}}" name="bonus" value="{{$value->bonus}}" disabled>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-center" style="border: 0px none;background: white" id="quantity_{{$value->id}}" name="quantity" value="{{$value->quantity}}" disabled>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control text-center" style="border: 0px none;background: white" id="start_date_{{$value->id}}" name="start_date" value="{{$value->start_date}}" disabled>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control text-center" style="border: 0px none;background: white" id="end_date_{{$value->id}}" name="end_date" value="{{$value->end_date}}" disabled>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" onclick="enableTextFeild({{$value->id}})" id="edit_bonus_{{$value->id}}"
                                           class="mdi mdi-pencil font-size-18 waves-effect waves-light text-success"></a>
                                        <a href="#" onclick="save_bonus({{$value->id}})"  id="save_bonus_{{$value->id}}" style="display: none"
                                            class="mdi mdi-check font-size-20 waves-effect waves-light text-danger">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Discount Rule</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               data-bs-toggle="modal" data-bs-target=".discount">
                                <i class="mdi mdi-plus me-1"></i> Add</a>
                        </div>
                    </div><!-- end col-->
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table class="table align-middle table-nowrap table-hover no-footer"
                               id="datatable-buttons1" role="grid" aria-describedby="datatable-buttons_info">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center"> #</th>
                                <th class="text-center">Discount</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="append_here2">
                            @foreach($discounts as $value)
                                <tr data-id="{{$value->id}}">
                                    <td class="text-center"><b>{{$value->id}}</b></td>
                                    <td>
                                        <input type="number" class="form-control text-center" style="border: 0px none;background: white" id="discount_{{$value->id}}" name="discount" value="{{$value->discount}}" disabled>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control text-center" style="border: 0px none;background: white" id="start_date_{{$value->id}}" name="start_date" value="{{$value->start_date}}" disabled>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control text-center" style="border: 0px none;background: white" id="end_date_{{$value->id}}" name="end_date" value="{{$value->end_date}}" disabled>
                                    </td>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" onclick="enableTextFeilDiscount({{$value->id}})" id="edit_discount_{{$value->id}}"
                                           class="mdi mdi-pencil font-size-18 waves-effect waves-light text-success"></a>
                                        <a href="#" onclick="save_discount({{$value->id}})"  id="save_discount_{{$value->id}}" style="display: none"
                                           class="mdi mdi-check font-size-20 waves-effect waves-light text-danger">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        function enableTextFeild(id)
        {
            $('#bonus_qty_'+id).prop("disabled", false);
            $('#quantity_'+id).prop("disabled", false);
            $('#start_date_'+id).prop("disabled", false);
            $('#end_date_'+id).prop("disabled", false);
            $('#edit_bonus_'+id).hide();
            $('#save_bonus_'+id).show();
        }
        function save_bonus(id)
        {
            // var bonus_qty = $('#bonus_qty_'+id).val();
            // console.log(bonus_qty);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ url('general-bonus-update')}}"+'/'+id,
                data: {
                    'id': id,
                    'bonus': $('#bonus_qty_'+id).val(),
                    'quantity' : $('#quantity_'+id).val(),
                    'start_date' : $('#start_date_'+id).val(),
                    'end_date' : $('#end_date_'+id).val(),
                    _token: token,
                },
                success: function (data) {
                    // console.log(data);
                    location.reload(true);
                },
            });
            $('#save_bonus_'+id).hide();
            $('#edit_bonus_'+id).show();
        }
        // ====================== Discount Update ===============
        function enableTextFeilDiscount(id)
        {
            $('#discount_'+id).prop("disabled", false);
            $('#start_date_'+id).prop("disabled", false);
            $('#end_date_'+id).prop("disabled", false);
            $('#edit_discount_'+id).hide();
            $('#save_discount_'+id).show();
        }
        function save_discount(id)
        {
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ url('general-discount-update')}}",
                data: {
                    'id': id,
                    'discount': $('#discount_'+id).val(),
                    'start_date' : $('#start_date_'+id).val(),
                    'end_date' : $('#end_date_'+id).val(),
                    _token: token,
                },
                success: function (data) {
                    // console.log(data);
                     location.reload(true);
                },
            });
            $('#save_discount_'+id).hide();
            $('#edit_discount_'+id).show();

        }
        // ====================Start add disc========================
        $(document).on('click', '.bonus_add', function () {


            var data = $('#bonusFormId').serialize();
            console.log(data);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ route('generalBonus')}}",
                data: {
                    'data': data,
                    _token: token,
                    'infoFormId': $('#bonusFormId').serialize(),
                },
                // datatype:'json',
                data: $('#bonusFormId').serialize(),
                success: function (data) {
                    // console.log(data);
                    var i = 1;
                    var html = "";
                    $('#bonusModal').modal('hide');
                    $.each(data, function (index, value) {
                        html += `<tr><td class="text-center"><b>` + value.id +`</b></td>
                                 <td><input type="number" class="form-control text-center" style="border: 0px none;background: white" id="bonus_`+value.id+`" name="bonus" value="`+ value.bonus +`" disabled></td>
                                 <td><input type="number" class="form-control text-center" style="border: 0px none;background: white" id="quantity_`+ value.id +`" name="quantity" value="`+ value.quantity +`" disabled></td>
                                 <td><input type="date" class="form-control text-center" style="border: 0px none;background: white" id="start_date_`+ value.id +`" name="start_date" value="`+ value.start_date +`" disabled></td>
                                 <td><input type="date" class="form-control text-center" style="border: 0px none;background: white" id="end_date_`+ value.id +`" name="end_date" value="`+ value.end_date + `" disabled></td>
                                 <td class="text-center">
                                    <a href="#" onclick="enableTextFeild(`+ value.id +`)" id="edit_bonus_` + value.id +`"
                                           class="mdi mdi-pencil font-size-18 waves-effect waves-light text-success"></a>
                                        <a href="#" onclick="save_bonus(`+ value.id +`)"  id="save_bonus_` + value.id +`" style="display: none"
                                            class="mdi mdi-check font-size-20 waves-effect waves-light text-danger">
                                        </a>
                                </td>
                                </tr>`;
                        i++;
                    });
                    $('#append_here').empty();
                    $('#append_here').append(html);

                },
            });
        });
        // ====================Start add disc========================
        $(document).on('click', '.discount_add', function () {
            var data = $('#discountFormId').serialize();
            console.log(data);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ route('generalDiscount')}}",
                data: {
                    'data': data,
                    _token: token,
                    'discountFormId': $('#discountFormId').serialize(),
                },
                // datatype:'json',
                data: $('#discountFormId').serialize(),
                success: function (data) {
                    // console.log(data);
                    var i = 1;
                    var html = "";
                    $('#discountModal').modal('hide');
                    $.each(data, function (index, value) {
                        html += `<tr>
                                 <td class="text-center"><b>`+ value.id +`</b> </td>
                                 <td ><input type="number" class="form-control text-center" style="border: 0px none;background: white" id="discount_`+value.id +`" name="discount" value="`+value.discount +`" disabled></td>
                                 <td><input type="date" class="form-control text-center" style="border: 0px none;background: white" id="start_date_`+ value.id +`" name="start_date" value="`+ value.start_date +`" disabled></td>
                                 <td><input type="date" class="form-control text-center" style="border: 0px none;background: white" id="end_date_`+ value.id +`" name="end_date" value="`+ value.end_date + `" disabled></td>
                                <td class="text-center">
                                        <a href="#" onclick="enableTextFeilDiscount(`+ value.id +`)" id="edit_discount_`+ value.id +`"
                                           class="mdi mdi-pencil font-size-18 waves-effect waves-light text-success"></a>
                                        <a href="#" onclick="save_discount(`+ value.id +`)"  id="save_discount_`+ value.id +`" style="display: none"
                                           class="mdi mdi-check font-size-20 waves-effect waves-light text-danger">
                                        </a>
                                    </td>
                                </tr>`;
                        i++;
                    });
                    $('#append_here2').empty();
                    $('#append_here2').append(html);
                },
            });
        });
    </script>

@endpush
