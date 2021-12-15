@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="order-container">
        {{-- menu bar --}}

        <div class="status">
            <h3>Status</h3>
            <a class="btn btn-outline-success rounded-pill {{ $showing === 'pending' ? 'btn-active' : '' }}"
                href="/customer_order/show/pending">Pending</a>
            <a class="btn btn-outline-success rounded-pill {{ $showing === 'in_progress' ? 'btn-active' : '' }}"
                href="/customer_order/show/in_progress">Berlangsung</a>
            <a class="btn btn-outline-success rounded-pill {{ $showing === 'succeed' ? 'btn-active' : '' }}"
                href="/customer_order/show/succeed">Berhasil</a>
            <a class="btn btn-outline-success rounded-pill {{ $showing === 'failed' ? 'btn-active' : '' }}"
                href="/customer_order/show/failed">Tidak Berhasil</a>
        </div>

        {{-- orders --}}
        <div class="orders px-4 mt-5">
            @foreach ($orders as $order)

                <div class="row mt-3 cart-item-card align-items-center" style="border: 2px solid #E1E1E1;">
                    <div class="col-2 cart-img-wrapper">
                        <img src="{{ asset('img/tumbnail.png') }}" alt="product image">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col cart-item-content">
                                <p>{{ $order->username }}</p>
                                <p>Status: {{ $order->status }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-outline-success detail-transaksi__btn" data-bs-toggle="modal"
                            data-bs-target="#detailTransaksiModal{{ $order->id }}">Lihat
                            Detail Transaksi</button>
                    </div>
                </div>




                <!-- Modal -->
                <div class="modal fade" id="detailTransaksiModal{{ $order->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="mt-3">Info Pengiriman</h5>
                                        <div class="info-pengiriman">
                                            <div class="info-pengiriman__label">
                                                <p>Kurir <span>:</span></p>
                                                <p>Status <span>:</span></p>
                                                <p>Address <span>:</span></p>
                                            </div>
                                            <div class="info-pengiriman__detail">
                                                <p>{{ $order->shipper }}</p>
                                                <p>{{ $order->status }}</p>
                                                <p>
                                                    {{ $order->username }}
                                                    <span>{{ $order->phone_number }}</span>
                                                    <span>{{ $order->address . ', ' . $order->subdistrict . ', ' . $order->city . ', ' . $order->province }}</span>
                                                    <span>{{ $order->postal_code }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 acc-pesanan__btn mt-3">
                                        @if ($order->status == 'pending')
                                            <a class="btn btn-success" href="/order/accept/{{ $order->id }}">Terima
                                                Pesanan</a>
                                            <a class="btn btn-outline-danger"
                                                href="/order/reject/{{ $order->id }}">Tolak Pesanan</a>
                                        @elseif ($order->status == '')
                                            <div></div>
                                        @endif
                                    </div>
                                </div>
                                <hr class="supplier-splitter">
                                {{-- order details --}}
                                <h5 class="mt-3">Detail Produk</h5>
                                @foreach ($order_details as $order_detail)
                                    @if ($order_detail->order_id == $order->id)
                                        <div class="row mt-3 cart-item-card align-items-center"
                                            style="border: 2px solid #E1E1E1;">
                                            <div class="col-2 cart-img-wrapper">
                                                <img src="{{ asset('img/tumbnail.png') }}" alt="product image">
                                            </div>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col cart-item-content">
                                                        <p>{{ $order_detail->name }} (<span
                                                                class="product-weight">{{ $order_detail->weight }}
                                                                gram</span>)</p>
                                                        <p>{{ $order_detail->quantity }} x
                                                            Rp{{ $order_detail->price }}
                                                        </p>
                                                        <p>{{ $order_detail->note }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-items-center d-flex flex-column">
                                                <p>Total Harga</p>
                                                <span class="fw-bold">Rp {{ $order_detail->price }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
