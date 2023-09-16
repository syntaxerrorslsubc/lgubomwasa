@extends('layouts.Cashier.default')

@section('content')

<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
	<h3><b></b></h3>
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
            <div class="card-header">
                <h5 class="card-title">Client Billing History</h5>
            </div>
			<div class="card-body">
				<div class="container-fluid">
                    <table class="table table-hover table-striped table-bordered" id="list">
                        <colgroup>
                            <col width="5%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Reading Date</th>
                                <th>Due Date</th>
                                <th>Current Reading</th>
                                <th>Previous Reading</th>
                                <th>Consumption</th>
                                <th>Rate (m<sup>3</sup>)</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($billingRecord->isEmpty())
                            <p>No billing record available.</p>
                            @else  
                            @if(isset($billingRecord))  
                            @foreach ($billingRecord as $record)
                                <tr>
                                    <td class="text-center">{{$record->id}}</td>
                                    <td>{{$record->reading_date}}</td>
                                    <td>{{$record->due_date}}</td>
                                    <td class="text-right">{{$record->reading}}</td>
                                    <td class="text-right">{{$record->previous}}</td>
                                    <td class="text-right">{{$record->id}}</td>
                                    <td class="text-right">{{$record->rate}}</td>
                                    <td class="text-center">
                                        @if($record->status === 0)
                                              <span class="badge badge-primary bg-gradient-primary text-sm px-3 rounded-pill">Active</span>
                                        @elseif($record->status === 1)
                                             <span class="badge badge-danger bg-gradient-danger text-sm px-3 rounded-pill">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-right">{{$record->total}}</td>
                                </tr>
                            @endforeach
                            @endif
                            @endif
                        </tbody>
                    </table>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{route('cashierclients')}}"><i class="fa fa-angle-left"></i> Back </a>
			</div>
		</div>
	</div>
</div>
@endsection