/* Equip & Haul — global motion & interaction layer.
   Core page behavior (nav, scroll reveals) runs first and never depends
   on a CDN script — a visitor can read and navigate the page even if
   every line below the "optional polish" marker fails outright. Lenis
   (smooth scroll) and GSAP/ScrollTrigger polish run after, wrapped so a
   problem loading or running them can never take the rest of the page
   down with it. See BUILD-PLAN.md §21-23. */
(function(){
  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.documentElement.classList.add("js-ready");

  /* ---------- Header scroll state ---------- */
  var header = document.querySelector(".site-header");
  function onScrollHeader(){
    if(!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 40);
  }
  document.addEventListener("scroll", onScrollHeader, { passive: true });
  onScrollHeader();

  /* ---------- Scroll progress bar ---------- */
  var progress = document.querySelector(".scroll-progress");
  function onScrollProgress(){
    if(!progress) return;
    var doc = document.documentElement;
    var max = doc.scrollHeight - doc.clientHeight;
    var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
    progress.style.width = pct + "%";
  }
  document.addEventListener("scroll", onScrollProgress, { passive: true });
  onScrollProgress();

  /* ---------- Mobile menu ---------- */
  var toggle = document.querySelector(".menu-toggle");
  var mobileMenu = document.querySelector(".mobile-menu");
  if(toggle && mobileMenu){
    toggle.addEventListener("click", function(){
      var isOpen = toggle.classList.toggle("is-open");
      mobileMenu.classList.toggle("is-open", isOpen);
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      document.body.style.overflow = isOpen ? "hidden" : "";
    });
    mobileMenu.querySelectorAll("a").forEach(function(a){
      a.addEventListener("click", function(){
        toggle.classList.remove("is-open");
        mobileMenu.classList.remove("is-open");
        document.body.style.overflow = "";
      });
    });
  }

  /* ---------- Generic scroll reveals ([data-reveal]) ----------
     Critical, not cosmetic: main.css hides every [data-reveal] element
     by default once .js-ready is on <html>, so this is what makes most
     of the page's text and photos visible at all. It must never depend
     on anything that can fail to load (GSAP, Lenis, a CDN). A hard
     timeout backs up the IntersectionObserver so a layout edge case
     (or anything else going wrong) can never leave whole sections stuck
     invisible. */
  var revealEls = document.querySelectorAll("[data-reveal]");
  if(revealEls.length){
    try {
      if("IntersectionObserver" in window){
        var io = new IntersectionObserver(function(entries){
          entries.forEach(function(entry){
            if(entry.isIntersecting){
              entry.target.classList.add("is-visible");
              io.unobserve(entry.target);
            }
          });
        }, { threshold: 0.15, rootMargin: "0px 0px -8% 0px" });
        revealEls.forEach(function(el){ io.observe(el); });
      } else {
        revealEls.forEach(function(el){ el.classList.add("is-visible"); });
      }
    } catch(e){
      revealEls.forEach(function(el){ el.classList.add("is-visible"); });
    }
    window.setTimeout(function(){
      revealEls.forEach(function(el){ el.classList.add("is-visible"); });
    }, 2500);
  }

  /* =========================================================
     OPTIONAL POLISH — smooth scroll + GSAP-driven micro-motion.
     Everything above this line already makes the page fully
     readable and navigable; everything below is purely cosmetic
     and is wrapped so it can never break the page if a CDN script
     fails to load or throws for any reason.
     ========================================================= */

  /* ---------- Smooth scroll (Lenis) ---------- */
  try {
    if(window.Lenis && !reduceMotion){
      var lenis = new Lenis({
        duration: 1.1,
        easing: function(t){ return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
        smoothWheel: true
      });
      (function raf(time){
        lenis.raf(time);
        requestAnimationFrame(raf);
      })();

      if(window.gsap && window.ScrollTrigger){
        lenis.on("scroll", ScrollTrigger.update);
        gsap.ticker.add(function(time){ lenis.raf(time * 1000); });
        gsap.ticker.lagSmoothing(0);
      }
    }
  } catch(e){ /* smooth scroll is cosmetic only; fail silently */ }

  // Note: there used to be a per-pillar GSAP/ScrollTrigger stagger here.
  // Removed: ScrollTrigger calculates a trigger position once, early in
  // page load, and gsap.from() applies opacity:0 immediately regardless —
  // if a real photo loading in afterward shifts the page's layout (as
  // this site's equipment photos do), that cached position can go stale
  // and never fire, leaving the pillars permanently invisible (the same
  // bug that hid a kinetic headline; see kinetic-type.js). The .pillars
  // wrapper already has [data-reveal], which fades the whole group in
  // through the IntersectionObserver-based system above — reliable, and
  // not worth the risk for a per-item stagger.
})();
