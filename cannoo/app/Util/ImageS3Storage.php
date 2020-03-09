<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage {
    public function store($request, $directory, $id){
        if($request->hasFile('profile_image')) {
            Storage::disk('s3')->put("{$id}.png",file_get_contents($request->file('profile_image')->getRealPath()));
        }
    }
}
