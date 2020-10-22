<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Cart;

class CartController extends Controller
{


    public function printinvoice()
    {
        $user = auth()->user();
        // dd($user);

        $product = $user->products;
        // $p = $product->pluck('name');
        // dd($p);

        return view('print_invoice',compact('user','product'));
    }
    
    public function add_to_cart(Product $product)
    {
        $user_id = auth()->id();
        $product_id = $product->id;

        // ALREADY EXISTS PRODUCT AND USER ID

        $cart = Cart::where('user_id', $user_id)
                        ->where('product_id', $product_id);

        $productInCart = !!$cart->count();
        //dd($productInCart);

        if($productInCart){
            $item = $cart->first();
            $item->quantity += 1;

            //dd($item);
            $item->save();
            return back();
        }
        // NEW PRODUCT AND USER ID
        $cart = new Cart;
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->quantity = 1;
        //dd($cart);
        $cart->save();
        return back();
    }

    public function showproduct()
    {
        $user = auth()->user();
        
        return view('product.show_product',compact('user'));
    }

    public function remove(Product $product)
    {
        $cart = cart::find($product->id);
        dd($cart);
        $product_user->delete();

        return back();
    }


    public function demo()
    {

        // $user = auth()->User();

        // return view('demo',compact('user'));


        $user = auth()->User();
        //dd($user);
        foreach ($user->products as $role)
        {
            echo $role->name;
            echo $role->pivot->quantity;
        }
    }
}

