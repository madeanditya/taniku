@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <form action="/profile/address/create" method="post">
        @csrf
        <label for="fullname">Fullname: </label>
        <input type="text" id="fullname" name="fullname">
        <br>
        <label for="phone_number">Phone Number: </label>
        <input type="text" id="phone_number" name="phone_number">
        <br>
        <label for="province">Province: </label>
        <input type="text" id="province" name="province">
        <br>
        <label for="city">City: </label>
        <input type="text" id="city" name="city">
        <br>
        <label for="subdistrict">Subdistrict: </label>
        <input type="text" id="subdistrict" name="subdistrict">
        <br>
        <label for="address">Address: </label>
        <input type="text" id="address" name="address">
        <br>
        <label for="postal_code">Postal Code: </label>
        <input type="text" id="postal_code" name="postal_code">
        <br>
        <input type="hidden" id="username" name="username" value="{{ auth()->user()->username }}">
        <button type="submit" name="submit">submit</button>
    </form>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection