<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head');
</head>

<body>
    @include('shared.navBar')
    <main class="site-main">
        @yield('content')
    </main>
    @include('shared.footer')
    @include('shared.scripts')
</body>

</html>
