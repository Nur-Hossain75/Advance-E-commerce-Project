<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class cartController extends Controller
{
    private $product;
    public function index(Request $request, $id)
    {
        if(request('qty')){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        $this->product = Product::find($id);
        ShoppingCart::add($this->product->id, $this->product->name, $qty, $this->product->selling_price, ['image' => $this->product->image, 'sub_category'=>$this->product->subCategory->name,'brand'=>$this->product->brand->name ]);
        return back()->with('message', 'Add Cart Product Successfully');
    }
    public function show()
    {
        return view('website.cart.index',['cart_products'=> ShoppingCart::all()]);
    }

    public function update(Request $request, $id)
    {
        ShoppingCart::update($id, $request->qty);
        return redirect('/cart-page')->with('message', 'Cart Product Update Successfully');
    }

    public function remove($id)
    {
        ShoppingCart::remove($id);
        return back()->with('message', 'Cart Product Remove Successfully');
    }   

}
