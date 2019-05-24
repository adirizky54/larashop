<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products;
use App\ShoppingCart;

class CartController extends Controller
{
    public function index()
    {
        if(Session::get('login')) {
            $userId = Session::get('id');
            $data['cart'] = \Cart::session($userId)->getContent();
            $data['subtotal'] = \Cart::session($userId)->getSubTotal();
            $data['total'] = \Cart::session($userId)->getTotal();
            $data['status'] = \Cart::session($userId)->isEmpty();
            // \Cart::session($userId)->clear();

            return view('cart', $data);
        } else {
            return redirect()->route('home');
        }
    }

    public function addCart(Request $request)
    {
        $product = Products::find($request->products_id);
        \Cart::session($request->users_id)->add(array(
            'id' => $product->id, 
            'name' => $product->name, 
            'price' => $product->price, 
            'quantity' => $request->qty,
            'attributes' => array(
                'image' => $product->image
            )
        ));

        return redirect()->route('cart');
    }

    public function updateCart(Request $request)
    {
        $userId = Session::get('id');
        \Cart::session($userId)->update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));

        return redirect()->route('cart');
    }

    public function removeCart($id)
    {
        $userId = Session::get('id');
        \Cart::session($userId)->remove($id);
        
        return redirect()->route('cart');
    }
}
