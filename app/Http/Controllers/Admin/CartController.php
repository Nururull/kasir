<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $totalPrice = array_sum(array_column($cart, 'price'));

        return view('user.pesanan', compact('cart', 'totalPrice'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        $cart[] = [
            'name' => $product->name,
        'category_id' ,
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'image_path',
            'product' => $product->name, 
            'price' => $product->price
        ];
        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove($index)
    {
        $cart = Session::get('cart', []);
        unset($cart[$index]);
        Session::put('cart', array_values($cart));

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        Session::forget('cart');
        return redirect()->route('products.index')->with('success', 'Checkout berhasil!');
    }
}
