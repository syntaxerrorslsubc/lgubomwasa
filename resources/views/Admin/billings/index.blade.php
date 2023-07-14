@extends('layouts.Admin.default')

@section('content')
<div class="card card-outline rounded-0 card-navy">
  <div class="card-header">
    <h3 class="card-title">List of Bill</h3>
    <div class="card-tools">
      <a href="{{route('adminadd_billing')}}" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
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
          @foreach($billing as $billing_list)
          <tr>
              <td class="text-center">{{$billing_list->id}}</td>
              <td>{{$billing_list->reading_date}}</td>
              <td>{{$billing_list->client->code}} - {{$billing_list->client->lastname}}, {{$billing_list->client->firstname}} </td>
              <td>{{$billing_list->total}}</td>
              <td>{{$billing_list->due_date}}</td>

                <td class="text-center">
                  @if($billing_list->status === 0)
                      <span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Pending</span>
                  @elseif($billing_list->status === 1)
                     <span class="badge badge-success bg-gradient-success text-sm px-3 rounded-pill">Paid</span>
                  @endif
                </td>

                <td align="center">
                   <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item view_data" href="{{ url('/admin/view_billing/').'/'.$billing_list->id}}"><span class="fa fa-eye text-dark"></span> View</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item edit_data" href="{{ url('/admin/edit_billing/').'/'.$billing_list->id}}"><span class="fa fa-edit text-primary"></span> Edit</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item delete_data" href="{{ url('/admin/delete_billing/').'/'.$billing_list->id}}" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
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
     url: '/admin/delete_billing/' + billingId,
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