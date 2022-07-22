<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

    <thead class="table-light">
        <tr>
            <th style="width: 20px;" class="align-middle">
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="checkAll">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th class="align-middle">ID</th>
            <th class="align-middle">Name</th>
            <th class="align-middle">Display Name</th>
            <th class="align-middle">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key=>$role)
        <tr>
            <td></td>
            <td class="align-middle"> {{$key+1}}</td>
            <td class="align-middle"> {{$role->name}}</td>
            <td class="align-middle"> {{$role->display_name}}</td>
            <td class="align-middle">
                <a class="btn btn-primary btn-sm btn_assing_role_to_user" data-roleid="{{$role->id}}">
                    Assign
                </a></td>


        </tr>
        @endforeach

    </tbody>
</table>
<script>
    $('#datatable-buttons').DataTable();

</script>
