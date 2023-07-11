@extends('layouts.Admin.default')

@section('content')

<div class="container-fluid">
	<form action="" id="category-form" method="post">
		<input type="hidden" name ="id" value="">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" class="form-control form-control-sm rouned-0" name="name" id="name" value="" required="required">
		</div>
		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
			<option value="1" >Active</option>
			<option value="2" >Inactive</option>
			</select>
		</div>
	</form>
</div>
@endsection
					