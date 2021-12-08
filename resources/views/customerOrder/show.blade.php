@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="status">
        <h3>Status</h3>
        <div><a href="/customer_order/show/pending">Butuh Tindakan</a></div>
        <div><a href="/customer_order/show/in_progress">Berlangsung</a></div>
        <div><a href="/customer_order/show/succeed">Berhasil</a></div>
        <div><a href="/customer_order/show/failed">Tidak Berhasil</a></div>
    </div>
    <hr>
    
    <div class="orders">
        <h3>Orders: {{ $showing }}</h3>
        @foreach ($orders as $order)
            <div>From: {{ $order->username }}</div>
            <div>Shipper: {{ $order->shipper }}</div>
            <div>Address: </div>
            <div>{{ $order->fullname }}</div>
            <div>{{ $order->phone_number }}</div>
            <div>{{ $order->address . ", " . $order->subdistrict . ", " . $order->city . ", " . $order->province }}</div>
            <div>{{ $order->postal_code }}</div>
            <div>Status: {{ $order->status }}</div>
            @if ($order->status == 'pending')
                <div><a href="/order/accept/{{ $order->id }}">Terima Pesanan</a></div>
                <div><a href="/order/reject/{{ $order->id }}">Tolak Pesanan</a></div>
            @elseif ($order->status == '')
                <div></div>
            @endif
            <div>Order Details: </div>
            @foreach ($order_details as $order_detail)
                @if ($order_detail->order_id == $order->id)
                    <div>{{ $order_detail->name }}</div>
                    <div>{{ $order_detail->price }}</div>
                    <div>{{ $order_detail->weight }}</div>
                    <div>{{ $order_detail->supplier }}</div>
                    {{-- <div>{{ $order_detail->quantity }}</div> --}}
                    <div>{{ $order_detail->note }}</div>
                @endif
            @endforeach
            <br>
        @endforeach
        @foreach ($order_details as $order_detail)
        @endforeach
    </div>
    <hr>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection