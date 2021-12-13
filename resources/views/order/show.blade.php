@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')

    {{-- menu bar --}}
    <div class="status">
        <h3>Status</h3>
        <div><a href="/order/show/all">Semua</a></div>
        <div><a href="/order/show/in_progress">Berlangsung</a></div>
        <div><a href="/order/show/succeed">Berhasil</a></div>
        <div><a href="/order/show/failed">Tidak Berhasil</a></div>
    </div>
    <hr>

    {{-- orders --}}
    <div class="orders">
        <h3>Orders: {{ $showing }}</h3>
        @foreach ($orders as $order)
            <div>supplier: {{ $order->supplier }}</div>
            <div>Shipper: {{ $order->shipper }}</div>
            <div>Address: </div>
            <div>{{ $order->fullname }}</div>
            <div>{{ $order->phone_number }}</div>
            <div>{{ $order->address . ", " . $order->subdistrict . ", " . $order->city . ", " . $order->province }}</div>
            <div>{{ $order->postal_code }}</div>
            <div>Status: {{ $order->status }}</div>

            {{-- action --}}
            <div><a href="/order/reject/{{ $order->id }}">Batalkan Pemesanan</a></div>

            {{-- order details --}}
            <div>Order Details: </div>
            @foreach ($order_details as $order_detail)
                @if ($order_detail->order_id == $order->id)
                    <div>{{ $order_detail->name }}</div>
                    <div>{{ $order_detail->price }}</div>
                    <div>{{ $order_detail->weight }}</div>
                    <div>{{ $order_detail->supplier }}</div>
                    <div>{{ $order_detail->quantity }}</div>
                    <div>{{ $order_detail->note }}</div>
                @endif
            @endforeach
            <br>
        @endforeach
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection