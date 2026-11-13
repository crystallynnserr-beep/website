# EQUIP & HAUL EQUIPMENT LEASING
## Master Build Plan — Premium Website (Award-Tier / Awwwards-Caliber)

**Prepared as a creative direction + technical build document.**
**Target quality bar:** $10,000 commercial production. Cinematic, industrial, confident, fast.

---

## 1. Website Overview

Equip & Haul Equipment Leasing rents heavy commercial equipment to contractors and industrial operators — and, unlike most competitors, moves it for them too. The name says the whole business model: **Equip** (the machine) **&** **Haul** (the move). That dual capability is the single most ownable fact about this brand, and this site is built to make it impossible to miss.

Most equipment rental sites read like parts catalogs: dense spec tables, stock photography, a contact form buried three clicks deep. This site instead treats the equipment the way a premium vehicle brand treats a launch — cinematic footage, huge confident type, generous negative space — while using the scroll itself to tell one clear story: *you don't need two vendors. You need one call.*

**Primary conversion goal:** get a qualified renter to a quote/contact action in under 10 seconds of landing — a single, repeated, unmissable CTA.

**Secondary goal:** establish Equip & Haul as the obvious choice over a single-service competitor by making the "equipment + hauling, one partner" promise the first thing a visitor understands, not a line item they discover later.

**Site scope for this build:**
1. Home page (full cinematic scroll experience)
2. Fleet / Services page (category-level — see §13 note on inventory)
3. Shared header / footer / CTA system

**Delivery format:** a custom WordPress theme, not a hand-coded static site. The client has said directly they are not a coder, so every page is a normal WordPress Page with a page template assigned, and every piece of copy and every photo is editable through plain wp-admin forms — no HTML, no code, ever required to update content. See §23 for exactly how that works.

---

## 2. Core Positioning

> **One call for the machine. One call for the move.**

Every contractor renting equipment solves two problems: getting the right machine, and getting it to the site. Most rental yards solve only the first and leave you finding your own flatbed. Equip & Haul's entire case rests on solving both — which means the brand doesn't compete on having better machines (everyone rents the same catalog), it competes on removing a logistics problem the whole category treats as "not our job."

**Positioning statement:**
For commercial contractors and industrial operators who need equipment on site without coordinating a separate hauling vendor, Equip & Haul Equipment Leasing is the rental partner that equips the job *and* delivers it — inspected, ready, and on time — because splitting "the machine" and "the move" across two vendors is exactly the kind of friction that stalls a job.

**Reasons to believe:**
- Hauling isn't an add-on quote — it's built into how the company is named and run
- Every unit inspected and maintained before it leaves the yard
- Flexible daily / weekly / monthly terms, no long-term commitment
- One point of contact for the equipment and the logistics, start to finish

---

## 3. Brand Personality

Equip & Haul is the partner who shows up with the machine already on the trailer. Tough, direct, dependable — the brand voice of someone who solves problems before you have to ask.

| Trait | What it means on the page |
|---|---|
| **Capable** | States what it does plainly. "We bring it" beats "logistics solutions." |
| **Tough** | Steel-and-safety-yellow visual language; nothing precious or soft. |
| **Direct** | Short sentences, active verbs, no corporate padding. |
| **Dependable** | Consistent structure, consistent promise, repeated on every page. |
| **One-Stop** | Every section reinforces "equipment + hauling," never equipment alone. |

**Brand voice rules:**
- Lead with the outcome (the job keeps moving), not the feature list.
- Say "equipment and the move" or equivalent phrasing often enough that the dual-service positioning never goes unstated for long.
- Short imperative CTAs: Request Equipment. Get a Quote. Get to Work.
- No filler adjectives (amazing, best-in-class, cutting-edge).

---

## 4. Visual Direction

**Style:** Industrial Editorial Minimalism with Premium Industrial Brutalism accents — full-bleed cinematic equipment/hauling imagery, oversized cropped type, hard-edged UI, visible grid, subtle film grain. Same disciplined, confident system as a premium construction-tech brand, not a parts catalog.

**Color system (client-specified):**

| Token | Hex | Role |
|---|---|---|
| `--eh-iron` | `#2C3E50` | Primary dark background (Iron Blue), primary text on light |
| `--eh-grey` | `#95A5A6` | Secondary neutral — hairlines, dividers, secondary text, muted labels |
| `--eh-yellow` | `#FFD400` | Primary accent — CTAs, key emphasis, numerals, active states |
| `--eh-white` | `#F5F5F5` | Primary light background, reversed text on dark sections |

**Usage discipline:** `#2C3E50` and `#F5F5F5` carry roughly 85% of the page, exactly as in a disciplined two-tone system. `#FFD400` (construction/safety yellow) is the single "go" color — CTAs and the most important numerals/emphasis only — so it reads as a deliberate signal, the way safety yellow reads on an actual jobsite, never as decoration. `#95A5A6` handles everything structural-but-quiet: hairline rules, captions, secondary body copy on dark backgrounds, disabled/inactive states. There is no secondary accent color in this palette (unlike a typical two-accent system) — that restraint is a feature: one accent color used with total consistency reads as more premium than two competing for attention.

**Imagery treatment:** All equipment and hauling photography/video graded toward the `#2C3E50` shadow tone with `#FFD400` reserved for genuine safety-yellow elements already in frame (equipment paint, vests, striping) rather than added artificially — the grade should look like one commissioned shoot, not a filter.

---

## 5. Higgsfield Seedance 2.0 Asset Generation

No existing footage library exists for Equip & Haul, so hero and section backdrops are planned as short cinemagraphs generated with **Higgsfield Seedance 2.0**, graded to the palette above so they read as one commissioned shoot.

**Generation spec (applies to all clips):**
- Resolution: **1080p (1920×1080)**, 16:9 for desktop hero; a 9:16 crop derived per clip for mobile
- Duration: **8–12 seconds**, seamlessly loopable (matched first/last frame) for a muted autoplay background loop with no visible cut
- Frame rate: 24fps — deliberate, unhurried motion; this brand earns trust by looking unshakeable, not fast
- Camera: slow dolly-in, slow push, low-angle tilt only. No whip pans, no fast cuts.
- Lighting: golden-hour or overcast jobsite light, matching the cool iron-blue grade with warm practical highlights
- Subject: real equipment/hauling silhouettes (telehandler- or boom-lift-type machine, a flatbed/trailer hauling a loaded unit) in an industrial yard or active jobsite — no people in hazard positions
- Post: 6–10% film grain, slight vignette, grade to brand palette

**Delivery format:** MP4 (H.264), muted `autoplay loop playsinline`, with a static poster-frame JPG for the `poster` attribute and as the `prefers-reduced-motion`/no-video fallback.

**Sequencing note:** the site ships fully functional with a designed placeholder system first (see §17), then real photography or Seedance footage is layered into the three hero moments below once generated — the build is never blocked on generation queue time or available credits.

---

## 6. Three Cinematic Scenes

### Scene 1 — "Staged at Sunrise" (Hero)
Wide, low dolly-in across a quiet equipment yard at dawn. Mist, cool iron-blue shadow, a machine staged and silhouetted against early light, a flash of safety yellow on its paint or striping catching the first sun. Nothing moves but light and the slow camera drift. Communicates *readiness*.
**Placement:** Hero background, behind "Equipment That Works as Hard as You Do."

### Scene 2 — "The Lift" (Mission section)
Mid-shot, slow push-in on a piece of lifting/loading equipment at work on an active site — deliberate, powerful, unhurried. Communicates *capability*.
**Placement:** Background/side panel behind the mission section, duotone still on scroll-out.

