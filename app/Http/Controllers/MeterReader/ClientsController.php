<?php

namespace App\Http\Controllers\MeterReader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        return view('MeterReader/clients.index');
    }

     public function billing_history(){
        return view('MeterReader/clients.billing_history');
    }

     public function manage_client(){
        return view('MeterReader/clients.manage_client');
    }

     public function view_client(){
        return view('MeterReader/clients.view_client');
    }
}
