<!-- Modal Search Start -->
<div class="modal fade" id="searchCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container mt-5">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->