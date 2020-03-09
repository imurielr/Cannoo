<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{
    public function index(Request $request){
        if($request->session()->has('items')){
            $data["items"] = $request->session()->get('items');
        } else {
            $data["items"] = [];
        }

        if($request->session()->has('animals')){
            $data["animals"] = $request->session()->get('animals');
        } else {
            $data["animals"] = [];
        }
        return view('order.index')->with("data", $data);
    }

    public function addAnimals(Request $request){
        if($request->session()->has('animals')){
            $animals = $request->session()->get('animals');
        } else {
            $animals = [];
        }
    }

    public function addItems(Request $request){
        if($request->session()->has('items')){
            $items = $request->session()->get('items');
        } else {
            $items = [];
        }
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('home.index');
    }
}
