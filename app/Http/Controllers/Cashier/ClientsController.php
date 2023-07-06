<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        return view('Cashier/clients.index');
    }

    public function billing_history(){
        return view('Cashier/clients.billing_history');
    }

    public function manage_client(){
        return view('Cashier/clients.manage_client');
    }

    public function view_client(){ 
        return view('Cashier/clients.view_client');
    }
}
