<?php

namespace App;
use Illuminate\Http\Request;
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

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function getAnimal() {
        return $this->attributes['animal'];
    }

    public function setAnimal($animal) {
        $this->attributes['animal'] = $animal;
    }

    public function animal(){
        return $this->belongsTo(Animal::class);
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
            "animal" => "required | numeric | gt:0",
            "client" => "required | numeric | gt:0 ",
            "date" => "required"
        ]);
        $request["verified"]=(bool)$request["verified"];
    }
}
?>