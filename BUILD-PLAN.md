# DENSON COMMERCIAL EQUIPMENT LEASING
## Master Build Plan — Premium Website (Award-Tier / Awwwards-Caliber)

**Prepared as a creative direction + technical build document.**
**Target quality bar:** $10,000 commercial production. Cinematic, industrial, confident, fast.

---

## 1. Website Overview

Denson Commercial Equipment Leasing (“Denson”) rents heavy commercial equipment — telehandlers, boom lifts, and hauling trucks — to contractors, industrial operators, and hauling companies who cannot afford downtime. The current gap in the commercial equipment rental space is that most competitor sites look like static B2B brochures: stock photography, cramped layouts, dated typography, and CTAs buried in navigation.

This site flips that. It treats heavy equipment the way a premium auto brand treats a vehicle launch — with cinematic footage, huge kinetic type, confident negative space, and a UX built around a single objective: **get a qualified renter to click "Rent Equipment" in under 10 seconds of landing.**

**Primary conversion goal:** drive traffic to the reservation system at `https://reserve.loadmaxrentals.com/categories?intent=rent`.

**Secondary goal:** build enough trust and brand weight in the scroll experience that Denson reads as the premium, well-capitalized operator in its market — not a two-truck outfit — which supports better margins and repeat commercial accounts.

**Site scope for this build:**
1. Home page (full cinematic scroll experience)
2. Equipment fleet index page
3. Seven individual equipment detail pages (one per unit)
4. Shared footer / header / CTA system

---

## 2. Core Positioning

> **Denson doesn't rent machines. Denson rents certainty.**

Every contractor renting lift or haul equipment is really buying against one risk: *the job stopping because the equipment didn't show up, didn't start, or wasn't right for the work.* Denson's entire brand case rests on removing that risk.

**Positioning statement:**
For commercial contractors, industrial operators, and hauling companies who need heavy equipment without the burden of owning it, Denson Commercial Equipment Leasing is the rental partner that delivers inspected, maintained, jobsite-ready machines on flexible terms — because Denson understands that in this business, equipment that isn't ready isn't equipment, it's a liability.

**Category truth:** Equipment rental is commoditized on paper (same JLG models, similar rates) and differentiated entirely on *reliability and responsiveness*. Denson's brand has to win on trust signals — condition, readiness, and support — since it can't win on "we have machines nobody else has."

**Reasons to believe:**
- Every unit inspected and maintained before it leaves the yard
- New, current-generation JLG and Peterbilt equipment — not aged-out fleet
- Flexible daily / weekly / monthly terms, no long-term commitment
- Responsive support that treats a stalled jobsite like an emergency, because it is one

---

## 3. Brand Personality

Denson is built to work, not to impress — but it should look impressive doing it. Think: the foreman who shows up early, checks the machine before you ask, and doesn't waste your time. That's the tone.

| Trait | What it means on the page |
|---|---|
| **Dependable** | No gimmicks, no fluff copy. Direct statements, delivered with weight. |
| **Capable** | Huge type and confident scale — the site itself should feel "heavy-duty." |
| **Direct** | Short sentences. Active verbs. No corporate hedging. |
| **Premium-Industrial** | Editorial layout + raw material textures — not a catalog, not a toy. |
| **Quietly Confident** | Denson doesn't oversell. It states facts and lets the equipment do the talking. |

**Brand voice rules:**
- Write like a site superintendent, not a marketer. "Built to work" beats "best-in-class solutions."
- Never use filler adjectives (amazing, incredible, cutting-edge).
- Lead with the outcome (the job keeps moving), not the feature (we have lifts).
- Short imperative CTAs: Rent Equipment. Explore the Fleet. Get to Work.

---

## 4. Visual Direction

**Style:** Industrial Editorial Minimalism with Premium Industrial Brutalism accents — raw, structural, high-contrast layouts (brutalism) delivered with editorial restraint and generous whitespace (minimalism). Think: a steel I-beam photographed for a design magazine.

**Core visual language:**
- Full-bleed cinematic equipment footage/photography as section backdrops, not thumbnails
- Oversized, cropped typography that bleeds off the edge of the viewport
- Hard-edged UI elements (sharp corners, no soft rounded cards) — this is machinery, not a lifestyle app
- Thin hairline rules and a visible grid, like shop-drawing schematics
- Subtle film grain over all imagery/video for a tactile, non-stock-photo feel
- High-contrast duotone treatment on secondary imagery (dark `#1e2d2f` + accent) to unify disparate equipment photos into one system
- Negative space used deliberately — let the machine and the headline breathe

