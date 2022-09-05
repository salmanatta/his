@extends('layouts.main')
@section('content')
<!-- Bootstrap Multiselect CSS -->



<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4">Apply Bonus & Discount on Product</h4><hr>

				<form  class="" method="post" id="addFormId" action="#" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="mb-3">
								<label for="formrow-inputState"  class="form-label">Bonus</label>
								<select id="bonus_id"  name="bonus_id" class="form-select select2 bonus_id">
									<option selected disabled="" value="">Choose Bonus</option>
									@foreach($bonuses as $Bonus)
									<option value="{{$Bonus->id}}" data-bonus="{{$Bonus->bonus}}" data-b_start_date="{{$Bonus->start_date}}" data-b_end_date="{{$Bonus->end_date}}" data-quantity="{{$Bonus->quantity}}">Bonus -> {{$Bonus->bonus}} | Quantity -> {{$Bonus->quantity}} | From: {{$Bonus->start_date}} To: {{$Bonus->end_date}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="mb-3">
								<label for="formrow-inputState"  class="form-label">Discount</label>
								<select id="discount_id"   name="discount_id" class="form-select select2  discount_id">
									<option selected disabled="" value="">Choose Discount</option>
									@foreach($discounts as $value)
									<option value="{{$value->id}}" data-discount="{{$value->discount}}" data-d_start_date="{{$value->start_date}}" data-d_end_date="{{$value->end_date}}">Discount -> {{$value->discount}}% | From: {{$value->start_date}} To: {{$value->end_date}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>  
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-3">  
							<label for="formrow-inputState"  class="form-label"> Product</label>
							<select id="product_id " name="product_id[]" class="select2 form-control" multiple>  
								<option disabled="" value="">Choose Multiple Product</option>
								@foreach($products as $product)
								<option value="{{$product->id}}">{{$product->product->name}}</option>
								@endforeach  
							</select>  
						</div>  
					</div>
					</div>  
					      
					<div>
						<button type="button" class="btn btn-primary w-md sub_add">Submit</button>
					</div>

				</form>
			</div>
			<!-- end card body -->
		</div>
		<!-- end card -->
	</div>
	<!-- end col -->


</div>
<!-- end row -->

@stop
@push('script')

<!-- Include the plugin's CSS and JS: -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->


<script type="text/javascript">  
	$(document).on('click', '.sub_add', function (){
		// e.preventDefault();
var data = $('#addFormId').serialize();
console.log(data);
var token = $("meta[name='csrf-token']").attr("content");
  $.ajax({
    method:'post',
    url: "{{ route('applyStore')}}",
	data:{
	    'data':data,
	     _token:token,
	    'addFormId':$('#addFormId').serialize(),
	     },
// datatype:'json',
    data: $('#addFormId').serialize(),
success:function(data){
    console.log(data);
    alert('Action Completed successfully');
	$('#bonus_id').empty();
	$('#discount_id').empty();
	$('#product_id').val('');
	var html="<option selected value=''>Choose Bonus</option>";	
	for (var i = 0; i < data.bonuses.length; i++) {
		html +='<option value="'+data.bonuses[i].id+'" data-bonus="'+ data.bonuses[i].bonus +'" data-b_start_date="'+data.bonuses[i].start_date+'" data-b_end_date="'+data.bonuses[i].end_date+'" data-quantity="'+data.bonuses[i].quantity+'">Bonus -> '+data.bonuses[i].bonus+' | Quantity -> '+data.bonuses[i].quantity+' | From: '+data.bonuses[i].start_date+' To: '+data.bonuses[i].end_date+'</option>';		
	}
	$('#bonus_id').append(html);	
	var html="<option selected value=''>Choose Discount</option>";	
	for (var i = 0; i < data.discounts.length; i++) {
		html += '<option value="'+data.discounts[i].id+'" data-discount="'+data.discounts[i].discount+'" data-d_start_date="'+ data.discounts[i].start_date +'" data-d_end_date="'+ data.discounts[i].end_date +'">Discount -> '+ data.discounts[i].discount +'% | From: ' + data.discounts[i].start_date +' To: '+ data.discounts[i].end_date +'</option>'		
	}
	$('#discount_id').append(html);
    // $('#product_id').empty().append('<option>New Option</option>');
    },                   
});
}); 
</script> 

<!-- ==========================START ADD  AJAX PROPERTY WORK================= -->
@endpush