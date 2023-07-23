<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use ShoppingCart;
use DB;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetail;

    public static function newOrderDetail($orderId){
        // dd(ShoppingCart::all());
        foreach(ShoppingCart::all() as $item){
            self::$orderDetail = new OrderDetail();

            self::$orderDetail->order_id      = $orderId;
            self::$orderDetail->product_id    = $item->id;
            self::$orderDetail->product_name  = $item->name;
            self::$orderDetail->product_price = $item->price;
            self::$orderDetail->product_qty   = $item->qty;

            self::$orderDetail->save();
            // dd(self::$orderDetail->product_id);
            $itemInfo = Product::where('id', self::$orderDetail->product_id)->first();
            // dd($itemInfo);
            $update = Product::where('id', $itemInfo->id)->update(['stock_amount'=> $itemInfo->stock_amount - self::$orderDetail->product_qty]);
            // // dd(self::$orderDetail->product_id);
            // $itemInfo = DB::table('products')->where('id', self::$orderDetail->product_id)->first();
            // // dd($itemInfo);
            // $update = DB::table('products')->where('id', $itemInfo->id)->update(['stock_amount'=> $itemInfo->stock_amount - self::$orderDetail->product_qty]);
            ShoppingCart::remove($item->__raw_id);
        }
    }
}
