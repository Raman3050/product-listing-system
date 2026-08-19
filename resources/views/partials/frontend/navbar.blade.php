<!-- ============ HEADER ============ -->
<header class="main-header" id="mainHeader">
    <div class="glass-nav">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="brand">
            <img style="    max-width: 250px;" src="{{ asset('frontend_assets/images/logo/commercial-spaces.png') }}" alt="">
        </a>
        <!-- Desktop Navigation -->
        <ul class="nav-links desktop-nav d-none d-lg-flex">
            <li>
                <a href="{{ route('home') }}" class="active">Home</a>
            </li>
            <li>
                <a href="{{ route('about') }}">About Us</a>
            </li>
            <!-- LEVEL 1 -->
            <li class="has-submenu">
                <a href="#services">
                    Properties
                    <i class="bi bi-chevron-down menu-arrow"></i>
                </a>
                <!-- LEVEL 2 -->
                <ul class="submenu">
                    <li>
                        <a href="#">
                            Property Consulting
                        </a>
                    </li>
                    <!-- Has Level 3 -->
                    <li class="has-submenu">
                        <a href="#">
                            Property Services
                            <i class="bi bi-chevron-right menu-arrow"></i>
                        </a>
                        <!-- LEVEL 3 -->
                        <ul class="submenu submenu-level-3">
                            <li>
                                <a href="#">Property Buying</a>
                            </li>
                            <li>
                                <a href="#">Property Selling</a>
                            </li>
                            <li>
                                <a href="#">Property Leasing</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Another Level 3 Example -->
                    <li class="has-submenu">
                        <a href="#">
                            Investment Services
                            <i class="bi bi-chevron-right menu-arrow"></i>
                        </a>
                        <ul class="submenu submenu-level-3">
                            <li>
                                <a href="#">Residential Investment</a>
                            </li>
                            <li>
                                <a href="#">Commercial Investment</a>
                            </li>
                            <li>
                                <a href="#">Pre-Leased Assets</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#Preleased">Pre Leased</a>
            </li>
            <li>
                <a href="#newlaunch">New Launch</a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Contact Us
                </a>
            </li>
        </ul>
        <!-- Right cluster -->
        <div class="nav-right">
            <a href="#" class="header-call d-none d-xxl-inline-flex">
                <i class="bi bi-telephone-fill"></i> 98 5844 5000
            </a>
            <a href="#" class="btn-glass-cta d-none d-xl-inline-block" id="enquiryFab" data-bs-toggle="modal" data-bs-target="#enquiryModal" aria-label="Enquiry Now">Enquire Now</a>
            <!-- Hamburger -->
            <button class="burger-btn" id="burgerBtn" aria-label="Open menu">
                <span></span>
            </button>
        </div>
    </div>
</header>
<!-- ============ MOBILE SIDE PANEL ============ -->
<div class="mobile-overlay" id="mobileOverlay"></div>
<aside class="mobile-panel" id="mobilePanel">
    <div class="panel-top">
        <a href="{{ route('home') }}" class="brand">
            <img style="    width: 250px;" src="{{ asset('frontend_assets/images/logo/commercial-spaces.png') }}" alt="">
        </a>
        <button class="panel-close" id="panelClose" aria-label="Close menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="panel-eyebrow">Menu</div>
    <ul class="nav-links mobile-nav">
        <li>
            <a href="{{ route('home') }}" class="active">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('about') }}">
                <i class="bi bi-people"></i>
                <span>About Us</span>
            </a>
        </li>
        <!-- LEVEL 1 -->
        <li class="mobile-has-submenu">
            <button
                type="button"
                class="mobile-menu-toggle">
                <span class="mobile-menu-label">
                    <i class="bi bi-briefcase"></i>
                    <span>Properties</span>
                </span>
                <i class="bi bi-chevron-down submenu-arrow"></i>
            </button>
            <!-- LEVEL 2 -->
            <ul class="mobile-submenu">
                <li>
                    <a href="#">
                        Property Consulting
                    </a>
                </li>
                <!-- LEVEL 3 Parent -->
                <li class="mobile-has-submenu">
                    <button
                        type="button"
                        class="mobile-menu-toggle mobile-level-2-toggle">
                        <span>
                            Property Services
                        </span>
                        <i class="bi bi-chevron-down submenu-arrow"></i>
                    </button>
                    <!-- LEVEL 3 -->
                    <ul class="mobile-submenu mobile-submenu-level-3">
                        <li>
                            <a href="#">
                                Property Buying
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Property Selling
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Property Leasing
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Another Level 3 -->
                <li class="mobile-has-submenu">
                    <button
                        type="button"
                        class="mobile-menu-toggle mobile-level-2-toggle">
                        <span>
                            Investment Services
                        </span>
                        <i class="bi bi-chevron-down submenu-arrow"></i>
                    </button>
                    <ul class="mobile-submenu mobile-submenu-level-3">
                        <li>
                            <a href="#">
                                Residential Investment
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Commercial Investment
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Pre-Leased Assets
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#Preleased">
                <i class="bi bi-building-check"></i>
                <span>Pre Leased</span>
            </a>
        </li>
        <li>
            <a href="#newlaunch">
                <i class="bi bi-rocket-takeoff"></i>
                <span>New Launch</span>
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact Us</span>
            </a>
        </li>
    </ul>
    <div class="panel-footer">
        <a href="#" class="panel-call">
            <i class="bi bi-telephone-fill"></i> 98 5844 5000
        </a>
        <a href="#0" class="btn-glass-cta" id="enquiryFab" data-bs-toggle="modal" data-bs-target="#enquiryModal" aria-label="Enquiry Now">Enquire Now</a>
    </div>
</aside>