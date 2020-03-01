<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    //attributes id, name, type, breed, date, vaccinated, created_at, updated_at
    protected $fillable = ['name','type','breed','date','vaccinated'];

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function setName($name) {
        $this->attributes['name'] = $name;
    }

    public function getBreed() {
        return $this->attributes['breed'];
    }

    public function setBreed($breed) {
        $this->attributes['breed'] = $breed;
    }

    public function getType() {
        return $this->attributes['type'];
    }

    public function setType($type) {
        $this->attributes['type'] = $type;
    }

    public function getDate() {
        return $this->attributes['date'];
    }

    public function setDate($date) {
        $this->attributes['date'] = $date;
    }

    public function getVaccinated() {
        return $this->attributes['vaccinated'];
    }

    public function setVaccinated($vaccinated) {
        $this->attributes['vaccinated'] = $vaccinated;
    }

    public function validate(Request $request) {
        $request->validate([
            "name" => "required",
            "breed" => "required",
            "type" => "required",
            "date"=>"required"
        ]);
        $request["vaccinated"]=(bool)$request["vaccinated"];
    }
    

}
?>
