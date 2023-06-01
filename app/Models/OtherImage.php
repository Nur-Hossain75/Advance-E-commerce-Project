<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage, $imageName, $directory, $imageUrl;

    public static function getImageUrl($image){

        self::$imageName = time().'.'.rand(1, 50000).'.'.$image->getClientOriginalExtension();
        self::$directory = 'upload/product-other-images/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl  = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newOtherImage($images, $id){
        foreach($images as $image){
            self::$otherImage = new OtherImage();

            self::$otherImage->product_id = $id;
            self::$otherImage->image = self::getImageUrl($image);
            self::$otherImage->save();
        }
    }
}
