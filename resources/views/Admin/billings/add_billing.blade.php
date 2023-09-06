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
						<form action="{{route('adminadd_billing.save')}}" method="post"> 
							@csrf
							<input type="hidden" name ="id" value="">
							<div class="form-group mb-3">
								<label for="clientid" class="control-label">Client</label>
								<select name="clientid" id="clientid" class="form-control form-control-sm rounded-0" required="required">
									<option value="">choose client</option>
									@if($clients=\App\Models\Client_list::orderby('lastname', 'asc')->get())
										@foreach($clients as $clientid)
											<option name="clientid" id="clientid" value="{{$clientid->id}}">{{$clientid->lastname}}, {{$clientid->firstname}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="reading_date" class="control-label">Reading Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="reading_date" name="reading_date" required="required" max="">
							</div>
							<div class="form-group mb-3">
								<label for="previous" class="control-label">Previous Reading</label>
								@if($previous=\App\Models\Billing_list::get())
									<input type="text" class="form-control form-control-sm rounded-0" id="previous" name="previous" required="required" value="@foreach($previous as $previouses)
										{{$previouses->previous}}
									@endforeach">	
								@endif
							</input>
							</div>
							<div class="form-group mb-3">
								<label for="reading" class="control-label">Current Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" oninput="calc_total()" id="reading" name="reading" required="required" value="">
							</div>
							<div class="form-group mb-3">
								<label for="rate" class="control-label">Rate per Cubic Meter (m<sup>3</sup>)</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="rate" name="rate" required readonly value=""/>							
							</div>
							<div class="form-group mb-3">
								<label for="total" class="control-label">Total Bill</label>
								<input type="number" step="any" class="form-control form-control-sm rounded-0 text-right" id="total" readonly name="total">
							</div>
							<div class="form-group mb-3">
								<label for="due_date" class="control-label">Due Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="due_date" name="due_date" required="required">
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="0" >Pending</option>
								<option value="1" >Paid</option>
								</select>
							</div>
							<div class="card-footer py-1 text-center">
								<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" type="submit"><i class="fa fa-save"></i> Save</button>
								<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('adminbillings')}}"><i class="fa fa-angle-left"></i> Cancel</a>
							</div>
					
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<script>
	function calc_total(){
		var minimum=150;
		var current_reading = $('#reading').val()
		var previous = $('#previous').val()
		var rate = $('#rate').val()

		current_reading = current_reading > 0 ? current_reading : 0;
		previous = previous > 0 ? previous : 0;

		var consume = parseFloat(current_reading) - parseFloat(previous);

		if (consume <= 10) {
			$('#total').val(minimum);
		}else{
			$('#total').val(consume * parseFloat(rate)+ minimum);
		}
	}

	$('#clientid').on('click', function() {
	   $.ajax({
	   		url:'{{url("/admin/add_billing/search/consumertype/")}}/' + this.value,
	   		method: 'GET',
	   		success:function(resp){
	   			console.log(resp)
	   			$('#rate').val(resp);
	   		}
	   });
	});
</script>

@endsection

