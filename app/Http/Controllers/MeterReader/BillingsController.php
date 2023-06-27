<?php

namespace App\Http\Controllers\MeterReader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
     public function index(){
        return view('MeterReader/billings.index');
    }

     public function manage_billings(){
        return view('MeterReader/billings.manage_billings');
    }

     public function view_billings(){
        return view('MeterReader/billings.view_billings');
    }

}
