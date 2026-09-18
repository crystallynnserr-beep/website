/* Denson Commercial Equipment Leasing — global motion & interaction layer.
   Lenis (smooth scroll) + GSAP/ScrollTrigger (reveals, progress) with a
   progressive-enhancement guard: nothing here is required for the page to
   be readable, navigable, or convert. See BUILD-PLAN.md §21-23. */
(function(){
  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // Mark the doc as JS-capable so CSS can safely hide pre-reveal states.
  document.documentElement.classList.add("js-ready");

  /* ---------- Smooth scroll (Lenis) ---------- */
  var lenis = null;
  if(window.Lenis && !reduceMotion){
    lenis = new Lenis({
      duration: 1.1,
      easing: function(t){ return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
      smoothWheel: true
    });
    function raf(time){
      lenis.raf(time);
      requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    if(window.gsap && window.ScrollTrigger){
      lenis.on("scroll", ScrollTrigger.update);
      gsap.ticker.add(function(time){ lenis.raf(time * 1000); });
      gsap.ticker.lagSmoothing(0);
    }
  }

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

  /* ---------- Generic scroll reveals ([data-reveal]) ---------- */
  var revealEls = document.querySelectorAll("[data-reveal]");
  if(revealEls.length){
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
  }

  /* ---------- Pillar / stat numeral stagger via GSAP (optional polish) ---------- */
  if(window.gsap && window.ScrollTrigger && !reduceMotion){
    gsap.utils.toArray(".pillar").forEach(function(el, i){
      gsap.from(el, {
        opacity: 0,
        y: 20,
        duration: 0.7,
        delay: i * 0.08,
        ease: "power2.out",
        scrollTrigger: { trigger: el, start: "top 88%", once: true }
      });
    });
  }
})();
