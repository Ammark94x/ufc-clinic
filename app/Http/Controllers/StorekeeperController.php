<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\storekeeper;

class StorekeeperController extends Controller
{
    public function addItems(){
    	return view('storekeeper.add_items');
    }

    public function saveItem(Request $request){
    	$result=storekeeper::create([
            'item_name'=>$request->item_name,
            'item_quantity'=>$request->item_quantity,
            'item_price'=>$request->item_price
        ]);
    	return redirect()->back()->with('status', 'Item Added Successfully');
    }

    public function listItems(){
    	$storekeeper=storekeeper::get();
    	return view('storekeeper.list_items',compact('storekeeper'));
    }

    /*edit view for item*/
    public function edititem($id){
        $getItem=storekeeper::where('id', '=', $id)->get();
        return view('storekeeper.update_item',compact('getItem'));
    }

    /*update item*/
    public function updateItem(Request $request){
        storekeeper::where('id',$request['id'])->update([
            'item_name'=>$request['item_name'],
            'item_quantity'=>$request['item_quantity'],
            'item_price'=>$request['item_price']
        ]);
        return redirect()->back()->with('status', 'Item updated Successfully');
    }

    /*Delete item*/
    public function deleteItem($id){
        storekeeper::where('id','=', $id)->delete();
        return redirect()->back()->with('status', 'Item deleted Successfully');   
    }
}
