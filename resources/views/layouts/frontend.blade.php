<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.frontend.head')
</head>
<body>
    @include('partials.frontend.navbar')

    @yield('hero')

    @yield('content')

    @include('partials.frontend.footer')

    @include('partials.frontend.scripts')
</body>
</html>