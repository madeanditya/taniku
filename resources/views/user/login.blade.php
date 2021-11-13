@extends('layouts/main');

@section('content')
    <form action="/user/login" method="post">
        @csrf
        <h3>User login</h3>
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus></td>
                @error('username')
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
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div>or <a href="/user/register">Register</a></div>
@endsection