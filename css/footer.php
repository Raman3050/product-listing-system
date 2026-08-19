<!-- footer -->
<div class="footer-wrapper">
    <div class="footer-content">
        <div class="container-inner px-0">
            <!-- Main Footer Row -->
            <div class="row gy-2 gy-lg-4">
                <!-- Brand Column -->
                <div class="col-lg-6 col-xl-3 col-md-6 footer-col">
                    <div class="brand-logo">
                        <img src="./images/logo/commercial-spaces.png" alt="" style="max-width: 320px;">
                    </div>
                    <p style="    max-width: 450px;">Founded by Manoj Babu & Smita Babu in 2007.. it has been over
                        18 years since we started our real estate business with commitment, passion, and integrity.
                        Our journey began with Original Bookings, followed by expansions into Resale and Renting,
                        with Gurgaon as our primary market.</p>
                    <div class="social-row">
                        <div class="social-icons">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <!-- UAE Column -->
                <div class="col-lg-6 col-xl-3 col-md-6 footer-col d-none">
                    <div class="footer-heading">New Launches</div>
                    <a href="#" class="footer-link">AiPL Joy District-Sec 88</a>
                    <a href="#" class="footer-link">DLF Club Arcade Sec 91</a>
                    <a href="#" class="footer-link">DLF Club Arcade Sec 91</a>
                    <a href="#" class="footer-link">Airia Mall- Business District- Sec 68</a>
                    <a href="#" class="footer-link">Emaar- India Business Centre- Sec 61</a>
                </div>
                <!-- Quick Links Column -->
                <div class="col-lg-6 col-xl-3   col-md-6 footer-col d-flex  justify-content-xl-center">
                    <div>
                        <div class="footer-heading">Quick Links</div>
                        <a href="#" class="footer-link">Home</a>
                        <a href="#" class="footer-link">About Us</a>
                        <a href="#" class="footer-link">Services</a>
                        <a href="#" class="footer-link">Blogs</a>
                        <a href="#" class="footer-link">Locations</a>
                        <a href="#" class="footer-link">Contact Us</a>
                    </div>
                </div>
                <!-- About Us Column -->
                <div class="col-lg-6 col-xl-3 col-md-6 footer-col d-flex  justify-content-xl-center">
                    <div>
                        <div class="footer-heading">Top Builders</div>
                        <a href="#" class="footer-link">AIPL</a>
                        <a href="#" class="footer-link">REACH</a>
                        <a href="#" class="footer-link">JMD</a>
                        <a href="#" class="footer-link">Raj Darbar</a>
                        <a href="#" class="footer-link">M3M</a>
                    </div>
                </div>
                <!-- Contact Us Column -->
                <div class="col-lg-6 col-xl-3 col-md-6 footer-col">
                    <div class="footer-heading">CONTACT US</div>
                    <div class="contact-info">
                        <div class="mb-block contact-item">
                            <span class="contact-icon ">
                                <i data-lucide="map-pin"></i>
                            </span>
                            <div>
                                SANA Group, ALTF 4 Co-working,<br>
                                Office No. 230, 2nd Floor,<br>
                                JMD Empire Square, MG Road,<br>
                                Gurgaon, 122002
                            </div>
                        </div>

                        <div class="mb-block contact-item align-items-center">
                            <span class="contact-icon ">
                                <i data-lucide="mail"></i>
                            </span>
                            <a href="mailto:sanaassociates.ggn@gmail.com">
                                sanaassociates.ggn@gmail.com
                            </a>
                        </div>

                        <div class="mb-block contact-item align-items-center">
                            <span class="contact-icon ">
                                <i data-lucide="phone"></i>
                            </span>
                            <div>
                                <a href="tel:+919910200584">9910200584</a>
                                <span class="divider">|</span>
                                <a href="tel:+919810298803">9810298803</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="copyright">© 2026 Commercial Spaces Group. All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Floating buttons -->
