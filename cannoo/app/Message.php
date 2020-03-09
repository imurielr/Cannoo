<?php

namespace App;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    //Atributos id, client, subject, date, message
    protected $fillable = ['id','client','subject','message'];

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

    public function getSubject() {
        return $this->attributes['subject'];
    }

    public function setSubject($subject) {
        $this->attributes['subject'] = $subject;
    }

    public function getMessage() {
        return $this->attributes['message'];
    }

    public function setMessage($message) {
        $this->attributes['message'] = $message;
    }

    public static function validate(Request $request) {
        $request->validate([
            "client" => "required",
            "subject" => "required | string ",
            "message" => "required | string "            
        ]);

    }
}
?>