
@extends('layouts.MeterReader.default')

@section('content')
<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Clients</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Created</th>
						<th>Meter Serial Number</th>
						<th>Name</th>
						<th>Address</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($client_lists as $clientsProfile )
					<tr>
							<td class="text-center">{{$clientsProfile->id}}</td>
							<td>{{$clientsProfile->created_at}}</td>
							<td>{{$clientsProfile->meter_serial_number}}</td>
							<td>{{$clientsProfile->lastname}}, {{$clientsProfile->firstname}}</td>
							<td>{{$clientsProfile->address}}</td>

							<td>
								@if($clientsProfile->status === 1)
				                      <span class="badge badge-primary bg-gradient-primary text-sm px-3 rounded-pill">Active</span>
				                @elseif($clientsProfile->status === 2)
				                     <span class="badge badge-danger bg-gradient-danger text-sm px-3 rounded-pill">Disconnected</span>
				                @endif
			              </td>
						
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm">
				                  		<a class="dropdown-item view_data" href="{{ url('/meterreader/view_client').'/'.$clientsProfile->id}}"><span class="fa fa-eye text-dark"></span> View</a> 
				                  </button>
				                      
							</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection