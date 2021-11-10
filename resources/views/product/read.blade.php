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
        <div><a href="/product/update/{{ $product->id }}">Update</a></div>
        <form action="/product/delete/{{ $product->id }}" method="post">
            @csrf
            <button type="submit">Delete</button>
        </form>
        <hr>
    @endforeach
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection