@extends('layouts.user')

@section('content')
<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5" style="margin-top: 100px">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Produk Kami</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill {{ $selectedCategoryId == 'all' ? 'active' : '' }}" href="{{ url('/products?category=all') }}">
                                <span class="text-dark" style="width: 130px;">All Product</span>
                            </a>
                        </li>
                        @foreach ($category as $item)
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill {{ $selectedCategoryId == $item->id ? 'active' : '' }}" href="{{ url('/products?category=' . $item->id) }}">
                                <span class="text-dark" style="width: 130px;">{{ $item->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($product as $item)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img width="150px" src="{{ asset('images/'.$item->image_path) }}" class="img-fluid rounded-top" alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $item->category->name }}</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{ $item->name }}</h4>
                                            <p>{{ $item->description }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($item->selling_price, 2) }}/ kg</p>
                                                {{-- <a href="{{ route('cart.add', $item->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </a> --}}
                                                <form action="{{ route('cart.add', $item->id) }}" method="POST" >
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1" min="1">
                                                    <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- Fruits Shop End-->
@endsection
