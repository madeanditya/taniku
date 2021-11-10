@extends('layouts/main')

{{-- header --}}
@section('header')
    <h3>Header</h3>
    <div><a href="/product/read">Product</a></div>
    @guest
    <div><a href="/user/login">Login</a></div>
    @endguest
    @auth    
    <form action="/user/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth
    <br>
@endsection

{{-- content --}}
@section('content')
    <h3>Content</h3>
    <div>Hello World</div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection