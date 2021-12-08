@extends('layouts/main')

{{-- header --}}
@section('header')
@include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    {{-- address --}}
    <div class="address">
        <h3>Alamat Penerima</h3>
        @foreach ($addresses as $address)
            @if ($address->id == $active_address)
                <div>Nama: {{ $address->fullname }}</div>
                <div>Nomor: {{ $address->phone_number }}</div>
                <div>Alamat: {{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                <div>Kode Pos: {{ $address->postal_code }}</div>
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                    Ubah alamat
                </button>
                @break
            @endif
        @endforeach
    </div>
    <hr>

    {{-- products --}}
    <div class="products">
        <form action="/order/store" method="post">
            @csrf
            <h3>Detail Barang</h3>
            @for ($i = 0; $i < count($suppliers); $i++)
                <h4>Supplier: {{ $suppliers[$i]->username }}</h4>
                <input type="hidden" name="orders[{{ $i }}][username]" value="{{ auth()->user()->username }}">
                <input type="hidden" name="orders[{{ $i }}][supplier]" value="{{ $suppliers[$i]->username }}">
                <input type="hidden" name="orders[{{ $i }}][address_id]" value="{{ $active_address }}">
                <label for="shipper-{{ $i }}">Pengiriman: </label>
                <select name="orders[{{ $i }}][shipper]" id="shipper-{{ $i }}">
                    <option value="instan">Instan: 3-6 jam</option>
                    <option value="same day">Same Day: 6-8 jam</option>
                    <option value="reguler">Reguler: 3-5 Hari</option>
                    <option value="kargo">Kargo: > 1 Minggu</option>
                </select>
                <br><br>
                @for ($y = 0; $y < count($products); $y++)
                    @if ($products[$y]->supplier == $suppliers[$i]->username)
                        <div>{{ $products[$y]->name }}</div>
                        <div>{{ $products[$y]->supplier }}</div>
                        <div>{{ $products[$y]->price }}</div>
                        <input type="hidden" name="orders[{{ $i }}][product_ids][{{ $y }}]" value="{{ $products[$y]->id }}">
                        <label for="note-{{ $i }}">Catatan</label>
                        <input type="text" id="note-{{ $i }}" name="orders[{{ $i }}][note]">
                        <br><br>
                    @endif
                @endfor
            @endfor
            <hr>

            <h3>Ringkasan Belanja</h3>
            <button type="submit" class="btn btn-link" name="submit">Beli</button>
            <hr>
        </form>        
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
  
{{-- edit adderss modal --}}
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editAddressModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#createAddressModal">
                        Tambah alamat
                    </button>
                    <div>
                        @foreach ($addresses as $address)
                            @if ($address->default == 1)
                                <div style="{{ $active_address == $address->id ? 'background-color: green' : 'background-color: greenyellow' }}" >
                                    <input type="radio" id="address-{{ $address->id }}" name="active_address" value="{{ $address->id }}" {{ $active_address == $address->id ? "checked" : "" }}>
                                    <label for="address-{{ $address->id }}">
                                        <div>{{ $address->fullname }}</div>
                                        <div>{{ $address->phone_number }}</div>
                                        <div>{{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                                        <div>{{ $address->postal_code }}</div>
                                        <div>{{ $address->id }}</div>
                                        <div><i>Ini adalah alamat default</i></div>
                                    </label>
                                </div>
                                <br>
                                @break
                            @endif
                        @endforeach
            
                        @foreach ($addresses as $address)
                                @if ($address->default == 0)
                                <div style="{{ $active_address == $address->id ? 'background-color: green' : 'background-color: greenyellow' }}" >
                                    <input type="radio" id="address-{{ $address->id }}" name="active_address" value="{{ $address->id }}" {{ $active_address == $address->id ? "checked" : "" }}>
                                    <label for="address-{{ $address->id }}">
                                        <div>{{ $address->fullname }}</div>
                                        <div>{{ $address->phone_number }}</div>
                                        <div>{{ $address->address . ", " . $address->subdistrict . ", " . $address->city . ", " . $address->province }}</div>
                                        <div>{{ $address->postal_code }}</div>
                                        <div>{{ $address->id }}</div>
                                    </label>
                                </div>
                                <br>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="select">Select address</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="select and update">Select and set to default address</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- create address modal --}}
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                        Kembali
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>