<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index(){
      $category=Category_list::paginate(10);
        return view('Admin/category.index');
    }

     public function manage_category(){
        return view('Admin/category.manage_category');
    }

     public function view_category(){
        return view('Admin/category.view_category');
    }
}


