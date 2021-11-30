@php
    var_dump($defaultAddress);
@endphp

@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="profile">
        <h3>Profile</h3>
        <div>{{ $user->username }}</div>
        <div>{{ $user->fullname }}</div>
        <div>{{ $user->email }}</div>
        <div>{{ $user->phone_number }}</div>
    </div>
    <hr>
    <div class="order">
        <h3>Cart</h3>
        <a href="/cart/checkout/">pesan sekarang</a>
    </div>
    <hr>
    <div class="products">
        @foreach ($suppliers as $supplier)
            <h3>Supplier: {{ $supplier->username }}</h3>
            @foreach ($products as $product)
                @if ($product->supplier == $supplier->username)
                    <div>{{ $product->name }}</div>
                    <div>{{ $product->price }}</div>
                    <div>{{ $product->description }}</div>
                    <div>{{ $product->supplier }}</div>
                    <div><a href="/cart/destroy/{{ $product->cart_id }}">delete</a></div>
                    <br>
                @endif
            @endforeach
        @endforeach
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection