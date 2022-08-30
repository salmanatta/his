@extends('layouts.main')
@section('content')
 <!-- Modal -->
     <div class="modal fade bs-example-modal-lg bonus" id="bonusModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Bonus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                
                	<form method="post" action="{{route('create-genernal-bonus')}}">
                		@csrf                    
                        Bonus % <input type="number" class="form-control" name="bonus">
                        @error('bonus')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        Quantity <input type="number" name="quantity" class="form-control">
                        @error('quantity')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        Start Date<input type="date" name="start_date" class="form-control">
                        @error('start_date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        End Date<input type="date" name="end_date" class="form-control">                        
                        @error('end_date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                   <br><br>
                   <!-- data-bs-dismiss="modal" -->
                    <div class="text-sm-end "> 
                                 <button type="submit" class="btn btn-success btn waves-effect waves-light mb-2 me-2 mr-3 bonus_add" >Save</button>
                            </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- Modal -->
     <div class="modal fade bs-example-modal-lg discount" tabindex="-1" id="discountModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                	<form action="" id="discountFormId" method="POST">
                		@csrf                   
                        Discount % <input type="number" class="form-control" name="discount">                        
                        Start Date <input type="date" name="start_date" class="form-control">
                        End Date<input type="date" name="end_date" class="form-control">
                    <br><br>
                    <div class="text-sm-end ">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2 mr-3 discount_add"  > Add</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<div class="row">
	 <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Define Bonus Rule</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target=".bonus" ><i
                                        class="mdi mdi-plus me-1"></i> Add</a>
                            </div>
                        </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        
                            <thead class="table-light">
                                <tr>
                                    <!-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> -->
                                    <th class="align-middle"> #</th>
                                    <th class="align-middle">bonus</th>
                                     <th class="align-middle">Quantity</th>
                                    <th class="align-middle">Start Date</th>
                                    <th class="align-middle">End Date</th>
                                   
                                    <!-- <th class="align-middle">Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="append_here">
                               @foreach($bonuses as $value)
                                <tr data-id="{{$value->id}}">                                    
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$loop->iteration}}</a> </td>
                                    <td>{{$value->bonus}}</td>
                                    <td>{{$value->quantity}}</td>
                                    <td>{{$value->start_date}}</td>
                                    <td>{{$value->end_date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                         </div>
                    </div>
                </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Define Discount Rule</h4>
                    <div class="col-sm-12">
                            <div class="text-sm-end">
                                 <a type="button"
                                    class="btn btn-primary btn waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target=".discount"><i
                                        class="mdi mdi-plus me-1"></i> Add</a>
                            </div>
                        </div><!-- end col-->

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">                        
                            <thead class="table-light">
                                <tr>
                                    <!-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> -->
                                    <th class="align-middle"> #</th>
                                    <th class="align-middle">Discount</th>
                                    <!-- <th class="align-middle">Quantity</th> -->
                                    <th class="align-middle">Start Date</th>
                                    <th class="align-middle">End Date</th>                                   
                                    <!-- <th class="align-middle">Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="append_here2">
                            	@foreach($discounts as $value)
                                <tr data-id="{{$value->id}}">                                    
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{$loop->iteration}}</a> </td>
                                    <td>{{$value->discount}}</td>
                                    <!-- <td>{{$value->quantity}}</td> -->
                                    <td>{{$value->start_date}}</td>
                                    <td>{{$value->end_date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                         </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   
    @endsection
@push('script')
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	
        // $(document).ready(function(){
           
        //     $(document).on('click','.detail_view_button',function(){
               
        //        $('.m_bonus_id').text($(this).data('bonus_id'));
        //        $('.m_bonus_name').text($(this).data('bonus_name'));
        //        $('.m_address').text($(this).data('address'));
        //        $('.m_phone_office').text($(this).data('phone_office'));
        //        $('.m_phone_res').text($(this).data('phone_res'));
        //        $('.m_fax').text($(this).data('fax'));
        //        $('.m_cnic_no').text($(this).data('cnic_no'));
        //     });
        // });


        // ====================Start add disc========================      
//     $(document).on('click', '.bonus_add', function (){
//     var formData = new FormData(document.getElementById("bonusFormId"));        
//     var data = $('#bonusFormId').serialize();
//     var token = $("meta[name='csrf-token']").attr("content");
//   $.ajax({
//     method:'POST',
//     url: "{{ route('generalBonus')}}",
// 	data:{
// 	    'data':data,
//         // 'data':formData,
// 	    // _token:token,
// 	    // 'infoFormId':$('#bonusFormId').serialize(),
// 	     },
// // datatype:'json',
//     // data: $('#bonusFormId').serialize(),
// success:function(data){    
//     // alert('Action Completed successfully');
//     // console.log(data);
//     $('#append_here').empty();
//     $('#bonusModal').modal('hide');
//     var html="";
//     var count = 1;
//     for (var i = 0; i < data.length; i++){        
//         html =`<tr><td >`+count+`</td><td >`+data[i].bonus+`</td><td >`+data[i].quantity+`</td><td >`+data[i].start_date+`</td><td >`+data[i].end_date+`</td></tr>`;
//         count++;    
//         $('#append_here').append(html);        
//     }
    


// // $.each(data, function(index, value){
// //  html+=`<tr><td >`+i+`</td><td >`+value.bonus+`</td><td >`+value.quantity+`</td><td >`+value.start_date+`</td><td >`+value.end_date+`</td></tr>`;
// //  $i++;
// //    });
//     // $('#append_here').empty();
//     // $('#append_here').append(html);
       
//     },                   
// });
// }); 
  // ====================Start add disc========================  
    var i=1;
$(document).on('click', '.discount_add', function (){
var data = $('#discountFormId').serialize();
console.log(data);
var token = $("meta[name='csrf-token']").attr("content");
  $.ajax({
    method:'post',
    url: "{{ route('generalDiscount')}}",
	data:{
	    'data':data,
	    _token:token,
	    'discountFormId':$('#discountFormId').serialize(),
	     },
// datatype:'json',
    data: $('#discountFormId').serialize(),
success:function(data){
    console.log(data);
    alert('Action Completed successfully');
    $('#append_here2').empty();        
    $('#discountModal').modal('hide');
    var html="";
    for (let i = 0; i < data.length; i++) {
        const element = data[i];
        html+=`<tr><td >`+data[element].discount+`</td><td >`+data[element].start_date+`</td><td >`+data[element].end_date+`</td></tr>`;        
        $('#append_here2').append(html);
    }
    // $.each(data, function(index, value){
    // html+=`<tr><td >`+value.discount+`</td><td >`+value.start_date+`</td><td >`+value.end_date+`</td></tr>`;
//    }
//    );        
        
       
    },                   
});
});   
     </script>
@endpush
