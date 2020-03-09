<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\Animal;

class AnimalController extends Controller {
    
    public function show() {
        $data = []; //to be sent to the view
        $data["title"] = "Ver Mascotas";
        $data["animal"] = Animal::all();
        return view('animal.show')->with("data",$data);
    }

    public function pet($id) {
        $data = []; //to be sent to the view
        $data["title"] = "Pet";
        $data["animal"] = Animal::findOrFail($id);
        return view('animal.pet')->with("data",$data);
    }


    public function create() {
        $data = []; //to be sent to the view
        $data["title"] = "Crear Mascota";
        return view('animal.create')->with("data",$data);
    }


    public function save(Request $request) {
        $copy= $request;
        Animal::validate($copy);
        $animal = Animal::create($copy->only(["type","breed","birthDate","vaccinated","image"]));

        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $animal->getImage());


        return back()->with('success','Item created successfully!');
    }

    public function addToSession(Request $request, $id){
        $animal= Animal::findOrFail($id);
        $request->session()->put('animals.'.$id, $animal);
        return redirect()->route('order.index');
    }

    
    public function deleteFromSession(Request $request, $id){
        $request->session()->forget('animals.'.$id);
        return redirect()->route('order.index');
    }

    public function erase($id) {
        Animal::where('id', $id)->delete();
        return redirect('animal/show');
    }
}
?>
