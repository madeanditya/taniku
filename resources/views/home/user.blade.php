@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="products my-5">
        <div class="user-product__header">
            <div class="user-product__header_img">
                <img src="https://avatars.dicebear.com/api/gridy/{{ $user->username }}.svg" alt="{{ $user->username }}">
            </div>
            <div class="user-product__header_content">
                <h3>{{ $user->username }}</h3>
                <div class="user-product__header_content___detail">
                    <p>{{ $user->email }}</p>
                    |
                    <p>{{ $user->phone_number }}</p>
                </div>
            </div>
        </div>
        <div class="user-product__wrapper mt-4">
            @if (count($products) != 0)
                @foreach ($products as $product)
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img src="img/tumbnail.png" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rp {{ $product->price }}</p>
                            <span><img src="https://avatars.dicebear.com/api/gridy/{{ $product->supplier }}.svg"
                                    alt="{{ $product->supplier }}">{{ $product->supplier }}</span>
                            <span><i class="fas fa-star"></i>{{ rand(30, 50) / 10 }} | Terjual
                                {{ rand(10, 100) }}</span>
                        </div>
                        <div class="button-group">
                            <a class="btn btn-success" href="/cart/store/{{ $product->id }}" role="button">+
                                Keranjang</a>
                            <a class="btn btn-outline-success" href="/cart/checkout/{{ $product->id }}"
                                role="button">Beli</a>
                            <a href="/wishlist/store/{{ $product->id }}" class="wishlist-btn"><i
                                    class="fas fa-heart"></i>Wishlist</a>
                        </div>
                    </div>
                    {{-- <div>{{ $product->name }}</div>
            <div>{{ $product->price }}</div>
            <div>{{ $product->description }}</div>
            <hr> --}}
                @endforeach
            @else
                <p>No item</p>
            @endif

        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
