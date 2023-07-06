<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_list;

class CategoryController extends Controller
{
     public function index(){
      $category=Category_list::paginate(10);
        return view('Admin/category.index');
    }

     public function manage_category(){
        return view('Admin/category.manage_category');
    }

    public function storeCategory(Request $request)
         {

                $cat = new Category_lists;
                $cat->name = $request->name;
                $cat->status = $request->status;
                
                if($cat->save()){
                    return redirect()->back()->with('Success','Category has been created successfully.');
                }
            
         }

     public function view_category(){
        return view('Admin/category.view_category');
    }
}


