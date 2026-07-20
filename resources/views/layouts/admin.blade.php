<!DOCTYPE html>
<html lang="en">

@include('partials.admin.head')

<body>

<div class="wrapper">

    @include('partials.admin.navbar')

    <div class="container-fluid">

        <div class="row">

            @include('partials.admin.sidebar')

            <main class="col-md-10 ms-sm-auto px-4 py-4">

                @include('partials.admin.flash-message')

                @yield('content')

            </main>

        </div>

    </div>

    @include('partials.admin.footer')

</div>

@include('partials.admin.scripts')

</body>
</html>