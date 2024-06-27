@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        @foreach ($makanan as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/'.$item->image_path) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <p class="card-text text-">{{ $item->selling_price }}</p>
              <p class="card-text"><del>{{ $item->original_price }}</del></p>
              <a href="#" class="btn btn-primary">Pemasaran</a>
            </div>
          </div>
        @endforeach
        @foreach ($minuman as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/'.$item->image_path) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <p class="card-text">{{ $item->selling_price }}</p>
              <p class="card-text"><del>{{ $item->original_price }}</del></p>
              <a href="#" class="btn btn-primary">Pemasaran</a>
            </div>
          </div>
        @endforeach
    </div>

@endsection
