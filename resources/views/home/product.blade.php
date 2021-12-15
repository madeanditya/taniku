@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <br><br>
    <div class="product">
        <div align=”middle” class="biodata-img"><br>
            <img src="{{ asset('img/tumbnail.png') }}" alt="taniku">
        </div>
        <div class="biodata-wrapper">
            <div class="biodata-detail">
                <div class="biodata-detail__content">
                    <div class="biodata-detail__content___value">
                        <table border="0" cellpadding=10 cellspacing=15 align="center">
                            <tr>
                                <td><h4>Deatail</h4></td>
                                <td><h4>Product</h4></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Nama Product:</p></td>
                                <td><p>{{ $product->name }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Deskripsi:</p></td>
                                <td><p align="justify">{{ $product->description }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Harga:</p></td>
                                <td><p>{{ $product->price }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Stock:</p></td>
                                <td><p>{{ $product->stock}}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Kategori:</p></td>
                                <td><p>{{ $product->category}}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Berat:</p></td>
                                <td><p>{{ $product->weight}}</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>Supplier:</p></td>
                                <td><p>{{ $product->supplier }}</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
