<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $makanan = \App\Models\Product::where('category_id', 1)->get();
        $minuman = \App\Models\Product::where('category_id', 2)->get();
        return view('home', compact('makanan', 'minuman'));
    }
}
