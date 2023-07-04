<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

        public function index()
        {
            return view('Admin/clients.index');
        }

        public function manage_client()
        {
            return view('Admin/clients.manage_client');
        }

        public function view_client()
        {
            return view('Admin/clients.view_client');
        }

        public function billing_history()
        {
            return view('Admin/clients.billing_history');
        }
}