### Scene 3 — "On the Move" (Final CTA)
A flatbed hauling a loaded piece of equipment down a jobsite access road at golden hour, low angle, dust catching the light. This is the scene that makes the "& Haul" half of the brand visible and literal — the payoff shot right before the final CTA.
**Placement:** Final CTA section, full-bleed background, reversed type over a darkened grade.

---

## 7. Website Structure (Sitemap)

```
/                  Home — WordPress page using the "Home" page template
/fleet             Fleet & Services — WordPress page using the "Fleet & Services" page template
```

Every URL in this build is an ordinary WordPress **Page** with a custom **Page Template** assigned to it (a dropdown choice in the normal page editor) — not a hand-built HTML file. That is the core requirement of this build: the client is not a coder, so every page must be something they create, rename, and edit entirely inside wp-admin. See §23 for exactly how headline/body copy on each page stays editable without touching a file.

This build intentionally ships a smaller sitemap than a full per-unit catalog (compare: a prior project for a different client had 6 named units with model-specific spec sheets). **No specific inventory, model numbers, or unit list was provided for Equip & Haul** — inventing specific equipment model numbers presented as this company's real fleet would be fabricating facts, so §13 is built at the service-category level instead (Aerial & Lift Equipment, Material Handling, Hauling & Transport). The moment real inventory is provided, the Fleet page's category tiles become named-unit tiles using the exact same editable-field pattern — a content change made entirely in wp-admin, not a rebuild.

**Global navigation:** Logo (left) · Fleet & Services (link to /fleet) · Get a Quote button (right, always `#FFD400`, always the primary conversion action). Minimal by design — a conversion path, not a content hub.

---

## 8. Hero Section

**Layout:** Full-viewport-height (100svh), Scene 1 video/poster background, Iron Blue grade with grain, kinetic headline reveal on load (word/line mask-up, ~0.9s stagger).

**Copy (expanded from the brief, structured for kinetic type):**

- **Eyebrow (small, tracked-out, `#FFD400`):** COMMERCIAL EQUIPMENT & HAULING
- **H1 (huge, Trade Gothic Bold, `#F5F5F5`):** Equipment That Works as Hard as You Do
- **Subhead (Open Sans, `#F5F5F5` at 85% opacity):** Equip & Haul delivers dependable commercial equipment and hauling solutions that are ready when you are, so you can keep the job moving.
- **Scroll cue:** small animated down-chevron + "Scroll" micro-label, fades on first scroll input

**Section 2 (immediately below hero — "One Call. Equipped and Hauled."):**

- **H2:** One Call. Equipped and Hauled.
- **Body:** Most rental yards stop at the gate — you're on your own getting the machine to site. Equip & Haul doesn't. Every rental comes backed by our own hauling capability, so the equipment you book is the equipment that shows up, on schedule, without a second vendor in the mix.

  Whether you need a single unit for a week or a fleet for a phase of the job, we make it simple: one point of contact for the machine and the move.
