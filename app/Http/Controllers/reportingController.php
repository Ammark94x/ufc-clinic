<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Expenses;
use App\tcs_delivery;
use App\monitor;
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

    public function customerByMonth()
    {
        $yearsback = date("M", strtotime("-1 year"));
        $customers = User::whereNull('role')->whereMonth('created_at','<=' ,date("m"))->whereMonth('created_at','>=' ,date("m"));
        $months = array_combine(range(date('m'), date('m')-10), range(date('m'), date('m')-10));
        $data = [];
        foreach($months as $month)
        {
            $data['months'][] = $month;
            $data['customers'][] = $customers->whereMonth('created_at',$month)->count();
        }
        return response()->json($data);
    }

    public function expenses()
    {
        return view('admin.expenses_reports');
    }

    public function monthlyExpenses()
    {   

        $months = array_combine(range(date('m'), date('m',strtotime('-1 year'))), range(date('m'), date('m',strtotime('-1 year'))));
        $data = [];
        foreach($months as $month) {
            $data['months'][] = \DateTime::createFromFormat('!m', $month)->format('F');
            $data['Expenses'][] = 0 + Expenses::whereMonth('date',$month)->whereYear('date',date('Y'))->sum('amount');
            $data['Profit'][] = monitor::whereMonth('created_at',$month)->whereYear('created_at',date('Y'))->sum('full_payment') + tcs_delivery::whereMonth('date',$month)->whereYear('date',date('Y'))->sum('amount') + 0;
        }
        return response()->json($data);

    }
    public function yearlyExpenses()
    {   
        $years = array_combine(range(date('Y'), date('Y')-10), range(date('Y'), date('Y')-10));
        $data = [];
        foreach($years as $year) {
            $data['years'][] = $year;
            $data['Expenses'][] = 0 + Expenses::whereYear('date',$year)->sum('amount');
            $data['Profit'][] = monitor::whereYear('created_at',$year)->sum('full_payment') + tcs_delivery::whereYear('date',$year)->sum('amount') + 0;
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
