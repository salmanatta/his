<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Bonus
        </button>
    </h2>        
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="text-muted">
                <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal" id="addBonus" data-bs-target="#bonus_model"> + Add </button>
                <div class="table-responsive col-lg-12">
                    <!-- <h4> Bonus</h4> -->
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bonus</th>
                                <th>Quantity</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody id="bonus_append_here"> 
                        <?php $counter = 1; ?>
                            @foreach($bonus as $productBonus)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $productBonus->bonuses->bonus }}</td>
                                <td>{{ $productBonus->bonuses->quantity }}</td>
                                <td>{{ $productBonus->bonuses->start_date }}</td>
                                <td>{{ $productBonus->bonuses->end_date }}</td>
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
<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel2" aria-hidden="true" id="bonus_model">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel2">Bonus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="repeater" enctype="multipart/form-data" id="bonus_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="hidden" id="bonusProduct" name="bonusProduct" value="{{$product->id}}">
                                                <label for="bonus_id" class="form-label">Bonus</label>
                                                <select id="bonus_id" name="bonus_id" class="form-select">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-end">
                                            <!-- <button type="submit" id="product_info" class="btn btn-success me-1">Save</button> -->
                                            <input data-repeater-delete="" type="button" class="btn btn-success add_bonus me-1 " data-bs-dismiss="modal" value="Add">                                            
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