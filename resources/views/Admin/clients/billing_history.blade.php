@extends('layouts.Admin.default')

@section('content')

<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-primary">
    @foreach ($billingRecords as $billingRecord)
     <h3><b>{{$billingRecord->client->meter_serial_number}} - {{$billingRecord->client->lastname}}, {{$billingRecord->client->firstname}}</b></h3>
    @endforeach
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
                            <col width="15%">
                            <col width="15%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
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
                        @if ($billingRecords->isEmpty())
                            <p>No billing records available.</p>
                        @else  
                            @if(isset($billingRecords))  
                            @foreach ($billingRecords as $record)
                                <tr>
                                    <td class="text-center">{{$record->id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($record->reading_date)->format('F d, Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($record->due_date)->format('F d, Y')}}</td>
                                    <td class="text-right">{{$record->reading}}</td>
                                    <td class="text-right">{{$record->previous}}</td>
                                    <td class="text-right">{{$record->id}}</td>
                                    <td class="text-right">{{$record->rate}}</td>
                                    <td class="text-center">
                                        @if($record->status == 0)
                                              <span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Pending</span>
                                        @elseif($record->status == 1)
                                             <span class="badge badge-success bg-gradient-success text-sm px-3 rounded-pill">Paid</span>
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
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="{{ route('adminclients')}}"><i class="fa fa-angle-left"></i> Back </a>
			</div>
		</div>
	</div>
</div>

@endsection     