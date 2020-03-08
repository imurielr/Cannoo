<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Certificate;
use App\User;
use App\Animal;

class CertificateController extends Controller {

    public function show() {
        $data = []; //to be sent to the view
        $data["title"] = "certificates";
        $data["certificates"] = Certificate::all();
        return view('certificate.show')->with("data",$data);
    }


    public function create() {
        $data=[];
        $data['clients'] = User::where('role', 'client')->get();;
        $data['animals'] = Animal::all();
        return view('certificate.create')->with('data',$data);
    }

    public function save(Request $request) {
        Certificate::validate($request);
        
        $client = User::where('email', $request->input('client'))->get();

        if ($client->isEmpty()) {
            return back()->with('fail', "The client's email does not exist");
        }

        $request->merge(['client' => $client[0]->getId()]);

        Certificate::create($request->only(["client","animal","date","verified"]));

        return back()->with('success','Item created successfully!');
    }
}
?>
