@extends('layouts.Cashier.default')

@section('content')

<div class="card card-outline rounded-0 card-navy">
  <div class="card-header">
    <h3 class="card-title">List of Bill</h3>
  </div>
  <div class="card-body">
        <div class="container-fluid">
        <table class="table table-hover table-striped table-bordered" id="list">
          <colgroup>
            <col width="5%">
            <col width="15%">
            <col width="25%">
            <col width="15%">
            <col width="15%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="15%">
          </colgroup>
          <thead>
            <tr  class="text-center">
              <th>#</th>
              <th>Reading Date</th>
              <th>Client</th>
              <th>Amount</th>
              <th>Due Date</th>
              <th>Penalty</th>
              <th>OR #</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        @if(isset($billing))
          @foreach($billing as $billing_list)
          <tr  class="text-center">
              <td class="text-center">{{$billing_list->id}}</td>
              <td>{{ \Carbon\Carbon::parse($billing_list->reading_date)->format('F d, Y') }}</td>
              <td>{{$billing_list->client->lastname}}, {{$billing_list->client->firstname}} </td>
              <td>{{$billing_list->total}}</td>
              <td>{{ \Carbon\Carbon::parse($billing_list->due_date)->format('F d, Y') }}</td>
              <td>{{$billing_list->penalty}}</td>
              <td>{{$billing_list->or}}</td>

              <td class="text-center">
                @if($billing_list->status == 0)
                    <span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Pending</span>
                @elseif($billing_list->status == 1)
                   <span class="badge badge-success bg-gradient-success text-sm px-3 rounded-pill">Paid</span>
                @endif
              </td>

              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Action
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                           <a class="dropdown-item view_data" href="{{ url('/cashier/view_billing/').'/'.$billing_list->id}}"><span class="fa fa-eye text-dark"></span> View</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item edit_data" href="{{ url('/cashier/edit_billing/').'/'.$billing_list->id}}"><span class="fa fa-edit text-primary"></span> Edit</a>
                </div>
              </td>
            </tr>
     
          </tbody>

            @endforeach
          @endif
        </table>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="{{asset('../jquery/jquery-ui.css')}}" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(document).ready(function () {
    $('.table').dataTable({
              columnDefs: [
                      { orderable: false, targets: [4] }
              ],
              order:[0,'asc']
          });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    });
</script>
@endsection