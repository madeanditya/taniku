@extends('layouts/product')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <h3 class="fw-bolder text-center"><u>SHOP PRODUCT</u></h3>
        <section class="py-5">
            <div class="text-center"><a class="btn btn-outline-success mt-auto" href="/product/create">Menambah Barang</a></div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="width: 200px; height: 150px;" src="/img/beras.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Beras</h5>
                                    <!-- Product price-->
                                    IDR. 400.000.00/Karung
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="width: 200px; height: 150px;" src="/img/tomat.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Tomat</h5>
                                    IDR 15.000.00/Kg
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="width: 200px; height: 150px;" src="/img/wortel.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Wortel</h5>
                                    IDR. 20.000.00/Kg
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
    <hr>
    @foreach ($products as $product)
        <div>{{ $product->name }}</div>
        <div>{{ $product->supplier }}</div>
        <div>{{ $product->price }}</div>
        <div>{{ $product->description }}</div>
        <div><a href="/product/edit/{{ $product->id }}">Edit</a></div>
        <div><a href="/product/destroy/{{ $product->id }}">Delete</a></div>
        <hr>
    @endforeach
@endsection

{{-- footer --}}
@section('footer')
    <h3>About US</h3>
@endsection