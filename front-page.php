<?php
/**
 * Template Name: Front Page (Landing Page)
 * Smart Sports — All content editable via Appearance → Customize
 */
get_header();
?>

<!-- ================================================
     HERO SECTION
================================================ -->
<section class="hero-section" id="hero">
    <div class="hero-bg">
        <?php
        $hero_bg = ss_img( 'ss_hero_bg', 'pic1.png' );
        ?>
        <img src="<?php echo $hero_bg; ?>" alt="Smart Sports - students playing sports" loading="eager" />
    </div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <span class="hero-badge">&#9733; Chicago, Illinois</span>

        <h1><?php echo wp_kses_post( ss_get( 'ss_hero_headline', 'Where Sports <em>Connect</em> to Opportunity' ) ); ?></h1>

        <p><?php echo esc_html( ss_get( 'ss_hero_subtext', 'Smart Sports integrates sports and academics to build practical skills, expose youth to career pathways, and re-engage students who have fallen through the cracks of traditional education.' ) ); ?></p>

        <div class="hero-actions">
            <a href="#contact" class="btn btn-orange">
                <?php echo esc_html( ss_get( 'ss_hero_btn', 'Bring Smart Sports to Your Community' ) ); ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#how-it-works" class="btn btn-outline-white">Learn How It Works</a>
        </div>
    </div>
</section>


<!-- ================================================
     HOW IT WORKS
================================================ -->
<section class="how-it-works" id="how-it-works">
    <div class="container">
        <p class="section-label">Our Approach</p>
        <h2 class="section-title">How It Works</h2>
        <p class="section-subtitle">Four interconnected pillars that transform how young people learn, engage, and prepare for the future.</p>

        <div class="hiw-grid">
            <div class="hiw-card">
                <div class="hiw-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3>Learn Through Application</h3>
                <p>Academic concepts are taught through real-world sports contexts, making learning tangible and immediately relevant to students' lives.</p>
            </div>
            <div class="hiw-card">
                <div class="hiw-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/>
                    </svg>
                </div>
                <h3>Engage Through Sport</h3>
                <p>Sports serve as the hook — the reason students show up, stay engaged, and build trust with mentors and peers in their program.</p>
            </div>
            <div class="hiw-card">
                <div class="hiw-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <h3>Explore Career Pathways</h3>
                <p>Students connect with professionals across industries — from sports medicine to business — expanding what they believe is possible.</p>
            </div>
            <div class="hiw-card">
                <div class="hiw-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Build Skills for the Future</h3>
                <p>Teamwork, communication, discipline, and problem-solving — the transferable skills that employers and colleges look for.</p>
            </div>
        </div>
    </div>
</section>


<!-- ================================================
     WHY IT MATTERS
================================================ -->
<?php
$why_bg = get_theme_mod( 'ss_why_bg', '' );
$why_style = $why_bg ? 'style="background-image:url(' . esc_url($why_bg) . ');"' : '';
?>
<section class="why-it-matters" id="impact" <?php echo $why_style; ?>>
    <div class="container">
        <p class="section-label">The Problem We Solve</p>
        <h2 class="section-title">Why It Matters</h2>

        <div class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-number"><?php echo esc_html( ss_get('ss_stat1_num','41%') ); ?></div>
                <p><?php echo esc_html( ss_get('ss_stat1_text','of Illinois students are chronically absent — missing 10% or more of the school year.') ); ?></p>
                <span class="stat-source">Source: Illinois State Board of Education, 2023</span>
            </div>
            <div class="stat-card orange">
                <div class="stat-number"><?php echo esc_html( ss_get('ss_stat2_num','26%') ); ?></div>
                <p><?php echo esc_html( ss_get('ss_stat2_text','of students are proficient in math, leaving the majority underprepared for college and careers.') ); ?></p>
                <span class="stat-source">Source: NAEP Nation's Report Card, 2022</span>
            </div>
            <div class="stat-card green">
                <div class="stat-number"><?php echo esc_html( ss_get('ss_stat3_num','31%') ); ?></div>
                <p><?php echo esc_html( ss_get('ss_stat3_text','of students are proficient in reading — a critical foundation for lifelong success.') ); ?></p>
                <span class="stat-source">Source: NAEP Nation's Report Card, 2022</span>
            </div>
        </div>

        <div class="why-quote-wrap">
            <p class="why-quote">&ldquo;<?php echo esc_html( ss_get('ss_why_quote','When young people do not see how what they are learning connects to their future, they disengage.') ); ?>&rdquo;</p>
            <p class="why-quote-sub">Smart Sports exists to bridge that gap — using sport as the universal language that reconnects students to learning, community, and their own potential.</p>
        </div>
    </div>
</section>


<!-- ================================================
     WHAT MAKES US DIFFERENT