- **Micro-CTA line:** Need equipment moved and ready?
- **Supporting line:** Tell us the job. We'll handle the machine and the logistics.
- **Primary Button:** `GET A QUOTE` → `/fleet#contact` *(placeholder destination — see §16, no live quote system or reservation link was supplied; wire this to the client's actual contact method before launch)*

---

## 9. Animated Stats Strip

Thin, high-contrast strip beneath the hero fold, counts up on scroll. **Figures below are placeholders sized to feel credible — replace with Equip & Haul's real numbers before launch (flagged inline, same discipline as spec figures elsewhere in this plan).**

| Stat | Label |
|---|---|
| **100%** | Inspected & maintained before every rental |
| **1 Call** | For the equipment and the haul — no second vendor |
| **24–48 hr** | Typical turnaround to get equipment on your site *(placeholder — confirm)* |
| **Day / Wk / Mo** | Flexible terms, stop paying when the job's done |

---

## 10. Mission Section — "One Call. Equipped and Hauled."

Scene 2 ("The Lift") plays as a pinned right-column panel; copy scrolls past on the left, classic editorial split — same pattern as §8's section 2, expanded into its own full scroll moment with the three pillars immediately beneath it.

---

## 11. Three Pillars Section

Three equal-width columns, large Trade Gothic numeral (01/02/03 in `#FFD400`), short headline, tight paragraph. Hairline dividers in `#95A5A6`, stacking on mobile.

**01 — Keep Your Capital Working**
Avoid a major equipment purchase and put those dollars toward the people, projects, and opportunities that grow your business.

**02 — Equipment *and* the Move**
Most rental companies stop at the gate. We don't. Hauling is built into how we operate, not a separate quote from a separate vendor — one call gets you both.

**03 — Always Jobsite-Ready**
Every machine is inspected and maintained before it leaves the yard, so it shows up ready to run — not something you troubleshoot on someone else's schedule.

---

## 12. Story Section

No founder history was supplied, so this is written as a **philosophy statement** — honest, not a fabricated company history — and is the natural place to drop in real history later without restructuring the page.

- **Eyebrow:** WHY EQUIP & HAUL
- **H2:** Two Problems. One Partner.
- **Body:** Getting a machine to a jobsite is two problems wearing one invoice: finding the right equipment, and getting it there. Most of this industry only solves the first one — and leaves you to figure out the second, usually under a deadline.

  We built Equip & Haul around closing that gap. Every rental is backed by our own hauling capability, every machine is inspected before it leaves the yard, and every job gets one point of contact instead of two vendors who've never talked to each other. That's not a value-add. That's the whole business.

---

## 13. Fleet & Services Section — "Built for Heavy Work"

- **Eyebrow:** THE FLEET
- **H2:** Equipment and Hauling, Under One Roof.
- **Body:** From lifting and loading to getting it all to site, Equip & Haul's commercial-grade fleet and hauling capability are built to take on the next phase of your job — together.
- **Layout:** Three service-category tiles (not individual named units — see sitemap note, §7), each full-bleed duotone-graded image, category name in Trade Gothic, one-line description, hover reveals `#FFD400` border + "Learn More →".

**Category tiles:**
1. **Aerial & Lift Equipment** — Boom lifts and telehandlers for reach, height, and material placement.
2. **Material Handling** — Loaders and handling equipment built for staging and site logistics.
3. **Hauling & Transport** — Our own capability to move your equipment to and from site — the half of the business most competitors don't offer.

**Button (section-level):** `VIEW FLEET & SERVICES` → `/fleet`

> **Note for the client:** supply your actual fleet list (makes/models, categories, spec sheets) and this section upgrades to named unit tiles with individual detail pages — same proven template pattern as a prior per-unit build, applied here once real inventory exists. Until then, this stays at the category level rather than inventing specific equipment this company may not actually operate.

---

## 14. Featured Work / Content Section — Who We Serve

No client case studies, project photography, or testimonials were supplied, and none are fabricated here (no invented client names, quotes, or job claims). Instead:

- **Eyebrow:** WHO WE SERVE
- **H2:** Built For the Work You Do.
- **Three industry tiles:**
  - **Commercial Construction** — Lifting, staging, and material handling for active build sites.
  - **Industrial & Facilities** — Equipment that keeps plants, warehouses, and facilities operating without interruption.
  - **Site Logistics & Transport** — Equipment delivered and picked up without coordinating a separate hauler.

*(Swap in real project photography or client references here once available — layout is built to accept that upgrade.)*

---

## 15. Final CTA Section

Scene 3 ("On the Move") full-bleed background, darkened grade, reversed type.

- **H2 (huge, kinetic line reveal):** Ready to Get the Job Moving?
- **Body:** Tell us what the job needs — the equipment, the timeline, the site. We'll handle getting it there.
- **Primary Button:** `GET A QUOTE` → placeholder contact destination (§16)
- **Secondary micro-link:** phone/email placeholder, see footer

---

## 16. Footer

Iron Blue background, off-white type, minimal and structural.

- **Column 1:** Equip & Haul logo/wordmark + tagline: "Equipment That Works as Hard as You Do."
- **Column 2 — Company:** Fleet & Services · Get a Quote
- **Column 3 — Services:** Aerial & Lift Equipment · Material Handling · Hauling & Transport
- **Column 4 — Contact:** `[Add phone number]` · `[Add email address]` · `[Add service area]` — placeholders only, no fabricated contact details inserted. **No reservation/quote system URL was supplied for this project** (the prior build for a different client had a live external booking link; this one does not) — every "Get a Quote" button in this build points to a placeholder `/fleet#contact` anchor until the client supplies either a real contact form target, a phone/email, or a third-party booking URL.
- **Bottom bar:** © [Year] Equip & Haul Equipment Leasing. All rights reserved. · hairline rule in `#FFD400` above the bottom bar.

---

## 17. Complete Visual Style Guide

**Grid:** 12-column, max-width 1440px container, 24px gutters desktop / 16px mobile. Sections deliberately break the grid (type bleeding off-edge) as a brutalist signature, always intentionally.

**Spacing scale (rem, 8px base):** 0.5 · 1 · 1.5 · 2 · 3 · 4 · 6 · 8 · 12 · 16 — section vertical padding never below `6rem` desktop / `3rem` mobile.

**Corners & borders:** 0px radius everywhere except the primary CTA button (near-imperceptible 2px). Hairlines at 1px, `#95A5A6` at 30–40% opacity for dividers, `#FFD400` at full opacity for active/hover states.

**Buttons:**
- Primary: solid `#FFD400` fill, `#2C3E50` text (dark text on yellow for contrast and legibility), Open Sans Bold, uppercase, letter-spaced; hover inverts to `#2C3E50` fill with `#FFD400` border+text
- Secondary/ghost: transparent, 1px `#F5F5F5` or `#2C3E50` border depending on section, fills solid on hover

**Imagery/placeholder system:** since no commissioned photography exists yet, every image slot uses a **technical-schematic placeholder panel** — duotone gradient (Iron Blue family), 6–10% grain, corner frame brackets, a faint oversized category glyph, and a small spec-tag caption — sized to the exact aspect ratio real photography drops into later with zero rework. This is a deliberate design system, not a broken-image stand-in.

**Iconography:** minimal line icons only where functional (chevrons, arrows, menu/close). Everything else is typographic or photographic.

---

## 18. Typography

- **Display / Headers:** **Trade Gothic Bold** (client-specified). No free web-embeddable license exists for Trade Gothic — if a licensed webfont file becomes available, it drops into the single `--font-display` variable. **Production stand-in: Oswald (700)**, the closest freely-licensed geometric-condensed match.
- **Body / UI:** **Open Sans** (400/600/700) for all body copy, nav, buttons, and stat labels.

**Type scale (desktop, fluid via `clamp()`):**
| Role | Size | Weight | Notes |
|---|---|---|---|
| Hero H1 | `clamp(3rem, 9vw, 8.5rem)` | 700 | tight leading (0.92) |
| Section H2 | `clamp(2.25rem, 6vw, 5rem)` | 700 | |
| Pillar numerals | `clamp(3rem, 5vw, 6rem)` | 700 | `#FFD400` |
| Body / lede | `1.125rem–1.375rem` | 400 | Open Sans, 1.6 line-height, max 65ch |
| Eyebrow / label | `0.8125rem` | 600 | uppercase, 0.15em tracking |
| Button label | `0.9375rem` | 700 | uppercase, 0.08em tracking |

All headline reveals use a mask/clip-path wipe (not opacity fades) so type feels physically uncovered.

---

## 19. Animation Direction

- **Kinetic type:** headlines split into lines/words, revealed with a `clip-path` wipe + Y-translate, staggered per line, triggered on scroll-into-view.
- **Section transitions:** cinematic cross-fades between dark and light sections (brief Iron Blue bridge frame) rather than hard cuts.
- **Numerals (stats strip):** count-up tweens, eased, 1.2–1.8s duration.
- **Parallax:** background layers move at 0.8–0.9x scroll speed relative to foreground type, capped and disabled under `prefers-reduced-motion`.
- **Micro-interactions:** button hover = 150ms color invert; fleet/category tile hover = image scale 1.04 + duotone-to-color crossfade (the one moment full color bleeds through, rewarding interaction).

---

## 20. Interaction Design

- **Cursor:** default system cursor — premium-industrial, not playful-startup.
- **Primary CTA** present at minimum in: nav (persistent), hero, mission section, fleet section, final CTA, footer — never more than one viewport away.
- **Category tiles:** entire tile is a click target, `cursor: pointer`, hover reveals border + "Learn More."
- **Forms:** none required for MVP until a real contact/quote mechanism is supplied (§16) — the CTA destination is a placeholder, clearly marked, not a dead end disguised as a working form.
- **Focus states:** visible 2px `#FFD400` outline on all interactive elements for keyboard navigation.

---

## 21. Scroll Behavior

- **Smooth scroll:** lightweight inertia-scroll (Lenis) for a weighted, cinematic feel.
- **No hard scroll-snap** on the home page; the Fleet page may use soft scroll-snap per row for a catalog feel.
- **Scroll-triggered reveals** on every major section (kinetic type, stat count-ups, image duotone-to-color, pillar stagger-in).
- **Progress indicator:** thin 2px `#FFD400` bar fixed to the viewport top, fills across full page scroll.
- **Performance guardrail:** background videos pause when scrolled out of viewport.

---

## 22. Mobile Behavior

- **Video → poster fallback:** respects `prefers-reduced-motion` and `save-data`; mobile still gets the cinematic look without the payload cost.
- **Type scale collapse:** `clamp()` scale compresses headlines naturally; hero H1 stays comfortable on a 375px viewport.
- **Layout:** multi-column sections (pillars, mission split, footer columns) stack to single-column; fleet grid goes 1-up then 2-up.
- **Sticky mobile CTA:** persistent slim "Get a Quote" bar pinned to the bottom of the viewport on the Fleet page and after the hero on the home page.
- **Touch targets:** minimum 44×44px on every button/link.
- **Reduced motion:** kinetic reveals fall back to opacity fades; parallax and count-ups disabled under `prefers-reduced-motion: reduce`.

---

## 23. Technical Implementation

**This build is WordPress-native from the start — not a static site converted to WordPress afterward.** The client has said plainly they are not a coder and needs to be able to change content themselves, so "can a non-coder edit this in wp-admin" is a hard requirement on every section of every page, not a nice-to-have.

**Stack:** A single custom WordPress theme (no page-builder plugin, no ACF dependency — kept to core WordPress so there's nothing extra to license, update, or break). Modern CSS (custom properties, `clamp()`, Grid/Flexbox) + vanilla JS, plus GSAP + ScrollTrigger (kinetic type, reveals, count-ups) and Lenis (smooth scroll) via CDN — identical motion layer to the design direction in §19–21, just served from PHP templates instead of static HTML.

**Every page is an ordinary WordPress Page with a Page Template assigned** (a dropdown in the normal "Page Attributes" panel) — "Home," "Fleet & Services," etc. Creating a new page, renaming it, or reordering the menu is something the client does entirely in wp-admin, the same as any WordPress site.

**How content gets edited without code — the core mechanism of this build:**

The cinematic layout (huge hero type, the three-pillar grid, the stats strip, etc.) has fixed *design slots* — a hero headline isn't free-form paragraph text, it's one specific huge line of type in one specific place. That rules out just dumping everything into the normal WordPress block editor (there's no reliable way to map arbitrary block content onto "this exact word becomes the 6rem kinetic headline"). Instead, each page template exposes its editable pieces — headline, subhead, button label, each pillar's heading/body, each stat's number/label, and so on — as **plain labeled text fields in a meta box** on that page's edit screen in wp-admin. This is the exact same pattern already proven for images on a prior project (a "Site Images" admin screen with Choose Image buttons, built on core WordPress with zero plugins) — just extended to text. To the client, editing a headline looks like: open the page, find the field labeled "Hero Headline," change the text, click Update. No HTML, no shortcodes, no file editing, ever.

Photos follow the identical no-code pattern already validated on the prior build: each content photo is a normal **Featured Image** (or, for slots not tied to one specific page, a small admin **Site Images** screen using the standard WordPress media picker) — "Choose Image," pick or upload a photo, Update. Any slot left empty automatically shows the designed placeholder panel instead of a broken image, so the site never looks unfinished while photos are still being gathered.

**File structure:**
```
/wordpress-theme/equip-haul/
  style.css                   (theme header + required WP metadata)
  functions.php                (enqueue assets, editable-field + image helpers, Site Images admin screen)
  header.php / footer.php      (shared chrome)
  page-home.php                 (Template Name: Home)
  page-fleet.php                 (Template Name: Fleet & Services)
  index.php                    (fallback template, required by WordPress)
  assets/css/main.css           (design system — same system described in §4, §17–19)
  assets/js/main.js             (Lenis + GSAP init, nav, shared behavior)
  assets/js/kinetic-type.js     (line/word splitter + reveal controller)
  assets/js/stats-counter.js
  assets/js/admin-fields.js     (media-picker JS for the Site Images / photo fields)
  WP-INSTALL.md                 (plain-language setup + "how to edit this" guide)
/BUILD-PLAN.md
```

**Performance targets:** Lighthouse Performance ≥ 90 mobile, LCP < 2.5s, CLS < 0.05 (all media has explicit `aspect-ratio` reserved).

**SEO basics:** unique `<title>`/meta description per page (editable the same no-code way — a field, not a code edit), semantic heading hierarchy, descriptive `alt` text, internal linking between home ↔ fleet ↔ footer.

**Accessibility:** WCAG AA contrast on all text-over-image overlays (dark scrim behind hero/CTA type), full keyboard navigability, `prefers-reduced-motion` support, semantic landmarks.

**Analytics/tracking:** hook point left in `main.js` for a single analytics snippet and outbound/CTA click tracking — client to supply tracking ID before launch.

**Requirements:** WordPress 6.0+, PHP 7.4+, no plugins required, no database setup beyond what WordPress itself needs.

---

## Build Sequence (once approved)

1. Theme scaffold: `style.css`, `functions.php`, `header.php`, `footer.php`, the editable-field helper functions, and the Site Images admin screen
2. Design system CSS: variables, typography scale, grid, button/component base, grain overlay, placeholder-panel system
3. Home page template, built around labeled editable fields for every section in §8–12
4. Fleet & Services page template, built around editable category-tile fields per §13
5. Motion layer: Lenis smooth scroll, GSAP kinetic type, scroll-triggered reveals, stats count-up
6. Responsive pass (mobile/tablet breakpoints, sticky mobile CTA)
7. Accessibility + performance pass, then execute every template through a stub test harness (not just a syntax check) to confirm the editable fields actually render, before it ever touches a real WordPress install
8. `WP-INSTALL.md`: plain-language setup steps and a "how to edit each section" guide, written for a non-coder
9. Higgsfield Seedance 2.0 generation for the three cinematic scenes, once commissioned — graded and integrated with poster fallback
10. Final QA, commit, push, zip the theme for upload

---

## What This Build Replaces

Per your direction, this repository and branch previously held a complete build (BUILD-PLAN.md, home page, 6 per-unit equipment pages, and a WordPress theme) for a different client, Denson Commercial Equipment Leasing. Approving this plan means that entire prior build — all HTML/CSS/JS and the WordPress theme folder — is removed and replaced with the Equip & Haul site described above. Nothing is salvaged or merged between the two; if any part of the Denson build is still needed, retrieve it from this branch's git history before approving.
