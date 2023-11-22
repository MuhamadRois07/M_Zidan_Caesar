@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3 class="text-center my-4">Data produk</h3>
                    <hr>
                    <table class="table table-bordered">
                    <a href=" {{ route('tokobunga2s.create') }} " class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <thead>
                            <tr>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Harga Bunga</th>
                                <th scope="col">Gambar Bunga</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tokobunga2 as $tokobunga2)
                            <tr>
                                <td>{{ $tokobunga2->Nama }}</td>
                                <td>{{ $tokobunga2->stok }}</td>
                                <td>{{ $tokobunga2->Harga }}</td>
                                <td>
                                        @if($tokobunga2->image)
                                        <img src="{{ asset('storage/image/' . $tokobunga2->image) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;">

                                        @else
                                        <p>Tidak ada gambar yang tersedia</p>
                                        @endif
                                    
                                    </td>
                                <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                            action="{{ route('tokobunga2s.destroy', $tokobunga2->id) }}" method="POST">  
                                            <a href="{{ route('tokobunga2s.edit', $tokobunga2->id) }}" {{ $tokobunga2->id }} class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-danger">
                                        Data produk belum tersedia.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection