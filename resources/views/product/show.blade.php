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
        <div>{{ $product->name }}</div>
        <div>{{ $product->supplier }}</div>
        <div>{{ $product->price }}</div>
        <div>{{ $product->description }}</div>
        <div><a href="/product/edit/{{ $product->id }}">Edit</a></div>
        <div><a href="/product/destroy/{{ $product->id }}">Delete</a></div>
        <hr>
    @endforeach
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection