@extends('layouts.Admin.default')

@section('content')

<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b></b></h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      width: 100%;
      object-fit: scale-down;
    }
</style>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="container-fluid">
						<form action="{{route('adminadd_clients.save')}}" id="client-form" method=""> @csrf
							<input type="hidden" name ="id" value="">
							<div class="form-group mb-3">
								<label for="category_id" class="control-label">Category</label>
								<select name="category_id" id="category_id" class="form-control form-control-sm rounded-0" required="required">
									@if($categories=\App\Models\Category_list::orderby('id', 'asc')->get())
										@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="firstname" class="control-label">First Name</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="firstname" name="firstname" required="required" value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="middlename" class="control-label">Middle Name</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="middlename" name="middlename" placeholder="optional" value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="lastname" class="control-label">Last Name</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="lastname" name="lastname" required value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="contact" class="control-label">Contact #</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="contact" name="contact" required value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="address" class="control-label">Address</label>
								<textarea rows="3" class="form-control form-control-sm rounded-0" id="address" name="address" required="required"></textarea>
							</div>
							<div class="form-group p-0 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
								<label for="meter_code" class="control-label">Meter Serial Number</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="meter_code" name="meter_serial_number" value="" required="required">
							</div>
							<div class="form-group p-0 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
								<label for="first_reading" class="control-label">First Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="first_reading" name="first_reading" value="" required="required">
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="1"><span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Active</span></option>
								<option value="2"><span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Inctive</span></option>
								</select>
							</div>

							<div class="card-footer py-1 text-center">
								<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" type="submit"><i class="fa fa-save"></i> Save</button>
								<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=clients"><i class="fa fa-angle-left"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection				