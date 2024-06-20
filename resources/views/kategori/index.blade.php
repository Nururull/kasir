@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Kategori
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-end">Add Kategori</a>
            </h3>
        </div>
        <div class="card-body">
            <!-- Menu Masakan -->
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-4 mx-auto m-2">
                        <div class="card">
                            <h5 class="card-header bg-info">{{ $item->nama }}</h5>
                            <div class="card-body">
                                <table class="table table-striped table-responsive-sm">
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td class="card-text">{{ $item->category }}</td>
                                    </tr>
                                    <tr>
                                        <td>Aksi</td>
                                        <td>:</td>
                                        <td class="card-text">
                                            <a class="btn btn-warning" href="{{ route('category.edit', ['category' => $item->id]) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
