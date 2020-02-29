<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model{
    //attributes id, name, phone, address, certificates, orders, created_at, updated_at
    protected $fillable = ['name','phone','address'];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name){
        $this->attributes['name'] = $name;
    }

    public function getPhone(){
        return $this->attributes['phone'];
    }

    public function setPhone($phone){
        $this->attributes['phone'] = $phone;
    }

    public function getAddress(){
        return $this->attributes['address'];
    }

    public function setAddress($address){
        $this->attributes['address'] = $address;
    }

    public function certificates(){
        return $this->hasMany(Certificate::class);
    }

    /*public function orders(){
        return $this->hasMany(Order::class);
    }*/

    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "phone" => "required|numeric|gt:0",
            "address" => "required"
        ]);
    }
}

?>