<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
     public function monthly_billing()
        {
            return view('Admin/reports.monthly_billing');
        }

     public function daily_billing()
        {
            return view('Admin/reports.daily_billing');
        }
}

