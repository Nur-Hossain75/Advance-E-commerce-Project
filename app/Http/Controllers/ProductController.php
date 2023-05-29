<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index',[
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    public function getSubCategoryByCategory()
    {
        
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function create(Request $request)
    {
        Product::newProduct($request);
        return back()->with('message', 'Product Update Successfully');
    }

    public function manage()
    {
        return view('admin.product.manage');
    }

    public function edit()
    {
        return view('admin.product.edit');
    }
}
