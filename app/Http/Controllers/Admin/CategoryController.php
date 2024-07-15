<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = \App\Models\Category::all();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\Category::create([
            'name' => $request->name,
        ]);

        return redirect(route('category.index'))->with('massage', 'Category Berhasil');
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
        $category = \App\Models\Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $data = \App\Models\Category::find($id);
        $data->update([
            'category' => $request->category,
        ]);

        return redirect('category.index')->with('success', 'Category Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = \App\Models\Category::find($id);
        // Periksa apakah kategori memiliki produk yang terkait
        if ($category->product()->count() > 0) {
            return redirect()->route('category.index')->with('error', 'Kategori tidak bisa dihapus karena masih terkait dengan produk.');
        }

        $category->delete();
        return redirect('category.index')->with('success', 'Kategori Berhasil dihapus');
    }
}
