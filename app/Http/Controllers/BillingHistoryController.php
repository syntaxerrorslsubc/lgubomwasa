<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_list;
use App\Models\Billing_list;

class BillingHistoryController extends Controller
{
    public function history(Request $request)
    {
        $billingRecords = Billing_list::where('clientid', $request->clientid)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Admin.clients.billing_history', compact('billingRecords'));
        return response()->json($billingRecords);

    }
}