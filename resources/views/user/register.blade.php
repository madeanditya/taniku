@extends('layouts/main');

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- @section('content')
    <form action="/user/register" method="post">
        @csrf
        <h3>User registration</h3>
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"></td>
                @error('email')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" required></td>
                @error('password')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="confirm">Konfirmasi password</label></td>
                <td><input type="password" name="confirm" id="confirm" required></td>
                @error('confirm')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" required value="{{ old('username') }}"></td>
                @error('username')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="fullname">Nama Lengkap</label></td>
                <td><input type="text" name="fullname" id="fullname" required value="{{ old('fullname') }}"></td>
                @error('fullname')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="phone_number">Nomor Telepon</label></td>
                <td><input type="text" name="phone_number" id="phone_number" required value="{{ old('phone_number') }}"></td>
                @error('phone_number')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="province">Provinsi</label></td>
                <td><input type="text" name="province" id="province" required value="{{ old('province') }}"></td>
                @error('province')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="city">Kabupaten</label></td>
                <td><input type="text" name="city" id="city" required value="{{ old('city') }}"></td>
                @error('city')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="subdistrict">Kecamatan</label></td>
                <td><input type="text" name="subdistrict" id="subdistrict" required value="{{ old('subdistrict') }}"></td>
                @error('subdistrict')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="address">Alamat</label></td>
                <td><input type="text" name="address" id="address" required value="{{ old('address') }}"></td>
                @error('address')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
            <tr>
                <td><label for="postal_code">Kode Pos</label></td>
                <td><input type="text" name="postal_code" id="postal_code" required value="{{ old('postal_code') }}"></td>
                @error('postal_code')
                <td class="error-message">{{ $message }}</td>
                @enderror
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div>or <a href="/user/login">Login</a></div>
@endsection --}}

@section('content')
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5" style="background-color: rgb(134, 223, 122)">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">User Register</h5>
                    <form action="/user/register" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"  required autofocus value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password"  required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Konfirmasi Password"  required>
                            <label for="confirm">Konfirmasi Password</label>
                            @error('confirm')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname" required value="{{ old('fullname') }}">
                            <label for="fullname">Fullname</label>
                            @error('fullname')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Nomer Telepon" required value="{{ old('phone_number') }}">
                            <label for="phone_number">Nomer Telepon</label>
                            @error('phone_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="province" class="form-control" id="province" placeholder="Provinsi" required value="{{ old('province') }}">
                            <label for="province">Provinsi</label>
                            @error('province')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="city" class="form-control" id="city" placeholder="Kabupaten" required value="{{ old('city') }}">
                            <label for="city">Kabupaten</label>
                            @error('city')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="subdistrict" class="form-control" id="subdistrict" placeholder="Kecamatan" required value="{{ old('subdistrict') }}">
                            <label for="subdistrict">Kecamatan</label>
                            @error('subdistrict')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" id="address" placeholder="Alamat" required value="{{ old('address') }}">
                            <label for="address">Alamat</label>
                            @error('address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Kode Pos" required value="{{ old('postal_code') }}">
                            <label for="postal_code">Kode Pos</label>
                            @error('postal_code')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">submit</button>
                        </div>
                        <p>Sudah Memiliku Akun?</p>
                        <p>Silahkan Login</p>
                        <a href="/user/login" class="btn btn-outline-light" style="background-color: rgb(32, 107, 23)">Login</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection