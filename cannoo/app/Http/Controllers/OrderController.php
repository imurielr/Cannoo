<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{
    public function index(Request $request){
        $data["animals"] = $this->getAnimals($request);
        $data["items"] = $this->getItems($request);
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


    //Este método debería dar sin problemas si se completa
    public function create(Request $request){

        //Me cansé, ayuda acá porf
        $order = Order::make([
            // Que el cliente sea el usuario activo
            'client' => auth()->user()->getName(),

            'animals' => [],
            'items' => [],

            //Que el payment sea el elegido en order.index
            //(en la parte de abajo están las entradas pero no sé como relacionarlas acá)
            'payment' => $request->input('payment'),
        ]);
        // print_r("hola".$order->getPayment());
        print_r($request);
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

        //Ya este debería meterlo en la BD
        $order->save();
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('home.index');
    }
}
