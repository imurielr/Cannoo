<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    //attributes id, client, animals, items, confirmed, totalPrice, payment, created_at, updated_at
    protected $fillable = ['client','animals','items','payment'];

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
    
    public function animals(){
        return $this->hasMany(Animal::class);
    }
    
    public function items(){
        return $this->hasMany(Item::class);
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
            "client" => "required",
            "animals" => "required",
            "items" => "required",
            "payment" => "required"
        ]);
    }
}
