<h3>Header</h3>
<div><a href="/">Home</a></div>
<div><a href="/product/read">Product</a></div>
@guest
<div><a href="/user/login">Login</a></div>
@endguest
@auth    
<form action="/user/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
@endauth
<hr>