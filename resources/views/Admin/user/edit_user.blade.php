@extends('layouts.Admin.default')
@section('content')

<div class="card card-outline rounded-0 card-navy">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="{{route('adminedit_user.update')}}" id="manage-user" method="post">	
				@csrf
				<input type="hidden" name="id" value="{{$user->id}}">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" required  autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password"> Password</label>
					<input type="password" name="password" id="password" class="form-control" value="{{$user->password}}" autocomplete="off">
                    
					<small><i>Leave this blank if you don't want to change the password.</i></small>
                    
				</div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                    <option value="1" >Administrator</option>
                    <option value="2" >Cashier</option>
                    <option value="3" >Meter Readaer</option>
                    </select>
                </div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary rounded-0 mr-3" form="manage-user" type="submit" href="{{ url('/admin/user/')}}">Save User Details</button>
					<a href="{{ url('/admin/user/')}}" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
@endsection
