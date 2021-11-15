@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Membeli Beras Lebih Muda Dengan<span> Taniku</span></h1>
            <h2>Taniku adalah website jual beli beras secara online tanpa perantara tengkulak.</h2>
            <h2>Silahkan login untuk masuk website Taniku.</h2>
            <div class="text-center text-lg-start">
              <a href="/user/login" class="btn-get-started scrollto">Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="img/hero-img.png" class="img-fluid animated" alt="" >
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>
  </section><!-- End Hero -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
          <a href="https://www.youtube.com/watch?v=At_u1aHwdbo" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
          <h3>Tentang Taniku</h3>
          <p align="justify">Taniku adalah aplikasi berbasis web yang dibuat dengan tujaun untuk mempertemukan petani dengan pembeli secara langsung, sehingga menghilangkan peran dari tengkulak dalam industri pertanian. Taniku dibuat sebagai pengembangan dari beberapa penelitian mengenai distribusi hasil panen pertanian untuk menghindari peran tengkulak. Beberapa peran tengkulak yang ingin dihilangkan yakni penetapan harga hasil panen pertanian dan distribusi produk hasil panen pertanian kepada masyarakat dengan mudah. . Solusi ini diharapkan mampu meningkatkan kesejahteraan dan perekonomian petani serta mampu membuat hasil panen pertanian terdistribusi dengan baik di kalangan masyarakat. </p>
          <h3>Keuntungan Menggunakan Taniku</h3>
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="bx bx-fingerprint"></i></div>
            <h4 class="title"><a href="">Mendapatkan Harga Beras Lebih Murah</a></h4>
            <p class="description">Dengan hilangnya peran tengkulak dalam proses jual beli beras, membuat harga beras yang dijual kepembeli dapat menjadi lebih murah.</p>
          </div>

          <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bx-gift"></i></div>
            <h4 class="title"><a href="">Mendapatkan Beras Berkualitas </a></h4>
            <p class="description">Karena beras yang dijual langsung didapatkan dari Petani, sehingga menghindari kecurangan beras dicampur denga beras dengan kualitas buruk atau beras bansos.</p>
          </div>

          <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Dapat Dipesan Dari Mana Saja</a></h4>
            <p class="description">Karena Taniku merupakan aplikasi berbasis website, sehingga pemesanan beras dapat dipesan dimanapun tanpa perlu kepasar maupun swalayan.</p>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  @endsection

{{-- footer --}}
@section('footer')
<h3>Footer</h3>
@include('partitions/footer')
@endsection