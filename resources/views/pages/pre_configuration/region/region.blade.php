@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Region Entry</h4>

        <div>
            <ul class="breadcrumb"></ul>
            <button class="btn btn-primary add" data-id="0" style="float:right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Add Record</button>
            <button class="btn btn-warning prev" id="0" style="float:left">Previous</button>
            <input type="hidden" class="parentId">
            <br>
            <br>
            <br>
            <ul class="data-list"></ul>
        </div>
    </div>
</div>

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
                <br>
                <br>
                <br>
                <button class="btn btn-success saveRegion">Save</button>

            </div>
        </div>
    </div>
</div>


@stop
@push('script')
    <script>
        const list = [];
        const names = [];
        $( document ).ready(function() {

            getList(0 , 0);
            $(".prev").on("click" , function() {
                id = list.pop();
                names.pop();
                breadcumb();
                getList(id,-1);
            })

            $(".saveRegion").on("click" , function() {
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    method: 'post',
                    url: "{{ url('save-region')}}",
                    data: {
                        'region': $(".prev").attr('id'),
                        'name': $(".regionName").val(),
                        'code' : $(".regionCode").val(),
                        'level_no' : $(".level_no").val(),
                        'parent' : $(".parentId").val(),
                        _token: token,
                    },
                    success: function (data) {
                        $(".regionName").val('');
                        $(".regionCode").val('');
                        $(".level_no").val('');
                        getList($(".prev").attr('id') , -1);
                    },
                });
            })
        });

        function breadcumb() {
            $(".breadcrumb").empty();
            names.forEach((i,v) => {
                $(".breadcrumb").append("<li class='breadcrumb-item' style='font-weight: bold'>"+i+"</li>");
            });
        }

        function getList(id , region_id, name = null) {
            if (name != null) {
                names.push(name);
                breadcumb();
            }
            if (region_id == 0 || region_id == null) {
                $(".parentId").val(id);
            }
            if (id == 0) {
                $(".parentId").val(null);
            }
            $(".add").attr('data-id' , id);
            if (region_id != undefined && region_id != -1) {
                list.push(region_id);
            }
            $(".prev").attr('id' , id);
            $(".data-list").empty();
            $.ajax({
                method: 'get',
                url: "{{ url('get-data')}}/" + id,
                success: function (data) {
                    data.data.forEach((i,v) => {
                        $(".data-list").append("<button onclick='getList("+i.id+" , "+i.region_id+", `"+i.name+"`)' class='btn btn-default get-children'>"+i.name+"</button><br>");
                    });
                },
            });
        }
    </script>
@endpush
