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
}
