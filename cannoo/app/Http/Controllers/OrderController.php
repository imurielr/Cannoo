<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\Certificate;
use App\Animal;
use Illuminate\Http\Request;

class OrderController extends Controller{
    public function index(Request $request){
        $data["animals"] = $this->getAnimals($request);
        $data["items"] = $this->getItems($request);
        $total =0;
        foreach($data['items'] as $array => $item){
            $total+= $item->getTotalPrice();
        }
        $data['total'] =$total;
        return view('order.index')->with("data", $data);
    }

    public function getAnimals(Request $request){
        if($request->session()->has('animals')){
            $animals = $request->session()->get('animals');
        } else {
            $animals = [];
        }
        return $animals;
    }

    public function getItems(Request $request){
        if($request->session()->has('items')){
            $items = $request->session()->get('items');
        } else {
            $items = [];
        }
        return $items;
    }

    public function create(Request $request){
        $animals = $this->getAnimals($request);
        $items = $this->getItems($request);
        
        if (!$animals && !$items) {
            return back()->with('fail', 'Please add some elements to the shopping cart');
        }


        $order = Order::make([
            'client' => auth()->user()->getId(),
            'payment' => $request->input('payment'),
        ]);

        $order->setTotalPrice($request->query('totalPrice'));

        $order->save();

        $id = $order->getId();

        
        foreach ($animals as $animal) {
            $animal->setOrder($id);
            $animal->save();

            Certificate::make([
                'client' => auth()->user()->getId(),
                'animal' => $animal->getId(),
                'date' => date("Y/m/d"),
                'verified' => 1
            ])->save();

            Animal::where('id', $animal->getId())->update(['adopted' => 1]);
        }

        foreach ($items as $item) {
            $idProd = $item->getProduct()->getId();
            $item->setProduct($idProd);
            $item->setOrder($id);
            $item->save();
        }
        $order->save();
        return redirect()->route('order.flush');
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('order.index');
    }
}
