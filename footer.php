<?php
/**
 * Footer template — Smart Sports Theme
 * Contact info editable via Appearance → Customize → ⑥ Footer
 */
?>
<footer class="site-footer" role="contentinfo" id="site-footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Col 1: Brand -->
            <div class="footer-col">
                <div class="footer-logo">
                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/image/logo.png' ); ?>"
                        alt="Smart Sports"
                        style="height:48px;width:auto;display:block;filter:brightness(0) invert(1);"
                    />
                </div>
                <p>Smart Sports is a 501(c)(3) nonprofit organization dedicated to connecting underserved youth in Chicago to education, opportunity, and their future through the power of sport.</p>
                <a href="#contact" class="btn btn-green" style="font-size:13px;padding:10px 20px;">Support the Work</a>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#">Where We Work</a></li>
                    <li><a href="#impact">Impact</a></li>
                    <li><a href="#stories">Real Stories</a></li>
                    <li><a href="#contact">Get Involved</a></li>
                </ul>
            </div>

            <!-- Col 3: Resources + Social -->
            <div class="footer-col">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Annual Report</a></li>
                </ul>

                <h4 style="margin-top:24px;">Follow Us</h4>
                <div class="social-icons">
                    <?php
                    $socials = array(
                        array( 'key' => 'ss_ig', 'label' => 'Instagram',  'default' => '#',
                               'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>' ),
                        array( 'key' => 'ss_li', 'label' => 'LinkedIn',   'default' => '#',
                               'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>' ),
                        array( 'key' => 'ss_tw', 'label' => 'Twitter/X',  'default' => '#',
                               'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>' ),
                        array( 'key' => 'ss_fb', 'label' => 'Facebook',   'default' => '#',
                               'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>' ),
                    );
                    foreach ( $socials as $s ) :
                        $href = get_theme_mod( $s['key'], $s['default'] );
                    ?>
                    <a href="<?php echo esc_url( $href ); ?>" class="social-icon-wrap" aria-label="<?php echo esc_attr( $s['label'] ); ?>" target="_blank" rel="noopener">
                        <?php echo $s['svg']; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Col 4: Contact -->
            <div class="footer-col">
                <h4>Contact</h4>

                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3aaa35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <span><?php echo nl2br( esc_html( get_theme_mod('ss_address','123 S. Michigan Ave, Suite 400, Chicago, IL 60603') ) ); ?></span>
                </div>

                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3aaa35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.56 3.44 2 2 0 0 1 3.54 1.27h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.91-.91a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 21.73 16.92z"/>
                        </svg>
                    </span>
                    <span><?php echo esc_html( get_theme_mod('ss_phone','(312) 555-0192') ); ?></span>
                </div>

                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#3aaa35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <a href="mailto:<?php echo esc_attr( get_theme_mod('ss_email','info@smartsports.org') ); ?>" style="color:rgba(255,255,255,0.8);">
                        <?php echo esc_html( get_theme_mod('ss_email','info@smartsports.org') ); ?>
                    </a>
                </div>
            </div>

        </div><!-- /.footer-grid -->
    </div><!-- /.container -->

    <!-- Bottom bar -->
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Smart Sports. All rights reserved. &nbsp;|&nbsp; 501(c)(3) Nonprofit Organization</p>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
