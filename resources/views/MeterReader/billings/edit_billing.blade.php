@extends('layouts.MeterReader.default')

@section('content')
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Update Billing Details</b></h3>
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
						<form action="{{route('meterreaderedit_billing.update')}}" method="post"> @csrf
							<input type="hidden" name ="id" value="{{$billing->id}}">
							<div class="form-group mb-3">
								<label for="clientid" class="control-label">Client</label>
								<select name="clientid" id="clientid" class="form-control form-control-sm rounded-0" required="required">
									@if($clients=\App\Models\Client_list::orderby('lastname', 'asc')->get())
										@foreach($clients as $client)
											<option name="clientid" id="clientid" value="{{$client->id}}">{{$client->lastname}}, {{$client->firstname}}</option>
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
								<input type="text" class="form-control form-control-sm rounded-0" oninput="calc_total()" id="reading" name="reading" required="required" value="{{$billing->reading}}"/>
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
							<div class="form-group mb-3">
								<label for="penalty" class="control-label">Penalty</label>
								<input type="number" class="form-control form-control-sm rounded-0" id="penalty" name="penalty" required="required">
							</div>
							<div class="form-group mb-3">
								<label for="or" class="control-label">OR #</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="or" name="or" required="required">
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="0" >Pending</option>
								<option value="1" >Paid</option>
								
								</select>
							</div>
							<div class="card-footer py-1 text-center">
								<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" type="submit" href="{{ url('/meterreader/view_billing/').'/'.$billing->id}}"><i class="fa fa-save"></i> Save</button>
								<a class="btn btn-light btn-sm bg-gradient-light border rounded-0"  href="{{route('meterreaderbillings')}}"><i class="fa fa-angle-left"></i> Cancel</a>
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
		var minimum = $('#minimum').val()
		var current_reading = $('#reading').val()
		var previous = $('#previous').val()
		var minconsume = 10;
		var cat = $('#category').val()
		var rate = $('#rate').val()

		current_reading = current_reading > 0 ? current_reading : 0;
		previous = previous > 0 ? previous : 0;

		var consume = parseFloat(current_reading) - parseFloat(previous);

		if (consume <= minconsume) {
			$('#total').val(minimum);
		}else{
			var excessconsume = consume - minconsume;
			var partialbill = (excessconsume * parseFloat(rate)) + parseFloat(minimum);
			$('#total').val(partialbill);
		}
	} 

	$('#clientid').on('change', function() {
	   $.ajax({
	   		url:'{{url("/admin/add_billing/search/consumertype/")}}/' + this.value,
	   		method: 'GET',
	   		success:function(resp){
	   			var response = JSON.parse(resp)
	   			$('#rate').val(response.rate);
	   			$('#minimum').val(response.minimum);
	   		}
	   });
	});

	$('#clientid').on('change', function() {
	   $.ajax({
	   		url:'{{url("/admin/add_billing/search/prevBilling/")}}/' + this.value,
	   		method: 'GET',
	   		success:function(resp){
	   			// var response = JSON.parse(resp)
	   			$('#previous').val(resp);
	   		}
	   });
	});
	</script>


@endsection

