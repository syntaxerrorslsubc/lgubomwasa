<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
        {
            return view('users');
        }
        
    public function history(Request $request)
    {
        $billingRecords = Billing_list::where('clientid', $request->clientid)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.clients.billing_history', compact('billingRecords'));

    }

}
