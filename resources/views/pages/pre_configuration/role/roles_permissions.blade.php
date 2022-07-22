@extends('layouts.main')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">Role Details</h4>
                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2" href="{{url('users')}}"><i class="fa fa-arrow-left"></i> Checkout Users list</a>


                    </div>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <!-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> -->

                            <th class="align-middle"> #</th>
                            <th class="align-middle">Role Name</th>
                            <th class="align-middle">Permission Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles_permission as $key=>$perm)
                        <tr data-id="{{$perm->id}}">


                            <td>{{$perm->key+1}}</td>

                            <td>{{$perm->roles->name ?? ''}}</td>
                            <td>{{$perm->permissions->name ?? ''}}</td>



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
<!-- Modal -->



@endsection
@push('script')




@endpush
