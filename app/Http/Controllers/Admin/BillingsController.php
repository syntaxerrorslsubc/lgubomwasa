<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing_list;

class BillingsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

	    public function index()
	    {
	    $billing=Billing_list::paginate(10);
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
