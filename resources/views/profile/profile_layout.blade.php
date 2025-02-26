<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
    <div class="bg-gray-100 min-h-screen">
        @include('shared.navBar')
        @yield('content')
    </div>
    @include('shared.scripts')
</body>

</html>
