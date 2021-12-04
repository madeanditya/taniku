@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="profile-wrapper">
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link profile-nav_notActive" aria-current="page" href="/profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active profile-nav_active" href="/profile/address">List Alamat</a>
            </li>
        </ul>
        <div class="address">
            <div class="address-header">
                <button data-bs-toggle="modal" data-bs-target="#add-new-address" class="btn btn-success">Tambah
                    alamat</button>
            </div>
            <div class="address-card__wrapper">
                @foreach ($addresses as $address)
                    <div class="address-card {{ $address->default ? 'address-card__main' : '' }}">
                        @if ($address->default)
                            <span>Utama</span>
                        @endif
                        <p class="fw-bold">{{ $address->fullname }}</p>
                        <p>{{ $address->phone_number }}</p>
                        <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                        </p>
                        <p>{{ $address->postal_code }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="add-new-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content add-address__modal___content" action="/profile/address/create" method="post">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Tambah alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf
                <div class="mb-3">
                    <label for="fullname" class="form-label fw-bold">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                        value="{{ $address->phone_number }}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label fw-bold">Province</label>
                    <input type="text" class="form-control" id="province" name="province" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label fw-bold">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="subdistrict" class="form-label fw-bold">Subdistrict</label>
                    <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="postal_code" class="form-label fw-bold">Postal Code</label>
                    <input type="number" class="form-control" id="postal_code" name="postal_code" placeholder="">
                </div>
                <input type="hidden" id="username" name="username" value="{{ auth()->user()->username }}">
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="submit" name="submit" class="btn btn-success fw-bold"
                    style="border-radius: 10px; width: 30%">Simpan</button>
            </div>
        </form>
    </div>
</div>


{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
