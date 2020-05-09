<?php

namespace App\Http\Controllers;

use App\User;
use Lang;
use Illuminate\Http\Request;

class ClientController extends Controller{
    public function index(){
        return view('client.index');
    }

    public function showAll(){
        $data = []; //to be sent to the view
        $data["title"] = Lang::get('messages.clients');
        $clients = User::where('role', 'client')->get();
        return view('client.show', ['clients' => $clients])->with('data',$data);
    }

    public function showClient($id){
        $client = User::findOrFail($id);

        return view('client.detail', ['client' => $client]);
    }

    public function delete($id){
        User::find($id)->delete();
        return $this->showAll();
    }

    public function makeAdmin($id){
        $client = User::where('id',$id)->update(['role' => 'admin']);
        return redirect()->route('client.show');
    }

    public function addCredits(Request $request, $id){
        $client = User::where('id',$id)->first()->addCredits($request["quantity"]);
        $client->save();
        return redirect()->route('client.show');
    }

}
?>