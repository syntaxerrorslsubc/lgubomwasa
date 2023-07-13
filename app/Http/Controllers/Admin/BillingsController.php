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
	    $billing=Billing_list::paginate(10);
	    	
	    	return view('Admin/billings.index', [
                    'billing'=>$billing
            ]);
	    }
	    public function editBilling(Request $request)
	    {
	    	$billing=Billing_list::where('id', $request->id)->first();
	
	    	 return view('Admin.billings.edit_billing',[
	    	 	 'billing'=>$billing
	    	 ]);
	    }

	    public function updateBilling(Request $request)
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
					return redirect()->back()->withErrors('Success','Bill has been updated successfully.');
				}
			
		 }

		 public function addBilling(Request $request){
		 	$newBilling=Billing_list::where('id', $request->id)->first();

		 	return view('Admin.billings.add_billing',[
		 		'newBilling'=>$newBilling
		 	]);
		 }


		 public function saveBilling(Request $request){
		 		$saveNewBilling = Billing_list::where('id', $request->id)->first(); 
				$saveNewBilling->reading_date = $request->reading_date;
				$saveNewBilling->due_date = $request->due_date;
				$saveNewBilling->reading = $request->reading;
				$saveNewBilling->previous = $request->previous;
				$saveNewBilling->rate = $request->rate;
				$saveNewBilling->total = $request->total;
				$saveNewBilling->status = $request->status;
				
				if($saveNewBilling->save()){
					return redirect()->back()->withErrors('Success','New bill has been created successfully.');
				}
		 }

	    // public function view_billing(Request $request):View
	    // {
	    // 	$billing_list = Billing_list::where('id', $request->id);

	    // 	return view('Admin/billings.view_billing', [
	    // 		'billing_list'=> $billing_list
	    // 	]);
	    // }

 public function view_billing($id)
 	{
        $billing = Billing_list::find($id);

        return view('Admin/billings.view_billing', compact(
            'billing'));
        return response()->json($billing);
	}

	public function deleteBilling($id)
	{
		$billing = Billing_list::find($id);

		if ($billing) {
        // Delete the billing record
        $billing->delete();
    }

        return view('Admin/billings.index', compact(
            'billing'));
        return response()->json(['message' => 'Billing record deleted.']);

	}

}
