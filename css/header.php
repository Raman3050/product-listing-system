<!-- Bootstrap 5.3 -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Swiper -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Bricolage+Grotesque:ital,opsz,wght@0,12..96,500;0,12..96,700;1,12..96,500;1,12..96,700&display=swap"
    rel="stylesheet">
  <!-- AOS CSS - add inside <head> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- ============ HEADER ============ -->
<header class="main-header" id="mainHeader">
    <div class="glass-nav">
        <!-- Logo -->
        <a href="index.php" class="brand">
            <img style="    max-width: 250px;" src="images/logo/commercial-spaces.png" alt="">
        </a>
        <!-- Desktop Navigation -->
        <ul class="nav-links desktop-nav d-none d-lg-flex">
            <li>
                <a href="index.php" class="active">Home</a>
            </li>
            <li>
                <a href="about.php">About Us</a>
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
                                <a href="builder-projects-list.php">Residential Investment</a>
                            </li>
                            <li>
                                <a href="builder-projects-list.php">Commercial Investment</a>
                            </li>
                            <li>
                                <a href="builder-projects-list.php">Pre-Leased Assets</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="builder-projects-list.php">Pre Leased</a>
            </li>
            <li>
                <a href="builder-projects-list.php">New Launch</a>
            </li>
            <li>
                <a href="contact-us.php">
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
        <a href="index.php" class="brand">
            <img style="    width: 250px;" src="images/logo/commercial-spaces.png" alt="">
        </a>
        <button class="panel-close" id="panelClose" aria-label="Close menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="panel-eyebrow">Menu</div>
    <ul class="nav-links mobile-nav">
        <li>
            <a href="index.php" class="active">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="about.php">
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
                            <a href="builder-projects-list.php">
                                Residential Investment
                            </a>
                        </li>
                        <li>
                            <a href="builder-projects-list.php">
                                Commercial Investment
                            </a>
                        </li>
                        <li>
                            <a href="builder-projects-list.php">
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
            <a
                href="contact-us.php"
                >
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
<!-- 
data-bs-toggle="modal"
                data-bs-target="#sideImageModal" -->