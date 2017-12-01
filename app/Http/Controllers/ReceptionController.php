<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cities;
use App\visitor;

class ReceptionController extends Controller
{

	/*Add form for visitors*/
    public function addInquiries(){
    	$cities= cities::get();
    	return view('inquiries.add_inquiries',compact('cities'));
    }

    public function add_visitorSheets(){
        $cities= cities::get();
        return view('inquiries.add_visitor',compact('cities'));
    }


    public function addmissedCalls(){
        $cities= cities::get();
        return view('inquiries.add_missedCalls',compact('cities'));
    }

    public function addfbMsg(){
        $cities= cities::get();
        return view('inquiries.add_fbMsg',compact('cities'));
    }

    public function vicitsSheets(){
        $cities= cities::get();
        return view('inquiries.vicita_sheets',compact('cities'));
    }

    public function add_weberSheets(){
        $cities= cities::get();
        return view('inquiries.weber_sheets',compact('cities'));
    }

    /*add visitors*/
    public function addVisitor(Request $request){
        
    	visitor::create([
            'name'=>$request->name,
            'fb_msg'=>$request->fb_msg,
            'type'=>$request->type,
            'phone_number'=>$request->phone_number,
            'date'=>$request->date,
            'status'=>$request->status,
            'area'=>$request->area,
            'source'=>$request->source,
            'link_from'=>$request->link_from,
            'gender'=>$request->gender

        ]);
        return redirect()->back()->with('status', 'Visitor added Successfully');
    }

    /*list visitors*/
    public function listVisitors(){
    	$visitors=visitor::get();
    	return view('inquiries.list_visitors',compact('visitors'));
    }

    /*edit visitor*/
    public function editVisitor($id){
    	$visitor=Visitor::where('id', '=', $id)->get();
    	return view('inquiries.update_visitor',compact('visitor'));
    }

    /*update visitor*/
    public function updateVisitor(Request $request){
    	Visitor::where('id',$request['id'])->update([
            'name'=>$request['name'],
            'fb_msg'=>$request['fb_msg'],
            'type'=>$request['type'],
            'phone_number'=>$request['phone_number'],
            'date'=>$request['date'],
            'status'=>$request['status'],
            'area'=>$request['area'],
            'source'=>$request['source'],
            'link_from'=>$request['link_from'],
            'gender'=>$request['gender']
        ]);
        return redirect()->back()->with('status', 'Visitor updated Successfully');
    }

    /*delete visitor*/
    public function deleteVisitor($id){
    	Visitor::where('id','=', $id)->delete();
    	return redirect()->back()->with('status', 'Visitor deleted Successfully');
    }

    public function inquiryCalls(){
        $visitors=Visitor::where('type', '=', 'Inquiry Calls')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }

    public function missedCalls(){
        $visitors=Visitor::where('type', '=', 'Missed Called')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }

    public function fbMessages(){
        $visitors=Visitor::where('type', '=', 'Facebook Messages')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }

    public function visitorSheets(){
        $visitors=Visitor::where('type', '=', 'Visitors SheetvcitaSheets')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }

    public function vcitaSheets(){
        $visitors=Visitor::where('type', '=', 'Vcita Sheets')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }

    public function weberSheets(){
        $visitors=Visitor::where('type', '=', 'Weber Sheets')->get();
        return view('inquiries.list_visitors',compact('visitors'));
    }
}
