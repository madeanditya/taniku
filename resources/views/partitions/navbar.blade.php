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
                @can('supplier')                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Store
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/{{ auth()->user()->username }}">Stall</a></li>
                            <li><a class="dropdown-item" href="/product/show">Product Management</a></li>
                            <li><a class="dropdown-item" href="/customer_order/show/need_action">Customer Orders</a></li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Wishlist | Show") ? 'active' : '' }}"  href="/wishlist/show">
                        <i class="far fa-list-alt"></i> Wishlist
                    </a>
                </li>
                <li class="nav-item">
                   <a class="nav-link {{ ($title == "Cart | Show") ? 'active' : '' }}"  href="/cart/show">
                    <i class="fas fa-shopping-cart"></i> Shooping Cart
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/user/settings">Settings</a></li>
                        <li><a class="dropdown-item" href="/wishlist/show">Wishlist</a></li>
                        <li><a class="dropdown-item" href="/cart/show">Shopping Cart</a></li>
                        <li><a class="dropdown-item" href="/order/show/need_action">Order</a></li>
                    </ul>
                </li>
            </ul>
            <form action="/user/logout" method="post">
                <div class="text-center text-lg-start">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        Logout
                    </button>
                </div>
            </form>
        </div>
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