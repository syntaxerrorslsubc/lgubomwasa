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
            $client_lists=Client_list::orderby('id')->paginate(20);
            return view('Cashier/clients.index', [
                    'client_lists'=>$client_lists
            ]);
        }
        public function editClient(Request $request)
        {
            $client=Client_list::where('id', $request->id)->first();
    
             return view('Cashier.clients.edit_client',[
                 'client'=>$client
             ]);
        }


        public function updateClient(Request $request)
         {

                $updateClients = new Client_list;
                $updateClients->category_id = $request->category_id;
                $updateClients->firstname = $request->firstname;
                $updateClients->lastname = $request->lastname;
                $updateClients->middlename = $request->middlename;
                $updateClients->address = $request->address;
                $updateClients->contact = $request->contact;
                $updateClients->meter_serial_number = $request->meter_serial_number;
                $updateClients->first_reading = $request->first_reading;
                $updateClients->status = $request->status;
                if($updateClients->save()){
                    return redirect()->back()->with('Success','Client has been created successfully.');
                }
            
         }

        public function view_client($id)
        {
             $client = Client_list::find($id);

        return view('Cashier/clients.view_client', compact(
            'client'));
        return response()->json($client);
            return view('Cashier/clients.view_client');
        }

        public function billing_history()
        {
            return view('Cashier/clients.billing_history');
        }

        public function deleteClient($id)
        {
             $client = Client_list::find($id);

             if ($client) {
            // Delete the client record
             $client->delete();
            }

            return redirect('/cashier/clients');

        }

        
}

