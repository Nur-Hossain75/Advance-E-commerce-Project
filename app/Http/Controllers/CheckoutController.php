<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('website.checkout.index');
    }
    
    public function newCashOrder(Request $request){
        return $request;
    }
}
