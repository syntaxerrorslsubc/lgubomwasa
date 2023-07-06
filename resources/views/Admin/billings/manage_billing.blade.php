@extends('layouts.Admin.default')

@section
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Create New Billing</b></h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      width: 100%;
      object-fit: scale-down;
    }
</style>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-6 col-md-8 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="container-fluid">
						<form action="{{ route('adminmanage_billings_store') }}" id="billing-form" method="post"> @csrf
							<input type="hidden" name ="id" value="">
							<div class="form-group mb-3">
								<label for="client_id" class="control-label">Client</label>
								<select name="client_id" id="client_id" class="form-control form-control-sm rounded-0" required="required">
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="reading_date" class="control-label">Reading Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="reading_date" name="reading_date" required="required" max="" value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="previous" class="control-label">Previous Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="previous" name="previous" required="required" readonly value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="reading" class="control-label">Current Reading</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="reading" name="reading" required="required" value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="rate" class="control-label">Rate per Cubic Meter (m<sup>3</sup>)</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="rate" name="rate" required readonly value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="total" class="control-label">Total Bill</label>
								<input type="number" step="any" class="form-control form-control-sm rounded-0 text-right" id="total" readonly name="total" required value=""/>
							</div>
							<div class="form-group mb-3">
								<label for="due_date" class="control-label">Due Date</label>
								<input type="date" class="form-control form-control-sm rounded-0" id="due_date" name="due_date" required="required" value=""/>
							</div>
							<div class="form-group">
								<label for="status" class="control-label">Status</label>
								<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
								<option value="0" >Pending</option>
								<option value="1" >Paid</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" form="billing-form" type="submit"><i class="fa fa-save"></i> Save</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('adminmanage_billings')}}"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>
@endsection