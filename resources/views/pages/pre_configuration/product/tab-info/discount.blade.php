<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Discount
        </button>
    </h2>    
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="text-muted">
                <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal" id="showdiscount" data-bs-target=".discount_model"> + Add </button>
                <div class="table-responsive col-lg-12">
                    <table class="table table-editable table-nowrap align-middle table-edits" id="Example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Discount</th>
                                <th>Start Date</th>
                                <th>Stop Date</th>                                
                            </tr>
                        </thead>
                        <tbody id="discount_append_here">
                        <?php $counter = 1; ?>
                            @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $discount->generalDiscount->discount }}</td>                                
                                <td>{{ $discount->generalDiscount->start_date }}</td>
                                <td>{{ $discount->generalDiscount->end_date }}</td>
                            </tr>
                            <?php $counter++; ?>                            
                            @endforeach
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
                                <form class="repeater" id="discount_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="hidden" id="discountProduct" name="discountProduct" value="{{$product->id}}">
                                                <label for="discount_id" class="form-label">Discount</label>
                                                <select id="discount_id" name="discount_id" class="form-select">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-end">
                                            <!-- <button type="submit" id="product_info" class="btn btn-success me-1">Save</button> -->
                                            <input data-repeater-delete="" type="button" class="btn btn-success add_discount me-1 " data-bs-dismiss="modal" value="Add">
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