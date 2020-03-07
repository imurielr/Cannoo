<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{
    public function index(){
        $data = []; //to be sent to the view
        $data["animals"] = [];
        $data["items"] = [];
        return view('order.index')->with("data",$data);
    }

    public function addAnimal($id){
        //Agregar Animal a la orden
        return view('pets.show');
    }

    public function addItem($id){
        //Agregar Item a la orden
        return view('product.show');
    }

    public function deleteAnimal($id){
        //Borrar el animal de la Order con id = $id
        return view('order.index');
    }
    
    public function deleteItem($id){
        //Borrar el item de la Order con id = $id
        return view('order.index');
    }
}
