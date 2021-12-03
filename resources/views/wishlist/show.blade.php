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

    <div class="products">
        @foreach ($suppliers as $supplier)
            <span class="cart-supplier__header"><img
                    src="https://avatars.dicebear.com/api/gridy/{{ $supplier->username }}.svg"
                    alt="{{ $supplier->username }}">{{ $supplier->username }}</span>
            <div class="wishlist-card-wrapper mt-4">
                @foreach ($products as $product)
                    @if ($product->supplier == $supplier->username)
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('img/tumbnail.png') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rp {{ $product->price }}</p>
                                <span><img src="https://avatars.dicebear.com/api/gridy/{{ $supplier->username }}.svg"
                                        alt="{{ $supplier->username }}">{{ $product->supplier }}</span>
                                <span><i class="fas fa-star"></i>{{ rand(30, 49) / 10 }} | Terjual
                                    {{ rand(10, 100) }}</span>
                            </div>
                            <div class="button-group">
                                <a class="btn btn-success" href="/cart/store/{{ $product->id }}" role="button">+
                                    Keranjang</a>
                                <a class="btn btn-outline-danger" href="/wishlist/destroy/{{ $product->wishlist_id }}"
                                    role="button">Hapus</a>
                            </div>
                        </div>
                        {{-- <div>{{ $product->name }}</div>
                    <div>{{ $product->price }}</div>
                    <div>{{ $product->description }}</div>
                    <div>{{ $product->supplier }}</div>
                    <div><a href="/">Pesan Sekarang</a></div>
                    <div><a href="/cart/store/{{ $product->id }}">Tambah ke Keranjang Belanja</a></div>
                    <div><a href="/wishlist/destroy/{{ $product->wishlist_id }}">delete</a></div>
                    <br> --}}
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
