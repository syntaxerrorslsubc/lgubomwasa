<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client_lists;


class ClientsController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

        public function index()
        {
            $client=Client_list::paginate(10);
            return view('Admin/clients.index');
        }

        public function manage_client()
        {
            return view('Admin/clients.manage_client');
        }

        public function storeClient(Request $request)
         {

                $client = new Client_lists;
                $client->category_id = $request->category_id;
                $client->firstname = $request->firstname;
                $client->middlename = $request->middlename;
                $client->lastname = $request->lastname;
                $client->contact = $request->contact;
                $client->address = $request->rate;
                $client->meter_code = $request->meter_code;
                $client->first_reading = $request->first_reading;
                $client->status = $request->status;
                
                if($client->save()){
                    return redirect()->back()->with('Success','Client has been created successfully.');
                }
            
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

