<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model {
    //attributes id, type, price, description, created_at, updated_at
    protected $fillable = ['type','price','description'];

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

    public function getPrice() {
        return $this->attributes['price'];
    }
    
    public function setPrice($price) {
        $this->attributes['price'] = $price;
    }
    
    public function getDescription() {
        return $this->attributes['description'];
    }

    public function setDescription($description) {
        $this->attributes['description'] = $description;
    }

    public static function validate(Request $request) {
        $request->validate([
            "type" => "required",
            "price" => "required | numeric | gt:0",
            "description" => "required",
            "image" => "required"
        ]);
    }

}