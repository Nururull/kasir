@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Product
                            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-end">+ Add Product</a>
                        </h1>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <!-- Form Pencarian -->
                                <form action="{{ route('products.search') }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('GET')
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control"
                                            placeholder="Search for products">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Tombol Export -->
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Descripsi</th>
                                            <th scope="col">Harga Beli</th>
                                            <th scope="col">Harga Jual</th>
                                            <th scope="col">Quality</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td><img width="100px" src="{{ asset('images/' . $item->image_path) }}"
                                                        alt="gambar"></td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>Rp. {{ number_format($item->original_price, 2) }}</td>
                                                <td>Rp. {{ number_format($item->selling_price, 2) }}</td>
                                                <td>
                                                    @if ($item->quantity <= 10)
                                                        <a class="btn btn-warning"
                                                            href="{{ route('product.edit', ['product' => $item->id]) }}">
                                                            Update
                                                        </a>
                                                    @else
                                                        {{ $item->quantity }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productShow{{ $item->id }}">
                                                        Detail
                                                    </a>

                                                    <a class="btn btn-warning"
                                                        href="{{ route('product.edit', ['product' => $item->id]) }}">
                                                        Edit
                                                    </a>

                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#productDelete{{ $item->id }}">
                                                        Delete
                                                    </button>

                                                    {{-- MODAL HAPUS --}}
                                                    <div class="modal fade" id="productDelete{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title fw-semibold poppins"
                                                                        id="exampleModalLabel">Hapus Data
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Data:
                                                                    <p class="text-primary fw-bold">
                                                                        {{ $item->name }}
                                                                    </p>
                                                                    Apakah anda yakin data tersebut akan dihapus?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form
                                                                        action="{{ route('product.destroy', $item->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- MODAL SHOW --}}
                                                    <div class="modal fade" id="productShow{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-md modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title fw-semibold poppins"
                                                                        id="exampleModalLabel">Detail ProduK
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body pe-0">
                                                                    <div class="table-responsive row col-12">
                                                                        <table>
                                                                            <tr class="border-bottom">
                                                                                <div class="text-center mb-3">
                                                                                    <img class="profile-user-img img-fluid img-circle"
                                                                                        width="200px"
                                                                                        src="{{ asset('images/' . $item->image_path) }}"
                                                                                        alt="User profile picture">
                                                                                </div>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Nama Lengkap</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->name }}</td>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Kategori</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->category->name }}</td>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Description</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->description }}</td>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Harga Beli</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->original_price }}</td>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Harga Jual</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->selling_price }}</td>
                                                                            </tr>
                                                                            <tr class="border-bottom">
                                                                                <td class="fw-bold">Stok</td>
                                                                                <td style="width: 1px;">:</td>
                                                                                <td>{{ $item->quantity }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('product.edit', ['product' => $item->id]) }}"
                                                                        type="button" class=" btn btn-primary">
                                                                        Edit
                                                                    </a>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
