@extends('layouts.main')
@section('content')

    <div class="container-fluid p-0 d-flex justify-content-center">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Supplier Discount List</h4>
                            <div class="col-sm-12">
                                <div class="text-sm-end">
                                    <a href="{{ url('supplier-discount') }}" type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> Add</a>
                                </div>
                            </div><!-- end col-->
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <table class="table align-middle table-nowrap table-hover no-footer" id="datatable-buttons"
                                       role="grid" aria-describedby="datatable-buttons_info">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="text-center"> #</th>
                                        <th class="text-center">Start date</th>
                                        <th class="text-center">End Date</th>
                                        <th class="text-start">Supplier</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="append_here">
                                    @if(isset($supplier_discount))
                                    @foreach($supplier_discount as $value)
                                        <tr data-id="{{$value->id}}">
                                            <td class="text-center"><b>{{$value->id}}</b></td>
                                            <td style="text-align:center;">{{ date('d-m-Y', strtotime($value->start_date)) }}</td>
                                            <td style="text-align:center;">{{ date('d-m-Y', strtotime($value->end_date)) }}</td>
                                            <td>{{ $value->supplier->name }}</td>
                                            <td class="text-center">{{ $value->amount }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('supplier-discount-edit/'.$value->id) }}"
                                                   class="mdi mdi-pencil font-size-18 waves-effect waves-light text-success">
                                                </a>
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
        </div>
    </div>

@endsection
@push('script')

@endpush

