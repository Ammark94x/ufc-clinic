<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class reportingController extends Controller
{
    public function customers()
    {
    	$customers = User::whereNull('role')->get();
    	return view('admin.customer_reports',['data'=>$customers]);
    }
<<<<<<< HEAD
    
=======

    public function customer_api()
    {
    	$customers = User::whereNull('role')->get();
    	return response()->json($customers);
    }
>>>>>>> 9907cb002dc06cd570a71f8e7dbf5d63f971b0ea
}
