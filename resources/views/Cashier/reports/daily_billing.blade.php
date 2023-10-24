@extends('layouts.Cashier.default')

@section('content')

<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">Daily Billing Report</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
            <fieldset class="border mb-4">
                <legend class="mx-3 w-auto">Filter</legend>
                <div class="container-fluid py-2 px-3">
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group m-0">
                                    <label for="day" class="control-label">Filter Day</label>
                                    <input type="date" id="day" name="day" value="" class="form-control form-control-sm rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <button class="btn btn-primary bg-gradient-primary rounded-0"><i class="fa fa-filter"></i> Filter</button>
                                <button class="btn btn-light bg-gradient-light rounded-0 border" style="display: none; " type="button" id="print" onclick="printReport()"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
        <div class="container-fluid" id="printout">
			<table class="table table-hover table-striped table-bordered" id="report-tbl">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                   
                </colgroup>
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Address</th>
                        <th>Name</th>
                        <th>OR Number</th>
                        <th>Date Paid</th>
                        <th>Amount Paid</th>
                        <th>Penalty</th>
                        <th>Period Cover</th>
                        <th>Remarks</th>
                    
                    </tr>
                </thead>
				<tbody>
					@foreach ($billingDetails as $billingDetail)
						 <tr>
                            <td class="text-center">{{ $billingDetail->id }}</td>
                            <td>{{$billingDetail->client->address }}</td>
                            <td>{{$billingDetail->client->lastname}}, {{$billingDetail->client->firstname}}</td>
                            <td>{{ $billingDetail->or }}</td>
                            <td class="text-right">{{ \Carbon\Carbon::parse($billingDetail->paid_at)->format('F d, Y') }}</td>
                            <td class="text-right">{{ $billingDetail->total }}</td>
                            <td class="text-right">{{ $billingDetail->penalty }}</td>
                            <td class="text-center">
                                 <div style="line-height:1em">
                                    <div><small class="text-muter">Current: {{ \Carbon\Carbon::parse($billingDetail->reading_date)->format('F d') }}</small></div>
                                </div>
                            </td>
                            <td class="text-center">
                            @if($billingDetail->status === 0)
                                <span class="badge badge-secondary  bg-gradient-secondary  text-sm px-3 rounded-pill">Pending</span>
                            @elseif($billingDetail->status === 1)
                               <span class="badge badge-success bg-gradient-success text-sm px-3 rounded-pill">Paid</span>
                            @endif
                          </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
            <div class="row">
                <div class="col-md-6">
                    <p>Total Payment for the Day: ₱{{ $totalPayment }}</p>
                </div>
                <div class="col-md-6">
                    <p>Total Payment for the Day: ₱{{ $totalPenalty }}</p>
                </div>
            </div>

		</div>
	</div>
</div>
<style>
    /* Your existing CSS styles */

    /* Hide the section by default */
    .print-header {
        display: none;
    }

    /* Display the section only in print */
    @media print {
        .print-header {
            display: block !important;
        }
    }
</style>
<noscript class="print-header">
	<div>
		<div class="d-flex w-100 align-items-center">
			<div class="col-2 text-center">
				<img src="" alt="" class="img-thumbnail rounded-circle" style="width:5em;height:5em;object-fit:cover;object-position:center center;">
			</div>
			<div class="col-8">
				<div style="line-height:1em">
					<h4 class="text-center"></h4>
					<h3 class="text-center">Daily Billing Report</h3>
                    <div class="text-center">as of</div>
                    <h4 class="text-center"></h4>
				</div>
			</div>
		</div>
		<hr>
	</div>
</noscript>
<script type="text/javascript">
    function printReport() {
        // Show the print header
        document.querySelector('.print-header').style.display = 'block';

        // Trigger the print dialog
        window.print();

        // Hide the print header after printing
        document.querySelector('.print-header').style.display = 'none';
    }
</script>
@endsection
