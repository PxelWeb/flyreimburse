<?php 


namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait{


    public function uploadImage(Request $request,$fileName,$path){
        if($request->hasFile($fileName)){
            $image = $request->{$fileName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$ext;
            Storage::disk('public')->putFileAs($path,$image,$imageName);
            return $path.'/'.$imageName;
        }
    }


    public function uploadMultipleImage(Request $request,$fileName,$path){

        $imagePaths = [];
        if($request->hasFile($fileName)){
            $images = $request->{$fileName};
            foreach($images as $image){
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_'.uniqid().'.'.$ext;
                Storage::disk('public')->putFileAs($path,$image,$imageName);
                $imagePaths[] = $path.'/'.$imageName;
            }
            return $imagePaths;
        }
    }
}