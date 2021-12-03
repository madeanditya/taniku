@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt=""
                    class="img-fluid mb-3 d-none d-md-block">
                <h1>Buat Akun Baru</h1>
                <p class="font-italic text-muted mb-0">Silahkan buat akun untuk masuk ke dalam website Taniku.</p>
                </p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="/user/register" method="post">
                    @csrf
                    <div class="row">

                        <!-- Email Address -->
                        <div class=" col-lg-12 mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" placeholder="Email address"
                                class="form-control bg-white border-md" required autofocus value="{{ old('email') }}">
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class=" col-lg-12 mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="form-control bg-white border-md" required>
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class=" col-lg-12 mb-4">
                            <label for="confirm" class="form-label">Konfirmasi Password</label>
                            <input id="confirm" type="password" name="confirm" placeholder="Konfirmasi Password"
                                class="form-control bg-white border-md required">
                            @error('confirm')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class=" col-lg-12 mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" name="username" placeholder="Username"
                                class="form-control bg-white border-md" required value="{{ old('username') }}">
                            @error('username')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Full Name -->
                        <div class=" col-lg-12 mb-4">
                            <label for="fullname" class="form-label">Nama</label>
                            <input id="fullname" type="text" name="fullname" placeholder="Nama Lengkap"
                                class="form-control bg-white border-md" required value="{{ old('fullname') }}">
                            @error('fullname')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number-->
                        <div class=" col-lg-12 mb-4">
                            <label for="phone_number" class="form-label">Nomor telepon</label>
                            <input id="phone_number" type="text" name="phone_number" placeholder="Nomer Telepon"
                                class="form-control bg-white border-md" required value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Provinsi -->
                        <div class=" col-lg-6 mb-4">

                            <label for="province" class="form-label">Provinsi</label>
                            <input id="province" type="text" name="province" placeholder="Provinsi"
                                class="form-control bg-white border-md" required value="{{ old('province') }}">
                            @error('province')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kabupaten -->
                        <div class=" col-lg-6 mb-4">

                            <label for="city" class="form-label">Kabupaten</label>
                            <input id="city" type="text" name="city" placeholder="Kabupaten"
                                class="form-control bg-white border-md" required value="{{ old('city') }}">
                            @error('city')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kecamatan -->
                        <div class=" col-lg-6 mb-4">

                            <label for="subdistrict" class="form-label">Kecamatan</label>
                            <input id="subdistrict" type="text" name="subdistrict" placeholder="Kecamatan"
                                class="form-control bg-white border-md" required value="{{ old('subdistrict') }}">
                            @error('subdistrict')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kode Pos-->
                        <div class=" col-lg-6 mb-4">

                            <label for="postal_code" class="form-label">Kode Pos</label>
                            <input id="postal_code" type="text" name="postal_code" placeholder="Kode Pos"
                                class="form-control bg-white border-md" required value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class=" col-lg-12 mb-4">
                            <label for="address" class="form-label">Alamat</label>
                            <input id="address" type="text" name="address" placeholder="Alamat rumah"
                                class="form-control bg-white border-md" required value="{{ old('address') }}">
                            @error('address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->

                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button class="btn btn-primary btn-block py-2 btn-login text-uppercase fw-bold col-lg-12"
                                type="submit" style="background-color: rgb(32, 107, 23)">Submit</button>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100 mt-3">
                            <p class="text-muted font-weight-bold ">Already Registered? <a href="/user/login"
                                    class="text-primary ml-2">Login</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partitions/footer')
@endsection
