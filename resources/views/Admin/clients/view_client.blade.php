@extends('layouts.Admin.default')

@section('content')
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b>Client Details - </b>{{$client->lastname}}, {{$client->firstname}}</h3>
</div>
<style>
	img#cimg{
      max-height: 15em;
      object-fit: scale-down;
    }
</style>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="container-fluid">
						<div class="row">
							@if ($client)
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Client Name</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->lastname}}, {{$client->firstname}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Contact #</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->contact}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Address</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->address}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Meter Serial Number</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->meter_serial_number}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Meter Previous Reading</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->previous}}</div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Date Created</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{$client->created_at}}</div>
							<div class="clear-fix my-1"></div>
							<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Status</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">
												@if($client->status === 1)
				                      <span class="badge badge-primary bg-gradient-primary text-sm px-3 rounded-pill">Active</span>
				                @elseif($client->status === 2)
				                     <span class="badge badge-danger bg-gradient-danger text-sm px-3 rounded-pill">Disconnected</span>
				                @endif</div></div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{url('/admin/billings/billing_history/').'/'.$client->id}}"><i class="fa fa-table"></i> Billing History</a>
					<a class="btn btn-primary btn-sm bg-gradient-primary rounded-0" href="{{ url('/admin/edit_client/').'/'.$client->id}}"><i class="fa fa-edit"></i> Edit</a>
					<button class="btn btn-danger btn-sm bg-gradient-danger rounded-0 delete_data" type="button" data-id="" data-url="{{ url('/admin/delete_client/').'/'.$client->id}}" href=""><i class="fa fa-trash"></i> Delete</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{ route('adminclients')}}"><i class="fa fa-angle-left"></i> Back to List</a>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="{{asset('../jquery/jquery-ui.css')}}" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
     $(document).ready(function () {
       $('.delete_data').on('click', function(e){
            e.preventDefault();
            var _thisurl = $(this).attr('data-url'); 
            var message = "Are you sure to delete this client permanently?";
                $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                  modal: true,
                  title: 'Delete message',
                  zIndex: 10000,
                  autoOpen: true,
                  width: 'auto',
                  resizable: false,
                  buttons: {
                    Yes: function() {
                      // $(obj).removeAttr('onclick');                                
                      // $(obj).parents('.Parent').remove();

                      // $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                        $.ajax({
                        url: _thisurl,
                         method:'GET',
                        success:function(resp){
                        	window.location = "/admin/clients";
                        }
                      });
                      $(this).dialog("close");
                    },
                    No: function() {
                      // $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                      $(this).dialog("close");
                    }
                  },
                  close: function(event, ui) {
                    $(this).remove();
                  }
            });
        });
    });
</script>
@endsection		