@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')


    <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/b1.jpg" class="d-block w-100" alt="asd">
            </div>
            <div class="carousel-item">
                <img src="img/b2.jpg" class="d-block w-100" alt="asd">
            </div>
            <div class="carousel-item">
                <img src="img/b3.jpg" class="d-block w-100" alt="asd">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="item-carousel">
        <div class="item-carousel__header">
            <h2>Item pilihan</h2>
            <span>See more</span>
        </div>
        <div class="item-carousel__content">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="card">
                                <a href='/home/product/{{ $product->id }}' class="card-img-wrapper">
                                    <img src="img/tumbnail.png" class="card-img-top" alt="...">
                                </a>
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
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <div class="item-carousel">
        <div class="item-carousel__header">
            <h2>Produk terlaris</h2>
            <span>See more</span>
        </div>
        <div class="item-carousel__content">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="card">
                                <a href='/home/product/{{ $product->id }}' class="card-img-wrapper">
                                    <img src="img/tumbnail.png" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Rp {{ $product->price }}</p>
                                    <span><img src="https://avatars.dicebear.com/api/gridy/{{ $product->supplier }}.svg"
                                            alt="{{ $product->supplier }}">{{ $product->supplier }}</span>
                                    <span><i class="fas fa-star"></i>{{ rand(30, 49) / 10 }} | Terjual
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
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <hr class="line-splitter">

    <div>
        <div class="item-carousel__header">
            <h2>Semua produk</h2>
        </div>
        <div class="home-items__wrapper">
            @foreach ($products as $product)
                <div class="card">
                    <a href='/home/product/{{ $product->id }}' class="card-img-wrapper">
                        <img src="img/tumbnail.png" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ $product->price }}</p>
                        <span><img src="https://avatars.dicebear.com/api/gridy/{{ $product->supplier }}.svg"
                                alt="{{ $product->supplier }}">{{ $product->supplier }}</span>
                        <span><i class="fas fa-star"></i>{{ rand(30, 49) / 10 }} | Terjual
                            {{ rand(10, 100) }}</span>
                    </div>
                    <div class="button-group">
                        <a class="btn btn-success" href="/cart/store/{{ $product->id }}" role="button">+
                            Keranjang</a>
                        <a class="btn btn-outline-success" href="/cart/checkout/{{ $product->id }}/0"
                            role="button">Beli</a>
                        <a href="/wishlist/store/{{ $product->id }}" class="wishlist-btn"><i
                                class="fas fa-heart"></i>Wishlist</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    {{-- @foreach ($products as $product)
        <div>{{ $product->name }}</div>
        <div>{{ $product->supplier }}</div>
        <div>{{ $product->price }}</div>
        <div>{{ $product->description }}</div>
        <div><a href="/cart/checkout/{{ $product->id }}/0">Pesan Sekarang</a></div>
        <div><a href="/cart/store/{{ $product->id }}">Tambah ke Keranjang Belanja</a></div>
        <div><a href="/wishlist/store/{{ $product->id }}">Tambah ke Daftar Keinginan</a></div>
        <hr>
    @endforeach --}}
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
