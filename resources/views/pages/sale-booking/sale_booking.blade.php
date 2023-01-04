@extends('layouts.main')
@section('content')
    <div class="container-fluid p-0 ">
        <div class="row" >
            <div class="col-12">
{{--                //<div class="col-sm-12">--}}
                    <div class="card">
                        <div class="card-body container">
                            <h4 class="card-title mb-4">Sale Booking</h4>
                            <form class="" method="post" action="{{route('sale-booking.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="customer" class="form-label">Customer</label><br>
                                            <select id="customer" required="true" name="customer" class="form-select select2">
                                                <option selected disabled="" value="">-- Select Customer --</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3 ">
                                            <label for="searchBy" class="form-label">Search By </label><br>
                                            <input type="radio" value="name" name="searchBy" required checked>&nbsp;Name&nbsp;&nbsp;
                                            <input type="radio" value="code" name="searchBy" required>&nbsp;Code
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product</label><br>
                                            <select id="product" required="true" name="product" class="form-select select2">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <table class="table mb-1 sale-booking">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Products</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if(isset($branch))
                                        <button type="submit" class="btn btn-warning me-1">Update</button>
                                    @else
                                        <button type="submit" class="btn btn-success me-1">Save</button>
                                    @endif
                                    <a class="btn btn-danger mx-0" href="{{ route('branches.index') }}">Exit</a>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>

    </div>

@stop
@push('script')
    <script>
        $('input[type=radio][name=searchBy]').on('change', function() {
            custom_select2("#product", "{{url('get-all-sale-products')}}",$('input[name="searchBy"]:checked').val(),'Search for a product');
        });
        function custom_select2(selector, url,searchType, placeholder = false) {
            $(selector).select2({
                ajax: {
                    type: 'get',
                    url: url,
                    dataType: 'json',
                    // delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            search_type : searchType,
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
                placeholder: placeholder,
                minimumInputLength: 2,
            })
        };
        custom_select2("#product", "{{url('get-all-sale-products')}}",$('input[name="searchBy"]:checked').val(),'Search for a product');
        $('#product').on('change',function (){
            var row_no = 0
            $.ajax({
                type: 'GET',
                url: '{{url("get-stock")}}/' + $(this).val(),
                success: function (data) {
                    ++row_no;
                    var table_body = $('table.sale-booking tbody')
                    var new_row = `<tr><td>` + row_no + `</td>
                                    <td>` + data.productArr.product.name +`
                                        <input type="hidden" value="` + data.productArr.product_id + `" name="product_id[]" /></td>
                                        </td>
                                    <td>
                                        <input type="number" class="form-control text-center" name="qty[]" min="1" value="1" required/>
                                    </td>
                                    <td>
                                        <button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                                    </td>
                                  </tr>`;
                    table_body.append(new_row);

                    // console.log(table_body);
                    // console.log(data.productArr.product.name)
                    // `<td><input type="text" class="form-control text-center" value="` + data.productArr.product.name + `" step="any" disabled/></td>`
                    //     `<td><input type="number" class="form-control text-center" name="qty[]" min="1" value="1"/></td>`
                    //     `<td><button type="button" class="delete_row btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button></td>`
                }
            });
        });
        $(document).on('click', '.delete_row', function () {
            // delete_record($(this).closest('tr').attr('id'));
            $(this).closest('tr').remove();
        });
    </script>

@endpush
