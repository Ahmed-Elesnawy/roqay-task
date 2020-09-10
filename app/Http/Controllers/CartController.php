<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.cart.index',[
            'items' => Cart::session(authUser()->id)->getContent()
        ]);
    }


    public function addToCart(Product $product)
    {
        Cart::session(authUser()->id)->add([
            
            'id'       => $product->id,
            'name'     => $product->name,
            'price'    => $product->price,
            'quantity' => 1
        ]);

        return back();
    }

    public function clearItem($id)
    {
        Cart::session(authUser()->id)->remove($id);

        return back();
    }


    public function clearCart()
    {
        Cart::session(authUser()->id)->clear();

        return back();
    }
}
