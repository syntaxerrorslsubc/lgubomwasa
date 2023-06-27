<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function monthly_billing(){
        return view('Cashier/reports.monthly_billing');
    }
}
