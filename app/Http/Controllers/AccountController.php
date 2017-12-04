<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tcs_delivery;
use App\storekeeper;
use App\product;

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

    /*listing of deliveries*/
    public function list_delivery(){
    	$tcs=tcs_delivery::get();
    	return view('accounts.list_delivery',compact('tcs'));
    }

    /****************REPORTING SECTION START****************/

    /*product report view page*/

    public function productReport(){
        $product=product::get();
        return view('reporting.product_report',compact('product'));
    }

    public function packageReport(){
        return view('reporting.package_report');
    }

    public function tcsReport(){
        return view('reporting.tcs_report');
    }
    
    public function monthlyReport(){
        return view('reporting.monthly_report');
    }

    public function new_customerReport(){
        return view('reporting.new_customerReport');
    }
}
