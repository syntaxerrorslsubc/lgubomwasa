<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
    public function index(){
        return view('Cashier/billings.index');
    }

    public function manage_billings(){
        return view('Cashier/billings.manage_billing');
    }

    public function view_billings(){
        return view('Cashier/billings.view_billing');
    }
}
