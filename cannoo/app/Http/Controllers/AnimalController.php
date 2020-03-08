<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller {
    
    public function show() {
        $data = []; //to be sent to the view
        $data["title"] = "Ver Mascotas";
        $data["pets"] = Animal::all();
        return view('animal.show')->with("data",$data);
    }

    public function pet($id) {
        $data = []; //to be sent to the view
        $data["title"] = "Pet";
        $data["pet"] = Animal::findOrFail($id);
        return view('animal.pet')->with("data",$data);
    }


    public function create() {
        $data = []; //to be sent to the view
        $data["title"] = "Crear Mascota";
        return view('animal.create')->with("data",$data);
    }


    public function save(Request $request) {
        $request->validate([
            "breed" => "required",
            "type" => "required",
            "birthDate"=>"required"
        ]);
        $request["vaccinated"]=(bool)$request["vaccinated"];
        Animal::create($request->only(["type","breed","birthDate","vaccinated"]));
        return back()->with('success','Item inserted successfully!');
    }

    public function erase($id) {
        Animal::where('id', $id)->delete();
        return redirect('animal/show');
    }
}
?>
