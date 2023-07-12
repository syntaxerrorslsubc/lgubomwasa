@extends('layouts.Admin.default')

@section('content')
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Create New Billing Details</b></h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      width: 100%;
      object-fit: scale-down;
    }
</style>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-6 col-md-8 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="container-fluid">
						<form action="{{route('adminmanage_billing.store')}}" id="billing-form" method="post"> @csrf
							<input type="hidden" name ="id" value="">
							<div class="form-group mb-3">
								<label for="client_id" class="control-label">Client</label>
								<select name="client_id" id="client_id" class="form-control form-control-sm rounded-0" required="required">
									@if($clients=\App\Models\Client_list::orderby('lastname', 'asc')->get())
										@foreach($clients as $client)
											<option value="{{$client->id}}">{{$client->lastname}}, {{$client->firstname}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="reading_date" class="control-label">Reading Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="reading_date" name="reading_date" required="required" max="" value="{{$billing->reading_date}}"/>
							</div>
							<div class="form-group mb-3">
								<label for="previous" class="control-label">Previous Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="previous" name="previous" required="required" readonly value="{{$billing->previous}}"/>
							</div>
							<div class="form-group mb-3">
								<label for="reading" class="control-label">Current Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="reading" name="reading" required="required" value="{{$billing->reading}}"/>
							</div>
							<div class="form-group mb-3">
								<label for="rate" class="control-label">Rate per Cubic Meter (m<sup>3</sup>)</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="rate" name="rate" required readonly value="{{$billing->rate}}"/>
							</div>
							<div class="form-group mb-3">
								<label for="total" class="control-label">Total Bill</label>
								<input type="number" step="any" class="form-control form-control-sm rounded-0 text-right" id="total" readonly name="total" required value="{{$billing->total}}"/>
							</div>
							<div class="form-group mb-3">
								<label for="due_date" class="control-label">Due Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="due_date" name="due_date" required="required" value="{{$billing->due_date}}"/>
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="0" >Pending</option>
								<option value="1" >Paid</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" form="billing-form"><i class="fa fa-save"></i> Save</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('adminmanage_billings')}}"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>
<script>
	function calc_total(){
		var current_reading = $('#reading').val()
		var previous = $('#previous').val()
		var rate = $('#rate').val()

		current_reading = current_reading > 0 ? current_reading : 0;
		previous = previous > 0 ? previous : 0;

		$('#total').val((parseFloat(current_reading) - parseFloat(previous)) * parseFloat(rate))
	}
	$(document).ready(function(){
		$('#client_id').select2({
			placeholder:"Please Select Here",
			containerCssClass:'form-control form-control-sm rounded-0'
		})
		$('#client_id').change(function(){
			var id = $(this).val()
			if(id <= 0)
				return false;
			start_loader()
			$.ajax({
				url:_base_url_+"classes/Master.php?f=get_previous_reading",
				data:{client_id : id, id: '<?= isset($id) ? $id : '' ?>'},
				method:'POST',
				dataType:'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occurred.", 'error')
					end_loader()
				},
				success:function(resp){
					if(resp.status == 'success'){
						$('#previous').val(resp.previous)
						calc_total()
					}else{
						alert_toast("An error occurred.", 'error')
					}
					end_loader();
				}
			})
		})
		$('#reading').on('input', function(){
			calc_total()
		})
		$('#billing-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_this.attr('action'),
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "/admin/view_billings/"+resp.id
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body, .modal").scrollTop(0)
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>

@endsection

