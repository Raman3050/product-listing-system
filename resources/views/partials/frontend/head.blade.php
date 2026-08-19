<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Commercial Spaces')</title>

<!-- Bootstrap 5.3 -->
<link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<!-- Swiper -->
<link rel="stylesheet" href="{{ asset('frontend_assets/css/swiper-bundle.min.css') }}">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Bricolage+Grotesque:ital,opsz,wght@0,12..96,500;0,12..96,700;1,12..96,500;1,12..96,700&display=swap" rel="stylesheet">
<!-- AOS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">
<link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">

@stack('styles')
