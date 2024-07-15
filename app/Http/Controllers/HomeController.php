<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // if (Auth::check())
        // {
        //     $category = Category::paginate(4);
        //     $selectedCategoryId = $request->query('category', 'all');

        //     if ($selectedCategoryId === 'all') {
        //         $product = Product::all();
        //     } else {
        //         $product = Product::where('category_id', $selectedCategoryId)->get();
        //     }

        //     $cart = Session::get('cart', []);
        //     $totalPrice = array_sum(array_map(function ($item) {
        //         return $item['price'] * $item['product']['quantity'];
        //     }, $cart));

        //     return view('home', compact('category', 'product', 'selectedCategoryId', 'cart', 'totalPrice'));

        // }

        $category = Category::paginate(4);
        $selectedCategoryId = $request->query('category', 'all');

        if ($selectedCategoryId === 'all') {
            $product = Product::all();
        } else {
            $product = Product::where('category_id', $selectedCategoryId)->get();
        }

        $cart = Session::get('cart', []);
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['product']['quantity'];
        }, $cart));

        // $user = Auth::user();
        // $cartItems = Cart::where('user_id', $user->id)->get();

        // $totalPrice = $cartItems->sum(function ($item) {
        //     return $item->price * $item->quantity;
        // });

        return view('home', compact('category', 'product', 'selectedCategoryId', 'cart', 'totalPrice'));
    }
}
