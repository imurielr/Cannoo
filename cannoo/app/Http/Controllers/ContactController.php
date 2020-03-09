<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller {


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('contact.index');
    }

    public function save(Request $request) {
        Message::validate($request);
        $product = Message::create($request->only(["client","subject","message"]));
        return back()->with('success','Message sent succesfully!');
    }

    public function get() {
        $data = []; //to be sent to the view
        $data["title"] = "Messages";
        $data["messages"] = Message::orderBy('created_at', 'desc')->get();
        return view('contact.messages')->with("data",$data);
    }

    public function delete($id){
        Message::find($id)->delete();
        return redirect()->route('contact.messages');
    }
}
