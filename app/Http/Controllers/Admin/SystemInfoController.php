<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemInfoController extends Controller
{
     public function index()
    {
        return view('Admin/system_info.index');
    }
}
