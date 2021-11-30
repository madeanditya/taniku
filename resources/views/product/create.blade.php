@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="content">
        <form action="/product/store" method="post" id="product-insertion-form">
            @csrf
            <h3>Input data produk</h3>
            <table>
                <tr>
                    <td><label for="name">Nama</label></td>
                    <td><input type="text" name="name" id="name" required></td>
                    @error('name')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="description">Deskripsi</label></td>
                    <td><textarea name="description" id="description" cols="25" rows="4" form="product-insertion-form" required></textarea></td>
                    @error('description')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="price">Harga</label></td>
                    <td><input type="text" name="price" id="price" required></td>
                    @error('price')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="stock">Stok</label></td>
                    <td><input type="text" name="stock" id="stock" required></td>
                    @error('stock')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                <tr>
                    <td><label for="category">Kategori</label></td>
                    <td>
                        <input list="categories" name="category" id="category" required>
                        <datalist id="categories">
                            <option value="daging">
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
                    <td><input type="text" name="weight" id="weight" required></td>
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