<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing_list;


class ReportsController extends Controller
{
     public function monthly_billing()
        {
            return view('Admin/reports.monthly_billing');
        }

     public function daily_billing(Request $request)
    {

        $today = now()->format('Y-m-d');

        $billingDetails = Billing_list::whereDate('paid_at', $today)
            ->with('client')
            ->where('status', 1) // Add this line to filter by status = 1
            ->get();

        $totalPayment = $billingDetails->sum('total');
        $totalPenalty = $billingDetails->sum('penalty');

        return view('Admin/reports.daily_billing', [
               'billingDetails' => $billingDetails,
               'totalPayment' =>$totalPayment,
               'totalPenalty' =>$totalPenalty,

         ]);
    }
}

