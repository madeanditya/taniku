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
        <h3>Products</h3>
        @foreach ($products as $product)
            <div>{{ $product->name }}</div>
            <div>{{ $product->price }}</div>
            <div>{{ $product->description }}</div>
            <hr>
        @endforeach
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection