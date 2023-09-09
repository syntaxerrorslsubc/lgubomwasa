<?php

namespace App\Http\Controllers\MeterReader;

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
         return view('MeterReader/clients.index', [
                    'client_lists'=>$client_lists
         ]);
   }

   public function view_client($id)
   {
      $client = Client_list::find($id);

        return view('MeterReader/clients.view_client', compact(
            'client'));
        return response()->json($client);
            return view('MeterReader/clients.view_client');
   }      

}
