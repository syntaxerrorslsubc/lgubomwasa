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

        if ($request->filled('day')) {
            $selectedDate = $request->input('day');
        } else {
            $selectedDate = now()->format('Y-m-d');
        }

        $billingDetails = Billing_list::whereDate('paid_at', $selectedDate)
            ->with('client')
            ->where('status', 1)
            ->get();

        $totalPayment = $billingDetails->sum('total');
        $totalPenalty = $billingDetails->sum('penalty');

        return view('Admin/reports.daily_billing', [
            'billingDetails' => $billingDetails,
            'totalPayment' => $totalPayment,
            'totalPenalty' => $totalPenalty,
            'selectedDate' => $selectedDate,
        ]);
    }
}

