@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Company Details</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button"
                               class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               href="{{route('companies.create')}}"><i
                                    class="mdi mdi-plus me-1"></i> Add company</a>
                        </div>
                    </div><!-- end col-->
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Company Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Phone</th>
                            <th class="align-middle">Fax</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td class="text-center"><b>{{ $company->id }}</b> </td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->phone}}</td>
                                <td>{{$company->fax}}</td>
                                @if($company->isActive==1)
                                    <td class="text-center">
                                        <span class="badge bg-success font-size-12"> Active</span></td>
                                @else
                                    <td class="text-center">
                                        <span class="badge bg-danger font-size-12"> InActive</span></td>
                                @endif
                                <td class="text-center">
                                    <a href="{{route('companies.edit',$company->id)}}" class="text-success editbtn">
                                        <i class="mdi mdi-pencil font-size-18"></i>
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
@endsection
@push('script')
    <script>
    </script>
@endpush
