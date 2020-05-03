<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use Illuminate\Http\Request;
use Lang;

class ItemController extends Controller
{
    public function create(Request $request, $id) {
        $product = Product::findOrFail($id);

        if($request->session()->has('items.'.$id)){
            $item = $request->session()->get('items.'.$id);
            $item->incrementQuantity($request["quantity"]);

        } else {
            $item = Item::make([
                'product_id' => $product,
                'quantity' => $request["quantity"],
            ]);
        }
        $request->session()->put('items.'.$id, $item);       
        return back()->with('success',Lang::get('messages.success'));
    }
    
    public function delete(Request $request, $id) {
        $item = $request->session()->get('items.'.$id);

        if($item->getQuantity() == 1){
            $request->session()->forget('items.'.$id);
        } else {
            $item->reduceQuantity();
        }
        return redirect()->route('order.index');
    }

    public function deleteAll(Request $request, $id) {
        $request->session()->forget('items.'.$id);
        
        return redirect()->route('order.index');
    }

}
