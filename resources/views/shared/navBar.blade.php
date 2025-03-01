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
                                <li class="nav-item"><a class="nav-link" href="#">Product Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Confirmation</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Shopping Cart</a></li>
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
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('productsUser.index') }}">View
                                            Products</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('connect.index') }}">Contact</a></li>
                    </ul>
                    <ul class="nav-shop d-flex align-items-center">
                        <li class="">
                            @if (auth()->user())
                                <a href="{{ route('profile.index', auth()->user()->id) }}" class="mr-2">
                                    <img src={{ asset(auth()->user()->photo ? Storage::url(auth()->user()->photo) : 'img/def.png') }}
                                        class="rounded-circle object-fit-cover"
                                        style="aspect-ratio: 1; border-radius: 50%;" width="45" height="45"
                                        alt="UserImage">
                                </a>
                            @endif
                        </li>
                        @if (auth()->user())
                            @if (Route::is('profile.index'))
                                <form action="{{ route('notification.index') }}" method="GET">
                                    @csrf
                                    <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                                        class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 14 20">
                                            <path
                                                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                                        </svg>

                                        <div
                                            class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900">
                                        </div>
                                    </button>
                                </form>
                                <div id="dropdownNotification"
                                    class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-800 dark:divide-gray-700"
                                    aria-labelledby="dropdownNotificationButton">
                                    <div
                                        class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                        Notifications
                                    </div>
                                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                        @forelse (auth()->user()->receivedNotifications->sortByDesc('created_at') as $notification)
                                            <a href="#"
                                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <div class="shrink-0 mr-3">
                                                    <img class="rounded-circle object-fit-cover"
                                                        style="aspect-ratio: 1; border-radius: 50%;" width="60"
                                                        height="60"
                                                        src={{ asset($notification->sender->photo ? Storage::url($notification->sender->photo) : 'img/def.png') }}
                                                        alt="Jese image">

                                                </div>
                                                <div class="w-full ps-3">
                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                                        <span
                                                            class="font-semibold d-block text-gray-900 dark:text-white">
                                                            from {{ $notification->sender->name }} </span>
                                                        <p>
                                                            {{ $notification->message }}
                                                        </p>
                                                    </div>
                                                    <div class="text-xs text-blue-600 dark:text-blue-500">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                        @endforelse
                                    </div>
                                    <a href="#"
                                        class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                        <div class="inline-flex items-center ">
                                            <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 14">
                                                <path
                                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                            </svg>
                                            <span class="ml-2"> View all </span>
                                        </div>
                                    </a>
                                </div>
                            @endif
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
