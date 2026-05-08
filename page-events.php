<?php
/**
 * Template Name: Events Page
 * Smart Sports — Events page matching provided design reference
 */
get_header();
?>

<!-- ================================================
     EVENTS HERO SECTION
================================================ -->
<section class="events-hero" id="events-hero">
    <div class="events-hero-bg">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi1.png' ); ?>" alt="Smart Sports Events — students playing basketball" loading="eager" />
    </div>
    <div class="events-hero-overlay"></div>

    <div class="events-hero-content container">
        <h1>Events</h1>
        <p>Join us in building brighter futures<br>through sports and learning</p>
        <div class="events-hero-actions">
            <a href="#upcoming-events" class="btn btn-orange">Find an Event</a>
            <a href="#host-event" class="btn btn-outline-dark">Host an Event</a>
        </div>
    </div>
</section>


<!-- ================================================
     UPCOMING EVENTS
================================================ -->
<section class="upcoming-events-section" id="upcoming-events">
    <div class="container">
        <h2 class="section-title">UPCOMING EVENTS</h2>
        <p class="section-subtitle">Find ways to connect, support, and get involved in your community</p>

        <div class="events-cards-grid">

            <!-- Card 1 — Community Event -->
            <div class="event-card">
                <div class="event-card-img-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi2.png' ); ?>" alt="Smart Sports Community Day" loading="lazy" />
                    <span class="event-tag tag-community">Community Event</span>
                </div>
                <div class="event-card-body">
                    <div class="event-date">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>June 8, 2026 &bull; 10:00 AM</span>
                    </div>
                    <h3>Smart Sports Community Day</h3>
                    <p>A family-friendly day of sports, learning activities, and fun for all ages.</p>
                    <div class="event-location">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Austin, TX</span>
                    </div>
                    <a href="#" class="event-learn-more">Learn more &nbsp;&rarr;</a>
                </div>
            </div>

            <!-- Card 2 — Fundraiser -->
            <div class="event-card">
                <div class="event-card-img-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi3.png' ); ?>" alt="Play It Forward Gala" loading="lazy" />
                    <span class="event-tag tag-fundraiser">Fundraiser</span>
                </div>
                <div class="event-card-body">
                    <div class="event-date">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>June 8, 2026 &bull; 10:00 AM</span>
                    </div>
                    <h3>Play It Forward Gala</h3>
                    <p>An evening of inspiration and impact to support youth opportunities.</p>
                    <div class="event-location">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Chicago, IL</span>
                    </div>
                    <a href="#" class="event-learn-more">Learn more &nbsp;&rarr;</a>
                </div>
            </div>

            <!-- Card 3 — Workshop -->
            <div class="event-card">
                <div class="event-card-img-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi3.png' ); ?>" alt="Smart Sports Workshop" loading="lazy" />
                    <span class="event-tag tag-workshop">Workshop</span>
                </div>
                <div class="event-card-body">
                    <div class="event-date">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>June 8, 2026 &bull; 10:00 AM</span>
                    </div>
                    <h3>Smart Sports Community Day</h3>
                    <p>A family-friendly day of sports, learning activities, and fun for all ages.</p>
                    <div class="event-location">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Virtual Event</span>
                    </div>
                    <a href="#" class="event-learn-more">Learn more &nbsp;&rarr;</a>
                </div>
            </div>

            <!-- Card 4 — Community Event -->
            <div class="event-card">
                <div class="event-card-img-wrap">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi3.png' ); ?>" alt="Smart Sports Community Day Memphis" loading="lazy" />
                    <span class="event-tag tag-community">Community Event</span>
                </div>
                <div class="event-card-body">
                    <div class="event-date">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>June 8, 2026 &bull; 10:00 AM</span>
                    </div>
                    <h3>Smart Sports Community Day</h3>
                    <p>A family-friendly day of sports, learning activities, and fun for all ages.</p>
                    <div class="event-location">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Memphis, TN</span>
                    </div>
                    <a href="#" class="event-learn-more">Learn more &nbsp;&rarr;</a>
                </div>
            </div>

        </div><!-- /.events-cards-grid -->

        <div class="events-view-all">
            <a href="#" class="btn btn-outline-blue">View All Events</a>
        </div>
    </div>
</section>


<!-- ================================================
     HOST AN EVENT
