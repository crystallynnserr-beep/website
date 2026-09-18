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
    // Wrap each existing <br>-separated or block line in a masked line span.
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

    const hasGSAP = window.gsap && window.ScrollTrigger;

    targets.forEach(el => {
      const mode = el.getAttribute("data-kinetic"); // "words" | "lines"
      const spans = mode === "lines" ? splitByLines(el) : splitByWords(el);

      if(!hasGSAP){
        spans.forEach(s => { s.style.transform = "none"; });
        return;
      }

      gsap.set(spans, { yPercent: 110 });
      gsap.to(spans, {
        yPercent: 0,
        duration: 0.9,
        ease: "power3.out",
        stagger: mode === "lines" ? 0.12 : 0.035,
        scrollTrigger: {
          trigger: el,
          start: "top 85%",
          once: true
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
