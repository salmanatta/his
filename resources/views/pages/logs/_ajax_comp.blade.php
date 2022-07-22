<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

    <thead class="table-light">
        <tr>
            <th style="width: 20px;" class="align-middle">
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="checkAll">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th class="align-middle"> ID</th>
            <th class="align-middle">Action</th>
            <th class="align-middle">Remarks</th>
            <th class="align-middle">Action Date</th>
            <th class="align-middle">Action Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($newly_created_logs as $key=>$log)

        <tr>
            <td></td>
            <td class="align-middle"> {{$key+1}}</td>
            <td class="align-middle"> {{$log->action}}</td>
            <td class="align-middle"> {{$log->remarks}}</td>
            <td class="align-middle"> {{$log->action_date}}</td>
            <td class="align-middle"> {{$log->action_time}}</td>

        </tr>
        @endforeach

    </tbody>
</table>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
