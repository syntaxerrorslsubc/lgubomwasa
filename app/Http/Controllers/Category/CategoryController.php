<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index(){
    	return view('Admin/category.index');
    }

     public function manage_category(){
    	return view('Admin/category.manage_category.index');
    }

     public function view_category(){
    	return view('Admin/category.view_category.index');
    }
}
