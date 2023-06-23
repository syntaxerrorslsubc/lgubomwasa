<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CashierController extends Controller
{
     public function index(){
    	return view('Cashier.index');
    }
}