================================================ -->
<section class="host-event-section" id="host-event">
    <div class="host-event-inner">

        <!-- Left: Photo -->
        <div class="host-event-img">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/image/anhmoi4.png' ); ?>" alt="Kids playing soccer in Smart Sports shirts" loading="lazy" />
        </div>

        <!-- Right: Content -->
        <div class="host-event-content">
            <h2>HOST AN EVENT</h2>
            <p class="host-event-tagline"><strong>Make a difference in your community.</strong></p>
            <p class="host-event-desc">From small gatherings to large fundraisers, your event helps create opportunities for youth to learn, grow, and thrive.</p>

            <ul class="host-checklist">
                <li>
                    <span class="host-check-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                    <span>Raise awareness about youth opportunity gaps</span>
                </li>
                <li>
                    <span class="host-check-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                    <span>Engage your network in meaningful ways</span>
                </li>
                <li>
                    <span class="host-check-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                    <span>Support programs that change lives</span>
                </li>
                <li>
                    <span class="host-check-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                    <span>We'll support you every step of the way</span>
                </li>
            </ul>

            <a href="#contact" class="btn btn-orange btn-host-cta">Get Started</a>
        </div>

    </div>
</section>


<!-- ================================================
     EVENT CATEGORIES
================================================ -->
<section class="event-categories-section" id="event-categories">
    <div class="container">
        <h2 class="section-title">EVENT CATEGORIES</h2>
        <p class="section-subtitle">Explore events that match your interests.</p>

        <div class="categories-grid">

            <!-- Community Events -->
            <div class="category-card">
                <div class="category-icon" style="background:#1e4fa0;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Community Events</h3>
                <p>Local events that bring people together.</p>
            </div>

            <!-- Fundraisers -->
            <div class="category-card">
                <div class="category-icon" style="background:#e8681a;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </div>
                <h3>Fundraisers</h3>
                <p>Help raise critical resources for youth programs.</p>
            </div>

            <!-- Workshops -->
            <div class="category-card">
                <div class="category-icon" style="background:#3aaa35;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <h3>Workshops</h3>
                <p>Learn, grow, and build skills that create impact.</p>
            </div>

            <!-- Sports Events -->
            <div class="category-card">
                <div class="category-icon" style="background:#e8a21a;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                        <path d="M4.93 4.93l14.14 14.14M19.07 4.93L4.93 19.07"/>
                    </svg>
                </div>
                <h3>Sports Events</h3>
                <p>Games, tournaments, and activities for all ages.</p>
            </div>

            <!-- All Events -->
            <div class="category-card">
                <div class="category-icon" style="background:#1a3c6e;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        <line x1="8" y1="14" x2="16" y2="14"/><line x1="8" y1="18" x2="12" y2="18"/>
                    </svg>
                </div>
                <h3>All Events</h3>
                <p>View all upcoming events and opportunities.</p>
            </div>

        </div><!-- /.categories-grid -->

        <div class="events-view-all">
            <a href="#" class="btn btn-outline-orange">Browse All Events</a>
        </div>
    </div>
</section>


<!-- ================================================
     STAY CONNECTED (Newsletter)
================================================ -->
<section class="stay-connected-section" id="stay-connected">
    <div class="container">
        <div class="stay-connected-inner">
            <div class="stay-connected-text">
                <h2>STAY CONNECTED</h2>
                <p>Sign up to get updates on upcoming events, stories, and ways to get involved.</p>
            </div>
            <form class="stay-connected-form" action="#" method="post">
                <input type="email" name="email" placeholder="Enter your email address" required aria-label="Email address" />
                <button type="submit" class="btn btn-orange">Sign Up</button>
            </form>
        </div>
    </div>
</section>


<!-- ================================================
     BOTTOM CTA (reused from front-page style)
================================================ -->
<section class="bottom-cta" id="contact">
    <div class="container">
        <h2>LET'S BUILD WHAT COMES NEXT</h2>
        <p>Whatever you are a school, partner, or funder, there's an opportunity to bring Smart Sports to more young people.</p>
        <div class="cta-buttons">
            <a href="#" class="btn btn-orange">
                Bring Smart Sports to Your Community
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#" class="btn btn-outline-white">
                Partner With Us
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#" class="btn btn-green">
                Support the Work
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
