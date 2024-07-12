@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Riwayat Pesanan</h1>

    @if (count($orders) > 0)
        @foreach ($orders as $order)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                    <p class="card-text">Total Harga: Rp. {{ number_format($order->total_price, 2) }}</p>
                    <p class="card-text">Tanggal Pesanan: {{ $order->created_at->format('d M Y H:i') }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->product as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp. {{ number_format($item->price, 2) }}</td>
                                    <td>Rp. {{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Pesanan</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info" role="alert">
            Anda belum memiliki riwayat pesanan.
        </div>
    @endif
</div>
@endsection
