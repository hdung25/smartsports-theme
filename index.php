<?php
/**
 * Smart Sports Theme — Index fallback
 * This file is required by WordPress. The actual homepage
 * is rendered by front-page.php when a static front page is set.
 */
get_header();
?>
<main id="main-content" role="main">
    <div class="container" style="padding: 80px 24px; text-align:center;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'No content found.', 'smartsports' ); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
