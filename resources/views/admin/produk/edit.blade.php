@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Tambah Data Masakan</h1>
        <a class="btn btn-success fw-bold" href="{{ URL('product') }}">Kembali</a>
        <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="table-responsive-md my-3">
                <table class="table">
                    <tr>
                        <td><label for="nama">Nama Barang</label></td>
                        <td>:</td>
                        <td><input autocomplete="off" type="text" name="name" id="nama" value="{{ $product->name }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="category_id">Pilih Kategori</label></td>
                        <td>:</td>
                        <td>
                            <select name="category_id" id="category_id">
                                <option value="">Pilih Kategori</option>
                                @foreach($category as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Deskripsi</label></td>
                        <td>:</td>
                        <td><textarea name="description" id="description" cols="23" value="{{ $product->description }}" required>{{ $product->description }}</textarea></td>
                    </tr>
                    <tr>
                        <td><label for="original_price">Harga Beli</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="original_price" id="original_price" value="{{ $product->original_price }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="selling_price">Harga Jual</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="selling_price" id="selling_price"value="{{ $product->selling_price }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Stok</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="gambar">Gambar</label></td>
                        <td>:</td>
                        <td>
                            <img width="150px" src="{{ asset('images/'.$product->image_path) }}" alt="">
                            <input type="file" name="image" id="gambar" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary">Tambah</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
@endsection