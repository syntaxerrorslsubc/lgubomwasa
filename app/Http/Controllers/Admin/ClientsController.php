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

                $client = new Client_list;
                $client->clientid = $request->client_id;
                $client->reading_date = $request->reading_date;
                $client->due_date = $request->due_date;
                $client->reading = $request->reading;
                $client->previous = $request->previous;
                $client->rate = $request->rate;
                $client->total = $request->total;
                $client->status = $request->status;
                
                if($client->save()){
                    return redirect()->back()->with('Success','Bill has been created successfully.');
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

