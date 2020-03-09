<?php

namespace App\Http\Controllers;

use App\Order;
use App\HttP\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'client' => auth()->user()->getName(),
            'animals' => [],
            'items' => [],
            'payment' => $request->input('payment')
        ]);

        $order->save();
       /*  ItemController::save($request, $order->getId());

        echo($request);
        $animals = $this->getAnimals($request);
        if ($animals) {
            foreach ($animals as $animal) {
                $order->addAnimal($animal->getId());
            }
        }
        $items = $this->getItems($request);
        if ($items) {
            foreach ($items as $item) {
                $order->addItem($item->getProduct()->getId());
            }
        }

        $order->save();
        redirect()->route('home.index'); */
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('home.index');
    }
}
