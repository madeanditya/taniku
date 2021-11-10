@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="content">
        <form action="/product/update/{{ $product->id }}" method="post" id="product-insertion-form">
            @csrf
            <h3>Input data produk</h3>
            <table>
                <tr>
                    <td><label for="deskripsi">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" value="{{ $product->nama }}" required></td>
                    @error('nama')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="deskripsi">Deskripsi</label></td>
                    <td><textarea name="deskripsi" id="deskripsi" cols="25" rows="4" form="product-insertion-form" required>{{ $product->deskripsi }}</textarea></td>
                    @error('deskripsi')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" id="harga" value="{{ $product->harga }}" required></td>
                    @error('harga')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <input type="hidden" name="supplier" value="{{ $username }}">
            </table>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
@endsection