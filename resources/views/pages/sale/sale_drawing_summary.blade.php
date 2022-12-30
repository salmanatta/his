@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Sale Drawing Summary (SDS)</h3>
        </div><br>
        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('sale-drawing-summary') }}">
                <div class="row">
                    <div class="row printBlock">
                        <div class="row mt-1">
                            <div class="col-sm-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="salesman" class="form-label">Salesman</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-select select2" name="salesman" id="salesman">
                                            <option value="" >-- Select Salesman --</option>
                                            @foreach($salesman as $data)
                                                <option value="{{ $data->id }}" >{{ $data->first_name." ".$data->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('salesman')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="deliveryman" class="form-label">Delivery man</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="deliveryman" id="deliveryman">
                                        </select>
                                        @error('deliveryman')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between d-print-none">
                        <button type="submit" id="search"
                                class="btn btn-primary search_btn float-left printBlock">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 col-md-12">
                            <table class="table align-middle table-nowrap table-hover" id="datatable-buttons">
                                <thead class="table-light">
                                <tr>
                                    <th style="text-align: center;">Item Code</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Batch No</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Bonus</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Sale Tax</th>
                                    <th scope="col">Advance Tax</th>
                                    <th scope="col">Net Amount</th>
                                </tr>
                                </thead>
                                <tbody id="append_here">
                                @if(isset($saleData))
                                    @foreach ($saleData as $data)
                                        <tr>
                                            <td style="text-align: center;">{{ $data->invoice_no }}</td>
                                            <td>{{ date('d-m-Y', strtotime($data->invoice_date)) }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->customer->name }}</td>
                                            <td>{{ $data->trans_type }}</td>
                                            <td>{{ $data->sumLineTotal + $data->sumDiscountAmount - $data->sumAdvTaxValue - $data->sumSalesTax }}</td>
                                            <td>{{ $data->sumSalesTax }}</td>
                                            <td>{{ $data->sumAdvTaxValue }}</td>
                                            <td>{{ $data->sumDiscountAmount }}</td>
                                            <td>{{ $data->sumLineTotal }}</td>
                                            <td>{{ $data->inv_status }}</td>
                                            @if($data->inv_status == 'Un-Post' )
                                                <td style="text-align: center;">
                                                    <a href="{{ url('viewSaleInvoice/'.$data->id) }}" class="text-danger">
                                                        <i class="mdi mdi-pencil font-size-18 waves-effect waves-light" style="border-radius: 44px;"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td style="text-align: center;">

                                                <a href="{{ url('sale-invoice/'.$data->id)}}"
                                                   style="border-radius: 44px;"
                                                   class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none">
                                                    Print Invoice </a>

                                                {{--                                        <a href="{{ url('sale_details') . '/' . $data->id }}" style="border-radius: 44px;" class="mdi mdi-eye font-size-18 waves-effect waves-light d-print-none">--}}
                                                {{--                                        </a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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
@stop
@push('script')
    <script>
        $('#salesman').on('change',function ()
        {
            $.ajax({
                method: 'get',
                url: "{{ url('get-sales-deliveryman')}}/"+$('#salesman').val(),
                success: function (data) {
                    //console.log(data);
                    $('#deliveryman').empty();
                    var html = `<option selected disabled value="">-- Select Delivery Man --</option>`;
                    for (var i=0 ;i< data.length;i++){
                        html += `<option value="`+ data[i].id + `">`+ data[i].first_name + ' '+ data[i].last_name +`</option>`;
                    }
                    $('#deliveryman').append(html);
                },
            });
        });
    </script>
@endpush


