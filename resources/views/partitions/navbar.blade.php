<h3>Header</h3>
<div><a href="/">Home</a></div>

@auth
<div><a href="/{{ auth()->user()->username }}/product/show">Product</a></div>
@endauth

@auth    
<form action="/user/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
@else
<div><a href="/user/login">Login</a></div>
@endauth

<hr>