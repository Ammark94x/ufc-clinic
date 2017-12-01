<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\storekeeper;
use App\product;

class StorekeeperController extends Controller
{
    public function addItems(){
    	return view('storekeeper.add_items');
    }

    public function saveItem(Request $request){
    	$result=product::create([
                'item_name' => $request->item_name
        ]);
    	return redirect()->back()->with('status', 'Item Added Successfully');
    }

    public function listItems(){
    	$storekeeper=product::get();
    	return view('storekeeper.list_items',compact('storekeeper'));
    }

    /*edit view for item*/
    public function edititem($id){
        $getItem=storekeeper::orderBY('created_at','desc')->where('product_id', '=', $id)->get();
        $product=product::where('id', '=', $id)->get();
        return view('storekeeper.update_item',compact('getItem','product'));
    }

    /*update item*/
    public function updateItem(Request $request){
        date_default_timezone_set('Asia/Karachi');
        $date=date('d-m-Y');
        $exist=storekeeper::where([
        ['date', '=', $date],
        ['product_id', '=', $request['product_id']]
        ])->value('date');

        if($exist != '')
            {
                storekeeper::where('date',$request['date'])->update([
                'product_id'=>$request['product_id'],
                'date'=>$request['date'],
                'opening'=>$request['opening'],
                'recieving'=>$request['recieving'],
                'used'=>$request['used'],
                'total'=>$request['total'],
                'closed'=>$request['closed']
                ]);    
            }
        else
            {
               storekeeper::Create([
                'product_id'=>$request['product_id'],
                'date'=>$request['date'],
                'opening'=>$request['opening'],
                'recieving'=>$request['recieving'],
                'used'=>$request['used'],
                'total'=>$request['total'],
                'closed'=>$request['closed']
            ]);   
            }
             return redirect()->back()->with('status', 'Item updated Successfully');
        }
        
       
    

    /*Delete item*/
    public function deleteItem($id){
        storekeeper::where('id','=', $id)->delete();
        return redirect()->back()->with('status', 'Item deleted Successfully');   
    }
}
