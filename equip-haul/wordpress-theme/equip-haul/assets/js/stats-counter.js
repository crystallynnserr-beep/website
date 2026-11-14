/* Animated stats strip: counts numeric values up once each [data-stat-value]
   is ~60% into the viewport. Falls back to displaying the final value
   immediately when GSAP is unavailable or motion is reduced. */
(function(){
  function init(){
    const stats = document.querySelectorAll("[data-stat-value]");
    if(!stats.length) return;

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const hasGSAP = !!window.gsap;

    stats.forEach(el => {
      const raw = el.getAttribute("data-stat-value");
      const match = raw.match(/^(\D*)(\d+(?:\.\d+)?)(\D*)$/);
      if(!match || reduceMotion || !hasGSAP){
        el.textContent = raw;
        return;
      }
      const [, prefix, numStr, suffix] = match;
      const target = parseFloat(numStr);
      const decimals = (numStr.split(".")[1] || "").length;
      const counter = { val: 0 };
      var done = false;

      function finish(){
        if(done) return;
        done = true;
        el.textContent = prefix + target.toFixed(decimals) + suffix;
      }

      el.textContent = prefix + (0).toFixed(decimals) + suffix;

      function animateIn(){
        try {
          gsap.to(counter, {
            val: target,
            duration: 1.6,
            ease: "power2.out",
            onUpdate: () => {
              el.textContent = prefix + counter.val.toFixed(decimals) + suffix;
            },
            onComplete: finish
          });
        } catch(e){
          finish();
        }
      }

      // IntersectionObserver, not GSAP ScrollTrigger: see kinetic-type.js
      // for why — a stale cached trigger position (from a real photo
      // loading in and shifting the layout after the trigger was set up)
      // could leave this stuck at 0 forever instead of counting up.
      if("IntersectionObserver" in window){
        var io = new IntersectionObserver(function(entries){
          entries.forEach(function(entry){
            if(entry.isIntersecting){
              animateIn();
              io.unobserve(entry.target);
            }
          });
        }, { threshold: 0.15, rootMargin: "0px 0px -10% 0px" });
        io.observe(el);
      } else {
        animateIn();
      }

      // Last-resort safety net: the real value must never stay stuck at
      // 0 forever even if the observer somehow never fires.
      window.setTimeout(finish, 12000);
    });
  }

  if(document.readyState === "loading"){
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
