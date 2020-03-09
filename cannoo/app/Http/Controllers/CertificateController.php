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
        //Validate client exist
        $client = User::where('email', $request->input('client'))->get();
        if ($client->isEmpty()) {
            return back()->with('fail', "The client's email does not exist");
        }
        $request->merge(['client' => $client[0]->getId()]);
        //Change animal status to adopted
        Animal::where('id',$request['animal'])->update(['adopted' => 1]);

        Certificate::create($request->only(["client","animal","date","verified"]));
        return back()->with('success','Item created successfully!');
    }

    public function delete($id) {
        $info = Certificate::select('animal')->where('id', $id)->get();
        Animal::where('id',  $info[0]['animal'])->update(['adopted' => 0]);
       Certificate::where('id', $id)->delete();
       return redirect('certificate/show');
    }
}
?>
