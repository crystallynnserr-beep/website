/* Animated stats strip: counts numeric values up once each [data-stat-value]
   is ~60% into the viewport. Falls back to displaying the final value
   immediately when GSAP is unavailable or motion is reduced. */
(function(){
  function init(){
    const stats = document.querySelectorAll("[data-stat-value]");
    if(!stats.length) return;

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const hasGSAP = window.gsap && window.ScrollTrigger;

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

      el.textContent = prefix + (0).toFixed(decimals) + suffix;

      gsap.to(counter, {
        val: target,
        duration: 1.6,
        ease: "power2.out",
        scrollTrigger: {
          trigger: el,
          start: "top 75%",
          once: true
        },
        onUpdate: () => {
          el.textContent = prefix + counter.val.toFixed(decimals) + suffix;
        }
      });
    });
  }

  if(document.readyState === "loading"){
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
