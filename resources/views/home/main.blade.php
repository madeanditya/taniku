@extends('layouts/main')

{{-- header --}}
@section('header')
@include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <h3>Content</h3>
    @foreach ($products as $product)
        <div>{{ $product->nama }}</div>
        <div>{{ $product->supplier }}</div>
        <div>{{ $product->harga }}</div>
        <div><a href="/">Tambah ke Keranjang Belanja</a></div>
        <div><a href="/">Pesan Sekarang</a></div>
        <div><a href="/">Tambah ke Daftar Keinginan</a></div>
        <hr>
    @endforeach
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection