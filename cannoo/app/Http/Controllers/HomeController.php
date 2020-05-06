<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bioudi\LaravelMetaWeatherApi\Weather;

use Lang;


class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        if(\Auth::check()){
            $city = \Auth::user()->city;
            $weather = new Weather();
            $temp = $weather->getByCityName( $city );

            if(!is_string($temp)){
                $t =  $temp->consolidated_weather[0]->the_temp;
                \Session::put('temp',$t);
            }else{
                \Session::put('temp',"");
            }
        }else{
            \Session::put('temp',"");
        }

        if(\Auth::check()){
            $city = \Auth::user()->city;
            $cities = array( 
                'bogotá' => Lang::get('messages.bog'),
                'sydney' => Lang::get('messages.syd'),
                'london' => Lang::get('messages.lon'),
                'madrid' => Lang::get('messages.mad'),
            );
            \Session::put('city',$cities[$city]);
        }else{
            \Session::put('city',"");
        }
        
        $data["title"] = Lang::get('messages.home');

        return view('home.index')->with("data", $data);
    }
}