<button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Scroll to top">
    <i data-lucide="arrow-up"></i>
</button>
<!-- <button class="chat-bubble" aria-label="Chat">
        <i data-lucide="message-circle"></i>
    </button> -->
<!-- ============ ENQUIRY FLOATING BUTTON (desktop only) ============ -->
<button class="enquiry-fab" id="enquiryFab" data-bs-toggle="modal" data-bs-target="#enquiryModal"
    aria-label="Enquiry Now">
    <span class="fab-icon"><i class="fas fa-envelope"></i></span>
    <span class="fab-text">Enquiry Now</span>
</button>
<!-- ============ ENQUIRY MODAL ============ -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-modal">
            <div class="modal-header d-block">
                <h5 class="modal-title" id="enquiryModalLabel">Enquiry Now</h5>
                <p class="modal-subtitle mb-0">Share your details and our team will reach out shortly.</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="enquiryForm" novalidate>
                    <div class="glass-field">
                        <label for="enqName">Name</label>
                        <input type="text" class="glass-input" id="enqName" name="name" placeholder="Your full name"
                            required>
                    </div>
                    <div class="glass-field">
                        <label for="enqEmail">Email</label>
                        <input type="email" class="glass-input" id="enqEmail" name="email" placeholder="you@example.com"
                            required>
                    </div>
                    <div class="glass-field">
                        <label for="enqPhone">Phone</label>
                        <input type="tel" class="glass-input" id="enqPhone" name="phone" placeholder="+971 00 000 0000"
                            required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-enquiry-submit">
                            Submit <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="enquiry-success" id="enquirySuccess">
                        <i class="fas fa-circle-check"></i> Thank you! Your enquiry has been received.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- schedule visit modal form -->
<!-- ============ SITE VISIT MODAL ============ -->
<div class="modal fade" id="siteVisitModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title font-title fw-semibold" style="font-size:1.4rem;">Schedule Your Personal Tour
                    </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-3">Unit: <strong id="modal-unit-name" class="text-dark">ICICI Bank – Joy
                        Central</strong></p>
                <div class="d-flex flex-column gap-3">
                    <input type="date" class="inp" value="2026-12-15">
                    <select class="inp">
                        <option>10:00 AM - 11:00 AM</option>
                        <option>11:30 AM - 12:30 PM</option>
                        <option selected>02:00 PM - 03:00 PM</option>
                        <option>04:00 PM - 05:00 PM</option>
                    </select>
                    <input type="text" class="inp" placeholder="Your Full Name">
                    <input type="tel" class="inp" placeholder="Your Phone Number">
                </div>
                <div class="rounded-3 p-3 mt-3 d-flex gap-2"
                    style="background:rgba(197,168,128,.12);border:1px solid rgba(197,168,128,.25);">
                    <i data-lucide="car" class="ic-md" style="color:var(--gold-dark);flex-shrink:0;margin-top:2px;"></i>
                    <p class="mb-0 small" style="color:var(--ink-soft);">Complimentary cab pickup available from Cyber
                        City & IGI Airport terminals. Advisor will call to confirm.</p>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-link fw-semibold text-decoration-none text-muted"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="cta-dark px-4 py-2" style="font-size:13px;" onclick="confirmSiteVisit()">
                    <i data-lucide="calendar-check" class="ic-sm"></i>
                    <span>Confirm Site Visit</span>
                </button>
            </div>
        </div>
    </div>
</div>



<!-- ============ Placeholder modal target ============ -->
<div class="modal fade" id="sideImageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enquire Now</h5><button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Your enquiry form goes here.</p>
            </div>
        </div>
    </div>
</div>

<script src="./js/gsap.min.js"></script>
<script src="./js/ScrollSmoother.min.js"></script>
<script src="./js/swiper-bundle.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<!-- AOS -->
<script src="./js/aos.js"></script>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"></script>
<script src="js/script.js"></script>

