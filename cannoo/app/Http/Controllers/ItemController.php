<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->session()->flush();
        $product = Product::findOrFail($id);
        $item = Item::make([
            'product' => $product,
            'quantity' => 1,
        ]);
        
        if (!($request->session()->has('items'))) {
            $items = array();
            $request->session()->put('items', $items);
        }
        $request->session()->push('items', $item);

        return redirect()->route('order.index');
    }

    public function show($id)
    {
        //
    }
}
