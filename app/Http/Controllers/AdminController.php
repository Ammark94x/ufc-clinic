<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function showStaff() {
    	$data = User::where('id','DESC')->whereNotIn('role','admin')->get();
    	return view('admin.staff',['data'=>$data]);
    }
}
