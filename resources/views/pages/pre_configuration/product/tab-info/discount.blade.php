<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Discount
        </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="text-muted">
                <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal" id="product_discount" data-bs-target=".discount_model"> + Add </button>
                <div class="table-responsive col-lg-12">
                    <table class="table table-editable table-nowrap align-middle table-edits" id="Example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Start Date</th>
                                <th>Stop Date</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody id="append_here">
                            <?php $di = 1; ?>
                            @if(isset($discounts))
                            @foreach($discounts as $disc)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">{{$di}}</td>
                                <td data-field="name">{{$disc->start_date}}</td>
                                <td data-field="age">{{$disc->end_date}}</td>
                                <td data-field="gender">{{$disc->discount}}</td>
                            </tr>
                            <?php $di++; ?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade  discount_model" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="repeater" id="discModelId" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="product_id" name="product_id" value="@if(isset($product->id)){{$product->id}} @endif">
                                    <input type="hidden" class="discount_type" name="discount_type" value="Product">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item="" class="row">
                                            <div class="mb-3 col-lg-3">
                                                <label for="name">Start Date</label>
                                                <input type="date" value="{{date('Y-m-d')}}" id="name" name="start_date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="email">Stop Date</label>
                                                <input type="date" value="{{date('Y-m-d')}}" name="end_date" id="end_date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="subject">Discount</label>
                                                <input type="text" name="discount" id="discount" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 align-self-center">
                                                <div class="d-grid">
                                                    <input data-repeater-delete="" type="button" id="add_disc" class="btn btn-primary" value="Add">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>