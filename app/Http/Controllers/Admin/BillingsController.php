<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing_list;

class BillingsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

	    public function index()
	    {
	    $billing=Billing_list::orderBy('id')->paginate(10);
	    	return view('Admin/billings.index', $billing);
	    }

	    public function manage_billings()
	    {
	    	return view('Admin/billings.manage_billing');
	    }

	    public function storeBilling(Request $request)
		 {

				$billing = new Billing_list;
				$billing->clientid = $request->client_id;
				$billing->reading_date = $request->reading_date;
				$billing->due_date = $request->due_date;
				$billing->reading = $request->reading;
				$billing->previous = $request->previous;
				$billing->rate = $request->rate;
				$billing->total = $request->total;
				$billing->status = $request->status;
				
				if($billing->save()){
					return redirect()->back()->with('Success','Bill has been created successfully.');
				}
			
		 }

	    public function view_billing()
	    {
	    	return view('Admin/billings.view_billing');
	    }


}
