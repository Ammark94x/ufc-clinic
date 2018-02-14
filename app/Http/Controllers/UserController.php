<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\UserMeta;
use App\cities;
use App\reception;
use App\storekeeper;
use App\monitor;
use App\NextVisits;
use App\product;
use Hash;

class UserController extends Controller
{
    /*check user credentials*/
    public function check_auth(Request $request){
        if(filter_var($request->user, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $request->user, 'password' => $request->password])) {
                return redirect('/');
            }
            else
            {
                return redirect()->back()->with('status', 'Invalid email or password!');
            }
        } else {
            if (Auth::attempt(['mobile' => $request->user, 'password' => $request->password])) {
                return redirect('/');
            }
            else
            {
                return redirect()->back()->with('status', 'Invalid number or password!');
            }
        }
    }

    /*logout function*/
    public function logout(){
        Auth::logout();
        return redirect('/')->with('status', 'You are logged out!');    
    }

    /*Register new client*/
    public function registerClient_v(Request $request){
        $cities=cities::get();
        return view('admin.registerClient',compact('cities'));
    }

    /*Recieption client data*/
    public function basic_infoClient(){
        return view('admin.basicClientForm');
    }

    /*Storing register client data*/
    public function store(Request $request)
    {   
        $next_visit = $request->data['next_visit'];
        $user = $request->except('data','history','measurment');
        $user['type'] = 1;     
        $data = json_encode($request['data']);
        $history = json_encode($request['history']);
        $measurment = json_encode($request['measurment']);        
        $last_id = User::OrderBy('id','DESC')->first()->value('id')+1;
        $pass = $last_id."_".substr($user['mobile'], -4);
        $user['password'] = Hash::make($pass);
        $last_user = User::create($user);
        UserMeta::create([
            'user_id'=>$last_user['id'],
            'data'=>$data,
            'history'=>$history,
            'measurment'=>$measurment
        ]);
        NextVisits::create([
            'user_id'=>$last_user['id'],
            'date'=>$next_visit,
        ]);
        $username = "923025557774";
        $password = "1876";
        $mobile = $user['mobile'];
        $sender = "UFC";
        $message = "Welcome ".$user['name']." to Ultimate Fitness Clinic! Your username is ".$user['email']." and password is ".$pass;
        $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $responce = curl_exec($ch);
        curl_close($ch);
        /*Print Responce*/
        return redirect()->route('monitorClient', ['id' => $last_user['id']]);
    }

    /*Client Lists*/
    public function clientList(){
        $user=User::orderBy('id', 'DESC')->where('type',1)->get();
        return view('admin.clientList',compact('user'));
    }

    /*Edit Client*/
    public function editClient($id){
        $cities=cities::get();
        $data=UserMeta::where('user_id', '=', $id)->get();
        $user_data=User::where('id', '=', $id)->first();
        $data=json_decode($data, true);
        $user_id=$id;
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
            
             return view('admin.updateClient',compact('data','user_data','user_id','cities','user','user','products','monitor_user','last_visit','given_product'));        
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
            return view('admin.updateClient',compact('data','user_data','user_id','cities','user','products','last_visit','monitor_user','given_product'));
            
        }
        
    }
    
    /*Update client*/
    public function updateClient(Request $request){
        $data=json_encode($request['data']);
        $history = json_encode($request['history']);
        $measurment = json_encode($request['measurment']);
        /*update usermeta table*/
        UserMeta::where('user_id',$request['metaUserId'])->update([
            'data'=>$data,
            'history'=>$history,
            'measurment'=>$measurment
        ]);

        /*update user table*/
        User::where('id',$request['metaUserId'])->update([
            'name' =>  $request['name'],
            'f_name' =>  $request['f_name'],
            'address' =>  $request['address'],
            'res_phone' =>  $request['res_phone'],
            'office_phone' =>  $request['office_phone'],
            'mobile' =>  $request['mobile'],
            'age' =>  $request['age'],
            'location' =>  $request['location'],
            'email' =>  $request['email'],
            'gender' => $request['gender']
        ]);
        return redirect('clientList')->with('status', 'updated Successfully !!');
    }

    /*delete client*/
    public function deleteClient($id){
        User::where('id','=', $id)->delete();
        UserMeta::where('user_id','=', $id)->delete();
        monitor::where('user_id','=', $id)->delete();
        return redirect()->back()->with('status', 'Client deleted Successfully !!');
    }


    /*storing reception clietn data*/
    public function addReceptionClient(Request $request){
        reception::create($_POST);
        $username = "923025557774";
        $password = "1876";
        $mobile = $request->phone_number;
        $sender = "UFC";
        $message = "Welcome ".$request->name." to Ultimate Fitness Clinic!";
        $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $responce = curl_exec($ch);
        curl_close($ch);
        
        return redirect()->back()->with('status', 'Client Added Successfully !!');
    }

    /*listing reception client list*/
    public function receptionClientList(){
        $reception_client=reception::get();
        return view('admin.receptionClientList',compact('reception_client'));   
    }
    
    /*edit reception client*/
    public function editReceptionClient($id){
        $client=reception::where('id', '=', $id)->get();
        return view ('admin.updateReceptionClient',compact('client'));
    }

    /*update reception client*/
    public function updateReceptionClient(Request $request){
         reception::where('email',$request['email'])->update([
            'name' =>$request['name'],
            'email'=>$request['email'],
            'phone_number'=>$request['phone_number'],
            'gender'=>$request['gender']
         ]);
         return redirect()->back()->with('status', 'updated Successfully !!');
    }

    /*delete reception client*/
     public function deleteReceptionClient($id){
        reception::where('id','=', $id)->delete();
        return redirect()->back()->with('status', 'Client deleted Successfully !!');
    }

    public function nextVisits(){
        $data = [];
        $visits = NextVisits::get();
        $today = date('m/d/Y');
        //return $today;
        foreach($visits as $value) {
            $newdate = strtotime ( '-1 day' , strtotime ( $value->date ) ) ;
            $newdate = date ( 'm/d/Y' , $newdate );
            if($today==$newdate) {
                $data[] = $value;
            }
        }
        return view('admin.nextVisits',['data'=>$data]);
    }

    public function notifyNextVisits(){
        $data = [];
        $visits = NextVisits::get();
        $today = date('m/d/Y');
        //return $today;
        foreach($visits as $value) {
            $newdate = strtotime ( '-1 day' , strtotime ( $value->date ) ) ;
            $newdate = date ( 'm/d/Y' , $newdate );
            if($today==$newdate) {
                $data[] = ['name'=>User::find($value->user_id)['name'],'mobile'=>User::find($value->user_id)['mobile']];
            }

            if(!empty($data)) {
                foreach($data as $val) {
                    $username = "923025557774";
                    $password = "1876";
                    $mobile = $val['mobile'];
                    $sender = "UFC";
                    $message = "Dear ".$val['name']."! You have an appointment of Tomorrow at Ultimate Fitness Cilinic. Thanks";
                    $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
                    $responce = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
        return "success";
    }

    
    
}
