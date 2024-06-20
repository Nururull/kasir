@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-3 mt-2">
            <h3>Product
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-end">+ Add Product</a>
            </h3>
        </div>
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h1>Makanan</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Descripsi</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Quality</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($makanan as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                    @if ($item->quantity <= 10)
                                    <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $item->id]) }}">
                                        Update
                                    </a>
                                    @else
                                    {{ $item->quantity }}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $item->id]) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Minuman</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Descripsi</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($minuman as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                    @if ($item->quantity == 10)
                                    <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $item->id]) }}">
                                        Edit
                                    </a>
                                    @else
                                    {{ $item->quantity }}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $item->id]) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
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
@endsection
