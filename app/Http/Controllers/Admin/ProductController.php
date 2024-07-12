<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = \App\Models\Product::all();
        return view('admin.produk.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = \App\Models\Category::get();
        return view('admin.produk.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke folder storage
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        \App\Models\Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'image_path' => $imageName,
        ]);

        return redirect(route('product.index'))->with('massage', 'Product Berhasil');
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
        $product = \App\Models\Product::find($id);
        $category = \App\Models\Category::all();
        return view('admin.produk.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = \App\Models\Product::find($id);

        if ($request->hasFile('image')) {
            // Hapus file lama
            if (file_exists(public_path('images/'.$data->image_path))) {
                unlink(public_path('images/'.$data->image_path));
            }
    
            // Unggah file baru
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        }

        $data->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'image_path' => $imageName,
        ]);

        return redirect(route('product.index'))->with('message', 'Berhasil!!');
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
        $data = \App\Models\Product::find($id);

        // Hapus file lama
        if (file_exists(public_path('images/'.$data->image_path))) {
            unlink(public_path('images/'.$data->image_path));
        }
        $data->delete();
        
        return redirect('product.index')->with('massage', 'Product Berhasil');
    }
}
