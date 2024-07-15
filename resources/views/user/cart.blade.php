<!-- Modal Search Start -->
<div class="modal fade" id="searchCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keranjang Belanja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container mt-5">

                    @if (count($cart) > 0)
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/' . $item['product']['image_path']) }}"
                                                                alt="{{ $item['product']['name'] }}"
                                                                class="img-thumbnail" style="width: 100px;">
                                                        </td>
                                                        <td>
                                                            {{ $item['product']['name'] }}
                                                        </td>
                                                        <td>Rp. {{ number_format($item['price'], 2) }}</td>
                                                        <td>{{ $item['product']['quantity'] }}</td>
                                                        <td>Rp.
                                                            {{ number_format($item['price'] * $item['product']['quantity'], 2) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('cart.remove', $index) }}"
                                                                class="btn btn-sm btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ringkasan Belanja</h5>
                                        <p class="card-text">Total Harga: Rp. {{ number_format($totalPrice, 2) }}</p>
                                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Keranjang belanja Anda kosong.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
