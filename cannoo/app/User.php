<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'phone', 'address', 'city'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    public function certificates(){
        return $this->hasMany(Certificate::class);
    }

    public function getId() {
        return $this->attributes['id'];
    }

    public function setId($id) {
        $this->attributes['id'] = $id;
    }
    
    public function getName() {
        return $this->attributes['name'];
    }

    public function setName($name) {
        $this->attributes['name'] = $name;
    }
    
    public function getEmail() {
        return $this->attributes['email'];
    }

    public function setEmail($email) {
        $this->attributes['email'] = $email;
    }

    public function getRole() {
        return $this->attributes['role'];
    }

    public function setRole($role) {
        $this->attributes['role'] = $role;
    }

    public function hasRole($role) {
        return $this->getRole() === $role;
    }

    public function getPhone() {
        return $this->attributes['phone'];
    }

    public function setPhone($phone) {
        $this->attributes['phone'] = $phone;
    }
    public function getAddress() {
        return $this->attributes['address'];
    }

    public function setAddress($address) {
        $this->attributes['address'] = $address;
    }

    public function getCity() {
        return $this->attributes['city'];
    }

    public function setCity($city) {
        $this->attributes['city'] = $city;
    }
}
