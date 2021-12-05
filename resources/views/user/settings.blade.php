@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="profile-wrapper">
        <div class="biodata">
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link active profile-nav_active" aria-current="page" href="/user/settings">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link profile-nav_notActive" href="/address/show">List Alamat</a>
                </li>
            </ul>
            <div class="biodata-wrapper">
                <div class="biodata-img">
                    <img src="https://avatars.dicebear.com/api/gridy/{{ $user->username }}.svg"
                        alt="{{ $user->username }}">
                </div>
                <div class="biodata-detail">
                    <h4>Biodata diri</h4>
                    <div class="biodata-detail__content">
                        <div class="biodata-detail__content___value">
                            <p>Username</p>
                            <p>Nama</p>
                            <p>Email</p>
                            <p>No Hp</p>
                        </div>
                        <div class="biodata-detail__content___value">
                            <p>{{ $user->username }}</p>
                            <p>{{ $user->fullname }}</p>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->phone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
