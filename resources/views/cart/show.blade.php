@php
// var_dump($products);
$totalPrice = 0;

if (count($products) != 0) {
    foreach ($products as $product) {
        $totalPrice = $totalPrice + $product->price;
    }
}
@endphp

@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    {{-- <div class="profile">
        <h3>Profile</h3>
        <div>{{ $user->username }}</div>
        <div>{{ $user->fullname }}</div>
        <div>{{ $user->email }}</div>
        <div>{{ $user->phone_number }}</div>
    </div>
    <hr> --}}
    <div class="row justify-content-center mt-5">
        <div class="products col-9">
            @if (count($products) == 0)
                <div class="empty-cart">
                    <img src="{{ asset('img/taniku.png') }}" alt="taniku">
                    <h3>Keranjangmu kosong</h3>
                    <span>Tengkulak no Taniku yes!</span>
                    <a class="btn btn-success" href="/" role="button">Belanja sekarang</a>
                </div>
            @endif
            @foreach ($suppliers as $supplier)
                <h3 class="mb-5 fw-bold">Cart</h3>
                <span class="cart-supplier__header"><img
                        src="https://avatars.dicebear.com/api/gridy/{{ $supplier->username }}.svg"
                        alt="{{ $supplier->username }}">{{ $supplier->username }}</span>
                @foreach ($products as $product)
                    @if ($product->supplier == $supplier->username)
                        <div class="row mt-4 cart-item-card">
                            <div class="col-3 cart-img-wrapper">
                                <img src="{{ asset('img/tumbnail.png') }}" alt="{{ $product->name }}">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col cart-item-content">
                                        <p>{{ $product->name }}</p>
                                        <span>Rp. {{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center">
                                <a href="/cart/destroy/{{ $product->cart_id }}" class="delete-cart-item__btn"><i
                                        class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>

                    @endif
                @endforeach
                <hr class="supplier-splitter">
            @endforeach
        </div>
        @if (count($products) != 0)
            <div class="col-3">
                <div class="order">
                    <h5 class="mb-4">Total belanja</h5>
                    <div class="cart-label__wrapper">
                        <p>Total item</p>
                        <p>{{ count($products) }}</p>
                    </div>
                    <div class="cart-label__wrapper">
                        <p>Total price</p>
                        <p>Rp {{ $totalPrice }}</p>
                    </div>
                    <a class="btn btn-success" href="/cart/checkout/" role="button">Pesan sekarang</a>
                </div>
            </div>
        @endif
    </div>

@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
