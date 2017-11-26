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
use Hash;

class UserController extends Controller
{
    /*check user credentials*/
    public function check_auth(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/');
            }
            else
            {
                return redirect()->back()->with('status', 'Invalid email or password!');
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
        // $username = "923313960846";
        // $password = "7836";
        // $mobile = $user['mobile'];
        // $sender = "UFC";
        // $message = "Welcome ".$user['name']." to Ultimate Fitness Clinic! Your username is ".$user['email']." and password is ".$pass;
        // $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)."";
        // $ch = curl_init();
        // $timeout = 30;
        // curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        // $responce = curl_exec($ch);
        // curl_close($ch);
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
        $user=User::where('id', '=', $id)->get();
        $data=json_decode($data, true);
        $user_id=$id;
        return view('admin.updateClient',compact('data','user','user_id','cities'));
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

    
    
}