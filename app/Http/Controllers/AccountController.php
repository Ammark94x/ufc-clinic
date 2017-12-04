<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tcs_delivery;

class AccountController extends Controller
{
	/*view delivery add form*/
    public function addDelivery(){
    	return view('accounts.add_delivery');
    }

    /*inserting delivery*/
    public function insertDelivery(Request $request){
    	tcs_delivery::create([
	            'date'=>$_POST['date'],
	            'name'=>$_POST['name'],
	            'area'=>$_POST['area'],
	            'amount'=>$_POST['amount'],
	            'status'=>$_POST['status'],
	            'package'=>$_POST['package']
	        ]);
    	return redirect()->back()->with('status','Successfully added !');
    }

    public function list_delivery(){
    	$tcs=tcs_delivery::get();
    	return view('accounts.list_delivery',compact('tcs'));
    }



}
