<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller{
    public function index(){
        return view('client.index');
    }

    public function create(){
        return view('client.create');
    }

    public function showAll(){
        $clients = DB::table('clients')->get()->sortby('id');
        return view('client.show', ['clients' => $clients]);
    }

    public function showClient($id){
        $client = DB::table('clients')->where('id', $id)->first();

        return view('client.detail', ['client' => $client]);
    }

    public function save(Request $request){
        //Client::validate($request);
        $request->validate([
            "name" => "required",
            "phone" => "required|numeric|gt:0",
            "address" => "required"
        ]);
        Client::create($request->only(["name","phone","address"]));
        return view('client.confirm');
    }

    
    public function delete($id){
        DB::table('clients')->where('id', $id)->delete();
        return $this->show();
    }

}
?>