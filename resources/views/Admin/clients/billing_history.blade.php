@include('layouts.display')
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
                            
                                <tr>
                                    <td class="text-center"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-right"></td>
                                </tr>
                            
                        </tbody>
                    </table>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=clients/view_client&id="><i class="fa fa-angle-left"></i> Back </a>
			</div>
		</div>
	</div>
</div>
