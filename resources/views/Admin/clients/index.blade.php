@extends('layouts.Admin.default')

@section('content')

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Clients</h3>
		<div class="card-tools">
			<a href="{{route('admin.clients.add')}}" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
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
					<tr  class="text-center">
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
					<tr  class="text-center">
							<td class="text-center">{{$clientsProfile->id}}</td>
							<td>{{$clientsProfile->created_at}}</td>
							<td>{{$clientsProfile->meter_serial_number}}</td>
							<td>{{$clientsProfile->lastname}}, {{$clientsProfile->firstname}}</td>
							<td>{{$clientsProfile->address}}</td>

							<td>
				                @if($clientsProfile->status == 1)
								    <span class="badge badge-primary bg-gradient-primary text-sm px-3 rounded-pill">Active</span>
								@elseif($clientsProfile->status == 2)
								    <span class="badge badge-danger bg-gradient-danger text-sm px-3 rounded-pill">Disconnected</span>
								@endif
			              	</td>
						
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="{{ url('/admin/view_client').'/'.$clientsProfile->id}}"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="{{url('/admin/edit_client/').'/'.$clientsProfile->id}}"><span class="fa fa-edit text-primary"></span> Edit</a>
							</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="{{asset('../jquery/jquery-ui.css')}}" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
     $(document).ready(function () {
       $('.table').dataTable({
            columnDefs: [
                    { orderable: false, targets: [4] }
            ],
            order:[0,'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    });
</script>
@endsection