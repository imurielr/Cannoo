<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model {
    //attributes id, type, price, description, created_at, updated_at, likes
    protected $fillable = ['type','price','description','likes'];

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

    public function getLikes() {
        return $this->attributes['likes'];
    }

    public function setLikes($likes) {
        $this->attributes['likes'] = $likes;
    }

    public function addLike(){
        $this->attributes['likes'] = $likes+1;
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