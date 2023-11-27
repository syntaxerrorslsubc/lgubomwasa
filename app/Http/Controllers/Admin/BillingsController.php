<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\Tasks\Backup\Tasks\BackupJob;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Billing_list;
use App\Models\Client_list;
use App\Models\Category_list;

class BillingsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

	    public function index()
	    {
	    	$billing=Billing_list::with('client')->get();
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
				$storeBilling->clientid = $request->clientid;
				$storeBilling->due_date = $request->due_date;
				$storeBilling->reading = $request->reading;
				$storeBilling->previous = $request->previous;
				$storeBilling->penalty = $request->penalty;
				$storeBilling->or = $request->or;
				$storeBilling->paid_at = $request->paid_at;
				$storeBilling->rate = $request->rate;
				$storeBilling->total = $request->total;
				$storeBilling->status = $request->status;
				
				if($storeBilling->save()){
					return redirect()->route('adminview_billing', $storeBilling);
				}
			
		 }
		public function searchType(Request $request){
			$client = Client_list::where('id', $request->id)->first();
			$categories = Category_list::get();
			if (isset($categories)) {
				foreach($categories as $category){
					if($client->category_id==$category->id){
						$cat = array('rate' => $category->rate, 'id'=> $category->id, 'name'=>$category->name,  'minimum'=>$category->minimum);
						return json_encode($cat);
					}
				}
			}
		}

		public function searchPrevBilling(Request $request){
			$client = Client_list::where('id', $request->id)->first();
			$billingPrev = Billing_list::orderBy('created_at', 'desc')
										->where('clientid', $request->id)
										->first();
			if (isset($billingPrev)) {
				return $billingPrev->reading;	
			}else{
				return $client->previous;

			}
		}

		 public function addBilling(Request $request){
		 	return view('Admin.billings.add_billing');
		 }


		 public function saveBilling(Request $request){
		 		$saveNewBilling = new Billing_list; 
		 		$saveNewBilling->clientid = $request->clientid;
		 		$saveNewBilling->reading_date = $request->reading_date;
				$saveNewBilling->due_date = $request->due_date;
				$saveNewBilling->reading = $request->reading;
				$saveNewBilling->previous = $request->previous;
				$saveNewBilling->rate = $request->rate;
				$saveNewBilling->total = $request->total;
				$saveNewBilling->status = $request->status;
				
				if($saveNewBilling->save()){
					return redirect()->route('adminview_billing', $saveNewBilling);
				}
		 }

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

        return redirect('/admin/billings')
        ;

	}
	public function printBilling(Request $request){
		$billing=Billing_list::where('id', $request->billing_id)->with('client')->first();

	    $clientID = $billing->client->id;

	    $payables = Billing_list::where('clientid', $clientID)
	        ->where('status', 0)
	        ->get();

	    $previousBilling = Billing_list::where('clientid', $billing->clientid)
	        ->where('created_at', '<', $billing->created_at)
	        ->orderBy('created_at', 'desc')
	        ->first();

	    return view('MeterReader.billings.print_billing', [
	               'billing' => $billing,
	               'previousBilling' => $previousBilling,
	               'payables' => $payables,

	        ]);
   }

   public function export($tableName)
    {
        // Verify if the table exists
        if (!\Schema::hasTable($tableName)) {
            abort(404, 'Table not found');
        }

        // Get the data from the specified table
        $data = DB::table($tableName)->get();

        // Create the SQL dump file
        $filename = $tableName . '.sql';
        $filePath = storage_path("app/{$filename}");

        // Convert the data to SQL and save it to the file
        $this->exportToSql($data, $filePath);

        // Set the headers for file download
        $headers = [
            'Content-Type' => 'application/sql',
        ];

        // Download the SQL file
        return response()->download($filePath, $filename, $headers);
    }

    


	protected function exportToSql($data, $filePath)
		{
		    // Open the file for writing
		$file = fopen($filePath, 'w');
		if ($file === false) {
		    \Log::error('Failed to open file for writing: ' . $filePath);
		    abort(500, 'Failed to open file for writing');
		}

	    // Get the table name from the first row
	    $table = $data->isNotEmpty() ? $data->first()->table : null;

	    if ($table === null) {
	        \Log::error('Failed to export table. No table name found.');
	        abort(500, 'Failed to export table');
	    }

	    // Iterate through the data and write SQL statements to the file
	    foreach ($data as $row) {
	        $row = (array) $row;

	        // Generate an SQL INSERT statement
	        $insertStatement = "INSERT INTO $table (`" . implode('`, `', array_keys($row)) . "`) VALUES ('" . implode("', '", array_map('addslashes', $row)) . "');\n";

	        // Write the SQL statement to the file
	        fwrite($file, $insertStatement);
	    }

	    // Close the file
	    fclose($file);


	}
}
