<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makanan = \App\Models\Product::where('category_id', 1)->get();
        $minuman = \App\Models\Product::where('category_id', 2)->get();
        return view('home', compact('makanan', 'minuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = \App\Models\Kategori::get();
        return view('produk.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        \App\Models\Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
        ]);

        return redirect('product')->with('massage', 'Product Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = \App\Models\Product::find($id);
        return view('produk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = \App\Models\Product::find($id);
        $data->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
        ]);

        return redirect('product')->with('message', 'Berhasil!!');
    }

    public function order()
    {
        //    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        \App\Models\Product::find($id)->delete();
        return redirect('product')->with('massage', 'Product Berhasil');
    }
}