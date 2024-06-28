@extends('layouts.admin')

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

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#categoryDelete/{{ $item->id }}">
                                                Delete
                                            </button>

                                            {{-- MODAL HAPUS --}}
                                            <div class="modal fade" id="categoryDelete/{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-semibold poppins" id="exampleModalLabel">Hapus Data
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Data: 
                                                            <p class="text-primary fw-bold">
                                                                {{ $item->category }}
                                                            </p>
                                                            Apakah anda yakin data tersebut akan dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
