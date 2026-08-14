@extends('layouts.frontend')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;

    // Collect unique tenants across all project units for the "Active Brands" section
    $activeBrands = $project->units
        ->pluck('tenant')
        ->filter()
        ->unique('id');
@endphp

    <section class="project-banner">
        <div class="swiper main-slider banner-overlay">
            <div class="swiper-wrapper">
                @if($project->images->count() > 0)
                    @foreach($project->images as $image)
                        <div class="swiper-slide {{ $loop->first ? 'banner-overlay' : '' }}">
                            <img src="{{ Storage::url($image->image) }}" alt="{{ $project->name }}">
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="hero-prev">
                <i class="bi bi-arrow-left"></i>
            </div>
            <div class="hero-next"><i class="bi bi-arrow-right"></i></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="banner-content d-none">
            <h1>{{ $project->builder?->name }} PROJECTS</h1>
        </div>
        <div class="thumb-wrapper">
            <div class="swiper thumb-slider">
                <div class="swiper-wrapper">
                    @if($project->images->count() > 0)
                        @foreach($project->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}" alt="{{ $project->name }}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- ============ PROJECT HEADER (Logo + Name + Badge) ============ -->
    <div class="project-details-body">
        <section class="py-4 py-lg-5 project-details-header">
            <div class="container px-3 px-lg-4">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-4">
                    <!-- Left: Logo + Title -->
                    <div class="d-flex align-items-center gap-4">
                        @if($project->logo)
                            <div class="brand-logo">
                                <img src="{{ Storage::url($project->logo) }}" alt="{{ $project->name }}">
                            </div>
                        @endif
                        <div class="relative">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="rounded-pill bg-[#1c2440] text-white fw-semibold px-3 py-1"
                                    style="font-size:10px;letter-spacing:.08em;">{{ strtoupper($project->builder?->name ?? '') }} PROJECT</span>
                                @if($unit->lease_status)
                                    <span class="badge-project">{{ strtoupper($unit->lease_status) }}</span>
                                @endif
                            </div>
                            <h1 class="font-title fw-semibold mb-1 lh-1" style="font-size:2rem;">{{ $project->name }}</h1>
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <i data-lucide="map-pin" class="ic-sm"></i>
                                <span class="fw-semibold">{{ $project->location?->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ MAIN GRID ============ -->
        <section class="pb-5">
            <div class="container-xl px-3 px-lg-4">
                <div class="row">
                    <!-- LEFT CONTENT -->
                    <div class="col-12 col-lg-8">

                        <!-- OVERVIEW -->
                        @if($project->description)
                            <div class="card-block" id="overview">
                                <h2 class="section-title">Overview</h2>
                                <div class="text-muted lh-relaxed mb-2" style="font-size:.92rem;">
                                    {!! $project->description !!}
                                </div>
                            </div>
                        @endif

                        <!-- UNIT DETAILS -->
                        <div class="card-block" id="units">
                            <h2 class="section-title mb-0">Unit Details</h2>
                            <p class="text-muted small mb-4">{{ $unit->tenant?->name ?? '' }}{{ $unit->name ? ' – ' . $unit->name : '' }}</p>

                            <div class="unit-box open" data-unit>
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
                                    <div class="d-flex align-items-sm-center gap-3 flex-wrap flex-column flex-sm-row">
                                        @if($unit->tenant && $unit->tenant->logo)
                                            <div class="brand-logo-box">
                                                <img src="{{ Storage::url($unit->tenant->logo) }}" alt="{{ $unit->tenant->name }}">
                                            </div>
                                        @endif
                                        <div>
                                            <div class="lbl"
                                                style="font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:.12em;color:#6b7280;">
                                                BRAND</div>
                                            <div class="fw-bold" style="font-size:13px;">{{ $unit->tenant?->name ?? 'N/A' }}{{ $unit->name ? ' – ' . $unit->name : '' }}</div>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:34px;height:34px;background:#fafaf5;border:1px solid rgba(18,24,31,.1);"
                                        onclick="toggleUnit(this)">
                                        <i data-lucide="chevron-up" class="chev" style="width:16px;height:16px;"></i>
                                    </button>
                                </div>
                                <div class="unit-body is-open">
                                    <!-- Stats Grid -->
                                    <div class="row g-2 mb-3">
                                        @if($unit->annual_roi)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">ANNUAL ROI</div>
                                                    <div class="val" style="font-size:20px;">{{ $unit->annual_roi }}%*</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->lock_in_years)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">LOCK IN</div>
                                                    <div class="val" style="font-size:20px;">{{ $unit->lock_in_years }} Yrs</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->floor_size)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">FLOOR SIZE/AREA</div>
                                                    <div class="val" style="font-size:20px;">{{ number_format($unit->floor_size, 0) }} {{ $unit->floor_size_unit ?? 'Sqft' }}</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->tenant?->business_category)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">TENANT</div>
                                                    <div class="val" style="font-size:20px;">{{ $unit->tenant->business_category }}</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->monthly_rental)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">UP TO / MONTH</div>
                                                    <div class="val" style="font-size:20px;">{{ number_format($unit->monthly_rental / 100000, 2) }} L*</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->minimum_rental)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">MINIMUM RENTAL</div>
                                                    <div class="val" style="font-size:20px;">{{ number_format($unit->minimum_rental, 0) }}/-</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->lease_status)
                                            <div class="col-6 col-md-3">
                                                <div class="stat-cell">
                                                    <div class="lbl">LEASE</div>
                                                    <div class="val" style="font-size:20px;">{{ $unit->lease_status }}</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->features->count() > 0)
                                            <div class="col-12 col-md-3">
                                                <div class="stat-cell h-100">
                                                    <div class="unit-features">
                                                        <div class="lbl">
                                                            <i data-lucide="star"></i>
                                                            <span>UNIT FEATURES</span>
                                                        </div>
                                                        <ul>
                                                            @foreach($unit->features as $feature)
                                                                <li>
                                                                    <span class="bullet"></span>
                                                                    {{ $feature->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Unit Description -->
                                    @if($unit->description)
                                        <div class="rounded-3 p-3 mb-3"
                                            style="background:#fdf8ec;border:1px solid rgba(197,168,128,.25);">
                                            <p class="mb-0 small"
                                                style="color:var(--ink-soft);font-size:12.5px;line-height:1.6;">
                                                {{ $unit->description }}
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Actions -->
                                    <div class="d-flex flex-wrap align-items-center gap-2 justify-content-center">
                                        <a href="tel:+919858445000" class="cta-phone" title="Call Advisor">
                                            <i data-lucide="phone" style="width:16px;height:16px;"></i>
                                        </a>
                                        <button type="button" class="cta-dark"
                                            onclick="openSiteVisitModal('{{ $unit->tenant?->name ?? 'Unit' }} – {{ $project->name }}{{ $unit->name ? ', ' . $unit->name : '' }}')">
                                            <i data-lucide="calendar-check" class="ic-sm"></i>
                                            <span>Schedule Site Visit</span>
                                        </button>
                                        <a href="https://api.whatsapp.com/send?phone=919858445000&text={{ urlencode('Hi, I am interested in the ' . ($unit->tenant?->name ?? 'unit') . ' at ' . $project->name . '.') }}"
                                            target="_blank" class="cta-wa">
                                            <svg style="width:14px;height:14px;fill:currentColor;" viewBox="0 0 24 24">
                                                <path
                                                    d="M12.031 6c-3.313 0-6 2.687-6 6 0 1.25.385 2.41 1.047 3.375L6.156 19l3.781-.984A5.939 5.939 0 0 0 12.03 18c3.31 0 6-2.688 6-6s-2.69-6-6-6z" />
                                            </svg>
                                            <span>Chat Via WhatsApp</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVE BRANDS -->
                        @if($activeBrands->count() > 0)
                            <div class="card-block">
                                <h2 class="section-title mb-4">Active Brands</h2>
                                <div class="brands-grid">
                                    @foreach($activeBrands as $brand)
                                        @if($brand->logo)
                                            <div class="brand-chip">
                                                <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}"
                                                    class="brand-logo">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- FEATURES / AMENITIES -->
                        @if($project->amenities->count() > 0)
                            <div class="card-block" id="features">
                                <h2 class="section-title mb-4">Features</h2>
                                <div class="row g-3">
                                    @foreach($project->amenities as $amenity)
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="feat-item">
                                                <div class="feat-icon">
                                                    @if($amenity->icon)
                                                        <i class="bi bi-{{ $amenity->icon }} ic-md"></i>
                                                    @else
                                                        <i data-lucide="check-circle" class="ic-md"></i>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-semibold" style="font-size:13px;">{{ $amenity->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- FLOOR PLANS -->
                        @if($project->floor_plan_image || $project->floor_plan_pdf)
                            <div class="card-block">
                                <h2 class="section-title mb-4">Floor Plans</h2>

                                @if($project->floor_plan_image)
                                    <div class="floor-plan-box">
                                        <img src="{{ Storage::url($project->floor_plan_image) }}"
                                            class="floor-plan-img" alt="Floor Plan – {{ $project->name }}">
                                    </div>
                                @endif

                                @if($project->floor_plan_pdf)
                                    <div class="floor-plan-actions">
                                        <a href="{{ Storage::url($project->floor_plan_pdf) }}" target="_blank" class="cta-dark">
                                            <i data-lucide="download" class="ic-sm"></i>
                                            Download PDF
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- LOCATION -->
                        <div class="card-block" id="location">

                            <h2 class="section-title mb-2">Location</h2>

                            @if($project->address)
                                <p class="location-address">
                                    {{ $project->address }}
                                </p>
                            @endif

                            @if($project->google_maps_url)
                                <div class="location-map">
                                    <iframe class="map-frame"
                                        src="{{ $project->google_maps_url }}"
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            @endif

                            @if(!empty($project->nearby_locations) && count($project->nearby_locations) > 0)
                                <div class="row g-3 mt-4">
                                    @foreach($project->nearby_locations as $nearby)
                                        <div class="col-6 col-md-3">
                                            <div class="location-card">
                                                <div class="location-card-head">
                                                    <i data-lucide="map-pin" class="ic-md"></i>
                                                    <span>{{ $nearby['name'] ?? '' }}</span>
                                                </div>
                                                <div class="location-distance">
                                                    {{ $nearby['distance'] ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>

                    <!-- RIGHT STICKY SIDEBAR -->
                    <div class="col-lg-4 sidebar-col">
                        <div class="sticky-side">
                            @if($unit->price && !$unit->price_on_request)
                                <div class="invest-banner">
                                    <div class="lbl">Investment starts @</div>
                                    <div class="val">₹{{ number_format($unit->price / 100000, 2) }} L*</div>
                                </div>
                            @elseif($unit->price_on_request)
                                <div class="invest-banner">
                                    <div class="lbl">Investment</div>
                                    <div class="val">Price on Request</div>
                                </div>
                            @endif
                            <div class="panel">
                                <div class="agent-head">
                                    <div class="agent-avatar">NJ</div>
                                    <div>
                                        <div class="agent-name">Nikhil Jawkar</div>
                                        <div class="agent-role">Associated Channel Partner</div>
                                    </div>
                                </div>
                                <div class="contact-line"><i class="bi bi-geo-alt-fill"></i><span>Edmonton Shopping
                                        Mall, Shop No. 36B, Ground Floor, Hotel The Bristol, Bright Star Plaza,
                                        Gurugram, Haryana – 122001</span></div>
                                <div class="contact-line"><i class="bi bi-envelope-fill"></i><a
                                        href="mailto:example@gmail.com">example@gmail.com</a></div>
                                <div class="contact-line"><i class="bi bi-telephone-fill"></i><a
                                        href="tel:+919858445000">+91 98584 45000</a>, <a href="tel:+919858445001">+91
                                        98584 45001</a></div>
                                <a href="#" class="btn-whatsapp"><i class="bi bi-whatsapp"></i> Chat via
                                    WhatsApp</a>
                                <div class="row-actions">
                                    <button class="icon-action"><i class="bi bi-share"></i> Share</button>
                                    @if($project->brochure)
                                        <a href="{{ Storage::url($project->brochure) }}" target="_blank" class="icon-action"><i class="bi bi-download"></i> Brochure</a>
                                    @endif
                                    <button class="icon-action"><i class="bi bi-calendar-check"></i> Visit</button>
                                </div>
                            </div>
                            @if($project->brochure)
                                <a href="{{ Storage::url($project->brochure) }}" target="_blank" class="panel brochure-btn mb-3" style="margin-bottom:1.1rem !important;">
                                    <span><i class="bi bi-file-earmark-pdf me-2"></i>Download investment brochure</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            @endif
                            <!-- EMI calculator add-on -->
                            <div class="panel">
                                <div class="emi-toggle-row">
                                    <h5 class="mb-0">Returns Calculator</h5>
                                    <i class="bi bi-chevron-down" id="emiChevron"></i>
                                </div>
                                <div class="emi-body show" id="emiBody">
                                    <label class="form-label-sm mt-2">Investment amount: ₹<span id="emiAmtVal">63</span>
                                        L</label>
                                    <input type="range" class="form-range" id="emiAmt" min="58" max="95" value="63">
                                    <label class="form-label-sm">Expected annual ROI: <span
                                            id="emiRoiVal">5.64</span>%</label>
                                    <input type="range" class="form-range" id="emiRoi" min="5" max="6.5" step="0.01"
                                        value="5.64">
                                    <div class="emi-result">
                                        <div class="k"
                                            style="font-size:.66rem;letter-spacing:.08em;text-transform:uppercase;color:var(--ink-soft);">
                                            Estimated monthly payout</div>
                                        <div class="v" id="emiMonthly">₹29,610</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel" id="enquiry">
                                <h5>Get in touch</h5>
                                <form onsubmit="return handleSubmit(event)">
                                    <div class="mb-2">
                                        <label class="form-label-sm">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your name">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-sm">Phone number *</label>
                                        <input type="tel" class="form-control" placeholder="Enter your phone number"
                                            required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-sm">Email address *</label>
                                        <input type="email" class="form-control" placeholder="Enter your email address"
                                            required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-sm">Looking for</label>
                                        <select class="form-select">
                                            <option value="">Choose one</option>
                                            <option>Retail Shop</option>
                                            <option>Food Court Unit</option>
                                            <option>Office Space</option>
                                            <option>Studio Apartment</option>
                                        </select>
                                    </div>
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-sm">Size (sqft)</label>
                                            <input type="number" class="form-control" placeholder="e.g. 350">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-sm">Budget</label>
                                            <input type="text" class="form-control" placeholder="e.g. 70 L">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-submit">Submit enquiry</button>
                                    <p class="text-center mt-2 mb-0" style="font-size:.68rem;color:var(--ink-soft);">By
                                        submitting, you agree to be contacted regarding this project.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    lucide.createIcons();
    
    var thumbSwiper = new Swiper(".thumb-slider", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: { slidesPerView: 3 },
            768: { slidesPerView: 4 }
        }
    });
    
    var mainSwiper = new Swiper(".main-slider", {
        spaceBetween: 0,
        effect: "fade",
        loop: true,
        navigation: {
            nextEl: ".hero-next",
            prevEl: ".hero-prev",
        },
        pagination: {
            el: ".main-slider .swiper-pagination",
            clickable: true,
        },
        thumbs: {
            swiper: thumbSwiper,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        }
    });
});
</script>
@endpush
