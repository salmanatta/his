<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

    <thead class="table-light">
        <tr>
            <th class="align-middle">ID</th>
            <th class="align-middle">Role Name</th>
            <th class="align-middle">Permission Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role_permissions as $key=>$perm)
        <tr>
            <td class="align-middle"> {{$key+1}}</td>
            <td class="align-middle"> {{$perm->roles->name}}</td>
            <td class="align-middle"> {{$perm->permissions->name}}</td>

        </tr>
        @endforeach

    </tbody>
</table>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
