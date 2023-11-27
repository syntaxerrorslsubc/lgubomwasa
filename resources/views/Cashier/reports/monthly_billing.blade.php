@extends('layouts.Cashier.default')

@section('content')
<style type="text/css">
    body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .signature-container {
            text-align: center; /* Center the signature */
            
        }


        /* Hide on screen */
        @media screen {
            .hidden-on-screen {
                display: none;
            }
        }

        @media print {
        .hide-on-print {
            display: none;
        }
    }
        

</style>

<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
    <!-- Your print header content goes here -->
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="{{ asset('../images/logo.jpg') }}" alt="" class="img-thumbnail rounded-circle" style="width:7em;height:7em;object-fit:cover;object-position:center center;">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <h4 class="text-center">Bontoc Municipal Waterworks System Administration</h4>
                    <h3 class="text-center">Monthly Income Report</h3>
                    <div class="text-center">of</div>
                    <h4 class="text-center">{{ \Carbon\Carbon::parse($selectedMonth)->format('F, Y') }}</h4>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="card-body">
        <div class="container-fluid">
            <fieldset class="border mb-4 hide-on-print">
                <legend class="mx-3 w-auto">Filter</legend>
                <div class="container-fluid py-2 px-3">
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group m-0">
                                    <label for="month" class="control-label">Filter Month</label>
                                    <input type="month" id="month" name="month" value="" class="form-control form-control-sm rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <button class="btn btn-primary bg-gradient-primary rounded-0"><i class="fa fa-filter"></i> Filter</button>
                                <button class="btn btn-light bg-gradient-light rounded-0 border" type="button" onclick='window.print()' id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
        <div class="container-fluid" id="printout">
            <table class="table table-hover table-striped table-bordered" id="report-tbl">
                <colgroup>
                    <col width="15%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    
                </colgroup>
                <thead>
                    <tr class="text-center">
                        <th>Date</th>
                        <th>Income of the day</th>
                        <th>Penalty</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dailyBillingData as $day => $data)
                         <tr>
                            <td class="text-center">{{\Carbon\Carbon::parse($day)->format('F d, Y')}}</td>
                            <td class="text-center">{{ $dailyTotals[$day] }}</td>
                            <td class="text-center">{{ $dailyPenalties[$day] }}</td>
                            <td class="text-center">{{ $dailyTotals[$day] + $dailyPenalties[$day] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-12" style="justify-content: center;">
                    <p>Total <b>₱{{ $total }}</b></p>
                </div>
            </div>
            <div class="signature-container">
                    <span class="hidden-on-screen">____________________</span>
                    <br>
                    <span class="hidden-on-screen visible-on-print">Head, BOMWASA</span>
            </div>
        </div>
    </div>
</div>

@endsection
