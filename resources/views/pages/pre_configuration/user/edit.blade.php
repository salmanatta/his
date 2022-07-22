@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">User Edit </h4>

       <form autocomplete="off" method="POST" class="form-horizontal" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-lg-3">
              <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" placeholder="Enter User Name" name="name" class="form-control" id="validationCustom01" 
                required>
              </div>
            </div>
            <div class="col-lg-2">
             <div class="mb-3">
              <label for="formrow-inputCity" class="form-label">Email</label>
              <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Email" id="validationCustom01" 
              required>
            </div>
          </div>

          <div class="col-lg-2">
           <div class="mb-3">
            <label for="formrow-inputCity" class="form-label">New Password</label>
            <input type="password"  class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password" placeholder="Enter New password" autofocus required>
          </div>
        </div>
        <div class="col-lg-2">
         <div class="mb-3">
          <label for="confirmpassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword"
          name="password_confirmation" placeholder="Enter Confirm password" autofocus required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="mb-3">
          <label class="form-label">Select Type</label>
          <select class="form-control select2" name="type">
            <option value="" disabled="" selected="">Select User Type</option>
            <option value="admin">Admin</option>
            <option value="user">User</option> 
          </select>
        </div>
      </div> 
      <div class="col-lg-3">
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="avatar" value="{{$user->avatar}}" class="form-control" id="inputGroupFile02">
        </div>
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary w-md">Update</button>
    </div>
  </form>
</div>
<!-- end card body -->
</div>
<!-- end card -->
</div>
<!-- end col -->


</div>
<!-- end row -->

@endsection
@push('script')

@endpush