<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category,$image, $imageName, $directory, $imageUrl;

    public static function getImageUrl($request){
        self::$image     = $request->file('image');
        self::$imageName = time().'.'.self::$image->getClientOriginalName();
        self::$directory = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl  = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newCategory($request)
    {
        self::$category = new Category();

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if($request->file('image')){
            if(file_exists( self::$category->image)){
                unlink( self::$category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$category->image;
        }
        self::$category->image=  self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();

    }

    public static function deleteCategory($id){
        self::$category = Category::find($id);
        if(file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subCategorise()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
