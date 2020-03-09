<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($request, $directory, $id){
        if($request->hasFile('image')) {
            Storage::disk('public')->put("uploads/{$directory}/{$id}.png",file_get_contents($request->file('image')->getRealPath()));
        }
    }
}
