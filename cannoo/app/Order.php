<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    //attributes id, client, animals, items, confirmed, totalPrice, payment, created_at, updated_at
    protected $fillable = ['client','payment'];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getClient(){
        return $this->attributes['client'];
    }

    public function setClient($client){
        $this->attributes['client'] = $client;
    }

    public function getAnimals(){
        return $this->attributes['animals'];
    }

    public function setAnimals(Array $animal){
        $this->attributes['animals'] = $animals;
    }

    public function addAnimal($animal) {
        array_push($this->attributes['animals'], $animal);
    }
    
    public function animals(){
        return $this->hasMany(Animal::class);
    }
    
    public function items(){
        return $this->hasMany(Item::class);
    }

    public function getItems(){
        return $this->attributes['items'];
    }

    public function setItems(Array $items){
        $this->attributes['items'] = $items;
    }

    public function addItem($item) {
        array_push($this->attributes['items'], $item);
    }
    
    public function getConfirmed(){
        return $this->attributes['confirmed'];
    }

    public function setConfirmed($confirmed){
        $this->attributes['confirmed'] = $confirmed;
    }

    public function getTotalPrice(){
        return $this->attributes['totalPrice'];
    }
    
    public function setTotalPrice($totalPrice){
        $this->attributes['totalPrice'] = $totalPrice;
    }

    public function getPayment(){
        return $this->attributes['payment'];
    }
    
    public function setPayment($payment){
        $this->attributes['payment'] = $payment;
    }

    public static function validate(Request $request){
        $request->validate([
            "payment" => "required"
        ]);
    }
}
