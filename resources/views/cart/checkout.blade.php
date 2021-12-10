@extends('layouts/main')

@php
$totalPrice = 0;
@endphp

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <form class="row justify-content-center my-5" action="/order/store" method="post">
        {{-- address --}}
        <div class="col-9">
            <div class="address">
                <h3 class="fw-bold mb-3">Alamat Penerima</h3>
                @foreach ($addresses as $address)
                    @if ($address->id == $active_address)
                        <div class="address-card">
                            <p class="fw-bold">{{ $address->fullname }}</p>
                            <p>{{ $address->phone_number }}</p>
                            <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                            </p>
                            <p>{{ $address->postal_code }}</p>
                            <div class="address-card__footer">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#editAddressModal">
                                    Ubah alamat</button>
                            </div>
                        </div>
                    @break
                @endif
                @endforeach
            </div>
            <hr>

            {{-- products --}}
            <div class="products">
                @csrf
                @if (count($suppliers) != 0)
                    <h3 class="fw-bold">Detail Barang</h3>
                    @for ($i = 0; $i < count($suppliers); $i++)
                        <div class="checkout-item__header mt-5">
                            <span class="cart-supplier__header"><img
                                    src="https://avatars.dicebear.com/api/gridy/{{ $suppliers[$i]->username }}.svg"
                                    alt="{{ $suppliers[$i]->username }}">{{ $suppliers[$i]->username }}</span>
                            <input type="hidden" name="orders[{{ $i }}][username]"
                                value="{{ auth()->user()->username }}">
                            <input type="hidden" name="orders[{{ $i }}][supplier]"
                                value="{{ $suppliers[$i]->username }}">
                            <input type="hidden" name="orders[{{ $i }}][address_id]"
                                value="{{ $active_address }}">
                            <select class="form-select mt-3" aria-label="Pengiriman"
                                name="orders[{{ $i }}][shipper]" id="shipper-{{ $i }}">
                                <option value="instan">Instan: 3-6 jam</option>
                                <option value="same day">Same Day: 6-8 jam</option>
                                <option value="reguler">Reguler: 3-5 Hari</option>
                                <option value="kargo">Kargo: > 1 Minggu</option>
                            </select>
                        </div>
                        @for ($y = 0; $y < count($products); $y++)
                            @if ($products[$y]->supplier == $suppliers[$i]->username)
                                @php
                                    $totalPrice = $totalPrice + $products[$y]->price;
                                @endphp
                                <div class="row mt-4 cart-item-card align-items-center" style="border: 2px solid #E1E1E1;">
                                    <div class="col-2 cart-img-wrapper">
                                        <img src="{{ asset('img/tumbnail.png') }}" alt="{{ $products[$y]->name }}">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col cart-item-content">
                                                <p>{{ $products[$y]->name }}</p>
                                                <span>Rp. {{ $products[$y]->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="hidden"
                                            name="orders[{{ $i }}][order_details][{{ $y }}][product_id]"
                                            value="{{ $products[$y]->id }}">
                                        <div class="">
                                            <label for="note-{{ $i }}">Catatan</label>
                                            <textarea class="form-control" id="note-{{ $i }}" rows="3"
                                                name="orders[{{ $i }}][order_details][{{ $y }}][note]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    @endfor
                @else
                    <div class="empty-cart">
                        <img src="{{ asset('img/taniku.png') }}" alt="taniku">
                        <h3>Keranjangmu kosong</h3>
                        <span>Tengkulak no Taniku yes!</span>
                        <a class="btn btn-success" href="/" role="button">Belanja sekarang</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-3">
            <div class="order">
                <h5 class="mb-4">Total belanja</h5>
                <div class="cart-label__wrapper">
                    <p>Total item</p>
                    <p>{{ count($products) }}</p>
                </div>
                <div class="cart-label__wrapper">
                    <p>Total price</p>
                    <p>Rp {{ $totalPrice }}</p>
                </div>
                <button class="btn btn-success" type="submit" name="submit"
                    {{ count($suppliers) == 0 ? 'disabled' : '' }}>Beli sekarang</button>
            </div>
        </div>
    </form>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection

{{-- edit adderss modal --}}
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-scrollable">
        <form action="" method="post" class="modal-content">
            @csrf
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Pilih alamat pengiriman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-success mb-3" style="border-radius: 10px" data-bs-toggle="modal"
                    data-bs-target="#createAddressModal">
                    Tambah alamat
                </button>
                <div>
                    @foreach ($addresses as $address)
                        @if ($address->default == 1)
                            <div class="address-card ">
                                <span>Utama</span>
                                <p class="fw-bold">{{ $address->fullname }}</p>
                                <p>{{ $address->phone_number }}</p>
                                <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                                </p>
                                <p>{{ $address->postal_code }}</p>
                            </div>
                        @break
                    @endif
                    @endforeach

                    @foreach ($addresses as $address)
                        @if ($address->default == 0)
                            <div>
                                <input type="radio" id="address-{{ $address->id }}" name="active_address"
                                    value="{{ $address->id }}" hidden
                                    {{ $active_address == $address->id ? 'checked' : '' }}>
                                <label for="address-{{ $address->id }}" class="address-card address-card__checkout">
                                    <p class="fw-bold">{{ $address->fullname }}</p>
                                    <p>{{ $address->phone_number }}</p>
                                    <p>{{ $address->address . ', ' . $address->subdistrict . ', ' . $address->city . ', ' . $address->province }}
                                    </p>
                                    <p>{{ $address->postal_code }}</p>
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer border-0">
                <button class="text-decoration-none btn btn-outline-success" type="submit" name="submit"
                    value="select and update">Pilih dan Jadikan Alamat
                    Default</button>
                <button class="text-decoration-none btn btn-success fw-bold" type="submit" name="submit"
                    value="select">Pilih</button>
            </div>
        </form>
    </div>
</div>

{{-- create address modal --}}
<div class="modal fade" id="createAddressModal" tabindex="-1" aria-labelledby="createAddressModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form class="modal-content" action="/address/store" method="post" style="padding: 1rem">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Tambah alamat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label fw-bold">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="">
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
                    <input type="hidden" name="type" value="1">
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#editAddressModal" style="border-radius: 10px;">
                        Kembali
                    </button>
                    <button type="submit" name="submit" class="btn btn-success fw-bold"
                        style="border-radius: 10px; width: 30%">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
