<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category = Category::paginate(4);
        $selectedCategoryId = $request->query('category', 'all');

        if ($selectedCategoryId === 'all') {
            $product = Product::all();
        } else {
            $product = Product::where('category_id', $selectedCategoryId)->get();
        }

        return view('home', compact('category', 'product', 'selectedCategoryId'));
    }
}
