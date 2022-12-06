@extends('layouts.main')
@section('content')
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
                                       class="btn btn-primary btn-sm btn-rounded waves-effect waves-light d-print-none" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
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



    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="" class="form-label">Region Code</label>
                    <input type="text" class="form-control regionCode">
                    <br>
                    <label for="" class="form-label">Region Name</label>
                    <input type="text" class="form-control regionName">
                    <br>
                    <label for="" class="form-label">Region Type</label>
                    <select name="level_no" class="form-select level_no">
                        <option value="1">Reporting Level</option>
                        <option value="0">Transaction Level</option>
                    </select>
                    <br>
                    <button class="btn btn-success saveRegion">Save</button>

                </div>
            </div>
        </div>
    </div>


@stop
