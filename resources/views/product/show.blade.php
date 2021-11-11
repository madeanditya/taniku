@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <h3>Content</h3>
    <div><a href="/product/create">Insert</a></div>
    <hr>
    @foreach ($products as $product)
        <div>{{ $product->nama }}</div>
        <div>{{ $product->harga }}</div>
        <div><a href="/product/edit/{{ $product->id }}">Edit</a></div>
        <div><a href="/product/destroy/{{ $product->id }}">Delete</a></div>
        <hr>
    @endforeach
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection