@extends('layouts.frontend')

@section('content')



<!-- HERO -->
<section class="hero" style="background-image: url('{{ asset('frontend_assets/images/aipl-banner.webp') }}');">
  <div class="container hero-grid">

    

    <div class="hero-copy pt-3 pt-lg-4">
      <div class="eyebrow mb-2">AIPL · Pre-Leased Commercial</div>
      <h1>   AIPL Projects <br class="d-none d-md-block"> </h1>
      <p>Invest in retail shops, food courts & office spaces leased to Starbucks, Haldiram’s, McDonald’s & more with great rental income.</p>

      <div class="hero-inline-stat">
        <span class="v">₹63.87 L*</span>
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
      <div class="rail-label">All AIPL Projects</div>
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
      <div class="stat-strip-item"><div class="num">Day 1*</div><div class="lbl">Monthly payout</div></div>
      <div class="stat-strip-item"><div class="num">50+</div><div class="lbl">Top brands leased</div></div>
      <div class="stat-strip-item"><div class="num">₹63.87L*</div><div class="lbl">Investment starts @</div></div>
      <div class="stat-strip-item"><div class="num">15 Yr*</div><div class="lbl">Lease lock-in</div></div>
    </div>
  </div>
</section>

<!-- Brand strip: logo-style lockups instead of plain text chips -->
<section class="brand-strip">
  <div class="container">
    <div class="brand-strip-label">Co-tenants at AIPL</div>
    <div class="brand-logo-row">
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/Chaayos-tea.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/hdfc-bank.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/calvin_klein.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/Benetton.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/geetanjali.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/rare-rabbit.png') }}" alt=""></div>
      <div class="brand-logo"><img src="{{ asset('frontend_assets/images/project-present-brands/start-bucks.png') }}" alt=""></div>
      
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
      <p class="section-sub">6 pre-leased units currently open for investment at Joy Central.</p>

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
        <div class="result-count"><span id="resultCount">6</span> units found</div>
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

        <!-- Card 1 -->
        <div class="prop-card" data-cat="food">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Food &amp; Bev</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/Chaayos-tea.png') }}" alt="">
              <!-- <span class="name">Chaayos</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">5.64%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹14.58L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">Ground-floor retail unit leased to Chaayos with a running 15-year lock-in and annual rent escalation.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹63 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="prop-card" data-cat="bank">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Bank</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/hdfc-bank.png') }}" alt="">

              <!-- <span class="name">HDFC Bank</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">6.20%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹18.2L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">Corner unit branch leased to HDFC Bank — high footfall frontage facing the main plaza.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹78 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="prop-card" data-cat="retail">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Retail</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/calvin_klein.png') }}" alt="">

              <!-- <span class="name">Calvin Klein</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">5.80%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹22L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">First-floor flagship unit leased to Calvin Klein within the fashion wing of the mall.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹95 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="prop-card" data-cat="retail">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Retail</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/Benetton.png') }}" alt="">

              <!-- <span class="name">Benetton</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">5.50%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹16.5L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">Mid-mall unit leased to United Colors of Benetton, adjacent to the central atrium.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹71 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="prop-card" data-cat="lifestyle">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Lifestyle</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/geetanjali.png') }}" alt="">

              <!-- <span class="name">Geetanjali Salon</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">6.00%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹13.2L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">Second-floor wellness unit leased to Geetanjali Salon within the lifestyle & services wing.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹58 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="prop-card" data-cat="retail">
          <div class="prop-media">
            <div class="top-row">
              <div class="d-flex gap-2"><span class="badge-status">Pre-Leased</span><span class="badge-cat">Retail</span></div>
              <div>
                <img src="{{ asset('frontend_assets/images/projects/aipl-projects/joy-central.png') }}" alt="" srcset="">
              </div>
            </div>
            <div class="brand-plaque">
                <img src="{{ asset('frontend_assets/images/project-present-brands/rare-rabbit.png') }}" alt="">
              <!-- <span class="name">Rare Rabbit</span> -->
              <span class="loc"><i class="bi bi-geo-alt"></i> Sector 65, Gurugram</span>
            </div>
          </div>
          <div class="prop-body">
            <div class="metric-row">
              <div class="metric"><div class="v">5.90%</div><div class="k">Annual ROI</div></div>
              <div class="metric"><div class="v">Pre-Leased</div><div class="k">Lease</div></div>
              <div class="metric"><div class="v">₹20L</div><div class="k">Up to / month</div></div>
            </div>
            <p class="prop-desc">Ground-floor menswear unit leased to Rare Rabbit, facing the main entrance plaza.</p>
            <div class="card-actions">
              <div class="invest-tag"><span>Investment starts @</span> ₹88 Lac</div>
              <button class="btn-view">View Details</button>
            </div>
          </div>
        </div>

        

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
          <div class="val">₹63.87 L*</div>
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
