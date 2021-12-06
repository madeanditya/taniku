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
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#createAddressModal">
                Tambah alamat
            </button>
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

{{-- modal --}}
<div class="modal fade" id="createAddressModal" tabindex="-1" aria-labelledby="createAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/address/store" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createAddressModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="fullname">Fullname: </label>
                    <input type="text" id="fullname" name="fullname">
                    <br>
                    <label for="phone_number">Phone Number: </label>
                    <input type="text" id="phone_number" name="phone_number">
                    <br>
                    <label for="province">Province: </label>
                    <input type="text" id="province" name="province">
                    <br>
                    <label for="city">City: </label>
                    <input type="text" id="city" name="city">
                    <br>
                    <label for="subdistrict">Subdistrict: </label>
                    <input type="text" id="subdistrict" name="subdistrict">
                    <br>
                    <label for="address">Address: </label>
                    <input type="text" id="address" name="address">
                    <br>
                    <label for="postal_code">Postal Code: </label>
                    <input type="text" id="postal_code" name="postal_code">
                    <br>
                    <input type="hidden" id="username" name="username" value="{{ auth()->user()->username }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>