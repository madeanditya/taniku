@extends('layouts/main')

{{-- header --}}
@section('header')
@include('partitions/navbar')
@endsection

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
                {{-- <tr>
                    <td><label for="restock">Restock</label></td>
                    <td>
                        <select name="kategori" id="kategori">
                            <option value="harian">Harian</option>
                            <option value="harian">Mingguan</option>
                            <option value="harian">Bulanan</option>
                            <option value="harian">Tahunan</option>
                        </select>
                    </td>
                </tr> --}}
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" id="harga" value="{{ $product->harga }}" required></td>
                    @error('harga')
                    <td class="error-message">{{ $message }}</td>
                    @enderror
                </tr>
                {{-- <tr>
                    <td>Kategori</td>
                    <td>
                        <input type="checkbox" id="sayuran" name="sayuran" value="sayuran">
                        <label for="sayuran">Sayuran</label>
                        <input type="checkbox" id="buah-buahan" name="buah-buahan" value="buah-buahan">
                        <label for="buah-buahan">Buah-buahan</label>
                        <input type="checkbox" id="biji-bijian" name="biji-bijian" value="biji-bijian">
                        <label for="biji-bijian">Biji-bijian</label>
                        <input type="checkbox" id="bibit" name="bibit" value="bibit">
                        <label for="bibit">Bibit</label>
                        <input type="checkbox" id="olahan" name="olahan" value="olahan">
                        <label for="olahan">Olahan</label>
                    </td>
                </tr> --}}
            </table>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
@endsection