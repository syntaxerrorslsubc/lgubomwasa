@extends('layouts.Cashier.default')

@section('content')

<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Monthly Billing Report</h3>
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
                                    <label for="month" class="control-label">Filter Month</label>
                                    <input type="month" id="month" name="month" value="" class="form-control form-control-sm rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <button class="btn btn-primary bg-gradient-primary rounded-0"><i class="fa fa-filter"></i> Filter</button>
                                <button class="btn btn-light bg-gradient-light rounded-0 border" type="button" id="print"><i class="fa fa-print"></i> Print</button>
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
                    <col width="15%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    
                </colgroup>
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Date</th>
                        <th>Income of the day</th>
                        <th>Penalty</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                         <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <div style="line-height:1em">
                                    <div></div>
                                    <div></div>
                                </div>
                            </td>
                            <td class="text-center">
                            </td>
                        </tr>
                    
                        <tr>
                            <th class="text-center" colspan="9">No data</th>
                        </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="" alt="" class="img-thumbnail rounded-circle" style="width:5em;height:5em;object-fit:cover;object-position:center center;">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <h4 class="text-center"></h4>
                    <h3 class="text-center">Monthly Billing Report</h3>
                    <div class="text-center">as of</div>
                    <h4 class="text-center"></h4>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
@endsection
