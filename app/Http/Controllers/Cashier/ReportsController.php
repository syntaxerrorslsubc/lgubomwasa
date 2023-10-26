<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing_list;
use Carbon\Carbon;


class ReportsController extends Controller
{
    public function monthly_billing(Request $request){
            $selectedMonth = $request->input('selectedMonth'); // Get the selected month

            // Calculate the start and end dates of the selected month
            $startDate = Carbon::parse($selectedMonth)->startOfMonth();
            $endDate = Carbon::parse($selectedMonth)->endOfMonth();

            // Query the billing data for the selected month
            $billingData = Billing_list::whereBetween('paid_at', [$startDate, $endDate])
                ->where('status', 1)
                ->get();

            // Group the billing data by day using the 'paid_at' column
            $dailyBillingData = $billingData->groupBy(function ($item) {
                return Carbon::parse($item->paid_at)->format('Y-m-d');
            });

            // Calculate the total payment for each day
            $dailyTotals = $dailyBillingData->map(function ($dailyData) {
                return $dailyData->sum('total');
            });

            $dailyPenalties = $dailyBillingData->map(function ($dailyData) {
                return $dailyData->sum('penalty');
            });
            
            $total = $dailyTotals->sum() + $dailyPenalties->sum();

            return view('Cashier/reports.monthly_billing', [
                'dailyBillingData' => $dailyBillingData,
                'dailyTotals' => $dailyTotals,
                'dailyPenalties' => $dailyPenalties,
                'selectedMonth' => $selectedMonth,
                'total' => $total,
            ]);
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

        return view('Cashier/reports.daily_billing', [
            'billingDetails' => $billingDetails,
            'totalPayment' => $totalPayment,
            'totalPenalty' => $totalPenalty,
            'selectedDate' => $selectedDate,
        ]);
    }
    
}
