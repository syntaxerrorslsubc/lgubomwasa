<?php

namespace App\Http\Controllers\MeterReader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeterReaderController extends Controller
{
    public function index(){
        return view('MeterReader.index');
    }
}
