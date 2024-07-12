@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Keranjang Belanja</h2>
    <ul class="list-group mb-3">
        @foreach($cart as $index => $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item['product'] }} - Rp {{ number_format($item['price'], 0, ',', '.') }}
                <a href="{{ route('cart.remove', $index) }}" class="btn btn-danger btn-sm">Hapus</a>
            </li>
        @endforeach
    </ul>
    <h4>Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</h4>
    <a href="{{ route('cart.checkout') }}" class="btn btn-success">Checkout</a>
</div>

@endsection