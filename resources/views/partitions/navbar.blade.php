<h3>Header</h3>
<div><a href="/">Home</a></div>

@auth
    <div><a href="/product/show">Product</a></div>
    <div><a href="/catalog/{{ auth()->user()->username }}">Catalog</a></div>
    <div><a href="/cart/show">Shopping Cart</a></div>
    <div><a href="/wishlist/show">Wishlist</a></div>
    <form action="/user/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <div><a href="/user/login">Login</a></div>
@endauth

<hr>