{{-- harga total dan berat total seluruh produk --}}
@php
$totalItem = 0;
$totalWeight = 0;
$totalPrice = 0;
if (count($suppliers) != 0) {
    foreach ($suppliers as $supplier) {
        foreach ($supplier['products'] as $product) {
            $totalItem += $product['quantity'];
            $totalWeight += $product['weight'] * $product['quantity'];
        }
    }
}
@endphp

@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <form class="cart-checkout row justify-content-center my-5" action="/order/store" method="post">

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

            {{-- Cart --}}
            <div class="products">
                @csrf
                <h3 class="fw-bold">Detail Barang</h3>

                {{-- suppliers --}}
                @php $i = 0 @endphp
                @foreach ($suppliers as $supplier)
                    <div class="checkout-item__header mt-5">
                        <span class="cart-supplier__header">
                            <img src="https://avatars.dicebear.com/api/gridy/{{ $supplier['username'] }}.svg"
                                alt="{{ $supplier['username'] }}">{{ $supplier['username'] }}
                        </span>
                        <input type="hidden" name="orders[{{ $i }}][username]"
                            value="{{ auth()->user()->username }}">
                        <input type="hidden" name="orders[{{ $i }}][supplier]"
                            value="{{ $supplier['username'] }}">
                        <input type="hidden" name="orders[{{ $i }}][address_id]"
                            value="{{ $active_address }}">
                        <select class="supplier-shipper form-select mt-3" aria-label="Pengiriman"
                            name="orders[{{ $i }}][shipper]" id="shipper-{{ $i }}">
                            <option value="pengiriman">Pengiriman</option>
                            <option value="instan">Instan</option>
                            <option value="same day">Same Day</option>
                            <option value="reguler">Reguler</option>
                            <option value="kargo">Kargo</option>
                        </select>
                    </div>

                    {{-- products --}}
                    @php
                        $j = 0;
                        $subtotalWeight = 0;
                        $subtotalPrice = 0;
                        $subtotalQuantity = 0;
                    @endphp
                    @foreach ($supplier['products'] as $product)
                        <div class="row mt-4 cart-item-card align-items-center" style="border: 2px solid #E1E1E1;">
                            <div class="col-2 cart-img-wrapper">
                                <img src="{{ asset('img/tumbnail.png') }}" alt="{{ $product['name'] }}">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col cart-item-content">
                                        <p>{{ $product['name'] }}</p>
                                        <p><span>Rp. {{ $product['price'] }}</span></p>
                                        <p>{{ $product['weight'] }} gram</p>
                                        <p>Quantity: {{ $product['quantity'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="hidden"
                                    name="orders[{{ $i }}][order_details][{{ $j }}][product_id]"
                                    value="{{ $product['id'] }}">
                                @if (isset($product['note']))
                                    <label for="note-{{ $i }}-{{ $j }}">Note: </label>
                                    <input type="text" id="note-{{ $i }}-{{ $j }}"
                                        name="orders[{{ $i }}][order_details][{{ $j }}][note]"
                                        value="{{ $product['note'] }}" readonly>
                                @else
                                    <input type="hidden" id="note-{{ $i }}-{{ $j }}"
                                        name="orders[{{ $i }}][order_details][{{ $j }}][note]">
                                @endif
                                <input type="hidden"
                                    name="orders[{{ $i }}][order_details][{{ $j }}][quantity]"
                                    value="{{ $product['quantity'] }}">
                            </div>
                        </div>
                        @php
                            $j = $j + 1;
                            $subtotalWeight += (int) $product['weight'] * (int) $product['quantity'];
                            $subtotalPrice += (int) $product['price'] * (int) $product['quantity'];
                            $subtotalQuantity += (int) $product['quantity'];
                        @endphp
                    @endforeach

                    {{-- subsummary --}}
                    <div class="subsummary" style="display: none">
                        <div>Estimation: <span class="subsummary-estimation"> ... </span></div>
                        <div>Shipping cost: Rp. <span class="subsummary-shipping-cost"> ... </span></div>
                        <div>Subtotal bill: Rp. <span class="subsummary-bill"> ... </span></div>
                    </div>

                    <div style="display: none" class="subtotal-product-quantity">{{ $subtotalQuantity }}</div>
                    <div style="display: none" class="subtotal-product-weight">{{ $subtotalWeight }}</div>
                    <div style="display: none" class="subtotal-product-price">{{ $subtotalPrice }}</div>
                    @php $i = $i + 1 @endphp
                @endforeach
            </div>
        </div>

        {{-- summary --}}
        <div class="col-3">
            <div class="order">
                <h5 class="mb-4">Total belanja</h5>
                <div class="cart-label__wrapper">
                    <p>Total item</p>
                    <p class="summary-item">{{ $totalItem }}</p>
                </div>
                <div class="cart-label__wrapper">
                    <p>Total weight</p>
                    <p><span class="summary-weight">{{ $totalWeight }}</span> gram</p>
                </div>
                <div class="cart-label__wrapper summary-shipping-cost-container" style="display: none">
                    <p>Total shipping cost</p>
                    <p>Rp <span class="summary-shipping-cost"> ... </span></p>
                </div>
                <div class="cart-label__wrapper summary-bill-container" style="display: none">
                    <p>Total bill</p>
                    <p>Rp <span class="summary-bill"> ... </span></p>
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
        <form action="" method="post" class="modal-content change-address__modal">
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
                <div class="pick-address__modal">
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
            <form class="modal-content address-modal__checkout" action="/address/store" method="post"
                style="padding: 1rem">
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
                    <input type="hidden" id="username" name="username" value="{{ auth()->user()['username'] }}">
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary address-back__btn" data-bs-toggle="modal"
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
