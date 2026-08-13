@extends('layouts.frontend')

@section('content')


    <main class="about-page">
        <section class="about-page-hero">
            <div class="about-page-hero__media">
                <img src="{{ asset('frontend_assets/images/hero/hero-bg-image-metal2.webp') }}" alt="Commercial Spaces team at work" />
                <div class="about-page-hero__overlay"></div>
            </div>
            <div class="container about-page-hero__content" data-aos="fade-up" data-aos-duration="900">
                <div class="about-page-hero_content_wrap">

                    <h1>Commercial spaces that elevate business growth.</h1>
                    <p>
                        We blend local market insight, investor-first strategy and a deep understanding of Gurgaon’s
                        commercial landscape to help clients unlock the right opportunity with confidence.
                    </p>
                </div>
                <div class="about-page-hero__actions">
                    <a href="{{ route('home') }}" class="hero-btn">Explore Properties</a>
                    <a href="#" class="about-page-ghost-btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">Book
                        a Consultation</a>
                </div>
            </div>
        </section>

        <section class="about-page-story section-xxl">
            <div class="container-inner">
                <div class="row gy-2 gy-md-5 justify-content-between align-items-start about-page-story-top">
                    <div class="col-lg-5" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="about-page-hero-headline">Trusted Commercial Real Estate Advisory in Gurgaon</h2>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up" data-aos-duration="900">
                        <div class="about-story-text">
                            <p>
                                Commercial Spaces team is a Gurgaon-based commercial real estate advisory firm helping
                                investors, business owners and corporate buyers identify suitable pre-leased commercial
                                properties and new commercial projects in Gurugram.
                            </p>
                            <p>
                                With a strong focus on transparency, RERA-compliant projects and market-backed
                                evaluation, we help clients navigate Gurgaon’s commercial property market with greater
                                clarity and confidence.
                            </p>
                            <p>
                                Our advisory services cover leading business and investment locations, including Golf
                                Course Road, Golf Course Extension Road, Dwarka Expressway, Southern Peripheral Road,
                                Sohna Road, New Gurgaon and key DLF sectors.
                            </p>
                            <p>
                                From pre-leased Grade-A offices and high-street retail properties to promising new
                                commercial launches, we provide carefully shortlisted opportunities backed by market
                                insights and local experience.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row gy-2 gy-lg-4 align-items-center about-page-story-bottom" data-aos="fade-up"
                    data-aos-duration="900">
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="about-page-stat-card about-page-stat-card--compact">
                                    <span>25+</span>
                                    <p>Properties Developed</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about-page-stat-card about-page-stat-card--compact">
                                    <span>20+</span>
                                    <p>Years of Experience</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about-page-stat-card about-page-stat-card--compact">
                                    <span>100%</span>
                                    <p>Delighted Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-page-story__image">
                            <img src="{{ asset('frontend_assets/images/projects/aipl-joy-district-sec-88.webp') }}"
                                alt="Modern commercial real estate advisory" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-page-principles section-xxl">
            <div class="container-inner">
                <div class="row justify-content-center mb-5">
                    <div class="col-xl-10 text-center">
                        <h2 class="section-title">The Principles Behind Everything We Build</h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800">
                        <article class="principle-card ">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="principle-card__number">01</div>
                                <div class="principle-card__title">Craftsmanship That Defines Value</div>
                            </div>
                            <hr>
                            <div class="section-content">
                                <p>Our properties embody a premium blend of strategic location, functional design and
                                    commercial viability, creating spaces that support long-term business performance.
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="900">
                        <article class="principle-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="principle-card__number">02</div>
                                <div class="principle-card__title">Sustainable Growth in Key Markets</div>
                            </div>
                            <hr>
                            <div class="section-content">
                                <p>We focus on Gurgaon’s most attractive commercial corridors and emerging investment
                                    hubs, helping clients secure assets with strong demand and solid future value.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                        <article class="principle-card">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="principle-card__number">03</div>
                                <div class="principle-card__title">Investor-Centric Advisory</div>
                            </div>
                            <hr>
                            <div class="section-content">

                                <p>From pre-leased retail to new launches, our advisory approach is built on
                                    transparency, market insight and a commitment to finding the right opportunity for
                                    every client.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>

    
@endsection