**Color system (client-specified, used as follows):**

| Token | Hex | Role |
|---|---|---|
| `--denson-ink` | `#1E2D2F` | Primary background (dark, near-black teal-charcoal), primary text on light |
| `--denson-rust` | `#CD5B1E` | Primary accent — CTAs, key underlines, active states, numerals |
| `--denson-clay` | `#C65777` | Secondary accent — used sparingly: hover states, tags, kinetic-type highlight words |
| `--denson-bone` | `#E7E4DF` | Primary light background, reversed text on dark sections |

**Usage discipline:** `#1E2D2F` and `#E7E4DF` do the heavy lifting (roughly 85% of the page). `#CD5B1E` is the "go" color — reserved for CTAs and emphasis so it never loses impact. `#C65777` is a controlled accent, used in max ~10% of any viewport (kinetic-type highlight words, hover underlines, tag chips) so the palette stays industrial rather than decorative.

**Imagery treatment:** All equipment photography/video graded toward the `#1E2D2F` shadow tone with `#CD5B1E` in the warm channel (sunrise/sunset job-site lighting) to make stock-sourced or newly generated equipment imagery feel like one cohesive shoot.

---

## 5. Higgsfield Seedance 2.0 Asset Generation

Because Denson has no existing cinematic footage library, hero and section backdrops will be generated as short, high-production cinemagraphs using **Higgsfield Seedance 2.0**, then treated with the grain + duotone pipeline above so they read as a single commissioned shoot rather than stock or AI footage.

**Generation spec (applies to all clips):**
- Resolution: **1080p (1920×1080)**, 16:9, horizontal for desktop hero; a secondary 9:16 crop generated/derived per clip for mobile hero
- Duration: **8–12 seconds**, seamlessly loopable (first and last frame matched) so it can run as a muted, autoplaying background loop with no visible cut
- Frame rate: 24fps for a filmic, unhurried motion feel — this is not an action ad, it's a confidence statement
- Camera: slow, deliberate moves only — creeping dolly-in, slow push, low-angle tilt. No whip pans, no fast cuts. Confidence, not hype.
- Lighting: golden-hour or overcast job-site light (avoid harsh midday flatness) to match the warm-rust/deep-ink grade
- Subject: real equipment silhouettes matching Denson's actual fleet category (telehandler, boom lift, haul truck) — industrial yard or active job-site environment, no people in hero-hazard positions (equipment shown staged/operating safely)
- Post: 6–10% film grain overlay, slight vignette, color grade to brand palette, subtle chromatic desaturation outside the rust/ink range so the accent color pops

**Delivery format:** MP4 (H.264) for browser `<video>` background use, muted, `autoplay loop playsinline`, plus a static poster-frame JPG extracted for the `poster` attribute and as an `<img>` fallback / prefers-reduced-motion substitute.

**Note on build sequencing:** These generated clips are the top layer of visual polish. The site will be built and fully functional with high-quality static imagery/poster frames first (equipment photography stand-ins), then Higgsfield-generated video is layered into the three hero moments below once the structural build is approved — so the $10K look isn't blocked on generation queue time.

---

## 6. Three Cinematic Scenes

These three scenes are the emotional backbone of the scroll — they appear at the Hero, the Mission/"Own Less. Do More." turn, and the Final CTA.

### Scene 1 — "The Yard at First Light" (Hero)
Wide, low dolly-in across a quiet equipment yard at dawn. Mist and rust-gold light. A telehandler and boom lift sit staged, inspected, silhouetted against the sunrise. Nothing moves except light and slow camera drift — communicates *readiness*, not action. This is the calm before the job starts.
**Placement:** Hero background, behind the "Built to Work. Ready When You Are." headline.

### Scene 2 — "Machine in Motion" (Mission / Own Less, Do More turn)
Mid-shot, slow push-in on a boom lift articulating upward on an active commercial site, or a telehandler lifting a load into position. Deliberate, powerful, unhurried movement — the machine doing exactly what it was built for. Communicates *capability*.
**Placement:** Background/side panel behind the "Own Less. Do More." section, cut to a duotone still on scroll-out.

### Scene 3 — "Hauling at Golden Hour" (Final CTA)
A Peterbilt 680 pulling out of frame down a job access road at golden hour, low angle, taillight glow, dust catching the light. Communicates *momentum* — the job is moving again. This is the emotional payoff shot right before the final "Ready to Get to Work?" CTA.
**Placement:** Final CTA section full-bleed background, headline reversed in `#E7E4DF` over a darkened `#1E2D2F` grade.

---

## 7. Website Structure (Sitemap)

```
/                              Home (full cinematic scroll)
/equipment                     Fleet index — all 7 units, filterable
/equipment/jlg-660sj            JLG 660SJ — Telescopic Boom Lift
/equipment/jlg-1044              JLG 1044 — Telehandler   *(see note below)*
/equipment/jlg-10054            JLG 10054 — Telehandler / Lift *(see note below)*
/equipment/jlg-1055              JLG 1055 — Telehandler
/equipment/jlg-600aj             JLG 600AJ — Articulating Boom Lift
/equipment/jlg-800aj             JLG 800AJ — Articulating Boom Lift
/equipment/peterbilt-680         Peterbilt 680 — Hauling Truck
```

> **Assumption to verify:** the source list included "JLG 10043" and "JLG 10054," which aren't standard JLG model numbers (the real telehandler line runs 1044/1055). These have been preserved exactly as provided rather than silently merged, since this is real inventory data — but flag any typos to me and I'll correct the two affected product pages in one pass; nothing else in the build depends on getting the exact digits right.

Each equipment page follows an identical template (see §10) for consistency and fast build velocity: hero image/spec strip, description, capability stats, use-case callouts, and a persistent Rent This Unit CTA.

**Global navigation:** Logo (left) · Equipment (link to /equipment) · Rent Equipment button (right, always `#CD5B1E`, always links out to the reservation system). Nav is minimal by design — this is a conversion path, not a content hub.

---

## 8. Hero Section

**Layout:** Full-viewport-height (100svh), Scene 1 video/poster background, dark `#1E2D2F` grade with grain, kinetic headline reveal on load (word-by-word mask-up animation, ~0.9s stagger).

**Copy (as provided, lightly structured for kinetic type):**

- **Eyebrow (small, tracked-out, `#C65777`):** COMMERCIAL EQUIPMENT LEASING
- **H1 (huge, Trade Gothic Bold, `#E7E4DF`):** Built to Work. Ready When You Are.
- **Subhead (Open Sans, `#E7E4DF` at 85% opacity):** Denson Commercial Equipment Leasing delivers dependable commercial and hauling equipment that works as hard as you do. Ready when you need it and built to keep the job moving.
- **Scroll cue:** small animated down-chevron + "Scroll" micro-label, fades out after first scroll input

**Section 2 (immediately below hero, same scroll unit — "The Right Equipment"):**

- **H2:** The Right Equipment. Ready for the Job.
- **Body:** Denson Commercial Equipment Leasing provides dependable, high-performance equipment for commercial construction, industrial work, and heavy hauling. From telehandlers and boom lifts to articulating lifts and hauling trucks, every piece of equipment is inspected, maintained, and jobsite-ready.

  Whether you're lifting, loading, staging, or hauling, we make it easy to get the equipment you need with flexible rental terms and responsive support that keeps your operation moving.
- **Micro-CTA line:** Need equipment on the job?
- **Supporting line:** Tell us what you need. We'll help you get the right equipment and get to work.
- **Primary Button:** `RENT EQUIPMENT` → `https://reserve.loadmaxrentals.com/categories?intent=rent` (opens in new tab, `rel="noopener"`)

---

## 9. Animated Stats Strip

A thin, high-contrast strip directly beneath the hero fold that counts up on scroll-into-view — the first trust beat after the emotional hero. Numbers below are placeholder figures sized to feel credible for a regional commercial fleet; **swap in Denson's real figures before launch** (flagged inline).

| Stat | Label |
|---|---|
| **7+** | New JLG & Peterbilt units in active rotation |
| **100%** | Inspected & maintained before every rental |
| **24–48 hr** | Typical turnaround to get equipment on your site *(placeholder — confirm)* |
| **7 Days** | A week rental availability, daily / weekly / monthly terms |

