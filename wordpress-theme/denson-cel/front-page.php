<?php
/**
 * Home page — full cinematic scroll experience.
 * WordPress loads this automatically for the site front page, regardless
 * of the Settings > Reading choice, so no page needs to be created for it.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = "Denson Commercial Equipment Leasing delivers inspected, maintained, jobsite-ready telehandlers, boom lifts, and hauling trucks on flexible daily, weekly, and monthly terms.";
get_header();
?>

  <!-- ============ HERO — Scene 01: The Yard at First Light ============ -->
  <section class="hero">
    <div class="media-panel" aria-hidden="true">
      <span class="media-panel__glyph">01</span>
      <span class="media-panel__index">FIG. 01</span>
      <div class="media-panel__frame"></div>
      <span class="media-panel__tag">Scene 01 — The Yard at First Light</span>
    </div>
    <div class="hero__scrim"></div>
    <div class="hero__content container">
      <p class="eyebrow">Commercial Equipment Leasing</p>
      <h1 class="display-1" data-kinetic="lines" data-kinetic-lines="Built to Work.|Ready When You Are.">Built to Work. Ready When You Are.</h1>
      <p class="hero__subhead">Denson Commercial Equipment Leasing delivers dependable commercial and hauling equipment that works as hard as you do. Ready when you need it and built to keep the job moving.</p>
    </div>
    <div class="scroll-cue">
      <span>Scroll</span>
      <span class="scroll-cue__chevron"></span>
    </div>
  </section>

  <!-- ============ INTRO — The Right Equipment ============ -->
  <section class="section section--light">
    <div class="container">
      <div class="intro-split">
        <div data-reveal>
          <p class="eyebrow">Ready For The Job</p>
          <h2 class="display-2">The Right Equipment. Ready for the Job.</h2>
          <p class="lede mt-4">Denson Commercial Equipment Leasing provides dependable, high-performance equipment for commercial construction, industrial work, and heavy hauling. From telehandlers and boom lifts to articulating lifts and hauling trucks, every piece of equipment is inspected, maintained, and jobsite-ready.</p>
          <p class="lede">Whether you're lifting, loading, staging, or hauling, we make it easy to get the equipment you need with flexible rental terms and responsive support that keeps your operation moving.</p>
        </div>
        <div data-reveal>
          <p class="intro-split__prompt">Need equipment on the job?</p>
          <p class="intro-split__note mt-2">Tell us what you need. We'll help you get the right equipment and get to work.</p>
          <div class="intro-split__actions">
            <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ ANIMATED STATS STRIP ============ -->
  <section class="stats-strip">
    <div class="container">
      <div class="stats-strip__grid">
        <div class="stat" data-reveal>
          <div class="stat__value"><span data-stat-value="6+">0+</span></div>
          <p class="stat__label">New JLG, SkyTrak &amp; Peterbilt units in active rotation</p>
        </div>
        <div class="stat" data-reveal>
          <div class="stat__value"><span data-stat-value="100%">0%</span></div>
          <p class="stat__label">Inspected &amp; maintained before every rental</p>
        </div>
        <div class="stat" data-reveal>
          <div class="stat__value"><span data-stat-value="24–48hr">0hr</span></div>
          <p class="stat__label">Typical turnaround to get equipment on your site <em>(confirm before launch)</em></p>
        </div>
        <div class="stat" data-reveal>
          <div class="stat__value"><span data-stat-value="7 Days">0 Days</span></div>
          <p class="stat__label">A week rental availability — daily, weekly &amp; monthly terms</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ MISSION — Own Less. Do More. (Scene 02) ============ -->
  <section class="section section--light">
    <div class="container">
      <div class="mission">
        <div data-reveal>
          <p class="eyebrow">Own Less. Do More.</p>
          <h2 class="display-2" data-kinetic="lines" data-kinetic-lines="Own Less.|Do More.">Own Less. Do More.</h2>
          <p class="lede mt-4">Put your capital to work where it matters most. With Denson Commercial Equipment Leasing, you get the heavy-duty equipment your operation needs without the upfront cost, ongoing maintenance, or long-term commitment of ownership.</p>
          <p class="lede">Rent the right equipment for the job, for as long as you need it. With flexible daily, weekly, and monthly options, Denson helps you keep equipment working, projects moving, and capital in your business.</p>
        </div>
        <div class="mission__media" data-reveal>
          <div class="media-panel media-panel--4x5" aria-hidden="true">
            <span class="media-panel__glyph">02</span>
            <span class="media-panel__index">FIG. 02</span>
            <div class="media-panel__frame"></div>
            <span class="media-panel__tag">Scene 02 — Machine in Motion</span>
          </div>
        </div>
      </div>

      <div class="pillars mt-5" data-reveal>
        <div class="pillar">
          <div class="numeral">01</div>
          <h3 class="pillar__heading">Keep Your Capital Working</h3>
          <p class="pillar__body">Avoid a major equipment purchase and put those dollars toward the people, projects, and opportunities that grow your business.</p>
        </div>
        <div class="pillar">
          <div class="numeral">02</div>
          <h3 class="pillar__heading">Rent on Your Terms</h3>
          <p class="pillar__body">Need it for a day, a week, or a month? Rent what you need, when you need it — and stop paying when the job is done.</p>
        </div>
        <div class="pillar">
          <div class="numeral">03</div>
          <h3 class="pillar__heading">Always Jobsite-Ready</h3>
          <p class="pillar__body">Every machine is inspected and maintained before it leaves the yard, so it shows up ready to run — not something you troubleshoot on someone else's schedule.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ STORY — Why Denson ============ -->
  <section class="section section--dark">
    <div class="container">
      <div class="story">
        <div class="story__copy" data-reveal>
          <p class="eyebrow">Why Denson</p>
          <p class="story__pull">Equipment That Doesn't Let You Down.</p>
          <p class="body-text">Every job runs on a schedule, and every schedule runs on equipment that starts, lifts, and hauls exactly when it's supposed to. That's the standard Denson holds every machine to before it ever reaches your site — inspected, maintained, and ready to work the moment it rolls off the trailer.</p>
          <p class="body-text mt-3">We built Denson around a simple idea: the equipment rental business isn't really about equipment. It's about trust. Trust that the machine will run. Trust that if something comes up, someone answers the phone. Trust that you can plan a job around us and we'll hold up our end of it.</p>
        </div>
        <div class="story__media" data-reveal>
          <div class="media-panel media-panel--4x5" aria-hidden="true">
            <span class="media-panel__glyph">&mdash;</span>
            <span class="media-panel__index">FIG. 03</span>
            <div class="media-panel__frame"></div>
            <span class="media-panel__tag">Inspected. Maintained. Ready.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FLEET — Built for Heavy Work ============ -->
  <section class="section section--light" id="fleet">
    <div class="container">
      <div data-reveal>
        <p class="eyebrow">The Fleet</p>
        <h2 class="display-2">Built for Heavy Work.</h2>
        <p class="lede mt-3">From lifting and loading to hauling and everything in between, Denson's commercial-grade fleet is ready to take on the demands of your next job.</p>
      </div>

      <div class="fleet-grid" data-reveal>
        <?php
        $denson_cel_fleet_order = array( 'jlg-660sj', 'skytrak-10054', 'jlg-1055', 'jlg-600aj', 'jlg-800aj', 'peterbilt-680' );
        foreach ( $denson_cel_fleet_order as $i => $slug ) {
          denson_cel_fleet_tile( $slug, 0 === $i ? 'hero' : '' );
        }
        ?>
      </div>

      <div class="section-footer-cta">
        <a class="btn btn-ghost-dark" href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Explore Our Equipment</a>
      </div>
    </div>
  </section>

  <!-- ============ INDUSTRIES — Who We Serve ============ -->
  <section class="section section--dark">
    <div class="container">
      <div data-reveal>
        <p class="eyebrow">Who We Serve</p>
        <h2 class="display-2">Built For the Work You Do.</h2>
      </div>
      <div class="industries-grid" data-reveal>
        <div class="industry-card">
          <div class="media-panel media-panel--4x5" aria-hidden="true">
            <span class="media-panel__glyph">01</span>
            <div class="media-panel__frame"></div>
          </div>
          <div class="industry-card__body">
            <h3 class="industry-card__title">Commercial Construction</h3>
            <p class="industry-card__desc">Lifting, staging, and material handling for active build sites.</p>
          </div>
        </div>
        <div class="industry-card">
          <div class="media-panel media-panel--4x5" aria-hidden="true">
            <span class="media-panel__glyph">02</span>
            <div class="media-panel__frame"></div>
          </div>
          <div class="industry-card__body">
            <h3 class="industry-card__title">Industrial &amp; Facilities</h3>
            <p class="industry-card__desc">Equipment that keeps plants, warehouses, and facilities operating without interruption.</p>
          </div>
        </div>
        <div class="industry-card">
          <div class="media-panel media-panel--4x5" aria-hidden="true">
            <span class="media-panel__glyph">03</span>
            <div class="media-panel__frame"></div>
          </div>
          <div class="industry-card__body">
            <h3 class="industry-card__title">Heavy Hauling &amp; Logistics</h3>
            <p class="industry-card__desc">Reliable haul capacity to move equipment and materials where the job needs them.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FINAL CTA — Scene 03: Hauling at Golden Hour ============ -->
  <section class="final-cta">
    <div class="media-panel" aria-hidden="true">
      <span class="media-panel__glyph">03</span>
      <span class="media-panel__index">FIG. 04</span>
      <div class="media-panel__frame"></div>
      <span class="media-panel__tag">Scene 03 — Hauling at Golden Hour</span>
    </div>
    <div class="final-cta__scrim"></div>
    <div class="final-cta__content container" data-reveal>
      <h2 class="display-2" data-kinetic="lines" data-kinetic-lines="Ready to Get to Work?">Ready to Get to Work?</h2>
      <p class="lede">Tell us what the job demands. We'll help you get the right equipment, the right rental terms, and the support you need to keep moving.</p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
        <span class="final-cta__link">reserve.loadmaxrentals.com</span>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
