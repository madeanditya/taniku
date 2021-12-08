@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
<div class="d-grid col-2 mt-5">
    <a href="/product/create" class="btn btn-primary">+Insert
    </a>
</div>
    
    <hr>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Supplier</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach ($products as $product)
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->supplier }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a class="btn btn-primary" href="/product/edit/{{ $product->id }}">Edit</a>
                    <a class="btn btn-danger" href="/product/destroy/{{ $product->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection