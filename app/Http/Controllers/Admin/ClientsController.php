<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client_list;


class ClientsController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

        public function index()
        {
            $client_lists=Client_list::orderby('id')->paginate(10);
            return view('Admin/clients.index', [
                    'client_lists'=>$client_lists
            ]);
        }

        public function manage_client()
        {
            return view('Admin/clients.manage_client');
        }

        public function storeClient(Request $request)
         {

                $client = new Client_lists;
                $client->created_at = $request->created_at;
                $client->code = $request->code;
                $client->name = $request->name;
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

