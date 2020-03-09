<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request, $id){
        $product = Product::findOrFail($id);

        if($request->session()->has('items.'.$id)){
            $item = $request->session()->get('items.'.$id);
            $item->incrementQuantity();

        } else {
            $item = Item::make([
                'product' => $product,
                'quantity' => 1,
            ]);
        }
        $request->session()->put('items.'.$id, $item);       
        return redirect()->route('order.index');
    }

    public function save(Request $request,$id){
        $items = $request->session()->get('items');
        if ($items) {
            foreach ($items as $item) {
                $item = Item::make([
                    'product' => $item->getProduct(),
                    'quantity' => $item->getQuantity(),
                    'order' => $id
                ]);
                $item->save();
            }
        }

        //return redirect()->route('order.create');
    }
    
    public function delete(Request $request, $id){
        $item = $request->session()->get('items.'.$id);

        if($item->getQuantity() == 1){
            $request->session()->forget('items.'.$id);
        } else {
            $item->reduceQuantity();
        }
        return redirect()->route('order.index');
    }

}
