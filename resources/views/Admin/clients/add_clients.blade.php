@extends('layouts.Admin.default')
@section('content')


<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Create New Client</b></h3>
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
						<form action="{{route('adminadd_clients.save')}}" method="post" id="client-form">
							@csrf
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
								<label for="meter_serial_number" class="control-label">Meter Serial Number</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="meter_serial_number" name="meter_serial_number" required="required" >
							</div>
							<div class="form-group p-0 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
								<label for="previous" class="control-label">Previous</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="previous" name="previous" value="" required="required">
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="1" >Active</option>
								<option value="2" >Disconnected</option>
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

<script>
	function previewImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const cimg = document.getElementById('cimg');

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    cimg.src = reader.result;
                    cimg.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                thumbnail.src = '#';
                thumbnail.style.display = 'none';
            }
        }
</script>	
@endsection
