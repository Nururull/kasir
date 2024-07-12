@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Tambah Data Masakan</h1>
        <a class="btn btn-success fw-bold" href="index.php">Kembali</a>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="table-responsive-md my-3">
                <table class="table">
                    <tr>
                        <td><label for="nama">Nama Barang</label></td>
                        <td>:</td>
                        <td><input autocomplete="off" type="text" name="name" id="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Pilih Kategori</label></td>
                        <td>:</td>
                        <td>
                            <select name="category_id" class="form-control">
                                @foreach ($category as $item)
                                <option value="{{ $item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Deskripsi</label></td>
                        <td>:</td>
                        <td><textarea name="description" id="description" cols="23" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="original_price">Harga Beli</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="original_price" id="original_price" required></td>
                    </tr>
                    <tr>
                        <td><label for="selling_price">Harga Jual</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="selling_price" id="selling_price" required></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Stok</label></td>
                        <td>:</td>
                        <td><input min="0" type="number" name="quantity" id="quantity" required></td>
                    </tr>
                    <tr>
                        <td><label for="gambar">Masukkan Gambar</label></td>
                        <td>:</td>
                        <td><input type="file" name="image" id="gambar" required></td>
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
