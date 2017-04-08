<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealersController extends Controller
{
    public function dashboard(Request $request)
    {
    	return view('dealer');
    }
}
