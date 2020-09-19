<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'stock' => $product->stock,
                'image' => $product->image
            ),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartProducts = \Cart::session(auth()->id())->getContent()->sortBy('name');

        return view('partials.cart.index',compact('cartProducts'));
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    public function update(Request $request, $itemId)
    {
        \Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => $request->input('quantity'),
            ),
        ]);
        
        return back();
    }

    public function checkout()
    {
        return view('partials.cart.checkout');
    }
}
