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
            'client' => 'Elena la ballena',

            'animals' => [],
            'items' => [],

            //Que el payment sea el elegido en order.index
            //(en la parte de abajo están las entradas pero no sé como relacionarlas acá)
            'payment' => 'Con cash cash',
        ]);
        $order->animals()->save($this->getAnimals($request));
        $order->items()->save($this->getItems($request));

        //validar plis

        //Ya este debería meterlo en la BD
        $order.save();
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('home.index');
    }
}
