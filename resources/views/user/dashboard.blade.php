@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        @foreach ($makanan as $item)
        <div class="card" style="width: 18rem;">
            <img width="100px" src="{{ asset('images/'.$item->image_path) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        @endforeach
    </div>

@endsection
