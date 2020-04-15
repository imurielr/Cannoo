<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Product;
use Illuminate\Http\Request;
use Lang;

class Top5Controller extends Controller {


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function animals() {
        $data=[];
        $data['title'] = Lang::get('messages.top5');
        $data['animals']= Animal::orderBy('likes', 'desc')->take(5)->get();
        return view('top5.animals')->with('data', $data);
    }

    public function products() {
        $data=[];
        $data['title'] = Lang::get('messages.top5');
        $data['products']= Product::orderBy('likes', 'desc')->take(5)->get();
        return view('top5.products')->with('data', $data);
    }
}