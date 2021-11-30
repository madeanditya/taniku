@extends('layouts/main')

{{-- header --}}
@section('header')
@include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="reciever">
        <h3>Alamat Penerima</h3>
        <div>Nama: {{ $user->fullname }}</div>
        <div>Email: {{ $user->email }}</div>
        <div>Nomor: {{ $user->phone_number }}</div>
        <div>Alamat: {{ $user->subdistrict . ', ' . $user->city . ', ' . $user->province }}</div>
        <div>Kode Pos: {{ $user->postal_code }}</div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_address_modal">
            Ubah alamat
        </button>
        {{--
            dest_province
            dest_city
            dest_subdistrict
            dest_address
            dest_postal_code
            dest_fullname
            dest_phone_number
            status
            tax
            username
            shipper_id
        --}}
    </div>
    <hr>

    <h3>Detail Barang</h3>
    @if (isset($product))
        <div class="product">
            <div>{{ $product->name }}</div>
            <div>{{ $product->supplier }}</div>
            <div>{{ $product->price }}</div>
        </div>
    @else
        <div class="products">
            @foreach ($suppliers as $supplier)
                <h4>Supplier: {{ $supplier->username }}</h4>
                @foreach ($products as $product)
                    @if ($product->supplier == $supplier->username)
                        <div>{{ $product->name }}</div>
                        <div>{{ $product->supplier }}</div>
                        <div>{{ $product->price }}</div>
                        <br>
                    @endif
                @endforeach
            @endforeach
        </div>
    @endif
    <hr>
    
    <h3>Ringkasan Belanja</h3>
    <div><a href="/order/store">Beli</a></div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection
  
<!-- Modal -->
<div class="modal fade" id="edit_address_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>