<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;
    public function checkout()
    {
        return view('website.checkout.index');
    }
    
    public function newCashOrder(Request $request){
        $this->customer = new Customer();

        $this->customer->name     = $request->name;
        $this->customer->email    = $request->email;
        $this->customer->mobile   = $request->mobile;
        $this->customer->password = bcrypt($request->mobile);

        $this->customer->save();

        $this->order = new Order();

        $this->order->customer_id      = $this->customer->id;
        $this->order->order_date       = date('Y-m-d');
        $this->order->order_timestamp  = strtotime(date('Y-m-d'));
        $this->order->order_total      = Session::get('order_total');
        $this->order->tax_total        = Session::get('tax_total');
        $this->order->shipping_total   = Session::get('shipping_total');
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_type     = $request->payment_type;

        $this->order->save();

        foreach(ShoppingCart::all() as $item){
            $this->orderDetail = new OrderDetail();

            $this->orderDetail->order_id      = $this->order->id;
            $this->orderDetail->product_id    = $item->id;
            $this->orderDetail->product_name  = $item->name;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty   = $item->qty;

            $this->orderDetail->save();
        }

        return redirect('/complete-order')->with('message','Congratulation... Your order info post Successfully. Please wait. We will contact with you very soon.');
    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
