<!DOCTYPE html>
<html lang="en">

@include('partials.admin.head')

<body>

<div class="admin-wrapper">

    @include('partials.admin.sidebar')

    <div class="main-wrapper">

        @include('partials.admin.navbar')

        <main class="main-content">

            @include('partials.admin.flash-message')

            @include("partials.admin.breadcrumbs", [
                "breadcrumbs" => $breadcrumbs ?? null
            ])

            @yield('content')

        </main>

        @include('partials.admin.footer')

    </div>

</div>

@include('partials.admin.scripts')

</body>

</html>