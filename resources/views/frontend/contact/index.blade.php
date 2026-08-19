@extends('layouts.frontend')

@section('content')

    <main class="about-page">
        <section class="about-page-hero">
            <div class="about-page-hero__media">
                <img src="images/hero/hero-bg-image-metal1.jpg" alt="Commercial Spaces team at work" />
                <div class="about-page-hero__overlay"></div>
            </div>
            <div class="container about-page-hero__content" data-aos="fade-up" data-aos-duration="900">
                <div class="about-page-hero_content_wrap">

                    <h1>Contact Us</h1>
                    <p>
                        We blend local market insight, investor-first strategy and a deep understanding of Gurgaon’s
                        commercial landscape to help clients unlock the right opportunity with confidence.
                    </p>
                </div>
              
            </div>
        </section>


        <section class="contact-section">
    <div class="container">
      <div class="contact-panel">
        <div class="row g-5">

          <!-- left: intro + info -->
          <div class="col-lg-6">
            <div class="intro-eyebrow">Get In Touch</div>
            <h1 class="headline">Own, Rent or Invest in Gurgaon’s Prime Properties</h1>
            <p class="lede">Explore premium property opportunities in Gurgaon, including residential sales, rented properties, and pre-leased commercial assets. Our experienced team helps you discover high-potential investments with transparent guidance, market expertise, and solutions tailored to your financial and investment goals.</p>

            <div class="row mb-4">
              <div class="col-sm-6 info-block mb-4 mb-sm-0">
                <h4>Contact</h4>
                <div class="info-row">
                  <span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
                  <a href="mailto:sanaassociates.ggn@gmail.com">sanaassociates.ggn@gmail.com</a>
                </div>
                <div class="info-row">
                  <span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .3 2 .7 3a2 2 0 0 1-.4 2.1L8 10.1a16 16 0 0 0 6 6l1.3-1.4a2 2 0 0 1 2.1-.4c1 .3 2 .5 3 .7a2 2 0 0 1 1.7 2z"/></svg></span>
                  <a href="tel:+918800936444">8800936444</a>
                </div>
              </div>
              <div class="col-sm-6 info-block">
                <h4>Address</h4>
                <div class="info-row">
                  <span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.4"/></svg></span>
                  <span>SANA Group, ALTF 4 Co-working, Office No. 230, 2nd Floor, JMD Empire Square, MG Road,
Gurgaon, 122002</span>
                </div>
              </div>
            </div>

            <div class="map-frame">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.9897978101585!2d77.08814627604168!3d28.479853890996583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19cb544897c9%3A0x6188d60da74e9001!2salt.f%20JMD%20Empire%20Square%20-%20Coworking%20Space%20In%20MG%20Road%20Gurgaon!5e0!3m2!1sen!2sin!4v1787038069062!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <!-- right: form -->
          <div class="col-lg-6">
            <form class="contact-form" onsubmit="event.preventDefault(); alert('Thank you — our team will be in touch shortly.');">
              <div class="row g-3 mb-3">
                <div class="col-sm-6">
                  <label class="form-label">Name <span class="req">*</span></label>
                  <input type="text" class="form-control" placeholder=" Your Name" required>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Phone Number <span class="req">*</span></label>
                  <input type="tel" class="form-control" placeholder="Phone Number" required>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Email <span class="req">*</span></label>
                <input type="email" class="form-control" placeholder="myemail@email.com" required>
              </div>

              <div class="mb-3">
                <label class="form-label">What is your enquiry about? <span class="req">*</span></label>
                <select class="form-select" required>
                  <option>Pre-leased</option>
                  <option>Sales</option>
                  <option>Rented</option>
                </select>
              </div>

              <!-- <div class="mb-3">
                <label class="form-label">Subject <span class="req">*</span></label>
                <input type="text" class="form-control" placeholder="What would you like to enquire about?" required>
              </div> -->

              <div class="mb-3">
                <label class="form-label">Message <span class="req">*</span></label>
                <textarea class="form-control" placeholder="Type your message.."></textarea>
              </div>

              <div class="form-check consent mb-4">
                <input class="form-check-input" type="radio" name="consent" id="consentCheck" required>
                <label class="form-check-label" for="consentCheck">
                  By submitting this form, you consent to us contacting you regarding your inquiry. See our <a href="#">Privacy Policy</a> for details on how we handle your data.
                </label>
              </div>

              <button class="btn-submit" type="submit">Send Message</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

    </main>

@endsection