<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_list;
use App\Models\Billing_list;

class userController extends Controller
{
    public function index()
        {
            return view('Customer.users');
        }
        
   

    public function history(Request $request)
    {
        $meterSerialNumber = $request->input('meter_serial_number');

        // Find the client with the provided meter serial number
        $client = Client_list::where('meter_serial_number', $meterSerialNumber)->with('billingList')->first();
        //return json_encode($client);

        if (!$client) {
            return redirect()->back()->with('error', 'Client not found for the given meter serial number.');
        }

        // Fetch billing records for the client
        $billingList = $client->billingList; // Assuming 'billingList' is the relationship to billing records
        return view('Customer.client_billing_history', ['billingList' => $client]);
    }

}

