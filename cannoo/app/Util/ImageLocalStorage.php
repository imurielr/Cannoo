<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($request, $id){
        if($request->hasFile('image')) {
            Storage::disk('public')->put("uploads/{$id}",file_get_contents($request->file('image')->getRealPath()));
        }
    }
}
