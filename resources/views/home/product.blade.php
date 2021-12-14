@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="product">
        <div>name: {{ $product->name }}</div>
        <div>descrption: {{ $product->description }}</div>        
        <div>price: {{ $product->price }}</div>
        <div>stock: {{ $product->stock }}</div>
        <div>category: {{ $product->category }}</div>
        <div>weight: {{ $product->weight }}</div>
        <div>supplier: {{ $product->supplier }}</div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
