<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model {
    //Atributos id, client, animal, date, verified 
    protected $fillable = ['id','client','animal','date','verified'];

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getClient() {
        return $this->attributes['client'];
    }

    public function setClient($client) {
        $this->attributes['client'] = $client;
    }

    public function getAnimal() {
        return $this->attributes['animal'];
    }

    public function setAnimal($animal) {
        $this->attributes['animal'] = $animal;
    }

    public function getDate() {
        return $this->attributes['date'];
    }

    public function setDate($date) {
        $this->attributes['date'] = $date;
    }

    public function getVerified() {
        return $this->attributes['verified'];
    }

    public function setVerified($verified) {
        $this->attributes['verified'] = $verified;
    }


    public static function validate(Request $request) {
        $request->validate([
            "id" => "required",
            "client" => "required",
            "animal" => "required",
            "date" => "required"
        ]);
    }
}
?>