**Behavior:** thin `#1E2D2F` band on `#E7E4DF` background (or inverted, depending on scroll context), hairline dividers between stats in `#CD5B1E` at 30% opacity, numerals count up from 0 using an eased tween triggered once at 60% viewport visibility, large Trade Gothic numerals with small Open Sans labels beneath.

---

## 10. Mission Section — "Own Less. Do More."

Scene 2 ("Machine in Motion") plays as a right-column pinned video panel; copy scrolls past on the left in a classic editorial split.

- **H2 (kinetic, line-by-line reveal):** Own Less. Do More.
- **Body:** Put your capital to work where it matters most. With Denson Commercial Equipment Leasing, you get the heavy-duty equipment your operation needs without the upfront cost, ongoing maintenance, or long-term commitment of ownership.

  Rent the right equipment for the job, for as long as you need it. With flexible daily, weekly, and monthly options, Denson helps you keep equipment working, projects moving, and capital in your business.

This section's two supplied bullets become the first two of the **Three Pillars** below — expanded to a third so the section lands as a complete triptych rather than a fragment.

---

## 11. Three Pillars Section

Presented as three equal-width columns, each with a large Trade Gothic numeral (01 / 02 / 03 in `#CD5B1E`), a short headline, and a tight paragraph. Hairline dividers between columns, collapsing to stacked cards on mobile.

**01 — Keep Your Capital Working**
Avoid a major equipment purchase and put those dollars toward the people, projects, and opportunities that grow your business.

**02 — Rent on Your Terms**
Need it for a day, a week, or a month? Rent what you need, when you need it — and stop paying when the job is done.

**03 — Always Jobsite-Ready** *(new, written to complete the triptych)*
Every machine is inspected and maintained before it leaves the yard, so it shows up ready to run — not something you have to troubleshoot on someone else's schedule.

---

## 12. Story Section

No founder history was supplied, so this section is written as a **philosophy statement**, not a fabricated company history — it can be replaced with real Denson history/founding details later without restructuring the page.

- **Eyebrow:** WHY DENSON
- **H2 (large, kinetic):** Equipment That Doesn't Let You Down.
- **Body:** Every job runs on a schedule, and every schedule runs on equipment that starts, lifts, and hauls exactly when it's supposed to. That's the standard Denson holds every machine to before it ever reaches your site — inspected, maintained, and ready to work the moment it rolls off the trailer.

  We built Denson around a simple idea: the equipment rental business isn't really about equipment. It's about trust. Trust that the machine will run. Trust that if something comes up, someone answers the phone. Trust that you can plan a job around us and we'll hold up our end of it.
- **Visual treatment:** Duotone still frame (extracted from Scene 2), large pull-quote-style headline overlapping the image edge per the brutalist-editorial layout language.

---

## 13. Product / Service / Community Section — The Fleet

This is the equipment showcase referenced in the brief as "Built for Heavy Work."

- **Eyebrow:** THE FLEET
- **H2:** Built for Heavy Work.
- **Body:** From lifting and loading to hauling and everything in between, Denson's commercial-grade fleet is ready to take on the demands of your next job.
- **Layout:** Asymmetric editorial grid (not a uniform product-card grid) — a large "hero" tile for the featured unit, five/six smaller tiles beneath, each tile: full-bleed equipment image (duotone-graded), unit name in Trade Gothic, one-line capability tag (e.g., "60 ft Working Height"), hover state reveals `#CD5B1E` border + "View Specs →".
- **Button (section-level):** `EXPLORE OUR EQUIPMENT` → `/equipment`

**The 7 units featured (each links to its detail page, §7):**
1. JLG 660SJ — Telescopic Boom Lift
2. JLG 1044 — Telehandler
3. JLG 10054 — Telehandler
4. JLG 1055 — Telehandler
5. JLG 600AJ — Articulating Boom Lift
6. JLG 800AJ — Articulating Boom Lift
7. Peterbilt 680 — Hauling Truck

### Equipment Detail Page Template (applies to all 7 pages under `/equipment/*`)
1. **Header strip:** breadcrumb (Equipment / [Unit Name]), unit name in huge Trade Gothic
2. **Hero image:** full-bleed duotone-graded photo of the unit on a job site
3. **Quick-spec row:** 3–4 key stats relevant to the category (working height / lift capacity / reach / GVWR as applicable) — placeholder values marked `[confirm spec]` pending real spec sheets
4. **Description (2 short paragraphs):** what the unit is, what jobs it's built for, why Denson's version is ready to run (inspected/maintained line, consistent with brand voice)
5. **"Ideal For" tag row:** 3–4 use-case chips (e.g., Warehouse Loading, Steel Erection, Facade Work, Material Staging)
6. **Persistent CTA:** `RENT THIS EQUIPMENT` → reservation link, sticky on scroll on mobile
7. **Cross-sell strip:** "You Might Also Need" — 2 related units from the fleet

---

## 14. Featured Work / Content Section

No client case studies, testimonials, or project photography were supplied, and none will be fabricated (no invented client names, quotes, or job-site claims presented as real). Instead this slot becomes **"Built For" — Industries We Power**, a confident, honest capability statement:

- **Eyebrow:** WHO WE SERVE
- **H2:** Built For the Work You Do.
- **Three industry tiles (image + short line, each a duotone job-site photo/generated still):**
  - **Commercial Construction** — Lifting, staging, and material handling for active build sites.
  - **Industrial & Facilities** — Equipment that keeps plants, warehouses, and facilities operating without interruption.
  - **Heavy Hauling & Logistics** — Reliable haul capacity to move equipment and materials where the job needs them.

*(When Denson has real project photography or client references, this section is the natural place to swap in an actual case-study/testimonial carousel — the layout is built to accept that upgrade later.)*

---

## 15. Final CTA Section

Scene 3 ("Hauling at Golden Hour") full-bleed background, darkened grade, reversed type.

- **H2 (huge, kinetic line reveal):** Ready to Get to Work?
- **Body:** Tell us what the job demands. We'll help you get the right equipment, the right rental terms, and the support you need to keep moving.
- **Primary Button:** `RENT EQUIPMENT` → `https://reserve.loadmaxrentals.com/categories?intent=rent`
- **Secondary micro-link (small, beneath button):** reserve.loadmaxrentals.com

---

## 16. Footer

Dark `#1E2D2F` background, `#E7E4DF` type, minimal and structural — this is a utility zone, not a design moment.

- **Column 1:** Denson logo/wordmark + one-line tagline: "Built to Work. Ready When You Are."
- **Column 2 — Company:** Equipment · Rent Equipment (external link)
- **Column 3 — Fleet:** links to all 7 equipment pages (also doubles as SEO internal linking)
- **Column 4 — Contact:** `[Add phone number]` · `[Add email address]` · `[Add service area / address]` — placeholders only; no fabricated contact details are inserted. Replace before launch.
- **Bottom bar:** © [Year] Denson Commercial Equipment Leasing. All rights reserved. · thin hairline rule in `#CD5B1E` above the bottom bar.

---

## 17. Complete Visual Style Guide

**Grid:** 12-column, max-width 1440px container, 24px gutters desktop / 16px mobile. Sections regularly break the grid deliberately (bleeding type off-edge) as a brutalist signature — but every break is intentional, never accidental.

**Spacing scale (rem, 8px base):** 0.5 · 1 · 1.5 · 2 · 3 · 4 · 6 · 8 · 12 · 16 — section vertical padding never below `6rem` desktop / `3rem` mobile, reinforcing the "premium, unhurried" feel.

**Corners & borders:** 0px radius everywhere except the primary CTA button, which gets a near-imperceptible 2px radius (reads sharp, avoids literal pixel-hostile edges on hover states). Hairline borders at 1px, `#CD5B1E` at 20–30% opacity for dividers, 100% for active/hover states.

**Buttons:**
- Primary: solid `#CD5B1E` fill, `#E7E4DF` text, Open Sans Bold, uppercase, letter-spaced, on hover: fill shifts to `#1E2D2F` with `#CD5B1E` border+text (invert, not fade)
- Secondary/ghost: transparent, 1px `#E7E4DF` or `#1E2D2F` border depending on section, fills solid on hover

**Imagery:** all photography/video duotone-graded to the brand palette (§4), 6–10% grain overlay applied globally via a fixed CSS noise layer (`mix-blend-mode: overlay`) so grain reads as a print/film quality rather than screen noise.

**Iconography:** minimal line icons only where functional (chevrons, arrows, close/menu) — no decorative icon sets. Everything else is typographic or photographic.

---

## 18. Typography

- **Display / Headers:** **Trade Gothic Bold** (client-specified). Trade Gothic is a licensed commercial typeface (Linotype) without a free web-embeddable distribution — if a licensed webfont file (WOFF2) is available, drop it into `/assets/fonts/` and it becomes the primary `--font-display`. **Production fallback until then:** `Oswald` (700) — closest freely-licensed geometric-condensed match in weight and character, loaded via Google Fonts/self-hosted so the build isn't blocked. The CSS variable is named generically (`--font-display`) so swapping in the real Trade Gothic file later is a one-line change.
- **Body / UI:** **Open Sans** (400/600/700), self-hosted or Google Fonts, used for all body copy, nav, buttons, form fields, and stat labels.

**Type scale (desktop, fluid via `clamp()`):**
| Role | Size | Weight | Notes |
|---|---|---|---|
| Hero H1 | `clamp(3rem, 9vw, 8.5rem)` | 700 | tight leading (0.92), uppercase optional per line |
| Section H2 | `clamp(2.25rem, 6vw, 5rem)` | 700 | |
| Pillar numerals | `clamp(3rem, 5vw, 6rem)` | 700 | `#CD5B1E` |
| Body / lede | `1.125rem–1.375rem` | 400 | Open Sans, 1.6 line-height, max 65ch measure |
| Eyebrow / label | `0.8125rem` | 600 | uppercase, 0.15em tracking |
| Button label | `0.9375rem` | 700 | uppercase, 0.08em tracking |

All headline reveals use a mask/clip-path technique (not opacity fades) so type feels like it's being physically uncovered — reinforcing the "built," structural brand feel.

---

## 19. Animation Direction

- **Kinetic type:** headlines split into lines/words (via a lightweight custom splitter, no paid SplitText dependency required) and revealed with a `clip-path: inset()` wipe + slight Y-translate, staggered per line, triggered on scroll-into-view via IntersectionObserver/ScrollTrigger.
- **Section transitions:** cinematic cross-fades between dark and light sections (a brief `#1E2D2F` bridge frame) rather than hard cuts, echoing a film edit rather than a webpage scroll.
- **Numerals (stats strip):** count-up tweens, eased (`power2.out`), 1.2–1.8s duration.
- **Parallax:** background video/image layers move at 0.8–0.9x scroll speed relative to foreground type (subtle depth, never nauseating — capped movement, disabled entirely under `prefers-reduced-motion`).
- **Micro-interactions:** button hover = 150ms color invert + 2px border draw-on; equipment tile hover = image scale 1.04 + duotone-to-full-color crossfade (the one moment full color is allowed to bleed through, rewarding interaction).

---

## 20. Interaction Design

- **Cursor:** default system cursor (no custom cursor gimmick — stays premium-industrial, not playful-startup).
- **Primary CTA button** is present at minimum in: nav (persistent), hero, mission section, fleet section, every equipment detail page, final CTA, footer — the conversion path is never more than one viewport away.
- **Equipment tiles/cards:** entire tile is a click target (not just the "View Specs" label), `cursor: pointer`, hover reveals spec tag and border treatment described in §19.
- **Forms:** none required for MVP — the reservation flow is fully offloaded to `reserve.loadmaxrentals.com`, keeping this site fast and focused on brand + conversion handoff.
- **Focus states:** visible 2px `#CD5B1E` outline on all interactive elements for keyboard navigation — never `outline: none` without a replacement (accessibility non-negotiable even in a brutalist system).

---

## 21. Scroll Behavior

- **Smooth scroll:** implemented via a lightweight inertia-scroll library (Lenis) for a buttery, weighted scroll feel — critical to the cinematic promise of this brief.
- **No hard scroll-snap** on the home page (snap fights with the editorial pacing of long-form sections); equipment index page may use soft scroll-snap per row on desktop for a more "catalog" feel.
- **Scroll-triggered reveals** on every major section (kinetic type, stat count-ups, image duotone-to-color, pillar stagger-in).
- **Progress indicator:** thin 2px `#CD5B1E` bar fixed to the top edge of viewport, fills 0–100% across full page scroll — a small wayfinding + premium-craft signal.
- **Performance guardrail:** background videos pause when scrolled out of viewport (IntersectionObserver) to protect battery/CPU on long scroll sessions.

