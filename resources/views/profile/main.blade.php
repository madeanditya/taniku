@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div>
        <div><a href="/profile">Biodata diri</a></div>
        <div><a href="/profile/address">Alamat</a></div>
        <hr>
    </div>
    <div class="biodata">
        <h3>Biodata</h3>
        <div>{{ $user->username }}</div>
        <div>{{ $user->fullname }}</div>
        <div>{{ $user->email }}</div>
        <div>{{ $user->phone_number }}</div>
        {{--
            nama
            tanggal lahir
            jenis kelamin
            email
            nomor hp
        --}}
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection