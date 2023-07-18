<?php

namespace App\Http\Controllers\Cashier;

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
            return view('Cashier/clients.index', [
                    'client_lists'=>$client_lists
            ]);
        }

        public function addclient()
        {
           return view('Cashier/clients.addclient');
        }

        public function saveClient(Request $request)
         {

                $client = new Client_list;
                $client->code = $request->code;
                $client->category_id = $request->category_id;
                $client->firstname = $request->firstname;
                $client->lastname = $request->lastname;
                $client->middlename = $request->middlename;
                $client->address = $request->address;
                $client->contact = $request->contact;
                $client->meter_code = $request->meter_code;
                $client->first_reading = $request->first_reading;
                $client->status = $request->status;
                if($client->save()){
                    return redirect()->back()->with('Success','Client has been created successfully.');
                }
            
         }

        public function view_client()
        {
             $client = Client_list::find($id);

        return view('Admin/clients.view_client', compact(
            'client'));
        return response()->json($client);
            return view('Cashier/clients.view_client');
        }

        public function billing_history()
        {
            return view('Cashier/clients.billing_history');
        }
}

