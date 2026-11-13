# EQUIP & HAUL EQUIPMENT LEASING
## Master Build Plan — Premium Website (Award-Tier / Awwwards-Caliber)

**Prepared as a creative direction + technical build document.**
**Target quality bar:** $10,000 commercial production. Cinematic, industrial, confident, fast.
**Delivery format:** a custom WordPress theme built entirely around no-code editing — see §23. Not a hand-coded static site, and not dependent on any page-builder plugin.

---

## 1. Website Overview

Equip & Haul Equipment Leasing rents heavy commercial equipment to contractors and industrial operators — and, unlike most competitors, moves it for them too. The name states the whole business model: **Equip** (the machine) **&** **Haul** (the move). That dual capability is the single most ownable fact about this brand, and this site is built to make it impossible to miss.

Most equipment rental sites read like parts catalogs: dense spec tables, stock photography, a contact form buried three clicks deep. This site instead treats the equipment the way a premium vehicle brand treats a launch — cinematic, edge-to-edge photography, huge confident type, generous negative space — while using the scroll itself to tell one clear story: *you don't need two vendors. You need one call.*

**Primary conversion goal:** get a qualified renter to the live reservation system in under 10 seconds of landing — a single, repeated, unmissable `RENT EQUIPMENT` action.

**Secondary goal:** make the 7-unit fleet feel like a confident, curated commercial-grade lineup rather than a rental-yard inventory dump — each machine gets the same editorial treatment a flagship product gets on a brand site.

