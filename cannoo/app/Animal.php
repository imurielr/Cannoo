<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {
    //attributes id, type, breed, birthDate, vaccinated, certificate, order, created_at, updated_at
    protected $fillable = ['type','breed','birthDate','vaccinated'];

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }

    public function getType() {
        return $this->attributes['type'];
    }

    public function setType($type) {
        $this->attributes['type'] = $type;
    }

    public function getBreed() {
        return $this->attributes['breed'];
    }

    public function setBreed($breed) {
        $this->attributes['breed'] = $breed;
    }

    public function getBirthDate() {
        return $this->attributes['birthDate'];
    }

    public function setBirthDate($date) {
        $this->attributes['birthDate'] = $date;
    }

    public function getVaccinated() {
        return $this->attributes['vaccinated'];
    }

    public function setVaccinated($vaccinated) {
        $this->attributes['vaccinated'] = $vaccinated;
    }
    
    public function certificate(){
        return $this->hasOne(Certificate::class);
    }
    
    public function getCertificate() {
        return $this->attributes['certificate'];
    }

    public function setCertificate($certificate) {
        $this->attributes['certificate'] = $certificate;
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function getOrder() {
        return $this->attributes['order'];
    }

    public function setOrder($order) {
        $this->attributes['order'] = $order;
    }

    public function validate(Request $request) {
        $request->validate([
            "type" => "required",
            "breed" => "required",
            "birthDate"=>"required"
        ]);
        $request["vaccinated"]=(bool)$request["vaccinated"];
    }
    

}
?>
