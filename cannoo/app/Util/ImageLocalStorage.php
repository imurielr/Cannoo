<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($request, $id){
        if($request->hasFile('profile_image')) {
            Storage::disk('public')->put("{$id}.png",file_get_contents($request->file('profile_image')->getRealPath()));
        }
    }
}
