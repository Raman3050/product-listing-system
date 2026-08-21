@extends("layouts.frontend")

@section("title", "New Launch | Commercial Spaces")

@section("content")

    <main class="about-page">
        <section class="about-page-hero">
            <div class="about-page-hero__media">
                <img src="{{ asset('frontend_assets/images/hero/hero-bg-image-metal1.jpg') }}" alt="Commercial Spaces team at work" />
                <div class="about-page-hero__overlay"></div>
            </div>
            <div class="container about-page-hero__content" data-aos="fade-up" data-aos-duration="900">
                <div class="about-page-hero_content_wrap">

                    <h1>New Commercial <em>Launches</em></h1>
                    <p>
                        Curated pre-leased and pre-launch commercial spaces — retail, office and food court units from
                        Gurugram's leading developers, handpicked for rental yield and long-term appreciation.
                    </p>
                </div>

            </div>
        </section>


        <section>
            <div class="container">
                <!-- filter bar -->
                <div class="filter-bar">
                    <div class="row g-3 align-items-end">
                        <div class="col-6 col-md-3">
                            <label class="form-label">Location</label>
                            <select class="form-select">
                                <option>All Locations</option>
                                <option>Sohna Road</option>
                                <option>Golf Course Ext. Road</option>
                                <option>NH-8</option>
                                <option>Sector 65-70</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label">Property Type</label>
                            <select class="form-select">
                                <option>All Types</option>
                                <option>Retail Shop</option>
                                <option>Office Space</option>
                                <option>Food Court</option>
                                <option>Studio Unit</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2">
                            <label class="form-label">Budget</label>
                            <select class="form-select">
                                <option>Any Budget</option>
                                <option>Under ₹50L</option>
                                <option>₹50L – ₹1Cr</option>
                                <option>₹1Cr – ₂Cr</option>
                                <option>Above ₹2Cr</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2">
                            <label class="form-label">Possession</label>
                            <select class="form-select">
                                <option>Any</option>
                                <option>Ready to Move</option>
                                <option>Under Construction</option>
                                <option>New Launch</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2 d-grid">
                            <button class="btn-gold"><i class="lucide-search"
                                    style="margin-right:6px;"></i>Search</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="new-launch">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-8">
                        <div class="intro-eyebrow mb-2">
                            Just Announced
                        </div>
                        <h2 class="inner-section-title">New Launches</h2>
                    </div>
                </div>
                <div class="row mb-5 gy-4">
                    <div class="col-lg-6">
                        <div class="property-card">
                            <div class="property-image">
                                <img src="{{ asset('frontend_assets/images/projects/aipl-joy-square.jpg') }}" alt="Property">
                                <div class="property-overlay"></div>
                                <!-- Top Bar -->
                                <div class="property-top">
                                    <div class="property-category">
                                        <span></span>
                                        COMMERCIAL
                                    </div>
                                    <div class="property-badge">
                                        <span class="badge-dot"></span>
                                        4 AVAILABLE UNITS
                                    </div>
                                </div>
                                <div class="property-content-wrapper">
                                    <!-- Content -->
                                    <div class="property-content">
                                        <div class="property-label d-none ">
                                            <span></span>
                                            UNDER CONSTRUCTION
                                        </div>
                                        <h2>
                                            Aipl Joy Square
                                        </h2>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            Sector-88, Gurugram
                                        </div>
                                        <p>
                                            Discover a wide range of commercial properties in Gurugram. We simplify your
                                            search for office, retail, and industrial spaces to meet your requirements.
                                        </p>
                                    </div>
                                    <!-- Bottom -->
                                    <div class="property-footer">
                                        <div class="property-info">
                                            <div class="info-box">
                                                <small>investment starts</small>
                                                <h3>@ 5.78 Cr</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>TOTAL UNITS</small>
                                                <h3>7</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>AVAILABLE</small>
                                                <h3 class="available">57%</h3>
                                            </div>
                                        </div>
                                        <div class="div">
                                            <div class="property-brand-strip d-none ">
                                                <div class="brand-logos">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/barbeque.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/bata.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Benetton.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/calvin_klein.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Chaayos-tea.png') }}" alt="">
                                                    <span>
                                                        Present Brands
                                                        More Than 50+
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="property-buttons">
                                                <a href="#" class="explore-btn">
                                                    EXPLORE
                                                    <i data-lucide="arrow-right"></i>
                                                </a>
                                                <button class="save-btn d-none">
                                                    <i data-lucide="heart"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="property-card">
                            <div class="property-image">
                                <img src="{{ asset('frontend_assets/images/projects/airia-mall-business-District-Sec-68.webp') }}" alt="Property">
                                <div class="property-overlay"></div>
                                <!-- Top Bar -->
                                <div class="property-top">
                                    <div class="property-category">
                                        <span></span>
                                        COMMERCIAL
                                    </div>
                                    <div class="property-badge">
                                        <span class="badge-dot"></span>
                                        4 AVAILABLE UNITS
                                    </div>
                                </div>
                                <div class="property-content-wrapper">
                                    <!-- Content -->
                                    <div class="property-content">
                                        <div class="property-label d-none">
                                            <span></span>
                                            UNDER CONSTRUCTION
                                        </div>
                                        <h2>
                                            Airia Mall Business District
                                        </h2>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            Sector-68, Gurugram
                                        </div>
                                        <p>
                                            Located just 60 metres from the beach near Tamarin Bay,
                                            147 International Residences offers an exclusive lifestyle
                                            on Mauritius' west coast.
                                        </p>
                                    </div>
                                    <!-- Bottom -->
                                    <div class="property-footer">
                                        <div class="property-info">
                                            <div class="info-box">
                                                <small>investment starts</small>
                                                <h3>@ 5.78 Cr</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>TOTAL UNITS</small>
                                                <h3>7</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>AVAILABLE</small>
                                                <h3 class="available">57%</h3>
                                            </div>
                                        </div>
                                        <div class="div">
                                            <div class="property-brand-strip d-none">
                                                <div class="brand-logos">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/barbeque.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/bata.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Benetton.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/calvin_klein.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Chaayos-tea.png') }}" alt="">
                                                    <span>
                                                        Present Brands
                                                        More Than 50+
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="property-buttons">
                                                <a href="#" class="explore-btn">
                                                    EXPLORE
                                                    <i data-lucide="arrow-right"></i>
                                                </a>
                                                <button class="save-btn d-none">
                                                    <i data-lucide="heart"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="property-card">
                            <div class="property-image">
                                <img src="{{ asset('frontend_assets/images/projects/dlf-club-arcade-sec-91.webp') }}" alt="Property">
                                <div class="property-overlay"></div>
                                <!-- Top Bar -->
                                <div class="property-top">
                                    <div class="property-category">
                                        <span></span>
                                        COMMERCIAL
                                    </div>
                                    <div class="property-badge">
                                        <span class="badge-dot"></span>
                                        4 AVAILABLE UNITS
                                    </div>
                                </div>
                                <div class="property-content-wrapper">
                                    <!-- Content -->
                                    <div class="property-content">
                                        <div class="property-label d-none">
                                            <span></span>
                                            UNDER CONSTRUCTION
                                        </div>
                                        <h2>
                                            DLF Club Arcade Sec 91
                                        </h2>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            Sector-91, Gurugram
                                        </div>
                                        <p>
                                            Club Arcade is a premium high-street retail and commercial development by
                                            DLF, located within the large integrated township of DLF Garden City, Sector
                                            91, New Gurugram.
                                        </p>
                                    </div>
                                    <!-- Bottom -->
                                    <div class="property-footer">
                                        <div class="property-info">
                                            <div class="info-box">
                                                <small>investment starts</small>
                                                <h3>@ 5.78 Cr</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>TOTAL UNITS</small>
                                                <h3>7</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>AVAILABLE</small>
                                                <h3 class="available">57%</h3>
                                            </div>
                                        </div>
                                        <div class="div">
                                            <div class="property-brand-strip d-none">
                                                <div class="brand-logos">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/barbeque.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/bata.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Benetton.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/calvin_klein.png') }}" alt="">
                                                    <img src="{{ asset('frontend_assets/images/project-present-brands/Chaayos-tea.png') }}" alt="">
                                                    <span>
                                                        Present Brands
                                                        More Than 50+
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="property-buttons">
                                                <a href="#" class="explore-btn">
                                                    EXPLORE
                                                    <i data-lucide="arrow-right"></i>
                                                </a>
                                                <button class="save-btn d-none">
                                                    <i data-lucide="heart"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>


    @endsection
