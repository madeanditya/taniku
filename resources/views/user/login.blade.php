@extends('layouts/login')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

@section('content')
<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Login Ke Website Taniku</h1>
            <p class="font-italic text-muted mb-0">Silahkan masukan username dan password untuk masuk website Taniku.</p>
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="/user/login" method="post">
                @csrf
                <div class="row">

                    <!-- Username -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            </span>
                        </div>
                        <input id="username" type="text" name="username" placeholder="Username" class="form-control bg-white border-left-0 border-md" required value="{{ old('username') }}" required autofocus>
                        @error('username')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div> 
                    
                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                        <div></div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button class="btn btn-primary btn-block py-2 btn-login text-uppercase fw-bold col-lg-12" type="submit" style="background-color: rgb(32, 107, 23)">Submit</button>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold ">Belum Memiliki Akun? <a href="/user/registrasi" class="text-primary ml-2">register</a></p>
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