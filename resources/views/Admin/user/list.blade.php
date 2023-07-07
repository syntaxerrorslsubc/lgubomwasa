@extends('layouts.Admin.default')

@section('content')

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Users</h3>
		<div class="card-tools">
			<a href="./?page=user/manage_user" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Updated</th>
						<th>Avatar</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $users )
         	 			<tr>
              				<td class="text-center">{{$users->id}}</td>
              				<td>{{$users->updated_at}}</td>
              				<td>{{$users->avatar}}</td>
              				<td>{{$users->name}}</td>
              				<td>{{$users->email}}</td>
              				<td>{{$users->type}}</td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="./?page=user/manage_user&id="><span class="fa fa-edit text-dark"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection