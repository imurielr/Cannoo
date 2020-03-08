<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pet;

class PetsController extends Controller {
    
    public function show() {
        $data = []; //to be sent to the view
        $data["title"] = "Ver Mascotas";
        $data["pets"] = Pet::all();
        return view('pets.show')->with("data",$data);
    }

    public function pet($id) {
        $data = []; //to be sent to the view
        $data["title"] = "Pet";
        $data["pet"] = Pet::findOrFail($id);
        return view('pets.pet')->with("data",$data);
    }


    public function create() {
        $data = []; //to be sent to the view
        $data["title"] = "Crear Mascota";
        return view('pets.create')->with("data",$data);
    }


    public function save(Request $request) {
        $request->validate([
            "breed" => "required",
            "type" => "required",
            "birthDate"=>"required"
        ]);
        $request["vaccinated"]=(bool)$request["vaccinated"];
        Pet::create($request->only(["type","breed","birthDate","vaccinated"]));
        return back()->with('success','Item inserted successfully!');
    }

    public function erase($id) {
        Pet::where('id', $id)->delete();
        return redirect('pets/show');
    }
}
?>
