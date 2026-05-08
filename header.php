<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smart Sports integrates sports and academics to build practical skills, expose youth to career pathways, and re-engage students in Chicago, Illinois.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/image/logo.png' ); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/image/logo.png' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/image/logo.png' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ================================================
     HEADER
================================================ -->
<header class="site-header" id="site-header" role="banner">

    <!-- Top bar: Events / Blogs links -->
    <div class="header-top-bar">
        <div class="container" style="display:flex;justify-content:flex-end;align-items:center;">
            <a href="https://abortivematch.s2-tastewp.com/index.php/events/">Events</a>
            <span class="separator">&nbsp;|&nbsp;</span>
            <a href="#">Blogs</a>
        </div>
    </div>

    <!-- Main navigation row -->
    <div class="header-main">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo" aria-label="Smart Sports Home">
            <img
                src="<?php echo esc_url( get_template_directory_uri() . '/image/logo.png' ); ?>"
                alt="Smart Sports"
                width="140"
                height="auto"
                style="height:56px;width:auto;display:block;"
            />
        </a>

        <!-- Hamburger (mobile) -->
        <button class="menu-toggle" aria-expanded="false" aria-controls="main-navigation" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

        <!-- Nav -->
        <nav class="main-nav" id="main-navigation" role="navigation" aria-label="Primary Navigation">
            <ul>
                <li><a href="#about">About Us</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#">Where We Work</a></li>
                <li><a href="#impact">Impact</a></li>
                <li><a href="#contact">Get Involved</a></li>
            </ul>
        </nav>

        <!-- CTA button -->
        <div class="header-cta">
            <a href="#contact" class="btn btn-green">Support the Work</a>
        </div>

    </div>
</header>
