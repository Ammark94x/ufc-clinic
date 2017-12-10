<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\product;
use Session;

class ExpensesController extends Controller
{
    public function utility()
    {
    	$data = Expenses::where('type','utility')->OrderBy('id','DESC')->get();
    	return view('admin.utilities',['data'=>$data]);
    }

    public function add_utility()
    {
<<<<<<< HEAD
    	return view('admin.add_utiity');
=======
    	return view('admin.add_utility');
>>>>>>> 9907cb002dc06cd570a71f8e7dbf5d63f971b0ea
    }

    public function store_utility(Request $request)
    {
    	$request['type'] = 'utility';
    	Expenses::create($request->all());
    	return redirect()->route('showUtility');
    }

    public function printing_material()
    {
    	$data = Expenses::where('type','printing')->OrderBy('id','DESC')->get();
    	return view('admin.printing_material',['data'=>$data]);
    }

    public function add_printing()
    {
    	return view('admin.add_printing_material');
    }

    public function store_printing(Request $request)
    {
    	$request['type'] = 'printing';
    	Expenses::create($request->all());
    	return redirect()->route('showPrinting');
    }

    public function marketing()
    {
    	$data = Expenses::where('type','marketing')->OrderBy('id','DESC')->get();
    	return view('admin.marketing',['data'=>$data]);
    }

    public function add_marketing()
    {
    	return view('admin.add_marketing');
    }

    public function store_marketing(Request $request)
    {
    	$request['type'] = 'marketing';
    	Expenses::create($request->all());
    	return redirect()->route('showMarketing');
    }

    public function production()
    {
    	$data = Expenses::where('type','production')->OrderBy('id','DESC')->get();
    	return view('admin.production',['data'=>$data]);
    }

    public function add_production()
    {
    	$products = product::OrderBy('item_name','ASC')->get();
    	return view('admin.add_production',['products'=>$products]);
    }

    public function store_production(Request $request)
    {
    	$request['type'] = 'production';
    	Expenses::create($request->all());
    	return redirect()->route('showProduction');
    }

    public function destroy($id)
    {
    	Expenses::destroy($id);
    	return redirect()->back();
    }    
}
