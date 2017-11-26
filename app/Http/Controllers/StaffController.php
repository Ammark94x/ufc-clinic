<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;
use Session;
use Auth;

class StaffController extends Controller
{
    public function index()
    {
    	$data = User::OrderBy('id','DESC')->where('role','!=','admin')->get();
    	return view('admin.staff',['data'=>$data]);
    }

    public function create()
    {
    	return view('admin.add_staff');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
	    ]);
	    $user = new User;
	    $user->name = $request->name;
	    $user->email = $request->email;
	    $user->password = bcrypt($request->password);
	    $user->role = $request->role;
	    $user->save();
    	return redirect()->back();
    }

    public function changePassword()
    {
    	return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
    	$user = User::find(Auth::user()->id);
    	if (Hash::check($request->current_password, $user['password'])) 
		{
		 	$this->validate($request, [
	            'password' => 'required|min:6|confirmed',
		    ]);
	    	$user->password = bcrypt($request->password);
	    	$user->save();   
		}
		else
		{
			Session::flash('current_password','Does not match current password');
		}
    	return redirect()->back();
    }

    public function delete($id)
    {
    	User::destroy($id);
    	return redirect()->back();
    }
}
