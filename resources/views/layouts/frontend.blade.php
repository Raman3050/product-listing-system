<!DOCTYPE html>
<html lang="en">

@include('partials.frontend.head')

<body>

    @include('partials.frontend.navbar')

    @yield('hero')

    <main>

        @yield('content')

    </main>

    @include('partials.frontend.footer')

    @include('partials.frontend.scripts')

</body>
</html>