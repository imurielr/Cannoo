<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Certificate;

class CertificateController extends Controller {

    public function show() {
        $data = []; //to be sent to the view
        $data["title"] = "certificates";
        $data["certificates"] = Certificate::all();
        return view('certificate.show')->with("data",$data);
    }


    public function create() {
        return view('certificate.create');
    }

    public function save(Request $request) {
        //Certificate::validate($request);
        $request->validate([
            "animal" => "required | numeric | gt:0",
            "client" => "required | numeric | gt:0",
            "date" => "required"
        ]);
        $request["verified"]=(bool)$request["verified"]; 
        Certificate::create($request->only(["client","animal","date","verified"]));

        return back()->with('success','Item created successfully!');
    }
}
?>
