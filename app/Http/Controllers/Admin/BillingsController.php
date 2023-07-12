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
	    $billing_lists=Billing_list::orderby('id')
	    											->with('client')
	    											->paginate(10);
	    	return view('Admin/billings.index', [
                    'billing_lists'=>$billing_lists
            ]);
	    }
	    public function editBilling(Request $request)
	    {
	    	$billing=Billing_list::where('id', $request->id)->first();
	
	    	 return view('Admin.billings.edit_billing',[
	    	 	 'billing'=>$billing
	    	 ]);
	    }

	    public function storeBilling(Request $request)
		 {

				$storeBilling = Billing_list::where('id', $request->id)->first();
				$storeBilling->reading_date = $request->reading_date;
				$storeBilling->due_date = $request->due_date;
				$storeBilling->reading = $request->reading;
				$storeBilling->previous = $request->previous;
				$storeBilling->rate = $request->rate;
				$storeBilling->total = $request->total;
				$storeBilling->status = $request->status;
				
				if($storeBilling->save()){
					return redirect()->back()->withErrors('Success','Bill has been created successfully.');
				}
			
		 }

	    // public function view_billing(Request $request):View
	    // {
	    // 	$billing_list = Billing_list::where('id', $request->id);

	    // 	return view('Admin/billings.view_billing', [
	    // 		'billing_list'=> $billing_list
	    // 	]);
	    // }

 public function view_billing($id = null)
    {
        $billing = Billing_list::select(
                'billing_lists.*', 
                'billing_lists.clientid as billing_lists'
            )->where('billing_lists.id', $id)
            ->first(); 

        return view('Admin/billings.view_billing', compact(
            'billing'));
    }



}
