<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monitor;
use App\User;
use App\UserMeta;
use App\storekeeper;
use App\NextVisits;
use App\product;
	
class MonitorController extends Controller
{

	/*monitor client*/
    public function monitorClient($id){
        $user=User::where('id',$id)->get();
        $products=product::get();
        $products=json_decode($products);
        $user=json_decode($user);
        $gender=$user[0]->gender;
        if($gender == 'male'){
        	$monitor_user=monitor::orderBy('id', 'DESC')->where([
	        ['user_id', '=', $id],
	        ['gender', '=', 'male']
	        ])->get();
        	$last_visit=monitor::orderBy('id', 'desc')->where([['gender', '=', 'male'],['user_id', '=', $id]])->first();
        	if(isset($last_visit->products)){
        		$given_products=explode(',',$last_visit->products);
        		$given_product=product::whereIn('id',$given_products)->select('item_name')->get();
        	}
            return view('admin.monitor_male',compact('user','products','monitor_user','last_visit','given_product'));        
        }else{
        	$monitor_user=monitor::orderBy('id', 'DESC')->where([
	        ['user_id', '=', $id],
	        ['gender', '=', 'female']
	        ])->get();
        	$last_visit=monitor::orderBy('id', 'desc')->where([['gender', '=', 'female'],['user_id', '=', $id]])->first();
        	if(isset($last_visit->products)){
        		$given_products=explode(',',$last_visit->products);
        		$given_product=product::whereIn('id',$given_products)->select('item_name')->get();
        	}
            return view('admin.monitor_female',compact('user','products','last_visit','monitor_user','given_product'));
        }
    }

    public function storeMonitor(Request $request){
    	$general_info=$_POST;
        if (isset($_POST['data'])) {
    	   $this->update_Client($_POST['data'],$_POST['history'],$_POST['measurment'],$_POST['user_id'],$general_info);
        }
    	if($_POST['gender'] == 'male' && $_POST['payment_recieved'] != ''){

    		$product=implode(',',$_POST['product']);
	    	$product_quantity=implode(',', $_POST['product_quantity']);
	    	$gender=$_POST['gender'];

	    	monitor::create([
	            'dov'=>$_POST['dov'],
	            'package'=>$_POST['package'],
	            'next_visit' => $_POST['next_visit'],
	            'present_weight'=>$_POST['present_weight'],
	            'result'=>$_POST['result'],
	            'full_payment'=>$_POST['full_payment'],
	            'payment_recieved'=>$_POST['payment_recieved'],
	            'balance'=>$_POST['balance'],
	            'weight'=>$_POST['weight'],
	            'gender'=>$_POST['gender'],
	            'user_id'=>$_POST['user_id'],
	            'products'=>$product,
	            'product_quantity'=>$product_quantity
	        ]);
	         NextVisits::create([
            'user_id'=>$_POST['user_id'],
            'date'=>$_POST['next_visit'],
        ]);
    	}elseif($_POST['gender'] == 'female' && $_POST['payment_recieved'] != ''){
    		$product=implode(',',$_POST['product']);  
	    	$product_quantity=implode(',', $_POST['product_quantity']);
	    	$gender=$_POST['gender'];
	    	monitor::create([
	            'dov'=>$_POST['dov'],
	            'package'=>$_POST['package'],
	            'neck'=>$_POST['neck'],
                'next_visit' => $_POST['next_visit'],
                'present_weight'=>$_POST['present_weight'],
                'result'=>$_POST['result'],
	            'chest'=>$_POST['chest'],
	            'gender'=>$_POST['gender'],
	            'user_id'=>$_POST['user_id'],
	            'products'=>$product,
	            'side_buns'=>$_POST['side_buns'],
	            'waist'=>$_POST['waist'],
	            'hips'=>$_POST['hips'],
	            'thighs'=>$_POST['thighs'],
	            'arms'=>$_POST['arms'],
	            'lower_waist'=>$_POST['lower_waist'],
	            'total_inches'=>$_POST['total_inches'],
	            'product_quantity'=>$product_quantity,
	            'full_payment'=>$_POST['full_payment'],
	            'payment_recieved'=>$_POST['payment_recieved'],
	            'balance'=>$_POST['balance']
	        ]);
	    	 NextVisits::create([
            'user_id'=>$_POST['user_id'],
            'date'=>$_POST['next_visit'],
        ]);
    	}
    	return redirect()->back()->with('status','Successfully added !');
    }


    public function update_Client($data,$history,$measurment,$user_id,$general_info){
    	$data=json_encode($data);
        $history = json_encode($history);
        $measurment = json_encode($measurment);


        /*update usermeta table*/
        UserMeta::where('user_id',$user_id)->update([
            'data'=>$data,
            'history'=>$history,
            'measurment'=>$measurment
        ]);

        /*update user table*/
        User::where('id',$user_id)->update([
            'name' =>  $general_info['name'],
            'f_name' =>  $general_info['f_name'],
            'address' =>  $general_info['address'],
            'res_phone' =>  $general_info['res_phone'],
            'office_phone' =>  $general_info['office_phone'],
            'mobile' =>  $general_info['mobile'],
            'age' =>  $general_info['age'],
            'location' => $general_info['location'],
            'email' =>  $general_info['email'],
            'gender' => $general_info['gender']
        ]);
    }
}
