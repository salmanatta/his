@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="logo-light.png" height="20" />
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="float-end font-size-16">Current Stock Details</h4>
                                </div>
                                <div class="col-lg-4">
                                    <a href="javascript:window.print()" class="float-end btn btn-success d-print-none"><i class="fa fa-print ">Print</i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="py-2 mt-3">
                            <h3 class="font-size-15 fw-bold text-center">Stock Details for {{\Auth::user()->branch->name}}</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap" border="1px">
                                <thead>
                                    <tr style="background-color:#e4e6eb;">
                                        {{-- <th style="width: 70px;">No.</th> --}}
                                        <th>S.#</th>
                                        <th>Product</th>
                                        <th class="text-center">Total Batches</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_qty = 0;
                                    $subTotal = 0;
                                    $counter = 1;
                                    ?>
                                    @foreach ($stocks as $stock)
                                    <tr>
                                        <?php $total_qty += $stock->qty;
                                        $subTotal += $stock->price; ?>
                                        <td>{{ $counter }}</td>
                                        <td>{{$stock->name}}</td>
                                        <td class="text-center">
                                            <a class="batch_modal_click" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-bs-toggle="modal" data-product="{{ $stock->product_id }}" data-batch="{{ $stock->batch_id }}">{{$stock->batch}}</a>
                                        </td>
                                        <td class="text-center">{{$stock->qty}}</td>
                                        <td class="text-center">{{$stock->price}}</td>
                                        <?php $counter++ ?>
                                    </tr>
                                    @endforeach
                                    <tr style="background-color:#e4e6eb;">
                                        <td colspan="3" class="border-0 ">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="border-0  text-center">
                                            <h4 class="m-0">{{$total_qty}}</h4>
                                        </td>
                                        <td class="border-0 text-center">
                                            <h4 class="m-0">{{$subTotal}}</h4>
                                        </td>
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


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="stockModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockModal"> Batch Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table mb-0 order-list _saleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Batch No</th>
                                <th>Expry Date</th>
                                <th>Quanity</th>
                            </tr>
                        </thead>
                        <tbody id="batch_data">
                        </tbody>
                        <tr>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.batch_modal_click', function() {
            // console.log($(this).data('product'));
            let product_id = $(this).data('product');
            $.ajax({
                type: 'get',
                url: "{{ route('getProductBatch')}}",
                data: {
                    'product_id': product_id
                },
                datatype: 'json',
                success: function(data) {
                    $('#batch_data').empty();
                    // console.log(data);
                    var count = 1;
                    for (i = 0; i < data.length; i++) {
                        // console.log(data[i]);
                        var markup = '<tr><td>'+ count +'</td><td>' + data[i].batch.batch_no + '</td><td>' + data[i].batch.date + '</td><td>'+ data[i].currentQty+'</td></tr>';
                        count++;
                        var body = $('#batch_data');
                        body.append(markup);
                    }
                },
            });

        });
    });
</script>
@endpush
