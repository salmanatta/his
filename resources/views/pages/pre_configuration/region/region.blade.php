@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Crossfade</h4>
        <p class="card-title-desc">Add <code>.carousel-fade</code> to your carousel to animate slides with a fade transition instead of a slide.</p>
        <div>
            <button class="btn btn-primary add" data-id="0" style="float:right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Add Record</button>
            <button class="btn btn-warning prev" id="0" style="float:left">Previous</button>
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
                <label for="">Name</label>
                <input type="text" class="form-control regionName">
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
        $( document ).ready(function() {

            getList(0 , 0);
            $(".prev").on("click" , function() {
                id = list.pop();
                getList(id,-1);
            })

            $(".saveRegion").on("click" , function() {
                alert($("body .regionName").val());
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    method: 'post',
                    url: "{{ url('save-region')}}",
                    data: {
                        'region': $(".prev").attr('id'),
                        'name': $(".regionName").val(),
                        _token: token,
                    },
                    success: function (data) {
                        getList($(".prev").attr('id') , -1);
                    },
                });
            })
        });

        function getList(id , region_id) {
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
                        $(".data-list").append("<button onclick='getList("+i.id+" , "+i.region_id+")' class='btn btn-primary get-children'>"+i.name+"</button><br><br>");
                    });
                },
            });
        }
    </script>
@endpush
