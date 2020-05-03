<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    //attributes id, product, totalPrice, quantity, order_id, created_at, updated_at
    protected $fillable = ['product_id','quantity','order_id'];

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
        return $product = Product::findOrFail($this->attributes['product_id']);
    }

    public function getProductAux(){
        return $this->attributes['product_id'];
    }

    public function setProduct($product){
        $this->attributes['product_id'] = $product;
    }

    public function getTotalPriceAux(){
        return $this->attributes['quantity'] * $this->attributes['product_id']->getPrice();
    }

    public function getTotalPrice(){
        $product = Product::findOrFail($this->attributes['product_id']);
        return $this->attributes['quantity'] * $product->getPrice();
    }

    public function setTotalPrice(){
        $product = Product::findOrFail($this->attributes['product_id']);
        $this->attributes['totalPrice'] = $product->getPrice() * $this->attributes['quantity'];
    }

    public function getQuantity(){
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity){
        $this->attributes['quantity'] = $quantity;
    }

    public function incrementQuantity($quantity){
        $this->attributes['quantity'] = $this->attributes['quantity'] + $quantity;
    }

    public function reduceQuantity(){
        $this->attributes['quantity'] = $this->attributes['quantity'] - 1;
    }
    
    public function order(){
        return $this->belongsto(Order::class);
    }

    public function getOrder() {
        return $this->attributes['order_id'];
    }

    public function setOrder($order_id) {
        $this->attributes['order_id'] = $order_id;
    }

    public static function validate(Request $request){
        $request->validate([
            "product" => "required",
            "quantity" => "required"
        ]);
    }
}
