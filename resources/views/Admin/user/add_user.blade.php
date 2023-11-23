@extends('layouts.Admin.default')
@section('content')


<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Create New User</b></h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      width: 100%;
      object-fit: scale-down;
    }
</style>

<div class="card card-outline rounded-0 card-navy">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="{{route('admin_user.save')}}" method="post">	
				@csrf
				<input type="hidden" name="id" value="">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="" required>
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" value="" required  autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password"> Password</label>
					<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">

				</div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                    <option value="1" >Administrator</option>
                    <option value="2" >Cashier</option>
                    <option value="3" >Meter Reader</option>
                    </select>
                </div>
				<div class="card-footer py-1 text-center">
					<button class="btn btn-sm btn-primary rounded-0 mr-3" type="submit">Save User Details</button>
					<a href="{{route('adminuser')}}" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
				</div>
			</form>
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
