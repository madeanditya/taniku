@extends('layouts/main')

{{-- header --}}
@section('header')
@include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <h3>Content</h3>
    <div>Hello World</div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
@endsection