@extends('layouts.frontend')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;

    $pageDetails = $project->pageDetails;

    $heroImage = Storage::url($project->featured_image);
@endphp


<!-- HERO -->
<section class="hero" style="background-image: url('{{ $heroImage }}');">
  <div class="container hero-grid">


    <div class="hero-copy pt-3 pt-lg-4">
      <div class="eyebrow mb-2">{{ $pageDetails?->first_yellow_heading }}</div>
      <h1>   {{ $pageDetails?->project_name }} <br class="d-none d-md-block"> </h1>
      <p>{{ $pageDetails?->description }}</p>

      <div class="hero-inline-stat">
        <span class="v">{{ $pageDetails?->amount_start }}</span>
        <span class="s">Investment starts @</span>
        <!-- <span class="divider"></span>
        <span class="v">Day 1*</span>
        <span class="s">Monthly payout</span> -->
      </div>

      <div class="d-flex flex-wrap gap-2">
        <a href="#listings" class="btn-brass">Explore Available Units</a>
        <a href="#enquiry" class="btn-outline-ghost">Talk to an Advisor</a>
      </div>
    </div>

    <!-- Directory rail (signature element) -->
    <aside class="directory-rail d-none">
      <div class="rail-label">All {{ $project->name }}</div>
      <a href="#" class="directory-item active"><span class="dot"></span>Joy Central<small>Sector 65 · Retail + F&amp;B</small></a>
      <a href="#" class="directory-item"><span class="dot"></span>Joy Square<small>Sector 65 · Office Spaces</small></a>
      <a href="#" class="directory-item"><span class="dot"></span>Joy Street<small>Sector 65 · High Street</small></a>
      <a href="#" class="directory-item"><span class="dot"></span>Joy Gallery<small>Sector 65 · Studio Retail</small></a>
    </aside>

  </div>
</section>

<!-- Stat strip: pulled out of the hero so the banner stays uncluttered -->
<section class="stat-strip">
  <div class="container">
    <div class="stat-strip-grid">
      <div class="stat-strip-item"><div class="num">{{ $pageDetails?->stat_1_value }}</div><div class="lbl">{{ $pageDetails?->stat_1_type }}</div></div>
      <div class="stat-strip-item"><div class="num">{{ $pageDetails?->stat_2_value }}</div><div class="lbl">{{ $pageDetails?->stat_2_type }}</div></div>
      <div class="stat-strip-item"><div class="num">{{ $pageDetails?->stat_3_value }}</div><div class="lbl">{{ $pageDetails?->stat_3_type }}</div></div>
      <div class="stat-strip-item"><div class="num">{{ $pageDetails?->stat_4_value }}</div><div class="lbl">{{ $pageDetails?->stat_4_type }}</div></div>
    </div>
  </div>
</section>

<!-- Brand strip: logo-style lockups instead of plain text chips -->
<section class="brand-strip">
  <div class="container">
    <div class="brand-strip-label">Co-tenants at {{ $project->name }}</div>
    <div class="brand-logo-row">
      @foreach($pageDetails?->tenants ?? [] as $tenant)

        <div class="brand-logo">

          @if($tenant->logo)

            <img
              src="{{ Storage::url($tenant->logo) }}"
              alt="{{ $tenant->name }}">

          @else

            <span>
              {{ $tenant->name }}
            </span>

          @endif

        </div>

      @endforeach
    </div>
  </div>
</section>

<!-- MAIN -->
<div class="container main-wrap inner-page">
  <div class="px-3 px-lg-0">
    <div class="row g-0 g-lg-4">

    <!-- LEFT: listings -->
    <div class="col-lg-8" id="listings">
      <div class="type-tabs d-none">
        <div class="type-tab active">Joy Central</div>
        <div class="type-tab">Joy Square</div>
        <div class="type-tab">Joy Street</div>
        <div class="type-tab">Joy Gallery</div>
      </div>

      <h2 class="inner-section-title">Invest in India's biggest brand names</h2>
      <p class="section-sub">{{ $project->units->count() }} pre-leased units currently open for investment at {{ $project->name }}.</p>

      <div class="filter-tabs" id="filterTabs">
        <button class="filter-pill active" data-filter="all">All</button>
        <button class="filter-pill" data-filter="bank">Bank</button>
        <button class="filter-pill" data-filter="food">Food &amp; Bev</button>
        <button class="filter-pill" data-filter="retail">Retail</button>
        <button class="filter-pill" data-filter="gaming">Gaming Zone</button>
        <button class="filter-pill" data-filter="entertainment">Entertainment</button>
        <button class="filter-pill" data-filter="lifestyle">Lifestyle</button>
      </div>

      <div class="toolbar">
        <div class="result-count"><span id="resultCount">{{ $project->units->count() }}</span> units found</div>
        <div class="d-flex gap-2 align-items-center">
          <select class="sort-select">
            <option>Sort: Featured</option>
            <option>ROI: High to Low</option>
            <option>Investment: Low to High</option>
            <option>Rental: High to Low</option>
          </select>
          <div class="btn-group view-toggle">
            <button class="btn btn-sm active" title="Grid view"><i class="bi bi-grid-3x3-gap"></i></button>
            <button class="btn btn-sm" title="List view"><i class="bi bi-list-ul"></i></button>
          </div>
        </div>
      </div>

      <div class="cards-grid" id="cardsGrid">

        @forelse($project->units as $unit)

          @php
            $unitImage = $unit->images->first();

            $imageUrl = $unitImage
              ? Storage::url($unitImage->image)
              : asset('frontend_assets/images/projects/aipl-projects/joy-central.png');
          @endphp

          <div
            class="prop-card"
            data-cat="{{ $unit->tenant?->business_category ?? '' }}">

            <div class="prop-media">

              <div class="top-row">

                <div class="d-flex gap-2">

                  <span class="badge-status">
                    {{ $unit->lease_status ?: 'Available' }}
                  </span>

                  <span class="badge-cat">
                    {{ $unit->tenant?->business_category ?? '—' }}
                  </span>

                </div>

                <div>
                  <img
                    src="{{ $imageUrl }}"
                    alt="{{ $unit->name }}">
                </div>

              </div>

              <div class="brand-plaque">

                @if($unit->tenant?->logo)

                  <img
                    src="{{ Storage::url($unit->tenant->logo) }}"
                    alt="{{ $unit->tenant->name }}">

                @else

                  <span class="name">
                    {{ $unit->tenant?->name ?? 'Available Unit' }}
                  </span>

                @endif

                <span class="loc">

                  <i class="bi bi-geo-alt"></i>

                  {{ $project->location?->name ?? '' }}

                </span>

              </div>

            </div>

            <div class="prop-body">

              <div class="metric-row">

                <div class="metric">
                  <div class="v">
                    {{ $unit->annual_roi !== null
                        ? number_format($unit->annual_roi, 2) . '%'
                        : '—'
                    }}
                  </div>
                  <div class="k">Annual ROI</div>
                </div>

                <div class="metric">
                  <div class="v">
                    {{ $unit->lease_status ?: 'Available' }}
                  </div>
                  <div class="k">Lease</div>
                </div>

                <div class="metric">
                  <div class="v">
                    @if($unit->monthly_rental !== null)
                      ₹{{ number_format($unit->monthly_rental / 100000, 2) }} L
                    @else
                      —
                    @endif
                  </div>
                  <div class="k">Up to / month</div>
                </div>

              </div>

              <p class="prop-desc">
                {{ $unit->description }}
              </p>

              <div class="card-actions">

                <div class="invest-tag">

                  <span>
                    Investment starts @
                  </span>

                  @if($unit->price_on_request)

                    Price on Request

                  @elseif($unit->price !== null)

                    ₹{{ number_format($unit->price / 100000) }} Lac

                  @else

                    —

                  @endif

                </div>

                <a href="{{ route('catalog.unit.show', [$project->slug, $unit->slug]) }}" class="btn-view">
                  View Details
                </a>

              </div>

            </div>

          </div>

        @empty

          <div class="col-12 text-center py-5">

            <i
              class="bi bi-search"
              style="font-size:2rem; color:var(--ink-soft);">
            </i>

            <p class="mt-2 mb-0 fw-semibold">
              No units available
            </p>

          </div>

        @endforelse

      </div>

      <div id="emptyState" class="text-center py-5 d-none">
        <i class="bi bi-search" style="font-size:2rem; color:var(--ink-soft);"></i>
        <p class="mt-2 mb-0 fw-semibold">No units in this category yet</p>
        <p class="section-sub">Try another category, or ask your advisor about upcoming inventory.</p>
      </div>
    </div>

    <!-- RIGHT: sticky sidebar -->
    <div class="col-lg-4 sidebar-col">
      <div class="sticky-side">

        <div class="invest-banner">
          <div class="lbl">Investment starts @</div>
          <div class="val">{{ $pageDetails?->amount_start }}</div>
        </div>

        <div class="panel">
          <div class="agent-head">
            <div class="agent-avatar">NJ</div>
            <div>
              <div class="agent-name">Nikhil Jawkar</div>
              <div class="agent-role">Associated Channel Partner</div>
            </div>
          </div>
          <div class="contact-line"><i class="bi bi-geo-alt-fill"></i><span>Edmonton Shopping Mall, Shop No. 36B, Ground Floor, Hotel The Bristol, Bright Star Plaza, Gurugram, Haryana – 122001</span></div>
          <div class="contact-line"><i class="bi bi-envelope-fill"></i><a href="mailto:example@gmail.com">example@gmail.com</a></div>
          <div class="contact-line"><i class="bi bi-telephone-fill"></i><a href="tel:+919858445000">+91 98584 45000</a>, <a href="tel:+919858445001">+91 98584 45001</a></div>

          <a href="#" class="btn-whatsapp"><i class="bi bi-whatsapp"></i> Chat via WhatsApp</a>

          <div class="row-actions">
            <button class="icon-action"><i class="bi bi-share"></i> Share</button>
            <button class="icon-action"><i class="bi bi-download"></i> Brochure</button>
            <button class="icon-action"><i class="bi bi-calendar-check"></i> Visit</button>
          </div>
        </div>

        <a href="#" class="panel brochure-btn mb-3" style="margin-bottom:1.1rem !important;">
          <span><i class="bi bi-file-earmark-pdf me-2"></i>Download investment brochure</span>
          <i class="bi bi-arrow-right"></i>
        </a>

        <!-- EMI calculator add-on -->
        <div class="panel">
          <div class="emi-toggle-row">
            <h5 class="mb-0">Returns Calculator</h5>
            <i class="bi bi-chevron-down" id="emiChevron"></i>
          </div>
          <div class="emi-body show" id="emiBody">
            <label class="form-label-sm mt-2">Investment amount: ₹<span id="emiAmtVal">63</span> L</label>
            <input type="range" class="form-range" id="emiAmt" min="58" max="95" value="63">
            <label class="form-label-sm">Expected annual ROI: <span id="emiRoiVal">5.64</span>%</label>
            <input type="range" class="form-range" id="emiRoi" min="5" max="6.5" step="0.01" value="5.64">
            <div class="emi-result">
              <div class="k" style="font-size:.66rem;letter-spacing:.08em;text-transform:uppercase;color:var(--ink-soft);">Estimated monthly payout</div>
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
              <input type="tel" class="form-control" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-2">
              <label class="form-label-sm">Email address *</label>
              <input type="email" class="form-control" placeholder="Enter your email address" required>
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
            <p class="text-center mt-2 mb-0" style="font-size:.68rem;color:var(--ink-soft);">By submitting, you agree to be contacted regarding this project.</p>
          </form>
        </div>

      </div>
    </div>
  </div>
  </div>
</div>

@endsection