---

## 22. Mobile Behavior

- **Video → poster fallback:** hero/section background video is replaced by the graded poster-frame still on connections/devices where autoplay video is costly (respecting `prefers-reduced-motion` and `save-data` header) — mobile still gets the cinematic look without the payload cost.
- **Type scale collapse:** `clamp()` scale (§18) naturally compresses headlines; hero H1 never drops below a comfortable single/double-line wrap on a 375px viewport.
- **Layout:** all multi-column sections (pillars, split mission section, footer columns) stack to single-column; equipment grid goes to 1-up (hero tile) then 2-up (secondary tiles).
- **Sticky mobile CTA:** persistent slim `RENT EQUIPMENT` bar pinned to the bottom of the viewport on equipment detail pages and after the hero on the home page — mobile users get a thumb-reach conversion path at all times.
- **Touch targets:** minimum 44×44px per Apple/WCAG guidance on every button/link.
- **Reduced motion:** kinetic type reveals fall back to a simple opacity fade; parallax and count-up animations are disabled under `prefers-reduced-motion: reduce`.

---

## 23. Technical Implementation

**Stack:** Static, framework-free build — semantic HTML5 + modern CSS (custom properties, `clamp()`, CSS Grid/Flexbox) + vanilla JS modules, plus two small, well-audited libraries loaded via CDN:
- **GSAP + ScrollTrigger** — kinetic type reveals, count-ups, scroll-triggered animation
- **Lenis** — smooth/inertia scroll

This choice is deliberate: no build pipeline/bundler required, the site ships as fast, cacheable static files, deploys anywhere (including simple static hosting), and stays maintainable by a non-engineer editing HTML directly.

**File structure:**
```
/index.html
/equipment/index.html
/equipment/jlg-660sj/index.html
/equipment/jlg-1044/index.html
/equipment/jlg-10054/index.html
/equipment/jlg-1055/index.html
/equipment/jlg-600aj/index.html
/equipment/jlg-800aj/index.html
/equipment/peterbilt-680/index.html
/assets/css/main.css
/assets/js/main.js            (Lenis + GSAP init, nav, shared behavior)
/assets/js/kinetic-type.js    (line/word splitter + reveal controller)
/assets/js/stats-counter.js
/assets/fonts/                (Trade Gothic webfont, if/when licensed file is provided)
/assets/img/equipment/        (unit photography, duotone-graded exports)
/assets/img/scenes/           (Higgsfield scene stills/poster frames)
/assets/video/scenes/         (Higgsfield-generated MP4 loops)
/BUILD-PLAN.md
```

**Performance targets:** Lighthouse Performance ≥ 90 mobile, LCP < 2.5s (poster-frame strategy protects this), CLS < 0.05 (all media has explicit `width/height`/`aspect-ratio` reserved).

**SEO basics:** unique `<title>`/meta description per equipment page (model + category + "Denson Commercial Equipment Leasing"), semantic heading hierarchy, `alt` text on every image describing the unit and use case, internal linking between fleet index ↔ detail pages ↔ footer.

**Accessibility:** WCAG AA color contrast checked for all text-on-image overlays (dark scrim gradient behind hero/CTA type where needed against video), full keyboard navigability, `prefers-reduced-motion` support (§22), semantic landmarks (`header`, `nav`, `main`, `footer`).

**Analytics/tracking:** hook point left in `main.js` for a single analytics snippet (GA4 or similar) and outbound-click event tracking on every `RENT EQUIPMENT` link — client to supply tracking ID before launch.

---

## Build Sequence (once approved)

1. Global design system: CSS variables, typography scale, grid, button/component base styles, grain overlay
2. Home page structure + copy (all sections above), static imagery/poster stands-in
3. Equipment index page + all 7 equipment detail page instances from the shared template
4. Motion layer: Lenis smooth scroll, GSAP kinetic type, scroll-triggered reveals, stats count-up
5. Responsive pass (mobile/tablet breakpoints, sticky mobile CTA)
6. Accessibility + performance pass
7. Higgsfield Seedance 2.0 generation for the Three Cinematic Scenes, graded and integrated as background video with poster fallback
8. Final QA, commit, push