<script>
    const gallerySwiper = new Swiper('.gallery-slider', {
    slidesPerView: 1.15,
    spaceBetween: 14,
    navigation: {
        nextEl: '.gallery-next',
        prevEl: '.gallery-prev',
    },
    pagination: {
        el: '.gallery-pagination',
        clickable: true,
    },
    breakpoints: {
        576: { slidesPerView: 2, spaceBetween: 16 },
        992: { slidesPerView: 3, spaceBetween: 18 },
    },
});

lightGallery(document.getElementById('unit-lightgallery'), {
    selector: '.gallery-item',
    plugins: [lgThumbnail, lgZoom],
    speed: 400,
    download: false,
    counter: true,        // shows "1 / 5" style pagination in the toolbar
    thumbnail: true,       // shows the thumbnail strip at the bottom
});
</script>

<script>
// Category filtering
const pills = document.querySelectorAll('.filter-pill');
const cards = document.querySelectorAll('#cardsGrid .prop-card');
const resultCount = document.getElementById('resultCount');
const emptyState = document.getElementById('emptyState');

pills.forEach(p => {
    p.addEventListener('click', () => {
        pills.forEach(x => x.classList.remove('active'));
        p.classList.add('active');
        const f = p.dataset.filter;
        let visible = 0;
        cards.forEach(c => {
            const show = f === 'all' || c.dataset.cat === f;
            c.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        resultCount.textContent = visible;
        emptyState.classList.toggle('d-none', visible !== 0);
    });
});

// View toggle (grid / list)
const viewBtns = document.querySelectorAll('.view-toggle .btn');
const grid = document.getElementById('cardsGrid');
viewBtns.forEach((b, i) => {
    b.addEventListener('click', () => {
        viewBtns.forEach(x => x.classList.remove('active'));
        b.classList.add('active');
        grid.style.gridTemplateColumns = i === 1 ? '1fr' : '';
    });
});

// EMI / returns calculator
const emiAmt = document.getElementById('emiAmt');
const emiRoi = document.getElementById('emiRoi');
const emiAmtVal = document.getElementById('emiAmtVal');
const emiRoiVal = document.getElementById('emiRoiVal');
const emiMonthly = document.getElementById('emiMonthly');

function calcEmi() {
    const amtLac = parseFloat(emiAmt.value);
    const roi = parseFloat(emiRoi.value);
    emiAmtVal.textContent = amtLac;
    emiRoiVal.textContent = roi.toFixed(2);
    const annual = amtLac * 100000 * (roi / 100);
    const monthly = Math.round(annual / 12);
    emiMonthly.textContent = '₹' + monthly.toLocaleString('en-IN');
}
emiAmt.addEventListener('input', calcEmi);
emiRoi.addEventListener('input', calcEmi);
calcEmi();

document.querySelector('.emi-toggle-row').addEventListener('click', () => {
    document.getElementById('emiBody').classList.toggle('show');
    const chev = document.getElementById('emiChevron');
    chev.classList.toggle('bi-chevron-down');
    chev.classList.toggle('bi-chevron-up');
});

function handleSubmit(e) {
    e.preventDefault();
    alert('Thanks! Your enquiry has been received — our team will reach out shortly.');
    return false;
}
</script>

<script>
const thumbs = new Swiper(".thumb-slider", {

    spaceBetween: 12,

    slidesPerView: 5,

    watchSlidesProgress: true,

    breakpoints: {

        0: {
            slidesPerView: 2
        },

        768: {
            slidesPerView: 3
        }

    }

});

const main = new Swiper(".main-slider", {

    loop: true,

    speed: 800,

    effect: "slide",

    thumbs: {
        swiper: thumbs
    },

    navigation: {
        nextEl: ".hero-next",
        prevEl: ".hero-prev"
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }

});
</script>
<script>
lucide.createIcons();
</script>
</body>

</html>