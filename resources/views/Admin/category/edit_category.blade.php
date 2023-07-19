@extends('layouts.Admin.default')

@section('content')

<div class="container-fluid">
	<form action="{{route('adminedit_category.save')}}" id="category-form" method="post">
		@csrf
		<input type="hidden" name ="id" value="">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" class="form-control form-control-sm rouned-0" name="name" id="name" value="" required="required">
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Rate per Cubic Meter (m<sup>3</sup>)e</label>
			<input type="text" class="form-control form-control-sm rouned-0" name="rate" id="name" value="" required="required">
		</div>
		<button class="btn btn-primary" type="submit">Save</button>
	</form>
</div>
@endsection
					