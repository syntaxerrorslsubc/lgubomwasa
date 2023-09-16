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
            $client_lists=Client_list::orderby('id')->paginate(20);
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
                $saveNewClient->previous = $request->previous;
                $saveNewClient->status = $request->status;
                
                if($saveNewClient->save()){
                    return redirect()->route('adminview_client', $saveNewClient);
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

                $storeClient = Client_list::where('id', $request->id)->first();
                $storeClient->category_id = $request->category_id;
                $storeClient->firstname = $request->firstname;
                $storeClient->lastname = $request->lastname;
                $storeClient->middlename = $request->middlename;
                $storeClient->address = $request->address;
                $storeClient->contact = $request->contact;
                $storeClient->meter_serial_number = $request->meter_serial_number;
                $storeClient->previous = $request->previous;
                $storeClient->status = $request->status;
                if($storeClient->save()){
                    return redirect()->route('adminview_client', $storeClient);
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

            return redirect('/admin/clients');

        }

        
}