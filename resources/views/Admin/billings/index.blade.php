@extends('layouts.Admin.default')

@section('content')
<div class="card card-outline rounded-0 card-navy">
  <div class="card-header">
    <h3 class="card-title">List of Bill</h3>
    <div class="card-tools">
      <a href="{{route('adminmanage_billings')}}" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
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
          @foreach($billing_lists as $billing_list)
          <tr>
              <td class="text-center">{{$billing_list->id}}</td>
              <td>{{$billing_list->reading_date}}</td>
              <td>{{$billing_list->client->code}} - {{$billing_list->client->lastname}}, {{$billing_list->client->firstname}} </td>
              <td>{{$billing_list->total}}</td>
              <td>{{$billing_list->due_date}}</td>

                <td class="text-center">{{$billing_list->status}}</td>

                <td align="center">
                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item view_data" href="{{ url('/Admin/billings/view_billing/').'/'.$billing_list->id}}"><span class="fa fa-eye text-dark"></span> View</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item edit_data" href="{{ url('/admin/edit_billing/').'/'.$billing_list->id}}"><span class="fa fa-edit text-primary"></span> Edit</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
                            </div>
                </td>
              </tr>
     
          </tbody>
          @endforeach
        </table>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.delete_data').click(function(){
      _conf("Are you sure to delete this billing permanently?","delete_billing",[$(this).attr('id')])
    })
    $('.table').dataTable({
      columnDefs: [
          { orderable: false, targets: [4] }
      ],
      order:[0,'asc']
    });
    $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
  })
  function delete_billing($id){
    start_loader();
    $.ajax({
      url:_base_url_+"{{route('adminbillings')}}",
      method:"POST",
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