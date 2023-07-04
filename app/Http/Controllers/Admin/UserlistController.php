<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserlistController extends Controller
{
    public function index(){
        return view('Admin/user.index');
    }

     public function manage_user(){
        return view('Admin/user.manage_user');
    }

     public function list(){
        return view('Admin/user.list');
    }
}
