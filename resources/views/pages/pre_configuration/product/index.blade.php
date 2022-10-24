@extends('layouts.main')
@section('content')
    <!-- Modal -->
    <style>
        @media screen and (min-width: 676px) {
            .modal-dialog {
                max-width: 90%; /* New width for default modal */
            }
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Details</h4>
                    <div class="col-sm-12">
                        <div class="text-sm-end">
                            <a type="button" class="btn btn-primary btn waves-effect waves-light mb-2 me-2"
                               href="{{route('products.create')}}"><i class="mdi mdi-plus me-1"></i> Add Product</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <label for="search">Search: </label>
                                <input type="text" name="search" id="searchSubmit" value="{{old('search')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                    <th class="align-middle"> Code #</th>
                    <th class="align-middle">Product Name</th>
                    <th class="align-middle">Short Name</th>
                    <th class="align-middle">Group</th>
                    <th class="align-middle">Packet</th>
                    <th class="align-middle">Comp Artd No</th>
                    <th class="align-middle">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{$product->product_code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->short_name}}</td>
                            <td>{{isset($product->group->name) ? $product->group->name : '' }}</td>
                            <td>{{$product->packet}}</td>
                            <td>{{$product->comp_artd_no}}</td>
                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{url('getProduct/'.$product->id)}}" class="text-success"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                <!-- <a  href="{{route('products.destroy',$product->id)}}" class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a> -->
                                    <form method="post" action='{{route("products.destroy",$product->id) }}'>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="row">
                    <div class="col-4 d-flex justify-content-start" style="margin-left: 10px;">
                        Showing {{ $products->firstItem() }} to {{$products->lastItem()}} of {{ $products->total() }}
                        entries
                    </div>
                    <div class="col-12 d-flex justify-content-end" style="margin-right:10px;">
                        {{ $products->onEachSide(2)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#searchSubmit').keydown(function (event) {
                if (event.which == 13) {
                    console.log('here');
                    // this.form.submit();
                    // event.preventDefault();
                    var val = "<?= url('/') . '/products' ?>";
                    window.location = val + "?searchData=" + $("#searchSubmit").val();
                }
            });
        });
    </script>
@endpush
