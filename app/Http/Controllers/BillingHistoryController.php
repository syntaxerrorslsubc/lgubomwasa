<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_list;
use App\Models\Billing_list;

class BillingHistoryController extends Controller
{
    public function history($clientId)
        {
            $billingRecords = Billing_list::where('clientid', $clientId)
                ->with('client')
                ->orderBy('created_at', 'desc')
                ->get();

            // Check if the billingRecords are not empty
            if ($billingRecords->isNotEmpty()) {
                // Get the client details from the first record
                $clientDetails = [
                    'meter_serial_number' => $billingRecords->first()->client->meter_serial_number,
                    'lastname' => $billingRecords->first()->client->lastname,
                    'firstname' => $billingRecords->first()->client->firstname,
                ];

                // Pass the client details along with the billing records to the view
                return view('Admin.clients.billing_history', compact('billingRecords', 'clientDetails'));
            } else {
                // Handle the case where there are no billing records
                return view('Admin.clients.billing_history', compact('billingRecords'));
            }
        }

     public function historyCash($clientId)
        {
        $billingRecords = Billing_list::where('clientid', $clientId)
                ->with('client')
                ->orderBy('created_at', 'desc')
                ->get();

            // Check if the billingRecords are not empty
            if ($billingRecords->isNotEmpty()) {
                // Get the client details from the first record
                $clientDetails = [
                    'meter_serial_number' => $billingRecords->first()->client->meter_serial_number,
                    'lastname' => $billingRecords->first()->client->lastname,
                    'firstname' => $billingRecords->first()->client->firstname,
                ];

                // Pass the client details along with the billing records to the view
                return view('Cashier.clients.billing_history', compact('billingRecords', 'clientDetails'));
            } else {
                // Handle the case where there are no billing records
                return view('Cashier.clients.billing_history', compact('billingRecords'));
            }
         }

}