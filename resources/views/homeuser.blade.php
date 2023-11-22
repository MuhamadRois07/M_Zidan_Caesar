@extends('layouts.app1')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3 class="text-center my-4">Data Bunga</h3>
                    <hr>
                    <table class="table table-bordered">
                   
                        <thead>
                            <tr>
                                <th scope="col">Nama Bunga</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tokobunga2 as $tokobunga2)
                            <tr>
                                <td>{{ $tokobunga2->Nama }}</td>
                                <td>{{ $tokobunga2->JumlahProduk }}</td>
                                <td>{{ $tokobunga2->Harga }}</td>
                                <td>
                                        @if($tokobunga2->image)
                                        <img src="{{ asset('storage/image/' . $tokobunga2->image) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;">

                                        @else
                                        <p>Tidak ada gambar yang tersedia</p>
                                        @endif
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