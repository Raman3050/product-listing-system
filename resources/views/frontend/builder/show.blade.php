@extends("layouts.frontend")

@section("title", $builder->name . " | Commercial Spaces")

@section("content")

    <main class="about-page">
        <section class="about-page-hero">
            <div class="about-page-hero__media">
                <img src="{{ asset('frontend_assets/images/hero/hero-bg-image-metal1.jpg') }}" alt="Commercial Spaces team at work" />
                <div class="about-page-hero__overlay"></div>
            </div>
            <div class="container about-page-hero__content" data-aos="fade-up" data-aos-duration="900">
                <div class="about-page-hero_content_wrap">

                    <h1>{{ $builder->name }}</h1>
                    <p>{{ strip_tags($builder->description) }}</p>
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
                            Projects by
                        </div>
                        <h2 class="inner-section-title">{{ $builder->name }}</h2>
                    </div>
                </div>
                                <div class="row mb-5 gy-4">
                    @forelse($builder->projects as $proj)
                    <div class="col-lg-6">
                        <div class="property-card">
                            <div class="property-image">
                                <img src="{{ Storage::disk('public')->url($proj->featured_image) }}" alt="{{ $proj->name }}">
                                <div class="property-overlay"></div>
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
                                    <div class="property-content">
                                        <div class="property-label d-none">
                                            <span></span>
                                            UNDER CONSTRUCTION
                                        </div>
                                        <h2>{{ $proj->name }}</h2>
                                        <div class="location">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            {{ $proj->location->name ?? '' }}
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($proj->description), 120) }}</p>
                                    </div>
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
                                            <div class="property-buttons">
                                                <a href="{{ route('catalog.show', [$builder->slug, $proj->slug]) }}" class="explore-btn">
                                                    EXPLORE <i data-lucide="arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>No projects found for this builder.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>



    </main>


    @endsection
