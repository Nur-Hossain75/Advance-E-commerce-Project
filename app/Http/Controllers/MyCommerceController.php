<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class myCommerceController extends Controller
{
    public function index()
    {
        return view('website.home.index',[
            'products'      => Product::orderBy('id','desc')->take('8')->get(['id','sub_category_id','category_id','name','selling_price','image']),
            'subCategorise' => SubCategory::all(),
        ]);
    }

    public function category($id)
    {
        if ($id != 0) {
            return view('website.category.index',[
                'products' => Product::where('category_id', $id)->orderBy('id','desc')->get(),
            ]);
        }
        else{
            return view('website.category.index',[
            'products' => Product::orderBy('id','desc')->get(),
        ]);
        }
        
    }

    public function detail()
    {
        return view('website.detail.index');
    }
    
    
}
