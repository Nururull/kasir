@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Daftar Produk</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
