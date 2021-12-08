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
                    <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Store
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/{{ auth()->user()->username }}">Stall</a></li>
                        <li><a class="dropdown-item" href="/product/show">Product Management</a></li>
                        <li><a class="dropdown-item" href="/customer_order/show/pending">Customer Orders</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/user/settings">Settings</a></li>
                        <li><a class="dropdown-item" href="/wishlist/show">Wishlist</a></li>
                        <li><a class="dropdown-item" href="/cart/show">Shopping Cart</a></li>
                        <li><a class="dropdown-item" href="/order/show">Order</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <form action="/user/logout" method="post">
            <div class="text-center text-lg-start">
                @csrf
                <button type="submit" class="btn btn-success">
                    Logout
                </button>
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
                <a class="nav-link {{ ($title == "Home | Main") ? 'active' : '' }}"  href="/">
                    Home
                </a>
            </li>
            </ul>
        </div>
        <div class="text-center text-lg-start">
            <a href="/user/login"  type="button" class="btn btn-success">
                Login
            </a>
        </div>
        </div>
    </nav>
@endauth