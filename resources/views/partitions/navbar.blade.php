

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
                    <a class="nav-link"  href="/" style="color:white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product/show" style="color:white">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/catalog/{{ auth()->user()->username }}" style="color:white">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart/show" style="color:white">Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/wishlist/show" style="color:white">Wishlist</a>
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
      <a class="navbar-brand" href="/taniku">Taniku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"  href="/">Home</a>
          </li>
        </ul>
      </div>
      <div class="text-center text-lg-start">
        <a href="/user/login"  type="button" class="btn btn-success">Login</a>
      </div>
    </div>
</nav>
@endauth