const burgerBtn = document.getElementById("burgerBtn");
const panelClose = document.getElementById("panelClose");
const mobilePanel = document.getElementById("mobilePanel");
const overlay = document.getElementById("mobileOverlay");
const mainHeader = document.getElementById("mainHeader");
function openPanel() {
  mobilePanel.classList.add("show");
  overlay.classList.add("show");
  burgerBtn.classList.add("open");
  document.body.style.overflow = "hidden";
}
function closePanel() {
  mobilePanel.classList.remove("show");
  overlay.classList.remove("show");
  burgerBtn.classList.remove("open");
  document.body.style.overflow = "";
}
burgerBtn.addEventListener("click", () => {
  mobilePanel.classList.contains("show") ? closePanel() : openPanel();
});
panelClose.addEventListener("click", closePanel);
overlay.addEventListener("click", closePanel);
// Close panel when a menu link inside it is clicked
document
  .querySelectorAll(".mobile-panel .nav-links a, .mobile-panel .btn-glass-cta")
  .forEach((link) => {
    link.addEventListener("click", closePanel);
  });
// ==========================================
// MOBILE 3 LEVEL NESTED MENU
// ==========================================
const mobileMenuToggles = document.querySelectorAll(".mobile-menu-toggle");
mobileMenuToggles.forEach((toggle) => {
  toggle.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    const currentItem = this.closest(".mobile-has-submenu");
    if (!currentItem) return;
    // Find sibling menu items on SAME LEVEL
    const parentList = currentItem.parentElement;
    const siblingItems = parentList.querySelectorAll(
      ":scope > .mobile-has-submenu",
    );
    // Close other menus on same level
    siblingItems.forEach((item) => {
      if (item !== currentItem) {
        item.classList.remove("open");
        // Also close nested children
        item.querySelectorAll(".mobile-has-submenu.open").forEach((child) => {
          child.classList.remove("open");
        });
      }
    });
    // Toggle clicked menu
    currentItem.classList.toggle("open");
  });
});
// Slightly stronger glass once page is scrolled (for real hero content behind it)
window.addEventListener("scroll", () => {
  mainHeader.classList.toggle("is-scrolled", window.scrollY > 40);
});
// Esc key closes panel
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") closePanel();
});
const heroSwiper = new Swiper(".heroSwiper", {
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  speed: 1000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".heroSwiper .swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".hero-next",
    prevEl: ".hero-prev",
  },
  on: {
    init: function () {
      setTimeout(() => {
        AOS.refresh();
      }, 100);
    },
    slideChangeTransitionStart: function () {
      AOS.refresh();
    },
  },
});
AOS.init({
  duration: 900,
  easing: "ease-out-cubic",
  once: false,
  offset: 0,
});
// Logo slider
const logoSwiper = new Swiper(".logoSwiper", {
  loop: true,
  speed: 4000,
  spaceBetween: 30,
  slidesPerView: 5,
  allowTouchMove: true,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    400: {
      slidesPerView: 3,
    },
    576: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 5,
    },
    1140: {
      slidesPerView: 5,
    },
  },
});


document.addEventListener("DOMContentLoaded", () => {
  // Featured Properties Swiper
  const propertySwiper = new Swiper(".propertySwiper", {
    slidesPerView: 1,
    spaceBetween: 24,
    speed: 900,
    loop: true,
    grabCursor: true,
    watchOverflow: true,
    navigation: {
      nextEl: ".property-next",
      prevEl: ".property-prev",
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },

    pagination: {
            el: ".property-pagination",
            clickable: true,
        },

    breakpoints: {
      576: {
        slidesPerView: 1,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 28,
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });
});


const propertySwiper = new Swiper(".featuredSwiper", {

    slidesPerView: 1,
    spaceBetween: 30,
    speed: 800,
    loop: true,
    grabCursor: true,
    watchOverflow: true,
    centeredSlides: false,

    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    navigation: {
        nextEl: ".property-next",
        prevEl: ".property-prev",
    },

    pagination: {
        el: ".property-pagination",
        clickable: true,
    },

    breakpoints: {

        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },

        992: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        1200: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        1440: {
            slidesPerView: 3,
            spaceBetween: 35,
        }

    }

});


const testimonialSwiper = new Swiper(".testimonialSwiper", {

    slidesPerView: 1,
spaceBetween:20,
    loop: true,

    speed: 800,

    navigation: {

        nextEl: ".testimonial-next",

        prevEl: ".testimonial-prev",

    },

    autoplay: {

        delay: 5000,

        disableOnInteraction: false,

    },

    breakpoints: {

        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },

        992: {
            slidesPerView: 2,
            spaceBetween: 12,
        },

        1400: {
            slidesPerView: 3,
            spaceBetween: 25,
        }

    }

});

