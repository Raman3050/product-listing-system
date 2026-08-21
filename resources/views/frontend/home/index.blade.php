@extends('layouts.frontend')

@php
    if (!function_exists('formatIndianPrice')) {
        function formatIndianPrice($price) {
            if (empty($price)) return 'On Request';
            if (is_numeric($price)) {
                if ($price >= 10000000) {
                    $val = $price / 10000000;
                    $formatted = number_format($val, 2, '.', '');
                    return rtrim(rtrim($formatted, '0'), '.') . ' Cr';
                } else {
                    $val = $price / 100000;
                    $formatted = number_format($val, 2, '.', '');
                    return rtrim(rtrim($formatted, '0'), '.') . ' L';
                }
            }
            return $price;
        }
    }
@endphp

@section('content')

    <!-- ================= HERO SLIDER ================= -->
    <section class="hero-slider">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide hero-slide">
                    <img src="{{ Storage::disk('public')->url($banner->background_image) }}" alt="{{ strip_tags($banner->heading) }}" class="hero-bg" />
                    <div class="hero-overlay"></div>
                    <div class="container hero-container">
                        <div class="hero-content-box" data-aos="fade-up" data-aos-duration="1000">
                            <span class="hero-eyebrow">
                                {{ $banner->yellow_tagline }}
                            </span>
                            <h1>
                                @if($banner->heading)
                                    {!! preg_replace('/(\S+)\s*$/', '<span>$1</span>', trim($banner->heading)) !!}
                                @endif
                            </h1>
                            <p>
                                {{ $banner->description }}
                            </p>
                            @if($banner->project)
                            <a href="{{ route('catalog.show', [$banner->project->builder->slug, $banner->project->slug]) }}" class="hero-btn">
                                {{ $banner->button_text ?: 'Explore Properties' }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @if($banner->project && $banner->unit)
                    <!-- Featured Property Card -->
                    <div class="featured-property-card">
                        <div class="featured-label">
                            <span></span>
                            {{ 'RETAIL / COMMERCIAL' }}
                        </div>
                        <h3>{{ $banner->card_title ?: $banner->project->name }}</h3>
                        <div class="featured-meta">
                            <div class="meta-item">
                                <i data-lucide="building-2"></i>
                                <span>{{ $banner->project->propertyCategory->name ?? 'Retail' }}</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="store"></i>
                                <span>{{ $banner->card_brand ?: ($banner->unit->tenant->name ?? 'N/A') }}</span>
                            </div>
                            <div class="meta-item">
                                <i data-lucide="maximize"></i>
                                <span>{{ $banner->card_area ?: ($banner->unit->floor_size . ' Sqft') }}</span>
                            </div>
                        </div>
                        <div class="featured-price">
                            Starts @ {{ formatIndianPrice($banner->unit->price) }}
                        </div>
                        <a href="{{ route('catalog.show', [$banner->project->builder->slug, $banner->project->slug]) }}" class="featured-link">
                            <span>View Property</span>
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Navigation -->
            <button class="hero-prev" aria-label="Previous slide">
                <i class="bi bi-arrow-left"></i>
            </button>
            <button class="hero-next" aria-label="Next slide">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </section>
    <!-- Logo slider  -->
    <section class="featured-logos">
        <div class="container px-0">
            <div class="row justify-content-center pb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-lg-8 text-center">
                    <p style="font-family: manrope, sans-serif;
                      font-size: 20px;
                      font-weight: 500;
                      line-height: 42px;
                      color: rgb(64, 64, 56);">We’re privileged to work with leading innovators.</p>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="800">
                <div class="col-xl-10">
                    <div class="swiper logoSwiper">
                        <div class="swiper-wrapper">
                            @foreach($logos as $logo)
                                @if($logo->builder && $logo->builder->logo)
                                    <div class="swiper-slide">
                                        <a href="{{ route('catalog.builder.show', $logo->builder->slug) }}">
                                            <img src="{{ Storage::disk('public')->url($logo->builder->logo) }}" alt="{{ $logo->builder->name }}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="about-intro section-xxl">
        <div class="container-inner">
            <div class="row align-items-center gy-3 gy-lg-5">
                <div class="col-lg-6 col-xxl-7">
                    <span class="section-tag" data-aos="fade-up" data-aos-duration="1000">
                        Welcome to The Commercial Space Group
                    </span>
                    <h2 class="section-title" data-aos="fade-up" data-aos-duration="800">
                        Trusted Commercial Real Estate Advisory in Gurgaon
                    </h2>
                </div>
                <div class="col-lg-6 col-xxl-5">
                    <div class="section-content">
                        <p data-aos="fade-up" data-aos-duration="800">
                            Commercial Spaces team is a Gurgaon-based commercial real estate advisory firm helping
                            investors, business owners and corporate buyers identify suitable pre-leased commercial
                            properties and new commercial projects in Gurugram.
                        </p>
                        <p data-aos="fade-up" data-aos-duration="900">With a strong focus on transparency,
                            RERA-compliant projects and market-backed evaluation, we
                            help clients navigate Gurgaon’s commercial property market with greater clarity and
                            confidence.</p>
                        <a href="{{ route('about') }}" class="read-more-btn" data-aos="fade-up" data-aos-duration="1000">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured property -->
    <section class="featured-section">
        <div class="container-inner">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 ">
                    <h3 class="section-title mb-2 text-center" data-aos="fade-up"
                        data-aos-duration="800">Featured Properties</h3>
                    <div class="section-content  text-center" data-aos="fade-up" data-aos-duration="1000">
                        <p>Handpicked investment opportunities designed to deliver better value, sustainable returns,
                            and long-term business success.</p>
                    </div>
                </div>
            </div>
            <div class="swiper featuredSwiper">
                <div class="swiper-wrapper">
                    @foreach($featuredProperties as $item)
                    <div class="swiper-slide">
                        <div class="featured-card">
                            <div class="photo-wrap">
                                @if($item->display_image)
                                    <img src="{{ Storage::disk('public')->url($item->display_image) }}" alt="{{ $item->project->name ?? 'Project' }}">
                                @elseif($item->project && $item->project->display_image)
                                    <img src="{{ Storage::disk('public')->url($item->project->display_image) }}" alt="{{ $item->project->name }}">
                                @endif
                                <div class="photo-overlay"></div>
                                <div class="badge">{{'RETAIL / COMMERCIAL' }}</div>
                                <div class="price"><span>Investment Starts @</span>{{ formatIndianPrice($item->unit->price) }}</div>
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="title">{{ $item->project->name }}</div>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            {{ $item->project->location->name }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="property-logo">
                                            @if($item->project && $item->project->builder && $item->project->builder->logo)
                                                <img src="{{ Storage::disk('public')->url($item->project->builder->logo) }}" alt="{{ $item->project->builder->name }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="desc">
                                    @if($item->project && $item->project->pageDetails)
                                        {{ Str::limit(strip_tags($item->project->pageDetails->description), 150) }}
                                    @endif
                                </div>
                                <div class="stats">
                                    <div class="stat">
                                        <div class="label">Tenant</div>
                                        <div class="value">{{ $item->unit->tenant->name }}</div>
                                    </div>
                                    <div class="stat">
                                        <div class="label">Floor Size / Area</div>
                                        <div class="value">{{ $item->unit->floor_size }} Sqft</div>
                                    </div>
                                    <div class="stat">
                                        <div class="label">Leasing</div>
                                        <div class="value">{{ $item->unit->lease_status }} @if($item->unit->lock_in_years) ({{ $item->unit->lock_in_years }} yrs Lock In) @endif</div>
                                    </div>
                                </div>
                                <div class="row-stats">
                                    <div class="row-stat">
                                        <span class="label">Brand</span>
                                        <span class="value">{{ $item->unit->tenant->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="row-stat">
                                        <span class="label">Rental</span>
                                        <span class="value"> ₹ {{ $item->unit->minimum_rental ? number_format($item->unit->minimum_rental, 0) : ($item->unit->monthly_rental ? number_format($item->unit->monthly_rental, 0) : 'N/A') }} / Sqft</span>
                                    </div>
                                    <div class="row-stat">
                                        <span class="label">ROI</span>
                                        <span class="value">{{ $item->unit->annual_roi ?? 'N/A' }} %</span>
                                    </div>
                                </div>
                                <a href="{{ route('catalog.show', [$item->project->builder->slug, $item->project->slug]) }}" style="text-decoration: none;">
                                    <button class="cta">
                                        View Property
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#0d1520" stroke-width="2">
                                            <path d="M5 12h14M13 6l6 6-6 6" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Navigation -->
                <button class="property-prev" aria-label="Previous">
                    <i data-lucide="chevron-left"></i>
                </button>
                <button class="property-next" aria-label="Next">
                    <i data-lucide="chevron-right"></i>
                </button>
                <!-- pagination -->
                <div class="swiper-pagination property-pagination"></div>
            </div>
        </div>
    </section>
    <!-- property list section -->
    <section class="property-sec">
        <div class="container-inner">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 ">
                    <h3 class="section-title mb-2 text-center" data-aos="fade-up"
                        data-aos-duration="1000">Commercial Projects</h3>
                    <div class="section-content  text-center" data-aos="fade-up" data-aos-duration="800">
                        <p>Handpicked investment opportunities designed to deliver better value, sustainable returns,
                            and long-term business success.</p>
                    </div>
                </div>
            </div>
            <div class="swiper propertySwiper">
                <div class="swiper-wrapper">
                    @foreach($projects as $proj)
                    <div class="swiper-slide">
                        <div class="property-card">
                            <div class="property-image">
                                <img src="{{ Storage::disk('public')->url($proj->featured_image) }}" alt="{{ $proj->name }}">
                                <div class="property-overlay"></div>
                                <!-- Top Bar -->
                                <div class="property-top">
                                    <div class="property-category">
                                        <span></span>
                                        {{ strtoupper($proj->propertyCategory->name ?? 'COMMERCIAL') }}
                                    </div>
                                    <div class="property-badge">
                                        <span class="badge-dot"></span>
                                        {{ $proj->units()->count() }} AVAILABLE UNITS
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
                                            {{ $proj->name }}
                                        </h2>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            {{ $proj->location->name ?? '' }}
                                        </div>
                                        <p>
                                            {{ \Illuminate\Support\Str::limit(strip_tags($proj->description), 120) }}
                                        </p>
                                    </div>
                                    <!-- Bottom -->
                                    <div class="property-footer">
                                        <div class="property-info">
                                            <div class="info-box">
                                                <small>investment starts</small>
                                                <h3>@ {{ $proj->pageDetails->amount_start ?? 'N/A' }}</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>TOTAL UNITS</small>
                                                <h3>{{ $proj->total_units ?? 0 }}</h3>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="info-box">
                                                <small>AVAILABLE</small>
                                                <h3 class="available">
                                                    @if($proj->total_units > 0)
                                                        {{ round(($proj->units()->count() / $proj->total_units) * 100) }}%
                                                    @else
                                                        N/A
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="div">
                                            <div class="property-brand-strip d-none ">
                                                <div class="brand-logos">
                                                </div>
                                            </div>
                                            <div class="property-buttons">
                                                <a href="{{ route('catalog.show', [$proj->builder->slug, $proj->slug]) }}" class="explore-btn">
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
                    @endforeach

                </div>
                <!-- Navigation -->
                <button class="property-prev" aria-label="Previous">
                    <i data-lucide="chevron-left"></i>
                </button>
                <button class="property-next" aria-label="Next">
                    <i data-lucide="chevron-right"></i>
                </button>
                <!-- pagination -->
                <div class="swiper-pagination property-pagination"></div>
            </div>
        </div>
        </div>
    </section>
    <div class=" section-pad">
        <div class="container-inner">
            <div class="row justify-content-between align-items-center mb-5 gy-4">
                <div class="col-lg-6 col-xxl-5">
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1000">The Advantage of Choosing Us
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-content" data-aos="fade-up" data-aos-duration="800">
                        <p>Let's help you find a perfect property. With 15+ years of excellence, we create long-term
                            value through strategic planning, transparency, and an unwavering commitment to delivering
                            exceptional real estate opportunities.</p>
                    </div>
                </div>
            </div>
            <div class="pt-5 advantage">
                <div class="row  ">
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-duration="800">
                        <div class="item">
                            <img src="{{ asset('frontend_assets/images/shooting-target.png') }}" alt="">
                            <div class="sans label">100% Transparent Advisor</div>
                            <div class="sans desc">Every recommendation is backed by market insights, project
                                evaluation, transparent pricing, and clear investment guidance.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-divider" data-aos="fade-up" data-aos-duration="1000">
                        <div class="item">
                            <img src="{{ asset('frontend_assets/images/certification.png') }}" alt="">
                            <div class="sans label">15+ Years of Market Experience</div>
                            <div class="sans desc">Our Gurgaon commercial property expertise helps clients confidently
                                evaluate locations, developers, lease structures, and investment opportunities.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-divider" data-aos="fade-up" data-aos-duration="1200">
                        <div class="item">
                            <img src="{{ asset('frontend_assets/images/apartment.png') }}" alt="">
                            <div class="sans label">300+ Commercial Property Opportunities </div>
                            <div class="sans desc">Explore pre-leased offices, retail spaces, showrooms, and high-growth
                                commercial investment opportunities across Gurgaon.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-divider" data-aos="fade-up" data-aos-duration="1400">
                        <div class="item">
                            <img src="{{ asset('frontend_assets/images/blueprint.png') }}" alt="">
                            <div class="sans label">Strong Local Market Knowledge  </div>
                            <div class="sans desc">Expert advisory across Golf Course Road, Dwarka Expressway, SPR,
                                Sohna Road, New Gurgaon, and DLF sectors.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="cities-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-lg-8 ">
                    <h3 class="section-title mb-2 text-center" data-aos="fade-up"
                        data-aos-duration="800">Explore Property Options Across Gurgaon
                    </h3>
                    <div class="section-content  text-center" data-aos="fade-up" data-aos-duration="1000">
                        <p>Discover different locations in Gurgaon offering a wide range of residential and commercial
                            properties.</p>
                    </div>
                </div>
            </div>
            <div class="cities-grid">
                <!-- Large Card -->
                <a href="#" class="city-card" data-aos="fade-up" data-aos-duration="800">
                    <img src="{{ asset('frontend_assets/images/explore-gurugron/02.webp') }}" alt="">
                    <div class="overlay"></div>
                    <div class="city-content">
                        <h3>Sohna Road</h3>
                        <span>6 Properties</span>
                    </div>
                </a>
                <!-- Card -->
                <a href="#" class="city-card" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ asset('frontend_assets/images/explore-gurugron/03.webp') }}" alt="">
                    <div class="overlay"></div>
                    <div class="city-content">
                        <h3>Golf Course Road</h3>
                        <span>3 Properties</span>
                    </div>
                </a>
                <!-- Card -->
                <a href="#" class="city-card" data-aos="fade-up" data-aos-duration="1200">
                    <img src="{{ asset('frontend_assets/images/explore-gurugron/04.webp') }}" alt="">
                    <div class="overlay"></div>
                    <div class="city-content">
                        <h3>Golf Course Ext. Road</h3>
                        <span>2 Properties</span>
                    </div>
                </a>
                <!-- Card -->
                <a href="#" class="city-card" data-aos="fade-up" data-aos-duration="1400">
                    <img src="{{ asset('frontend_assets/images/explore-gurugron/01.webp') }}" alt="">
                    <div class="overlay"></div>
                    <div class="city-content">
                        <h3>Dwarka Expressway</h3>
                        <span>3 Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!--==============================
 Luxury Banner
================================-->
    <section class="luxury-banner">
        <div class="container-inner">
            <div class="luxury-banner-wrapper">
                <!-- Background Image -->
                <div class="luxury-banner-image">
                    <img src="{{ asset('frontend_assets/images/bg/success-counter-bg.webp') }}" alt="Luxury Residence">
                    <div class="luxury-overlay"></div>
                </div>
                <!-- Content -->
                <div class="luxury-banner-content">
                    <span class="luxury-subtitle">
                        Inspiring Spaces for Visionary Businesses
                    </span>
                    <h2 data-aos="fade-up" data-aos-duration="1000">
                        Commercial Spaces Built for Tomorrow
                    </h2>
                    <p data-aos="fade-up" data-aos-duration="800">
                        Invest in strategically located commercial developments offering world-class amenities,
                        excellent connectivity, and high-growth potential for businesses and investors alike.
                    </p>
                    <a href="#" class="luxury-btn" data-aos="fade-up" data-aos-duration="700">
                        Enquire Now
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div class="container-inner">
            <div class="row justify-content-center pb-3 pb-xl-5">
                <div class="col-lg-8 ">
                    <h3 class="section-title mb-2 text-center">Our Testimonials</h3>
                    <div class="section-content  text-center" data-aos="fade-up" data-aos-duration="800">
                        <p>Voices of Appreciation from Our Happy Clients</p>
                    </div>
                </div>
            </div>
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <span class="testimonial-title">
                                Great Return on Investment
                            </span>
                            <p class="testimonial-text">
                                Finding the right commercial property can be challenging, but this sales team made it
                                incredibly easy. They shortlisted projects based on my budget and investment
                                objectives, negotiated a great deal, and ensured complete transparency throughout
                                the process. I'm extremely satisfied with my purchase and positive about the future
                                ROI.
                            </p>
                            <div class="testimonial-user">
                                <span class="line"></span>
                                <div>
                                    <h5>
                                        Mr. Kevin Tipu Najhawan
                                    </h5>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i data-lucide="quote"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <span class="testimonial-title">
                                Professional Sales Team
                            </span>
                            <p class="testimonial-text">
                                The team's expertise and in-depth knowledge of the Gurgaon real estate market
                                impressed me from day one. They guided me at every stage from project shortlisting
                                and site visits to documentation and final conclusion. I secured an excellent
                                investment with strong appreciation potential. Thank you for your outstanding
                                service.
                            </p>
                            <div class="testimonial-user">
                                <span class="line"></span>
                                <div>
                                    <h5>
                                        Mr. Jag Mohan Chhabra
                                    </h5>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i data-lucide="quote"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <span class="testimonial-title">
                                Outstanding Support
                            </span>
                            <p class="testimonial-text">
                                I genuinely appreciate the hard work and dedication of the sales team. They listened
                                carefully to my requirements, shortlisted the most suitable commercial projects, and
                                helped me make an informed investment decision. Their support continued even
                                after the purchase, which reflects their commitment to customer fulfilment.
                            </p>
                            <div class="testimonial-user">
                                <span class="line"></span>
                                <div>
                                    <h5>
                                        Mr. Ramesh Mangal
                                    </h5>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i data-lucide="quote"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <span class="testimonial-title">
                                Excellent Investment Experience
                            </span>
                            <p class="testimonial-text">
                                Investing in a business property with their team was a great experience for me. They
                                were aware of my investment points and only selected the top choices with a high
                                potential return on investment. The whole purchasing procedure was easy and
                                hassle-free because to their industry knowledge, honesty, and expert advice. I have
                                no doubt that this investment will profit outstanding returns in the years to come.
                                Strongly advised.
                            </p>
                            <div class="testimonial-user">
                                <span class="line"></span>
                                <div>
                                    <h5>
                                        Mr. Vijay Kaul
                                    </h5>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i data-lucide="quote"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <span class="testimonial-title">
                                Best Commercial Investment
                            </span>
                            <p class="testimonial-text">
                                Every step of the process, from choosing the property to closing the sale, was done
                                expertly. In adding to comparing investment options and carefully outlining each
                                project, the team helped me in selecting a commercial property with a high rental
                                return and potential for future development. I sincerely value their devotion to
                                locating the perfect investment.
                            </p>
                            <div class="testimonial-user">
                                <span class="line"></span>
                                <div>
                                    <h5>
                                        Mr. James Washington
                                    </h5>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i data-lucide="quote"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
