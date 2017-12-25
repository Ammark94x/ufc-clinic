<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class reportingController extends Controller
{
    public function customers()
    {
    	$customers = User::whereNull('role')->get();        
    	return view('admin.customer_reports',['data'=>$customers]);
    }

    public function customerByYear()
    {
        $yearsback = date("Y", strtotime("-10 years"));
        $customers = User::whereNull('role')->whereYear('created_at','<=' ,date("Y"))->whereYear('created_at','>=' ,date("Y"));
        $years = array_combine(range(date('Y'), date('Y')-10), range(date('Y'), date('Y')-10));
        $data = [];
        foreach($years as $year)
        {
            $data['years'][] = $year;
            $data['customers'][] = $customers->whereYear('created_at',$year)->count();
        }        
    	return response()->json($data);
    }

    public function customHistoryPage()
    {
        return view('clients.customer_reports');
    }

    public function customerhistory()
    {
        $data = [];
        if(isset(Auth::user()->monitor)) 
        {
            foreach(Auth::user()->monitor as $value)
            {
                $data['dates'][] = date('d/M/Y',strtotime($value->dov));
                $data['weight'][] = $value->weight;
            }           
        }
        return response()->json($data);
    }
}
