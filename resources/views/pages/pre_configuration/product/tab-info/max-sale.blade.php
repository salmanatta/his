<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
            Maximun Sale Quantity OverAll
        </button>
    </h2>
    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="text-muted">
                <button type="button" id="product_quantity" class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#max_over_all_model"> + Add </button>
                <div class="table-responsive col-lg-12">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Start Date</th>
                                <th>Stop Date</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody id="maximum_over_all_quantity_area">
                            <?php $mi = 1; ?>
                            @if(isset($max_sale_qty))
                            @foreach($max_sale_qty as $disc)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">{{$mi}}</td>
                                <td data-field="name">{{$disc->start_date}}</td>
                                <td data-field="age">{{$disc->end_date}}</td>
                                <td data-field="gender">{{$disc->quantity}}</td>
                            </tr>
                            <?php $mi++; ?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true" id="max_over_all_model">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel2">Maximum Sale Quantity Over all</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="repeater" enctype="multipart/form-data" id="max_sale_qty_form">
                                    <div data-repeater-list="group-a">
                                        @csrf
                                        <input type="hidden" name="product_id" value="@if(isset($product->id)){{$product->id}} @endif">
                                        <div data-repeater-item="" class="row">
                                            <div class="mb-3 col-lg-3">
                                                <label for="name">Start Date</label>
                                                <input type="date" value="{{date('Y-m-d')}}" name="start_date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="email">Stop Date</label>
                                                <input type="date" value="{{date('Y-m-d')}}" name="end_date" class="form-control">
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label for="subject">Qty</label>
                                                <input type="number" name="quantity" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 align-self-center">
                                                <div class="d-grid">
                                                    <input data-repeater-delete="" type="button" class="btn btn-primary add_max_sale_qty_btn" value="Add">
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
</div><!-- /.modal -->