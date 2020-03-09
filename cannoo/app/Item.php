<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    //attributes id, product, quantity, created_at, updated_at
    protected $fillable = ['product','quantity'];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getProduct(){
        return $this->attributes['product'];
    }

    public function setProduct($product){
        $this->attributes['product'] = $product;
    }

    public function getQuantity(){
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity){
        $this->attributes['quantity'] = $quantity;
    }
    
    public function order(){
        return $this->belongsto(Order::class);
    }

    public static function validate(Request $request){
        $request->validate([
            "product" => "required",
            "quantity" => "required"
        ]);
    }
}
