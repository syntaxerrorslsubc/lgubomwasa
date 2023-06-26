<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

	    public function index()
	    {
	    	return view('Admin/billings.index');
	    }

	    public function manage_billing()
	    {
	    	return view('Admin/billings.manage_billing');
	    }

	    public function view_billing()
	    {
	    	return view('Admin/billings.view_billing');
	    }
}
