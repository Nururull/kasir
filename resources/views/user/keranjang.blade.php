@extends('layouts.app')

@section('content')

<div class="row">
    <!-- Daftar Produk -->
    <div class="col-md-6">
        <h2>Daftar Produk</h2>
        <ul class="list-group" id="product-list">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Produk 1
                <button class="btn btn-primary btn-sm" onclick="addToCart('Produk 1', 10000)">Tambah</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Produk 2
                <button class="btn btn-primary btn-sm" onclick="addToCart('Produk 2', 15000)">Tambah</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Produk 3
                <button class="btn btn-primary btn-sm" onclick="addToCart('Produk 3', 20000)">Tambah</button>
            </li>
        </ul>
    </div>

    <!-- Keranjang Belanja -->
    <div class="col-md-6">
        <h2>Keranjang Belanja</h2>
        <ul class="list-group" id="cart-list"></ul>
        <div class="mt-3">
            <h4>Total: Rp <span id="total-price">0</span></h4>
            <button class="btn btn-success" onclick="checkout()">Checkout</button>
        </div>
    </div>
</div>
@endsection