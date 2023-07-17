<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Billing_list;

class CashierController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
     {
    	return view('Cashier.index');
    }
}
