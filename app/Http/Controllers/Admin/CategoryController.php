<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_list;

class CategoryController extends Controller
{
    public function index() {
        $category_lists=Category_list::orderby('id')->paginate(10);
        return view('Admin/category.index', [
            'category_lists'=>$category_lists
        ]);
    }

    public function add_category(){
        return view('Admin/category.manage_category');
    }

    public function saveCategory(Request $request) {

        $cat = new Category_list;
        $cat->name = $request->name;
                
        if($cat->save()){
            return redirect()->back()->with('Success','Category has been created successfully.');
        }
             
    }

    public function view_category(){
        return view('Admin/category.view_category');
    }
}


