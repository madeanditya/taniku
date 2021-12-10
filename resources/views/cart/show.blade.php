{{-- harga total satuan produk --}}
@php
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
    <div class="row justify-content-center mt-5">

        <form action="/cart/checkout" method="post">
            @csrf
            <div class="products col-9">

                {{-- intro --}}
                @if (count($products) == 0)
                    <div class="empty-cart">
                        <img src="{{ asset('img/taniku.png') }}" alt="taniku">
                        <h3>Keranjangmu kosong</h3>
                        <span>Tengkulak no Taniku yes!</span>
                        <a class="btn btn-success" href="/" role="button">Belanja sekarang</a>
                    </div>
                @else
                    <h3 class="mb-5 fw-bold">Cart</h3>
                @endif
    
                {{-- suppliers --}}
                @for ($i = 0; $i < count($suppliers); $i++)
                    @php $supplier = $suppliers[$i] @endphp
                    <span class="cart-supplier__header">
                        <img src="https://avatars.dicebear.com/api/gridy/{{ $supplier->username }}.svg" alt="{{ $supplier->username }}">
                        {{ $supplier->username }}
                    </span>
                    <input type="hidden" name="suppliers[{{ $i }}][id]" value="{{ $supplier->id }}">
                    <input type="hidden" name="suppliers[{{ $i }}][username]" value="{{ $supplier->username }}">
                    <input type="hidden" name="suppliers[{{ $i }}][fullname]" value="{{ $supplier->fullname }}">
                    <input type="hidden" name="suppliers[{{ $i }}][profile_picture]" value="{{ $supplier->profile_picture }}">

                    {{-- supplier's products --}}
                    @for ($j = 0; $j < count($products); $j++)
                        @php $product = $products[$j] @endphp
                        @if ($product->supplier == $supplier->username)
                            <div class="row mt-4 cart-item-card">
                                <div class="col-3 cart-img-wrapper">
                                    <img src="{{ asset('img/tumbnail.png') }}" alt="{{ $product->name }}">
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col cart-item-content">
                                            <p>{{ $product->name }}</p>
                                            <p>Rp. {{ $product->price }}</p>
                                            <label for="quantity-{{ $i }}-{{ $j }}">Quantity: </label>
                                            <input type="number" name="suppliers[{{ $i }}][products][{{ $j }}][quantity]" id="quantity-{{ $i }}-{{ $j }}" value="1" min="1" max="5">
                                            <input type="hidden" name="suppliers[{{ $i }}][products][{{ $j }}][id]" value="">
                                            <input type="hidden" name="suppliers[{{ $i }}][products][{{ $j }}][name]" value="">
                                            <input type="hidden" name="suppliers[{{ $i }}][products][{{ $j }}][price]" value="">
                                            <input type="hidden" name="suppliers[{{ $i }}][products][{{ $j }}][stock]" value="">
                                            <input type="hidden" name="suppliers[{{ $i }}][products][{{ $j }}][weight]" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    <a href="/cart/destroy/{{ $product->cart_id }}" class="delete-cart-item__btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endfor
                    <hr class="supplier-splitter">
                @endfor
            </div>

            {{-- total price --}}
            @if (count($products) != 0)
                <div class="col-3">
                    <div class="order">
                        <h5 class="mb-4">Total belanja</h5>
                        <div class="cart-label__wrapper">
                            <p>Total item</p>
                            <p class="total-item">{{ count($products) }}</p>
                        </div>
                        <div class="cart-label__wrapper">
                            <p>Total price</p>
                            <p class="total-price">Rp {{ $totalPrice }}</p>
                        </div>
                        <a class="btn btn-success" href="/cart/checkout" role="button">Pesan sekarang</a>
                    </div>
                </div>
            @endif

        </form>
    </div>

@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
