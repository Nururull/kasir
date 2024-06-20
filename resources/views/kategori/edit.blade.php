@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Data Kategori</h1>
        <a class="btn btn-success fw-bold" href="index.php">Kembali</a>
        <form action="{{ route('category.update', ['category' => $data->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="table-responsive-md my-3">
                <table class="table">
                    <tr>
                        <td><label for="nama">Nama Kategori</label></td>
                        <td>:</td>
                        <td><input autocomplete="off" type="text" name="category" id="nama" value="{{ $data->category }}" required></td>
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
