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
    </div>
    <hr>
    <div class="address">
        <div>
            <h3>addresses</h3>
            <div><a href="/profile/address/create">Tambah alamat</a></div>
        </div>
        <hr>
        <div>
            @foreach ($addresses as $address)
                <div>{{ $address->fullname }}</div>
                <div>{{ $address->phone_number }}</div>
                <div>{{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                <div>{{ $address->postal_code }}</div>
                <div>{{ $address->default }}</div>
                <br>
            @endforeach
        </div>
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection