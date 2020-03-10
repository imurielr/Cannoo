<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
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

        $order = Order::make([
            'client' => auth()->user()->getId(),
            'payment' => $request->input('payment')
        ]);
        $order->save();

        $id = $order->getId();

        $animals = $this->getAnimals($request);
        foreach ($animals as $animal) {
            $animal->setOrder($id);
            $animal->save();
        }
        $items = $this->getItems($request);
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
        return redirect()->route('home.index');
    }
}
