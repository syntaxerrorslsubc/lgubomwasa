@extends('layouts.MeterReader.default')

@section('content')

<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Billing Details - </b>{{$billing->client->lastname}}, {{$billing->client->firstname}}</h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      object-fit: scale-down;
    }
</style>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="container-fluid" id="printout">
						<div class="row">
							@if ($billing)
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Reading Date</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->reading_date}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Client Name</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->client->lastname}}, {{$billing->client->firstname}}</div>

							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Reading</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->reading}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Previous</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->previous}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Rate per Cubic Meter (m<sup>3</sup>)</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->rate}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Total Amount</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->total}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Due Date</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$billing->due_date}}</div>
							<div class="clear-fix my-1"></div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Status</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">
								@if($billing->status === 0)
				                    <span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Pending</span>
				                @elseif($billing->status === 1)
				                   <span class="badge badge-success bg-gradient-success text-sm px-3 rounded-pill">Paid</span>
				                @endif
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" type="button" id="print" href="{{ route('meterreaderprint_billing',['billing_id'=>$billing->id]) }}" target="_blank"><i class="fa fa-print"></i> Print</a>
				<a class="btn btn-primary btn-sm bg-gradient-primary rounded-0" href="{{ url('/meterreader/edit_billing/').'/'.$billing->id}}"><i class="fa fa-edit"></i> Edit</a>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('meterreaderbillings')}}"><i class="fa fa-angle-left"></i> Back to List</a>
			</div>
		</div>
	</div>
</div>

@endsection