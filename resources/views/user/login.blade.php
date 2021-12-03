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
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt=""
                    class="img-fluid mb-3 d-none d-md-block">
                <h1>Login Ke Website Taniku</h1>
                <p class="font-italic text-muted mb-0">Silahkan masukan username dan password untuk masuk website Taniku.</p>
                </p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="/user/login" method="post">
                    @csrf
                    <div class="row p-3 justify-content-center">

                        <!-- Username -->
                        <div class="col-lg-10 mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" name="username" class="form-control bg-white border-md" required
                                value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class=" col-lg-10 mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" class="form-control bg-white border-md"
                                required>
                            <div></div>
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-8 mx-auto mb-0">
                        <button class="btn btn-success btn-block py-2 btn-login text-uppercase fw-bold col-lg-12"
                            type="submit">Submit</button>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100 mt-3">
                        <p class="text-muted font-weight-bold ">Belum Memiliki Akun? <a href="/user/register"
                                class="text-primary ml-2">register</a></p>
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