**Site scope for this build:**
1. Home page (full cinematic scroll experience)
2. Fleet & Equipment page (index of all 7 units)
3. Seven individual equipment pages — JLG 660SJ, JLG 1043, JLG SkyTrak 10054, JLG 1055, JLG 600AJ, JLG 800AJ, Peterbilt 680 — each with its own named Page Template (selectable by that machine's name, not a generic label) but all sharing one render file behind the scenes (see §23), so there's no copy-pasted markup to fall out of sync
4. Shared header / footer / CTA system

**Non-coder editing requirement (drives every technical decision in this plan):** the client has been explicit, twice, that they are not a coder and must be able to edit this themselves. Every page in this build is an ordinary WordPress Page with a template assigned, and every headline, paragraph, spec, bullet, and photo is a plain labeled field in the page editor — never HTML, never a file. See §23 for exactly how, including how the real copy below ships pre-loaded so there's nothing to re-type on day one.

---

## 2. Core Positioning

> **One call for the machine. One call for the move.**

Every contractor renting equipment solves two problems: getting the right machine, and getting it to the site. Most rental yards solve only the first and leave the second to the contractor. Equip & Haul's name — and its business — solves both, which means the brand doesn't compete on having a bigger catalog (everyone rents comparable JLG/SkyTrak equipment), it competes on removing a logistics problem the rest of the category treats as someone else's job.

**Positioning statement:**
For commercial contractors and industrial operators who need equipment on site without coordinating a separate hauling vendor, Equip & Haul Equipment Leasing is the rental partner that equips the job *and* delivers it — inspected, maintained, and ready to perform — because splitting "the machine" and "the move" across two vendors is exactly the kind of friction that stalls a job.

**Reasons to believe:**
- A hauling capability built into the company's name and operations, not an upsell
- Every machine inspected, maintained, and ready to perform before it leaves the yard
- A seven-unit commercial-grade fleet covering reach, lift capacity, and long-haul transport
- Flexible daily / weekly / monthly terms, no long-term commitment

---

## 3. Brand Personality

Equip & Haul is the partner who shows up with the machine already on the trailer. Tough, direct, dependable — the voice of someone who solves the logistics problem before the contractor has to raise it.

| Trait | What it means on the page |
|---|---|
| **Capable** | States what it does plainly — "ready to perform," not "industry-leading solutions." |
| **Tough** | Steel, near-black, and safety-yellow visual language; nothing precious or soft. |
| **Direct** | Short sentences, active verbs, no corporate padding. |
| **Dependable** | The same promise — inspected, maintained, ready — repeated on every unit page. |
| **One-Stop** | Equipment and hauling named together often enough that the dual service never goes unstated for long. |

---

## 4. Visual Direction

**Style:** Industrial Editorial Minimalism with Premium Industrial Brutalism accents, per the client's own direction: **oversized condensed headlines, dark charcoal/near-black backgrounds, warm industrial white, a single safety-inspired accent color, heavy grid lines, and large edge-to-edge equipment photography** — expanded below into a full system.

**Color system (client-specified):**

| Token | Hex | Role |
|---|---|---|
| `--eh-iron` | `#2C3E50` | Primary dark / near-black background (Iron Blue), primary text on light |
| `--eh-grey` | `#95A5A6` | Secondary neutral — hairlines, heavy grid rules, dividers, secondary text |
| `--eh-yellow` | `#FFD400` | The one safety-inspired accent — CTAs, key emphasis, numerals, active states |
| `--eh-white` | `#F5F5F5` | Warm industrial white — primary light background, reversed text on dark |

**Usage discipline:** `#2C3E50` and `#F5F5F5` carry roughly 85% of the page. `#FFD400` is the single "go" color — reserved for CTAs and the most important emphasis only, so it reads the way safety yellow reads on an actual jobsite: a deliberate signal, never decoration. `#95A5A6` draws the **heavy grid lines** the client asked for — a visible structural rule system between sections and columns, thicker and more present than a typical hairline, reinforcing the "shop-drawing" industrial feel. One accent color, used with total consistency, reads as more premium than two competing for attention.

**Imagery:** large, edge-to-edge equipment photography is the backbone of this site — every unit page leads with a full-bleed shot (see §13 for the specific shot direction supplied for each of the 7 units), graded toward the `#2C3E50` shadow tone so a mixed set of photos reads as one commissioned shoot.

---

## 5. Higgsfield Seedance 2.0 Asset Generation

No commissioned footage exists yet, so hero/section backdrops are planned as short cinemagraphs generated with **Higgsfield Seedance 2.0**, graded to the palette above.

**Generation spec (applies to all clips):**
- Resolution: **1080p (1920×1080)**, 16:9 for desktop hero; a 9:16 crop derived per clip for mobile
- Duration: **8–12 seconds**, seamlessly loopable (matched first/last frame) for a muted autoplay background loop with no visible cut
- Frame rate: 24fps — deliberate, unhurried motion
- Camera: slow dolly-in, slow push, low-angle tilt only — no whip pans, no fast cuts
- Lighting: golden-hour or overcast jobsite light, matching the iron-blue grade with warm practical highlights
- Subject: telehandler/boom-lift-type equipment and a Peterbilt hauling a loaded trailer, in an industrial yard or active jobsite — no people in hazard positions
- Post: 6–10% film grain, slight vignette, grade to brand palette

**Delivery format:** MP4 (H.264), muted `autoplay loop playsinline`, with a static poster-frame JPG for the `poster` attribute and the `prefers-reduced-motion`/no-video fallback.

**Sequencing:** the site ships fully functional with the designed placeholder-panel system first (§17); real photography (the client's own equipment shots, per the shot list in §13) or Seedance footage layers in afterward with zero rebuild.

---

## 6. Three Cinematic Scenes

### Scene 1 — "Staged at Sunrise" (Hero)
Wide, low dolly-in across a quiet equipment yard at dawn. Mist, cool iron-blue shadow, a telehandler and boom lift staged and silhouetted against early light, safety yellow catching the first sun. Communicates *readiness*.
**Placement:** Hero background, behind "Equipment That Works as Hard as You Do."

### Scene 2 — "The Lift" (Mission section)
Mid-shot, slow push-in on a telehandler or boom lift at work on an active site — deliberate, powerful, unhurried. Communicates *capability*.
**Placement:** Background/side panel behind "Own Less. Do More.," duotone still on scroll-out.

### Scene 3 — "On the Move" (Final CTA)
A Peterbilt 680 hauling a loaded trailer down a jobsite access road at golden hour, low angle, dust catching the light — the scene that makes the "& Haul" half of the brand literal. The payoff shot before the final CTA.
**Placement:** Final CTA section, full-bleed background, reversed type over a darkened grade.

---

## 7. Website Structure (Sitemap)

```
/                                Home — Page Template: "Home"
/fleet                           Fleet & Equipment index — Page Template: "Fleet & Equipment"
/fleet/jlg-660sj                 Page Template: "JLG 660SJ"
/fleet/jlg-1043                  Page Template: "JLG 1043"
/fleet/jlg-skytrak-10054         Page Template: "JLG SkyTrak 10054"
/fleet/jlg-1055                  Page Template: "JLG 1055"
/fleet/jlg-600aj                 Page Template: "JLG 600AJ"
/fleet/jlg-800aj                 Page Template: "JLG 800AJ"
/fleet/peterbilt-680             Page Template: "Peterbilt 680"
```

Every one of these is an ordinary WordPress Page. Each of the 7 unit pages has **its own named template** — the Template dropdown shows that exact machine's name, not a generic label, so picking the right one is never a guess. Behind the scenes all 7 templates are thin files that share one render file, so there's a single place to fix a bug or change the layout. Each page supplies its own headline, body copy, specs, "Ideal For" list, photo, and button text through labeled fields — never by editing the template file. Adding an 8th unit means a developer duplicates one of the 7 template files and renames it (the one step that isn't pure no-code); filling in its content afterward is the same field-based process as the other 7. See §23.

**Global navigation:** Logo (left) · Fleet & Equipment (link to /fleet) · Rent Equipment button (right, always `#FFD400`, always the live reservation link). Minimal by design.

**Reservation system:** `https://reserve.loadmaxrentals.com/categories?intent=rent` — every `RENT EQUIPMENT` / `CHECK AVAILABILITY` button in this plan points here. This is a real, working link supplied by the client; no placeholder destination is needed anywhere in this build.

---

## 8. Hero Section

**Layout:** Full-viewport-height (100svh), Scene 1 video/poster background, Iron Blue grade with grain, kinetic headline reveal on load.

- **Eyebrow:** COMMERCIAL EQUIPMENT & HAULING
- **H1 (huge, Trade Gothic Bold):** Equipment That Works as Hard as You Do
- **Subhead:** Equip & Haul delivers dependable commercial equipment and hauling solutions that are ready when you are, so you can keep the job moving.
- **Scroll cue:** animated down-chevron + "Scroll" micro-label, fades on first scroll input

**Section 2 — "The Right Equipment. Ready for the Job." (immediately below hero):**

- **H2:** The Right Equipment. Ready for the Job.
- **Body:** Equip & Haul provides dependable, high-performance equipment for commercial construction, industrial work, and heavy hauling. From telehandlers and boom lifts to Peterbilt hauling trucks, every machine is inspected, maintained, and ready to perform.

  Whether you're lifting, loading, staging, or hauling, we make it easy to secure the equipment your operation needs. Flexible rental terms and responsive support help you stay productive and keep the job moving.
- **Micro-CTA line:** Need Equipment on the Job?
- **Supporting line:** Tell us what the work demands. We'll help you find the right equipment and get to work.
- **Primary Button:** `RENT EQUIPMENT` → `https://reserve.loadmaxrentals.com/categories?intent=rent` (new tab, `rel="noopener"`)

---

## 9. Animated Stats Strip

A thin, high-contrast strip beneath the hero fold, counts up on scroll. Unlike a typical placeholder stats row, **"7+ Units" is a real, accurate count of this exact fleet**, not an invented figure — the rest remain flagged placeholders pending the client's real numbers.

| Stat | Label |
|---|---|
| **7+** | Commercial-grade units in the Equip & Haul fleet |
| **100%** | Inspected, maintained, and ready to perform before every rental |
| **24–48 hr** | Typical turnaround to get equipment on your site *(placeholder — confirm)* |
| **Day / Wk / Mo** | Flexible terms — stop paying when the work is finished |

---

## 10. Mission Section — "Own Less. Do More."

Scene 2 ("The Lift") plays as a pinned right-column panel; copy scrolls past on the left.

- **Eyebrow:** Own Less. Do More.
- **H2:** Own Less. Do More.
- **Body:** Keep your capital focused on the people, projects, and opportunities that grow your business. Equip & Haul gives you access to commercial-grade equipment without the upfront cost, ongoing maintenance, or long-term commitment of ownership.

  Rent the right machine for the job and keep it for as long as you need it. With flexible daily, weekly, and monthly rental options, you can keep your equipment working, your projects moving, and your capital in your business.

---

## 11. Three Pillars Section

The brief supplies two pillars; a third is added here to complete the triptych the brand system calls for, pulled directly from the recurring "inspected, maintained, ready to perform" promise already established in §8 — not an invented new claim.

**01 — Keep Your Capital Working**
Avoid tying up capital in a major equipment purchase. Put those resources toward the areas of your business that generate growth.

**02 — Rent on Your Terms**
Need equipment for a day, a week, or a month? Rent what you need, when you need it, and stop paying when the work is finished.

**03 — Always Ready to Perform** *(added to complete the triptych)*
Every machine is inspected and maintained before it leaves the yard, so it shows up ready to perform — not something you troubleshoot on someone else's schedule.

---

## 12. Story Section

No founder history was supplied, so this is written as a philosophy statement — honest, not a fabricated company history — and is the natural place to add real history later.

- **Eyebrow:** WHY EQUIP & HAUL
- **H2:** Two Problems. One Partner.
- **Body:** Getting a machine to a jobsite is two problems wearing one invoice: finding the right equipment, and getting it there. Most of this industry only solves the first — and leaves the second to the contractor, usually under a deadline.

  We built Equip & Haul around closing that gap. Every machine is inspected, maintained, and ready to perform before it leaves the yard, and every job gets one point of contact instead of two vendors who've never talked to each other. That's not a value-add. That's the business.

---

## 13. Product Section — The Fleet (Equipment Page)

### Home page teaser ("Built for Heavy Work.")

- **Eyebrow:** THE FLEET
- **H2:** Built for Heavy Work.
- **Body:** From lifting materials at height to reaching over obstacles and hauling across long distances, our commercial-grade fleet is prepared for demanding jobsites and serious workloads.
- **Button:** `EXPLORE OUR EQUIPMENT` → `/fleet`

### Fleet & Equipment page header

- **H1:** Equipment Built to Perform.
- **Body:** New, commercial-grade equipment for lifting, reaching, loading, and hauling. Explore the Equip & Haul fleet and find the machine that matches the demands of your next job.
- **Button:** `CHECK AVAILABILITY` → reservation link

### The seven units

Each unit below becomes one page using that machine's own named template (§7, §23) — headline, two body paragraphs, four specs, an "Ideal For" list, a photo brief, alt text, and a `RENT THE [MODEL]` button, all as individually editable fields.

> **Copy-editing note:** the source brief included inline reference links (e.g. "[JLG]," "[SkyTrak]") after several spec sentences — these read as citation artifacts from drafting, not intentional on-page links, and would look broken on a finished $10K site, so they're removed from the copy below. The spec figures themselves are kept as supplied.
>
> **Model-number note (confirmed):** JLG currently identifies this model as the **1043**, not 10043 — already corrected below. Verify against the model plate on the physical unit before publishing, same as the client's own note.

**1. JLG 660SJ — Telescopic Boom Lift**
- **Tagline:** Reach Out. Work Higher.
- **Body:** The JLG 660SJ telescopic boom lift is built for jobs that require height, horizontal reach, and dependable jobsite performance. Its straight-boom design provides direct access to elevated work areas, making it a strong choice for construction, steel erection, maintenance, utilities, and industrial projects.

  With a platform height of approximately 66 feet and horizontal outreach of approximately 57 feet, the 660SJ helps crews cover more ground without repeatedly repositioning the machine.
- **Specs:** Platform Height ≈66 ft · Horizontal Outreach ≈57 ft · Capacity 500 lb (unrestricted, typical for class) · Drive 4WD
- **Ideal For:** Steel erection · Exterior construction · Industrial maintenance · Utility work · Elevated installation
- **Button:** `RENT THE JLG 660SJ`
- **Suggested image:** Full side view of the 660SJ with its boom extended against an active commercial jobsite.
- **Alt text:** JLG 660SJ telescopic boom lift available for rent from Equip & Haul.

**2. JLG 1043 — Telehandler**
- **Tagline:** Heavy Capacity. Jobsite Versatility.
- **Body:** The JLG 1043 telehandler delivers the lifting strength and reach needed to move materials across demanding commercial jobsites. It is well suited for placing lumber, roofing materials, masonry, steel, and other heavy loads where standard forklifts can't reach.

  The 1043 has a rated capacity of 10,000 pounds, a maximum lift height of 43 feet, and a maximum forward reach of approximately 30 feet.
- **Specs:** Rated Capacity 10,000 lb · Max Lift Height 43 ft · Max Forward Reach ≈30 ft · Drive 4WD
- **Ideal For:** Commercial construction · Framing and roofing · Masonry work · Material placement · Industrial loading
- **Button:** `RENT THE JLG 1043`
- **Suggested image:** Three-quarter view of the telehandler lifting a pallet of materials on a commercial construction site.
- **Alt text:** JLG 1043 telehandler rental for commercial construction and material handling.

**3. JLG SkyTrak 10054 — Telehandler**
- **Tagline:** Greater Height. More Reach.
- **Body:** The JLG SkyTrak 10054 is made for projects that require heavy lifting at greater heights. Its extended reach makes it especially useful on multi-story construction sites, where materials need to be placed accurately without slowing down the work below.

  The 10054 offers a rated capacity of 10,000 pounds, a maximum lift height of approximately 53 feet, and forward reach of nearly 39 feet.
- **Specs:** Rated Capacity 10,000 lb · Max Lift Height ≈53 ft · Max Forward Reach ≈39 ft · Drive 4WD
- **Ideal For:** Multi-story construction · Roofing and framing · Structural material placement · Large commercial projects · Industrial applications
- **Button:** `RENT THE JLG 10054`
- **Suggested image:** The 10054 placing construction materials at an upper level of a framed building.
- **Alt text:** JLG SkyTrak 10054 telehandler available for commercial equipment rental.

**4. JLG 1055 — Telehandler**
- **Tagline:** Maximum Reach for Demanding Jobs.
- **Body:** The JLG 1055 combines heavy lifting capacity with extended vertical and forward reach. It is designed for large jobsites where crews need to move substantial materials and place them accurately at height.

  With a rated capacity of 10,000 pounds, a maximum lift height of 55 feet, and forward reach of 42 feet, the 1055 is the longest-reaching telehandler in this group.
- **Specs:** Rated Capacity 10,000 lb · Max Lift Height 55 ft · Max Forward Reach 42 ft · Drive 4WD
- **Ideal For:** Large commercial construction · Multi-level material placement · Structural work · Industrial facilities · Long-reach applications
- **Button:** `RENT THE JLG 1055`
- **Suggested image:** Wide-angle image showing the full reach of the telehandler on a large commercial site.
- **Alt text:** JLG 1055 high-reach telehandler rental from Equip & Haul.

**5. JLG 600AJ — Articulating Boom Lift**
- **Tagline:** Reach Up. Reach Over.
- **Body:** The JLG 600AJ articulating boom lift is designed to reach elevated work areas that are difficult to access directly. Its articulated boom allows operators to work up and over structures, equipment, and other jobsite obstacles.

  With a platform height of approximately 60 feet and horizontal outreach of nearly 40 feet, the 600AJ provides reach and maneuverability for confined or complex work areas.
- **Specs:** Platform Height ≈60 ft · Horizontal Outreach ≈40 ft · Capacity 500 lb (typical for class) · Drive 4WD
- **Ideal For:** Mechanical installation · Facility maintenance · Structural work · Overhead access · Confined jobsites
- **Button:** `RENT THE JLG 600AJ`
- **Suggested image:** The articulated boom extending over a structure or piece of industrial equipment.
- **Alt text:** JLG 600AJ articulating boom lift for rent from Equip & Haul.

**6. JLG 800AJ — Articulating Boom Lift**
- **Tagline:** High-Reach Access Without Compromise.
- **Body:** The JLG 800AJ provides the height and articulated reach required for large-scale construction, industrial maintenance, and complex elevated work. Its boom configuration helps operators reach up, out, and over obstacles while maintaining access to difficult work areas.

  The 800AJ offers an 80-foot platform height and nearly 52 feet of horizontal outreach, making it the highest-reaching boom lift in the Equip & Haul fleet.
- **Specs:** Platform Height 80 ft · Horizontal Outreach ≈52 ft · Capacity 500 lb (typical for class) · Drive 4WD
- **Ideal For:** High-rise exterior work · Industrial facilities · Steel and structural projects · Large-scale maintenance · Difficult elevated access
- **Button:** `RENT THE JLG 800AJ`
- **Suggested image:** Full-boom profile at height with a building or industrial structure providing scale.
- **Alt text:** JLG 800AJ articulating boom lift available for commercial rental.

**7. Peterbilt 680 — Heavy Hauling Truck**
- **Tagline:** Built for the Long Haul.
- **Body:** The Peterbilt 680 provides the power, stability, and driver-focused performance needed for demanding hauling operations. Designed for reliable on-highway transportation, it is well suited for moving equipment, materials, and commercial loads across short or long distances.

  Available truck specifications may vary by configuration, engine, axle setup, and trailer requirements — the rental page should list the exact towing capacity, transmission, cab configuration, and compatible trailers for each available unit.
- **Specs:** Truck Class 8 · Cab Day/Sleeper (confirm per unit) · Engine Diesel · Towing Capacity *(confirm per unit)*
- **Ideal For:** Equipment transportation · Commercial hauling · Construction logistics · Regional transportation · Long-distance hauling
- **Button:** `RENT A PETERBILT 680`
- **Suggested image:** Three-quarter front image of the Peterbilt connected to an equipment or flatbed trailer.
- **Alt text:** Peterbilt 680 commercial hauling truck available from Equip & Haul.

### Fleet page closing CTA

- **H2:** Tell Us What You Need to Move.
- **Body:** Not sure which machine is right for the job? Tell us what you're lifting, reaching, loading, or hauling. We'll help you identify the right equipment and rental period.
- **Button:** `CHECK EQUIPMENT AVAILABILITY` → reservation link

---

## 14. Featured Work / Content Section — Who We Serve

No client case studies, project photography, or testimonials were supplied, and none are fabricated here. A short "Who We Serve" section (home page, between the fleet teaser and final CTA) covers the industries implied by the equipment's own "Ideal For" lists in §13, legitimately derived rather than invented:

- **Commercial Construction** — Steel erection, framing, roofing, and material placement at height.
- **Industrial & Facilities** — Mechanical installation, structural work, and facility maintenance.
- **Hauling & Logistics** — Equipment transportation and construction logistics, powered by our own Peterbilt fleet.

---

## 15. Final CTA Section (Home Page)

Scene 3 ("On the Move") full-bleed background, darkened grade, reversed type.

- **H2:** Ready to Get to Work?
- **Body:** Tell us what the job demands. We'll help you secure the right equipment, the right rental terms, and the support you need to keep moving.
- **Primary Button:** `RENT EQUIPMENT` → reservation link

---

## 16. Footer

Iron Blue background, warm white type.

- **Column 1:** Equip & Haul logo/wordmark + tagline: "Equipment That Works as Hard as You Do."
- **Column 2 — Company:** Fleet & Equipment · Rent Equipment
- **Column 3 — Fleet:** links to all 7 unit pages
- **Column 4 — Contact:** `[Add phone number]` · `[Add email address]` · `[Add service area]` — no contact details were supplied, so these stay clearly marked placeholders rather than fabricated; the reservation link itself is real and live everywhere else.
- **Bottom bar:** © [Year] Equip & Haul Equipment Leasing. All rights reserved. · hairline rule in `#FFD400`.

---

## 17. Complete Visual Style Guide

**Grid:** 12-column, max-width 1440px container, 24px gutters desktop / 16px mobile. **Heavy grid lines** (per the client's own direction) run between major sections and columns at a visibly thicker weight than a typical hairline — `#95A5A6` at higher opacity and 2px rather than 1px where the grid is meant to be felt, not just implied.

**Spacing scale (rem, 8px base):** 0.5 · 1 · 1.5 · 2 · 3 · 4 · 6 · 8 · 12 · 16 — section vertical padding never below `6rem` desktop / `3rem` mobile.

**Corners & borders:** 0px radius everywhere except the primary CTA button (near-imperceptible 2px).

**Buttons:**
- Primary: solid `#FFD400` fill, `#2C3E50` text (dark-on-yellow for contrast), Open Sans Bold, uppercase, letter-spaced; hover inverts to `#2C3E50` fill with `#FFD400` border+text
- Secondary/ghost: transparent, 1px border in context color, fills solid on hover

**Imagery/placeholder system:** every image slot uses a technical-schematic placeholder panel (duotone gradient, grain, corner frame brackets, a faint category glyph, spec-tag caption) sized to the exact aspect ratio real photography drops into — each unit's panel pre-labeled with that unit's own suggested-shot brief from §13 as its caption, so the placeholder itself tells whoever's taking photos exactly what to shoot.

**Iconography:** minimal line icons only where functional. Everything else is typographic or photographic.

---

## 18. Typography

- **Display / Headers:** **Trade Gothic Bold** (client-specified). No free web-embeddable license exists; **Oswald (700)** is the production stand-in, swappable via one `--font-display` variable if a licensed webfont is obtained.
- **Body / UI:** **Open Sans** (400/600/700).

**Type scale (desktop, fluid via `clamp()`):**
| Role | Size | Weight |
|---|---|---|
| Hero H1 | `clamp(3rem, 9vw, 8.5rem)` | 700 |
| Section H2 | `clamp(2.25rem, 6vw, 5rem)` | 700 |
| Pillar numerals | `clamp(3rem, 5vw, 6rem)` | 700, `#FFD400` |
| Body / lede | `1.125rem–1.375rem` | 400, 1.6 line-height, max 65ch |
| Eyebrow / label | `0.8125rem` | 600, uppercase, 0.15em tracking |
| Button label | `0.9375rem` | 700, uppercase, 0.08em tracking |

Headline reveals use a mask/clip-path wipe (not opacity fades) so type feels physically uncovered — oversized and condensed, per the client's own direction.

---

## 19. Animation Direction

- **Kinetic type:** headlines split into lines/words, revealed with a `clip-path` wipe + Y-translate, staggered per line, on scroll-into-view.
- **Section transitions:** cinematic cross-fades between dark and light sections rather than hard cuts.
- **Numerals (stats strip):** count-up tweens, eased, 1.2–1.8s duration.
- **Parallax:** background layers move at 0.8–0.9x scroll speed, capped and disabled under `prefers-reduced-motion`.
- **Micro-interactions:** button hover = 150ms color invert; unit-tile hover = image scale 1.04 + duotone-to-color crossfade.

---

## 20. Interaction Design

- **Cursor:** default system cursor.
- **Primary CTA** present in: nav (persistent), hero, mission section, fleet teaser, final CTA, footer, and every unit page — never more than one viewport away.
- **Unit tiles:** entire tile is a click target, hover reveals border + "View Specs."
- **Forms:** none required — the reservation system is fully offloaded to `reserve.loadmaxrentals.com`.
- **Focus states:** visible 2px `#FFD400` outline on all interactive elements.

---

## 21. Scroll Behavior

- **Smooth scroll:** Lenis inertia scroll for a weighted, cinematic feel.
- **No hard scroll-snap** on the home page; the Fleet page may use soft scroll-snap per row.
- **Scroll-triggered reveals** on every major section.
- **Progress indicator:** thin 2px `#FFD400` bar fixed to the viewport top.
- **Performance guardrail:** background videos pause when scrolled out of viewport.

---

## 22. Mobile Behavior

- **Video → poster fallback**, respecting `prefers-reduced-motion` and `save-data`.
- **Type scale collapse** via `clamp()`.
- **Layout:** multi-column sections stack to single-column; fleet grid goes 1-up then 2-up.
- **Sticky mobile CTA:** persistent "Rent Equipment" bar pinned to the bottom of the viewport on every unit page and after the home hero.
- **Touch targets:** minimum 44×44px.
- **Reduced motion:** kinetic reveals fall back to opacity fades; parallax/count-ups disabled.

---

## 23. Technical Implementation — No-Code WordPress Architecture

**This is the core engineering decision in this plan.** The client is not a coder and must be able to edit every page themselves. That rules out hardcoding copy into PHP templates (fine for a developer hand-off, not fine here) and rules out a page-builder plugin (another thing to license, update, and for a non-coder to learn). The solution used throughout this build:

**Content lives in fields, not markup — and every machine gets its own named template.** The theme has 9 templates: **Home**, **Fleet & Equipment**, and one per machine (**JLG 660SJ**, **JLG 1043**, **JLG SkyTrak 10054**, **JLG 1055**, **JLG 600AJ**, **JLG 800AJ**, **Peterbilt 680**) — so the Template dropdown in Page Attributes always shows a name the client recognizes, never a generic placeholder. All 7 unit templates are thin files that `require` one shared render file (`template-parts/equipment-unit-render.php`), so the layout, markup, and field list exist in exactly one place — a bug fix or design change there applies to all 7 instantly, with zero risk of the 7 pages drifting out of sync the way 7 hand-copied files would. Each page's own headline, body paragraphs, specs, "Ideal For" list, photo, and button text live in labeled fields on that page's edit screen regardless of which of the 7 templates it uses. Adding an 8th unit means a developer duplicates one `page-*.php` file and changes its `Template Name:` comment (one small code step); every other part of populating that new page — all its content — is the same no-code field-filling process as the original 7.

**Every field is a plain input in a meta box** on the page editor screen — a text box labeled "Hero Headline," a text box labeled "Spec 1 Value," etc. — built on core WordPress (no plugin dependency). This is the same mechanism already proven for photos (a "Choose Image" button using the native WordPress media picker); here it's extended to cover every piece of text too, so *nothing* on any page requires touching a file.

**The site ships pre-loaded with the real content above — not an empty shell.** Because this plan already contains the client's actual copy for every section and all 7 units, the theme auto-creates the Home page, the Fleet & Equipment page, and all 7 unit pages on activation, with every field already filled in exactly as written in §8–13. The client installs the theme and the real site is live immediately; editing is only needed when they want to *change* something, never to finish it.

**Stack:** Custom WordPress theme, core WordPress only (no ACF, no page builder). Modern CSS (custom properties, `clamp()`, Grid/Flexbox) + vanilla JS, plus GSAP + ScrollTrigger (kinetic type, reveals, count-ups) and Lenis (smooth scroll) via CDN.

**File structure** (all inside this project's own `/equip-haul/` folder — nothing touches the repo root, which belongs to a separate, unrelated project):
```
/equip-haul/
  BUILD-PLAN.md
  wordpress-theme/equip-haul/
    style.css                      (theme header + required WP metadata)
    functions.php                   (field/meta-box helpers, image helper, activation seeding)
    header.php / footer.php         (shared chrome)
    page-home.php                    (Template Name: Home)
    page-fleet.php                    (Template Name: Fleet & Equipment)
    page-jlg-660sj.php                (Template Name: JLG 660SJ)
    page-jlg-1043.php                 (Template Name: JLG 1043)
    page-jlg-skytrak-10054.php        (Template Name: JLG SkyTrak 10054)
    page-jlg-1055.php                 (Template Name: JLG 1055)
    page-jlg-600aj.php                (Template Name: JLG 600AJ)
    page-jlg-800aj.php                (Template Name: JLG 800AJ)
    page-peterbilt-680.php            (Template Name: Peterbilt 680)
    template-parts/equipment-unit-render.php  (shared render logic behind all 7 unit templates)
    index.php                       (required WordPress fallback)
    assets/css/main.css              (design system — §4, §17–19)
    assets/js/main.js                (Lenis + GSAP init, nav, shared behavior)
    assets/js/kinetic-type.js        (line/word splitter + reveal controller)
    assets/js/stats-counter.js
    assets/js/admin-images.js         (media-picker JS for Site Images)
    WP-INSTALL.md                    (plain-language setup + "how to edit this" guide)
```

**Performance targets:** Lighthouse Performance ≥ 90 mobile, LCP < 2.5s, CLS < 0.05.

**SEO:** unique `<title>`/meta description per page (an editable field, not a code edit), semantic heading hierarchy, the supplied alt text per unit (§13), internal linking between home ↔ fleet ↔ units ↔ footer.

**Accessibility:** WCAG AA contrast on all text-over-image overlays, full keyboard navigability, `prefers-reduced-motion` support, semantic landmarks.

**Analytics/tracking:** hook point left in `main.js` for a single analytics snippet and outbound/CTA click tracking — client to supply tracking ID.

**Requirements:** WordPress 6.0+, PHP 7.4+, no plugins required.

---

## Build Sequence (once approved)

1. Theme scaffold: `style.css`, `functions.php` (field/meta-box helpers, image helper), `header.php`, `footer.php`
2. Design system CSS: variables, typography scale, heavy-grid system, button/component base, grain overlay, placeholder-panel system
3. `page-home.php` — field-driven, built around §8–12 and §13's teaser/§14
4. `page-fleet.php` — field-driven index + §13's closing CTA
5. `template-parts/equipment-unit-render.php` (the shared logic) plus the 7 named `page-*.php` wrapper templates covering every field in §13's per-unit structure
6. Activation seeding: auto-create Home, Fleet, and all 7 unit pages with the real copy from this plan pre-filled
7. Motion layer: Lenis smooth scroll, GSAP kinetic type, scroll-triggered reveals, stats count-up
8. Responsive pass (mobile/tablet breakpoints, sticky mobile CTA)
9. Accessibility + performance pass, then execute every template through a stub test harness (not just a syntax check) to confirm every field renders and the activation seeding works, before it ever touches a real WordPress install
10. `WP-INSTALL.md`: plain-language setup steps and a "how to edit each section" guide, written for a non-coder
11. Higgsfield Seedance 2.0 generation for the three cinematic scenes, once commissioned
12. Final QA, commit, push, zip the theme for upload

---

## Project Boundaries

This plan supersedes the earlier, partial-copy draft of this same Equip & Haul project written earlier in this session (which used placeholder stats, generic service categories instead of named units, and a placeholder CTA destination).

**This is a separate project from Denson Commercial Equipment Leasing**, which already has a complete build of its own in this same repository/branch (root-level `index.html`, `/equipment/`, `/assets/`, and `/wordpress-theme/denson-cel/`, plus its own `BUILD-PLAN.md` at the repo root). Equip & Haul lives entirely inside this `/equip-haul/` folder — its own `BUILD-PLAN.md` (this file) and its own `/equip-haul/wordpress-theme/equip-haul/` theme — and never modifies anything at the repo root. The two projects share a git history but nothing else.
