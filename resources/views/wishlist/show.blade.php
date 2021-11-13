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
        <div>{{ $user->kecamatan . ', ' .  $user->kabupaten . ', ' . $user->provinsi . ', ' . $user->postal_code}}</div>
        <hr>
    </div>
    <div class="products">
        <h3>Wishlist</h3>
        @foreach ($products as $product)
            <div>{{ $product->nama }}</div>
            <div>{{ $product->harga }}</div>
            <div>{{ $product->deskripsi }}</div>
            <div>{{ $product->supplier }}</div>
            <hr>
        @endforeach
    </div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection