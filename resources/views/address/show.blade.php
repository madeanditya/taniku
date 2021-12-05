@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div>
        <div><a href="/user/settings">Settings</a></div>
        <div><a href="/address/show">Alamat</a></div>
    </div>
    <hr>
    <div class="address">
        <div>
            <h3>addresses</h3>
            <div><a href="/address/create">Tambah alamat</a></div>
        </div>
        <hr>
        <div>
            @foreach ($addresses as $address)
                @if ($address->default == 1)
                    <div>{{ $address->fullname }}</div>
                    <div>{{ $address->phone_number }}</div>
                    <div>{{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                    <div>{{ $address->postal_code }}</div>
                    <div><i>Ini adalah alamat default</i></div>
                    <div><a href="/address/edit/{{ $address->id }}">edit</a></div>
                    <div><a href="/address/destroy/{{ $address->id }}">delete</a></div>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    @break
                @endif
            @endforeach

            @foreach ($addresses as $address)
                @if ($address->default == 0)                    
                    <div>{{ $address->fullname }}</div>
                    <div>{{ $address->phone_number }}</div>
                    <div>{{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                    <div>{{ $address->postal_code }}</div>
                    <div><a href="/address/default/{{ $address->id }}">jadikan ini alamat default</a></div>
                    <div><a href="/address/edit/{{ $address->id }}">edit</a></div>
                    <div><a href="/address/destroy/{{ $address->id }}">delete</a></div>
                    <br>
                @endif
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