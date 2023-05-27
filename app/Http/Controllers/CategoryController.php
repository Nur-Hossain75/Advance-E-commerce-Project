<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    
    // crate image url function for query builder mathod:
    // public  function getImageUrl($request){
    //     $image     = $request->file('image');
    //     $imageName = time().'.'.$image->getClientOriginalName();
    //     $directory = 'upload/category-images/';
    //     $image->move($directory, $imageName);
    //     $imageUrl  = $directory.$imageName;
    //     return $imageUrl;
    // }
    public function create(Request $request)
    {
    //    data send to database by usin query builder mathod:
    //     DB::table('categories')->insert([
    //         'name'          => $request->name,
    //         'description'   => $request->description,
    //         'image'         => $this->getImageUrl($request),
    //         'status'        => $request->status, 
    //    ]);

       Category::newCategory($request);
       return back()->with('message', 'Category info create successfully');
    }

    public function manage()
    {
         // send data to manage page using query builder mathod:
        // return view('admin.category.manage',['categorise'=>DB::table('categories')->get()]);   
        return view('admin.category.manage',['categorise'=> Category::all()]);   
    }

    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return  redirect('/category/manage')->with('message','Category Update Successfully.');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return  back()->with('message','Delete Update Successfully.');
    }
}
