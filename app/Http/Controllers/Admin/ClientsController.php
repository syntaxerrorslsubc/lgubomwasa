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

        public function addClient(Request $request){
            return view('Admin.clients.add_clients');
         }


         public function saveClient(Request $request){
                $saveNewClient = new Client_list; 
                $saveNewClient->category_id = $request->category_id;
                $saveNewClient->firstname = $request->firstname;
                $saveNewClient->lastname = $request->lastname;
                $saveNewClient->middlename = $request->middlename;
                $saveNewClient->address = $request->address;
                $saveNewClient->contact = $request->contact;
                $saveNewClient->meter_serial_number = $request->meter_serial_number;
                $saveNewClient->first_reading = $request->first_reading;
                $saveNewClient->status = $request->status;
                
                if($saveNewClient->save()){
                    return redirect()->back()->withErrors('Success','New bill has been created successfully.');
                }
         }

        public function editClient(Request $request)
        {
            $client=Client_list::where('id', $request->id)->first();
    
             return view('Admin.clients.edit_client',[
                 'client'=>$client
             ]);
        }


        public function updateClient(Request $request)
         {

                $client = new Client_list;
                $client->code = $request->code;
                $client->category_id = $request->category_id;
                $client->firstname = $request->firstname;
                $client->lastname = $request->lastname;
                $client->middlename = $request->middlename;
                $client->address = $request->address;
                $client->contact = $request->contact;
                $client->meter_serial_number = $request->meter_serial_number;
                $client->first_reading = $request->first_reading;
                $client->status = $request->status;
                if($client->save()){
                    return redirect()->back()->with('Success','Client has been created successfully.');
                }
            
         }

        public function view_client($id)
        {
             $client = Client_list::find($id);

        return view('Admin/clients.view_client', compact(
            'client'));
        return response()->json($client);
            return view('Admin/clients.view_client');
        }

        public function billing_history()
        {
            return view('Admin/clients.billing_history');
        }

        public function deleteClient($id)
        {
             $client = Client_list::find($id);

             if ($client) {
            // Delete the client record
             $client->delete();
            }

            return redirect('/Admin/clients');

        }

        
}