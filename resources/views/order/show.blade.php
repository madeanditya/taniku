@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="status">
        <h3>Status</h3>
        <div><a href="/order/show">Semua</a></div>
        <div><a href="/order/show/in_progress">Berlangsung</a></div>
        <div><a href="/order/show/succeed">Berhasil</a></div>
        <div><a href="/order/show/failed">Tidak Berhasil</a></div>
    </div>
    <hr>
    
    <div class="orders">
        <h3>Orders: {{ $showing }}</h3>
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection