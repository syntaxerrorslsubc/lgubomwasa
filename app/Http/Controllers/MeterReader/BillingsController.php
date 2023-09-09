<?php

namespace App\Http\Controllers\MeterReader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing_list;
use App\Models\Client_list;
use App\Models\Category_list;

class BillingsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
      {
         $billing=Billing_list::with('client')->paginate(10);
         return view('MeterReader/billings.index', [
                    'billing'=>$billing
            ]);
      }
      
      public function editBilling(Request $request)
      {
         $billing=Billing_list::where('id', $request->id)->first();
   
          return view('MeterReader.billings.edit_billing',[
             'billing'=>$billing
          ]);
      }

       public function updateBilling(Request $request)
      {
            $storeBilling = Billing_list::where('id', $request->id)->first(); 
            $storeBilling->reading_date = $request->reading_date;
            $storeBilling->clientid = $request->clientid;
            $storeBilling->due_date = $request->due_date;
            $storeBilling->reading = $request->reading;
            $storeBilling->previous = $request->previous;
            $storeBilling->rate = $request->rate;
            $storeBilling->total = $request->total;
            $storeBilling->status = $request->status;
            
            if($storeBilling->save()){
               return redirect()->back()->withErrors('Success','Bill has been updated successfully.');
            }
         
      }

      public function addBilling(Request $request){
         return view('MeterReader.billings.add_billing');
      }


      public function saveBilling(Request $request){
            $saveNewBilling = new Billing_list; 
            $saveNewBilling->clientid = $request->clientid;
            $saveNewBilling->due_date = $request->due_date;
            $saveNewBilling->reading = $request->reading;
            $saveNewBilling->previous = $request->previous;
            $saveNewBilling->rate = $request->rate;
            $saveNewBilling->total = $request->total;
            $saveNewBilling->status = $request->status;
            
            if($saveNewBilling->save()){
               return redirect()->back()->withErrors('Success','New bill has been created successfully.');
            }
      }

      public function searchType(Request $request){
         $client = Client_list::where('id', $request->id)->first();
         $categories = Category_list::get();
         if (isset($categories)) {
            foreach($categories as $category){
               if($client->category_id==$category->id){
                  $cat = array('rate' => $category->rate, 'id'=> $category->id, 'name'=>$category->name,  'minimum'=>$category->minimum);
                  return json_encode($cat);
               }
            }
         }
      }

      

      public function view_billing($id)
      {
        $billing = Billing_list::find($id);

        return view('MeterReader/billings.view_billing', compact(
            'billing'));
        return response()->json($billing);
      }

      public function deleteBilling($id)
      {
         $billing = Billing_list::find($id);

         if ($billing) {
              // Delete the billing record
              $billing->delete();
         }

           return redirect('/MeterReader/billings')
           ;
      }

      public function printBilling(){
      $pdf = PDF::loadView('MeterReader.billings.print_billing'); // Replace 'pdf.document' with your view file.
    
      return $pdf->stream('document.pdf'); 
       }

}