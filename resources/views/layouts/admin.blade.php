<!DOCTYPE html>
<html lang="en">

@include('partials.admin.head')

<body>

    @include('partials.admin.sidebar')

    <div class="main-wrapper">

        @include('partials.admin.navbar')

        <main class="content">

            @include('partials.admin.flash-message')

            @yield('content')

        </main>

        @include('partials.admin.footer')

    </div>

    @include('partials.admin.scripts')

</body>
</html>