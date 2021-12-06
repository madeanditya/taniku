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
                <a class="nav-link profile-nav_notActive" aria-current="page" href="/user/settings">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active profile-nav_active" href="/address/show">List Alamat</a>
            </li>
        </ul>
        <div class="address">
            <div class="address-header">
                <button data-bs-toggle="modal" id="add-address__btn" data-bs-target="#add-new-address"
                    class="btn btn-success">Tambah
                    alamat</button>
            </div>
            <div class="address-card__wrapper">
                @foreach ($addresses as $address)
                    @if ($address->default)
                        <div class="address-card address-card__main">
                            <span>Utama</span>
                            <p class="fw-bold">{{ $address->fullname }}</p>
                            <p>{{ $address->phone_number }}</p>
                            <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                            </p>
                            <p>{{ $address->postal_code }}</p>
                            <div class="address-card__footer">
                                <p class="text-decoration-none update-address__btn" id="{{ $address->id }}">Edit</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($addresses as $address)
                    @if (!$address->default)
                        <div class="address-card">
                            <p class="fw-bold">{{ $address->fullname }}</p>
                            <p>{{ $address->phone_number }}</p>
                            <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                            </p>
                            <p>{{ $address->postal_code }}</p>
                            <div class="address-card__footer">
                                <p class="text-decoration-none update-address__btn" id="{{ $address->id }}">Edit</p>
                                <i class="fas fa-minus"></i>
                                <p class="text-decoration-none delete-address__btn" id="{{ $address->id }}">Delete</p>
                                <i class="fas fa-minus"></i>
                                <p class="text-decoration-none set-default-address__btn" id="{{ $address->id }}">jadikan
                                    ini alamat default</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="add-new-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content add-address__modal___content" action="/address/store" method="post">
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
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
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
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="">
                </div>
                <input type="hidden" id="username" name="username" value="{{ auth()->user()->username }}">
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="submit" id="submit-address__btn" name="submit" class="btn btn-success fw-bold"
                    style="border-radius: 10px; width: 30%">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- footer --}}
@section('footer')
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
