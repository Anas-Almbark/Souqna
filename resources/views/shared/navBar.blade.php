<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('home.index') }}"><img src="{{ asset('img/logo.png') }}"
                        alt="logo" width="180"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset d-flex align-items-center" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Shop
                                        Category</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Product
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                                <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                @if (!auth()->user())
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href={{ route('register') }}>Register</a>
                                    </li>
                                @endif
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('tracking.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        @if (auth()->user())
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Products </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Add
                                            Product</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">View
                                            Products</a></li>



                                </ul>
                            </li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('connect.index') }}">Contact</a></li>
                    </ul>
                    <ul class="nav-shop d-flex align-items-center">
                        <li>
                            <a href="{{ route('profile.index') }}">
                                @if (auth()->user())
                                    <img src={{ asset(auth()->user()->photo ? Storage::url(auth()->user()->photo) : 'img/def.png') }}
                                        class="rounded-circle object-fit-cover"
                                        style="aspect-ratio: 1; border-radius: 50%;" width="50" height="50"
                                        alt="UserImage">
                                @endif

                            </a>
                        </li>
                        @if (auth()->user())
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="button button-header border border-blue-500 py-2 px-4 rounded-lg hover:border-blue-500"
                                        href="{{ route('logout') }}">Logout</button>
                                </form>

                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
