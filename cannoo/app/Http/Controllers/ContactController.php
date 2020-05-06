<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Lang;

class ContactController extends Controller {


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data["title"] = Lang::get('messages.contact');
        return view('contact.index')->with("data", $data);
    }

    public function save(Request $request) {
        Message::validate($request);
        $product = Message::create($request->only(["client","subject","message"]));
        return back()->with('success',Lang::get('messages.mess'));
    }

    public function get() {
        $data = []; //to be sent to the view
        $data["title"] = Lang::get('messages.messages');
        $data["messages"] = Message::orderBy('created_at', 'desc')->get();
        return view('contact.messages')->with("data",$data);
    }

    public function delete($id){
        Message::find($id)->delete();
        return redirect()->route('contact.messages');
    }
}
