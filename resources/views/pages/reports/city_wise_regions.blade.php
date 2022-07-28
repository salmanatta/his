@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title  text-center">City Wise Regions</h4> -->
                <div class="col-sm-12 text-center">
                    <!--  <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary waves-effect waves-light mb-2 me-2" href="{{route('regions.create')}}"><i
                                        class="mdi mdi-plus me-1"></i> Add Region</a>
                            </div> -->
                    <h5>City Wise Regions </h5>
                </div><!-- end col-->
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                    </thead>
                    <tbody>
                        @foreach($citys as $city)
                            <tr>
                                <!-- <td><a href="javascript: void(0);" class="text-body fw-bold">$city->id</a> </td> -->
                                <td>{{$city->city_id.' - '.$city->name}}</td>
                            </tr>
                            @php
                                $regions=App\Models\region\Region::where(['city_id'=> $city->id,'region_id'=>null])->get();
                            @endphp
                            @foreach($regions as $region)
                                <tr>
                                    <td> </td>
                                    <td> {{$region->region_code.'-'.$region->name}}</td>
                                </tr>
                                @php
                                    $child_regions=$region->childrenRecursive()->get();
                                @endphp
                                @foreach($child_regions as $child_region)                        
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> {{$child_region->region_code.'-'.$child_region->name}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
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
<!-- end row -->
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table cellpadding="5" cellmargin="5">
                    <tr>
                        <th> Region Code </th>
                        <td> : <span class="m_region_code"> </span> </td>
                    </tr>
                    <tr>
                        <th> Region name </th>
                        <td> : <span class="m_region_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> City </th>
                        <td> : <span class="m_city_name"> </span> </td>
                    </tr>
                    <tr>
                        <th> Status </th>
                        <td> : <span class="m_region_status"> </span> </td>
                    </tr>

                </table>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '.detail_view_button', function() {
            $('.m_region_code').text($(this).data('region_code'));
            $('.m_region_name').text($(this).data('region_name'));
            $('.m_city_name').text($(this).data('city_name'));
            var row_status = $(this).data('region_status');
            if (row_status == 1)
                status = '<span class="badge bg-success font-size-12"> Active</span>';
            else
                status = '<span class="badge bg-danger font-size-12"> InActive</span>';
            $('.m_region_status').html(status);
        });
    });
</script>
@endpush