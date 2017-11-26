<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class SettingController extends Controller
{
    public function setting(){
        return view('admin.settings');
    }

    public function addvideo(Request $request){
        $embed_link= substr($request->youtube_link,32);
        $count=setting::count();
        if($count ==1){
            setting::where('id',1)->update(
               ['youtube_link' => $embed_link]
            );
        }else{
            setting::create(
               ['youtube_link' => $embed_link]
            );
        }
        return redirect()->back()->with('status', 'Setting saved Successfully !!');
    }
}
