<?php

namespace App\Http\Controllers;

use App\User;

class ClientController extends Controller{
    public function index(){
        return view('client.index');
    }

    public function showAll(){
        $clients = User::where('role', 'client')->get();
        return view('client.show', ['clients' => $clients]);
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

}
?>