@extends('layouts.main')
@section('content')
    <div class="main-content">
        <div class="text-center">
            <h3> Batch Adjustment</h3>
        </div>
        <br>
        <div class="row">
            <!-- <form method="get" id="add_form" action=""> -->
            <form method="GET" action="{{ url('batch-adjustment') }}">
                <div class="row">
                    <div class="row printBlock">
                        <div class="row">
                            <div class="col-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="formrow-inputCity" class="form-label">From Date</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="date" name="from_date" class="form-control to_date printBlock"
                                               id="from_date" value={{ isset($_GET['from_date']) ? $_GET['from_date'] :
                                    date('Y-m-d')}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="formrow-inputCity" class="form-label">To Date</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="date" name="to_date" class="form-control to_date printBlock"
                                               id="to_date" value={{ isset($_GET['to_date']) ? $_GET['to_date'] :
                                    date('Y-m-d')}}>
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

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table align-middle table-nowrap table-hover" id="datatable-buttons">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Batch No</th>
                            <th class="text-center">Expiry Date</th>
                            <th class="text-center">Created Date</th>
                            <th>Stock Qty</th>
                            <th class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody id="append_here">
                        @if(isset($batches))
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($batches as $data)
                                @php
                                    $counter++
                                @endphp
                                <tr>
                                    <td style="text-align:center;">{{ $counter }}</td>
                                    <td>{{ $data->batch_no }}</td>
                                    <td style="text-align:center;">{{ date('d-m-Y', strtotime($data->date)) }}</td>
                                    <td style="text-align:center;">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                    <td>{{ $data->sumQty }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('adjustment-invoice/'.$data->id) }}"
                                           style="border-radius: 44px;"
                                           class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none"
                                           data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                                           data-batchId="{{ $data->id }}"
                                           data-batchNo="{{ $data->batch_no }}"
                                           data-ExpiryDate="{{ $data->date }}"
                                           id="detail_view_button">
                                            Edit Batch </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © Skote.
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


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="" class="form-label">Batch No</label>
                    <input type="text" class="form-control Batch_no">
                    <br>
                    <label for="" class="form-label">Batch Data</label>
                    <input type="date" class="form-control BatchDate">
                    <input type="hidden" name="id" class="batchId">
                    <br>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success saveBatch" data-bs-dismiss="modal" aria-label="Close">Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@push('script')
    <script>
        $(document).on('click', '#detail_view_button', function () {
            // console.log($(this).data());
            $('.batchId').val($(this).data('batchid'));
            $('.Batch_no').val($(this).data('batchno'));
            $('.BatchDate').val($(this).data('expirydate'));
        });
        $('.saveBatch').on("click", function () {
            var batch_id = $('.batchId').val();
            console.log(batch_id);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                method: 'post',
                url: "{{ url('batch-update')}}/" + $('.batchId').val(),
                data: {
                    'batch_no': $(".Batch_no").val(),
                    'batch_date': $(".BatchDate").val(),
                    _token: token,
                },
                success: function (data) {
                    location.reload();
                },
            });
        })


    </script>

@endpush
