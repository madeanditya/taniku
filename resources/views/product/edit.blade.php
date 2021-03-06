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
                    <td><label for="name">Nama</label></td>
                    <td><input type="text" name="name" id="name" value="{{ $product->name }}" required></td>
                    @error('name')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="description">Deskripsi</label></td>
                    <td><textarea name="description" id="description" cols="25" rows="4" form="product-insertion-form" required>{{ $product->description }}</textarea></td>
                    @error('description')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="price" id="price" value="{{ $product->price }}" required></td>
                    @error('price')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="stock">Stok</label></td>
                    <td><input type="text" name="stock" id="stock" value="{{ $product->stock }}" required></td>
                    @error('stock')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="category">Kategori</label></td>
                    <td>
                        <input list="categories" name="category" id="category" value="{{ $product->category }}">
                        <datalist id="categories">
                            <option value="buah-buahan">
                            <option value="sayur-sayuran">
                            <option value="biji-bijian">
                            <option value="umbi-umbian">
                            <option value="rempah-rempah">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><input type="text" name="weight" id="weight" value="{{ $product->weight }}" required></td>
                    @error('weight')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <input type="hidden" name="supplier" value="{{ auth()->user()->username }}">
            </table>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection