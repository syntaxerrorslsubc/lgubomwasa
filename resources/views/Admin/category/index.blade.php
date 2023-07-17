@extends('layouts.Admin.default')

@section('content')

<script>
	alert_toast("",'success')
</script>

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Category</h3>
		<div class="card-tools">
			<a href="{{route('admin.category.add')}}" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="50%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Created</th>
						<th>Name</th>
						<th>Rate</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@if(isset($category_lists))
					@foreach($category_lists as $categories )
         	 			<tr>
              				<td class="text-center">{{$categories->id}}</td>
							<td>{{$categories->created_at}}</td>
							<td>{{$categories->name}}</td>
							<td>{{$categories->rate}}</td>
	
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id=""><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id=""><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					
				</tbody>
					@endforeach
				@endif
			</table>
		</div>
	</div>
</div>
@endsection