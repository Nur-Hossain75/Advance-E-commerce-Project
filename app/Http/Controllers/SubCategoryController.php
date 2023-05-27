<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',['categories' => Category::all()]);
    }
    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message','Add Sub Category Successfully');
    }

    public function manage()
    {
        return view('admin.sub-category.manage',['subCategories' => SubCategory::all()]);
    }

    public function edit($id)
    {
        return view('admin.sub-category.edit',[
            'subCategory' => SubCategory::find($id), 
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category/manage')->with('message','Sub CAtegory Update Successfuly');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message','Sub Category Delete Successfully.');
    }
}
