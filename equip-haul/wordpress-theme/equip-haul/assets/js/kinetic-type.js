/* Kinetic type: splits [data-kinetic] elements into lines/words wrapped in
   masked spans, then reveals them with a staggered clip/translate wipe on
   scroll-into-view. See BUILD-PLAN.md §19 "Animation Direction". */
(function(){
  function splitByWords(el){
    const text = el.textContent.trim();
    const words = text.split(/\s+/);
    el.textContent = "";
    words.forEach((word, i) => {
      const wrap = document.createElement("span");
      wrap.className = "kinetic-word";
      const inner = document.createElement("span");
      inner.textContent = word + (i < words.length - 1 ? " " : "");
      wrap.appendChild(inner);
      el.appendChild(wrap);
    });
    return Array.from(el.querySelectorAll(".kinetic-word > span"));
  }

  function splitByLines(el){
    const lines = el.getAttribute("data-kinetic-lines")
      ? el.getAttribute("data-kinetic-lines").split("|")
      : [el.textContent.trim()];
    el.textContent = "";
    lines.forEach(line => {
      const wrap = document.createElement("span");
      wrap.className = "kinetic-line";
      const inner = document.createElement("span");
      inner.textContent = line;
      wrap.appendChild(inner);
      el.appendChild(wrap);
      el.appendChild(document.createTextNode(" "));
    });
    return Array.from(el.querySelectorAll(".kinetic-line > span"));
  }

  function init(){
    const targets = document.querySelectorAll("[data-kinetic]");
    if(!targets.length) return;

    const hasGSAP = !!window.gsap;

    targets.forEach(el => {
      const mode = el.getAttribute("data-kinetic"); // "words" | "lines"
      const spans = mode === "lines" ? splitByLines(el) : splitByWords(el);
      var revealed = false;
      function reveal(){
        if(revealed) return;
        revealed = true;
        spans.forEach(s => { s.style.transform = "none"; });
      }

      if(!hasGSAP){
        reveal();
        return;
      }

      function animateIn(){
        try {
          gsap.set(spans, { yPercent: 110 });
          gsap.to(spans, {
            yPercent: 0,
            duration: 0.9,
            ease: "power3.out",
            stagger: mode === "lines" ? 0.12 : 0.035,
            onComplete: reveal
          });
        } catch(e){
          reveal();
        }
      }

      // Triggered by IntersectionObserver, not GSAP ScrollTrigger: a
      // ScrollTrigger position is calculated once, early, from the
      // page's layout at that moment — if real photos load in afterward
      // and shift that layout (as this site's now-real equipment photos
      // do), the cached trigger point can go stale and never fire again.
      // IntersectionObserver re-evaluates live on every scroll, so it
      // can't go stale the same way, and it's the same mechanism already
      // proven reliable for this site's [data-reveal] sections.
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

      // Last-resort safety net well beyond any normal time-to-scroll, in
      // case the observer itself never fires for some unforeseen reason —
      // the words must never stay hidden forever.
      window.setTimeout(reveal, 12000);
    });
  }

  if(document.readyState === "loading"){
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
