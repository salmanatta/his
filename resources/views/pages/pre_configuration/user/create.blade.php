@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">User Form </h4>

       <form autocomplete="off" method="POST" class="form-horizontal" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Name</label>
                <input type="text"  name="name" class="form-control" id="validationCustom01" 
                required>
              </div>
            </div>
            <div class="col-lg-4">
             <div class="mb-3">
              <label for="formrow-inputCity" class="form-label">Email</label>
              <input type="email" name="email" class="form-control"  id="validationCustom01" 
              required>
            </div>
          </div>
           </div>

          <div class="row">

          <div class="col-lg-4">
           <div class="mb-3">
            <label for="formrow-inputCity" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"  autofocus required>
          </div>
        </div>
        <div class="col-lg-4">
         <div class="mb-3">
          <label for="confirmpassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword"
          name="password_confirmation"  autofocus required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="mb-3">
          <label class="form-label">Select Role</label>
          <select class="form-control select2" name="role_id">
            <option value="" disabled="" selected="">Select User Role</option>
           @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option> 
            @endforeach
          </select>
        </div>
      </div> 
      <div class="col-lg-4">
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="avatar" class="form-control" id="inputGroupFile02">
        </div>
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary w-md">Submit</button>
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

<script type="text/javascript">
   // for third fourth guarantor
   function Function() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
     text.style.display = "none";
   }
 }
 function myFunction() {
  var checkBox = document.getElementById("Check");
  var txt = document.getElementById("txt");
  if (checkBox.checked == true){
    txt.style.display = "block";
  } else {
   txt.style.display = "none";
 }
}
</script>

@endpush