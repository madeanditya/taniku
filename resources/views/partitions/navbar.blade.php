@php
    var_dump($title)
@endphp

@auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
        <a class="navbar-brand" href="/taniku">Taniku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Product | Show") ? 'active' : '' }}" href="/product/show">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Catalog | Main") ? 'active' : '' }}" href="/catalog/{{ auth()->user()->username }}">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Cart | Show") ? 'active' : '' }}" href="/cart/show" >Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Wishlist | Show") ? 'active' : '' }}" href="/wishlist/show" >Wishlist</a>
                </li>
            </ul>
        </div>
        <form action="/user/logout" method="post">
            <div class="text-center text-lg-start">
                @csrf
                <button type="submit" class="btn btn-success">Logout</button>
            </div>
        </form>
    </nav>
@else
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand {{ ($title == "Home | Taniku") ? 'active' : '' }}" href="/taniku">Taniku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">Home</a>
          </li>
        </ul>
      </div>
      <div class="text-center text-lg-start">
        <a href="/user/login"  type="button" class="btn btn-success">Login</a>
      </div>
    </div>
</nav>
@endauth