<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Animal as AnimalResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Animal;

class AnimalApi extends Controller
{
    public function index()
    {
        return AnimalResource::collection(Animal::orderBy('likes', 'desc')->take(5)->get());
    }

}