================================================ -->
<section class="what-makes-us" id="about">
    <div class="container">
        <p class="section-label">Our Model</p>
        <h2 class="section-title">What Makes Us Different</h2>
        <p class="section-subtitle">A model designed to align learning, engagement, and future opportunity — all in one integrated experience.</p>

        <div class="wm-grid">
            <?php
            $diff_cards = array(
                array( 'key' => 'ss_diff_img1', 'fallback' => 'pic2.png', 'alt' => 'Not just sports',          'title' => 'Not Just Sports',         'desc' => 'Every practice and game is paired with academic content and life skills development that goes beyond the scoreboard.' ),
                array( 'key' => 'ss_diff_img2', 'fallback' => 'pic3.png', 'alt' => 'Not just academics',       'title' => 'Not Just Academics',      'desc' => 'We don\'t just add more homework — we show students how their studies directly connect to real careers and real opportunity.' ),
                array( 'key' => 'ss_diff_img3', 'fallback' => 'pic4.png', 'alt' => 'Not just exposure',        'title' => 'Not Just Exposure',       'desc' => 'Students don\'t just visit a workplace — they develop the skills, confidence, and networks to actually pursue those paths.' ),
                array( 'key' => 'ss_diff_img4', 'fallback' => 'pic5.png', 'alt' => 'Not just participation',   'title' => 'Not Just Participation',  'desc' => 'Every scholar is known, tracked, and supported — because showing up isn\'t enough if no one is ensuring they\'re growing.' ),
            );
            foreach ( $diff_cards as $card ) : ?>
            <div class="wm-card">
                <div class="wm-img-wrap">
                    <img src="<?php echo ss_img( $card['key'], $card['fallback'] ); ?>" alt="<?php echo esc_attr( $card['alt'] ); ?>" loading="lazy" />
                </div>
                <div class="wm-body">
                    <h3><?php echo esc_html( $card['title'] ); ?></h3>
                    <p><?php echo esc_html( $card['desc'] ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ================================================
     WHAT SUCCESS LOOKS LIKE
================================================ -->
<section class="success-section" id="success">
    <div class="container">
        <div class="success-inner">
            <div class="success-img-wrap">
                <img src="<?php echo ss_img('ss_success_img','pic6.png'); ?>" alt="Students in classroom" loading="lazy" />
            </div>
            <div class="success-content">
                <p class="section-label">Outcomes That Matter</p>
                <h2><?php echo esc_html( ss_get('ss_success_title','What Success Looks Like') ); ?></h2>
                <p class="sub"><?php echo esc_html( ss_get('ss_success_sub',"When Smart Sports is implemented with fidelity, students don't just attend — they grow. Here's what schools and partners see:") ); ?></p>
                <ul class="success-list">
                    <?php
                    $items = array(
                        '<strong>Increased attendance</strong> — students are more likely to come to school on days Smart Sports is offered.',
                        '<strong>Stronger academic confidence</strong> — scholars report feeling more capable and motivated in the classroom.',
                        '<strong>Awareness of career pathways</strong> — students leave knowing at least three careers they\'d never considered before.',
                        '<strong>Improved social-emotional skills</strong> — including conflict resolution, teamwork, and self-regulation.',
                        '<strong>Clear connection between school and future goals</strong> — the "why" behind learning becomes visible and real.',
                    );
                    foreach ( $items as $item ) : ?>
                    <li>
                        <span class="tick-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <span><?php echo wp_kses_post( $item ); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- ================================================
     TESTIMONIALS
================================================ -->
<section class="testimonials-section" id="stories">
    <div class="container">
        <p class="section-label">Scholar Voices</p>
        <h2 class="section-title">Real Stories, Real Impact</h2>
        <p class="section-subtitle">Hear directly from the young people whose lives have been changed by Smart Sports.</p>

        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <?php
                $testimonials = array(
                    array( 'quote' => 'Smart Sports showed me that being good at basketball doesn\'t have to be the only thing I\'m good at. Now I know I want to work in sports medicine.', 'name' => 'Marcus, Age 15', 'role' => 'Scholar — Chicago South Side' ),
                    array( 'quote' => 'I used to hate school. Now I actually look forward to coming because I know we\'ll do something that makes sense to me — not just worksheets.', 'name' => 'Aaliyah, Age 13', 'role' => 'Scholar — West Englewood' ),
                    array( 'quote' => 'The program gave my son a reason to get out of bed. His attendance went from 60% to 94% this year. I can\'t put a price on that.', 'name' => 'Denise W.', 'role' => 'Parent — Austin, Chicago' ),
                    array( 'quote' => 'Smart Sports doesn\'t just talk about careers — they actually connect you with people doing those jobs. I shadowed a physical therapist. That changed everything.', 'name' => 'Jordan, Age 16', 'role' => 'Scholar — Garfield Park' ),
                    array( 'quote' => 'Our school saw measurable improvement in attendance and classroom engagement within the first semester of partnering with Smart Sports.', 'name' => 'Principal Ramirez', 'role' => 'Partner School — Chicago Public Schools' ),
                );
                foreach ( $testimonials as $t ) : ?>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <p class="testimonial-quote">&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</p>
                        <hr class="testimonial-divider" />
                        <div class="testimonial-author">
                            <strong><?php echo esc_html( $t['name'] ); ?></strong>
                            <span><?php echo esc_html( $t['role'] ); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="swiper-navigation-wrap">
            <button class="swiper-btn swiper-prev" aria-label="Previous">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </button>
            <button class="swiper-btn swiper-next" aria-label="Next">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</section>


<!-- ================================================
     BOTTOM CTA
================================================ -->
<?php
$cta_bg = get_theme_mod( 'ss_cta_bg', '' );
$cta_style = $cta_bg ? 'background-image:url(' . esc_url($cta_bg) . ');' : '';
?>
<section class="bottom-cta" id="contact" style="<?php echo $cta_style; ?>">
    <div class="container">
        <h2><?php echo esc_html( ss_get('ss_cta_title',"LET'S BUILD WHAT COMES NEXT") ); ?></h2>
        <p><?php echo esc_html( ss_get('ss_cta_sub','Whether you are a school, community partner, or funder — there is a role for you in building a future where every young person can see themselves.') ); ?></p>
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
