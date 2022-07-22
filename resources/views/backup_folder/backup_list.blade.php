@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Backup List</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle">S.N</th>
                            <th class="align-middle">File</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backups as $sql)
                        <tr>
                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $loop->iteration }}</a></td>
                            <td>{{ $sql }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ 'backups/'.$sql }}" download class=" btn btn-success" style="color: white;">Full Backup</a>
                                    <a href="{{ url('import') }}?file={{ 'backups/'.$sql}}" class=" btn btn-danger" style="color: white;">Restore</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
<!-- end row -->
@endsection