@extends('layouts.Admin.default')

@section('content')
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
						<form action="{{route('adminmanage_billing.store')}}" id="billing-form" method="post"> 
							@csrf
							<input type="hidden" name ="id" value="">
							<div class="form-group mb-3">
								<label for="category_id" class="control-label">Category</label>
								<select name="category_id" id="category_id" class="form-control form-control-sm rounded-0" required="required">
									<option value="1">commercial</option>
									<option value="2">residential</option>
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
								<label for="meter_code" class="control-label">Meter Code</label>
								<input type="text" class="form-control form-control-sm rounded-0" id="meter_code" name="meter_code" value="" required="required">
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

						</form>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<button class="btn btn-primary btn-sm bg-gradient-primary rounded-0" form="billing-form"><i class="fa fa-save"></i> Save</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('adminmanage_billings')}}"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
		</div>
	</div>
</div>
<script>
	function calc_total(){
		var current_reading = $('#reading').val()
		var previous = $('#previous').val()
		var rate = $('#rate').val()

		current_reading = current_reading > 0 ? current_reading : 0;
		previous = previous > 0 ? previous : 0;

		$('#total').val((parseFloat(current_reading) - parseFloat(previous)) * parseFloat(rate))
	}
	$(document).ready(function(){
		$('#client_id').select2({
			placeholder:"Please Select Here",
			containerCssClass:'form-control form-control-sm rounded-0'
		})
		$('#client_id').change(function(){
			var id = $(this).val()
			if(id <= 0)
				return false;
			start_loader()
			$.ajax({
				url:_base_url_+"classes/Master.php?f=get_previous_reading",
				data:{client_id : id, id: '<?= isset($id) ? $id : '' ?>'},
				method:'POST',
				dataType:'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occurred.", 'error')
					end_loader()
				},
				success:function(resp){
					if(resp.status == 'success'){
						$('#previous').val(resp.previous)
						calc_total()
					}else{
						alert_toast("An error occurred.", 'error')
					}
					end_loader();
				}
			})
		})
		$('#reading').on('input', function(){
			calc_total()
		})
		$('#billing-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_this.attr('action'),
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "/admin/view_billings/"+resp.id
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body, .modal").scrollTop(0)
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>

@endsection

