<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\Product::all();
        return view('user.dashboard', compact('data'));
    }

    public function show($id)
    {
        $order = \App\Models\Order::with('products')->findOrFail($id);
        return view('user.pesanan', compact('order'));
    }

    public function store(Request $request)
    {
        $order = new \App\Models\Order();
        $order->user_id = Auth::id();
        $order->save();

        foreach ($request->products as $productId => $quantity) {
            $product = \App\Models\Product::find($productId);
            if ($product && $quantity > 0) {
                $order->products()->attach($product, ['quantity' => $quantity]);
            }
        }

        return redirect('pesanan/', $order->id);
    }

}