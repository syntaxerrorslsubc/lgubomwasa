@extends('layouts.Cashier.default')

@section('content')
<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Bill</h3>
		<div class="card-tools">
			<a href="{{route('cashierview_billings')}}" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="25%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Reading Date</th>
						<th>Client</th>
						<th>Amount</th>
						<th>Due Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
						<tr>
							<td class="text-center"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-center">
								
                            </td>
				
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                 <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="{{route('cashierview_billings')}}"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="{{route('cashierview_billings')}}"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>


    $(document).ready(function () {
       $('.delete_data').click(function(){

        var billingId = $(this).data('id');
      _conf("Are you sure to delete this billing permanently?","delete_billing",[$(this).attr('data-id')])
       };
    //   $('.table').dataTable({
    //     columnDefs: [
    //         { orderable: false, targets: [4] }
    //     ],
    //     order:[0,'asc']
    //   });
    //   $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')

    // });

  function delete_billing($id){
    start_loader();
    $.ajax({
     url: '/cashier/delete_billing/' + billingId,
      type: 'DELETE',
      data:{id: $id},
      dataType:"json",
      error:err=>{
        console.log(err)
        alert_toast("An error occured.",'error');
        end_loader();
      },
      success:function(resp){
        if(typeof resp== 'object' && resp.status == 'success'){
          location.reload();
        }else{
          alert_toast("An error occured.",'error');
          end_loader();
        }
      }
    })
  }
</script>
@endsection