// 

(function () {
    const modalEl = document.getElementById('enquiryModal');
    const form = document.getElementById('enquiryForm');
    const success = document.getElementById('enquirySuccess');

    // Hide the floating button while modal is open
    modalEl.addEventListener('show.bs.modal', function () {
      document.body.classList.add('enquiry-open');
      // custom class on the backdrop for the overlay effect
      setTimeout(function () {
        const bd = document.querySelector('.modal-backdrop:not(.enquiry-backdrop)');
        if (bd) bd.classList.add('enquiry-backdrop');
      }, 0);
    });

    modalEl.addEventListener('hidden.bs.modal', function () {
      document.body.classList.remove('enquiry-open');
      form.reset();
      success.style.display = 'none';
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }
      success.style.display = 'block';
      setTimeout(function () {
        bootstrap.Modal.getInstance(modalEl).hide();
      }, 1600);
    });
  })();


   //===== Gasp 
    
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    ScrollSmoother.create({
    smooth: 1,
    effects: true,
        smoothTouch: 0.1,
    });


  // 
  
    /* ============ READ MORE ============ */
function toggleReadMore(){
  const m = document.getElementById("overview-more");
  const l = document.getElementById("rm-label");
  if(m.classList.contains("d-none")){
    m.classList.remove("d-none");
    l.textContent = "Read Less";
  } else {
    m.classList.add("d-none");
    l.textContent = "Read More";
  }
}


/* ============ UNIT ACCORDION ============ */
function setUnitBodyState(body, open){
  if(!body) return;

  if(open){
    body.classList.remove("is-closed");
    body.classList.add("is-open");
    body.style.opacity = "1";
    body.style.pointerEvents = "auto";
    body.style.maxHeight = body.scrollHeight + "px";
  } else {
    body.classList.remove("is-open");
    body.classList.add("is-closed");
    body.style.opacity = "0";
    body.style.pointerEvents = "none";
    body.style.maxHeight = "0px";
  }
}

function toggleUnit(btn){
  const card = btn.closest("[data-unit]");
  const body = card.querySelector(".unit-body");
  const chev = card.querySelector(".chev");
  const shouldOpen = !card.classList.contains("open");

  document.querySelectorAll("[data-unit]").forEach(c=>{
    c.classList.remove("open");
    const b = c.querySelector(".unit-body");
    const ic = c.querySelector(".chev");
    setUnitBodyState(b, false);
    if(ic) ic.setAttribute("data-lucide","chevron-down");
  });

  if(shouldOpen){
    card.classList.add("open");
    setUnitBodyState(body, true);
    if(chev) chev.setAttribute("data-lucide","chevron-up");
  }

  lucide.createIcons();
}

function toggleAllUnits(){
  const label = document.getElementById("toggle-label");
  const cards = document.querySelectorAll("[data-unit]");
  const hasOpenCard = Array.from(cards).some(c => c.classList.contains("open"));

  cards.forEach(c=>{
    const b = c.querySelector(".unit-body");
    const ic = c.querySelector(".chev");
    if(hasOpenCard){
      c.classList.remove("open");
      setUnitBodyState(b, false);
      if(ic) ic.setAttribute("data-lucide","chevron-down");
      label.textContent = "Show Unit Details";
    } else {
      c.classList.add("open");
      setUnitBodyState(b, true);
      if(ic) ic.setAttribute("data-lucide","chevron-up");
      label.textContent = "Hide Unit Details";
    }
  });
}

document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll("[data-unit]").forEach(card=>{
    const body = card.querySelector(".unit-body");
    const ic = card.querySelector(".chev");
    const open = card.classList.contains("open");
    setUnitBodyState(body, open);
    if(ic) ic.setAttribute("data-lucide", open ? "chevron-up" : "chevron-down");
  });
 
});


/* ============ SITE VISIT MODAL ============ */
function openSiteVisitModal(unitName){
  document.getElementById("modal-unit-name").textContent = unitName;
  new bootstrap.Modal(document.getElementById("siteVisitModal")).show();
}