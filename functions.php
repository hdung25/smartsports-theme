<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ============================================================
// 1. THEME SETUP
// ============================================================
function smartsports_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'smartsports' ),
        'top_bar' => __( 'Top Bar Menu', 'smartsports' ),
    ) );
}
add_action( 'after_setup_theme', 'smartsports_setup' );

// ============================================================
// 2. ENQUEUE ASSETS
// ============================================================
function smartsports_enqueue_assets() {
    wp_enqueue_style( 'smartsports-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Barlow+Condensed:wght@600;700;800&display=swap',
        array(), null );
    wp_enqueue_style( 'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(), '11.0.0' );
    wp_enqueue_style( 'smartsports-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(), '1.1.0' );
    wp_enqueue_style( 'smartsports-style', get_stylesheet_uri(), array(), '1.1.0' );

    wp_enqueue_script( 'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(), '11.0.0', true );
    wp_enqueue_script( 'smartsports-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array( 'swiper-js' ), '1.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'smartsports_enqueue_assets' );

// ============================================================
// 3. WORDPRESS CUSTOMIZER — Khách tự sửa nội dung & ảnh
// ============================================================
function smartsports_customizer( $wp_customize ) {

    // -------------------------------------------------------
    // PANEL: Smart Sports Content
    // -------------------------------------------------------
    $wp_customize->add_panel( 'ss_panel', array(
        'title'    => '🏀 Smart Sports — Nội dung trang',
        'priority' => 10,
    ) );

    // ===== SECTION: HERO =====
    $wp_customize->add_section( 'ss_hero', array(
        'title' => '① Hero (Banner đầu trang)',
        'panel' => 'ss_panel',
    ) );

    // Hero Background Image
    $wp_customize->add_setting( 'ss_hero_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ss_hero_bg', array(
        'label'   => '🖼 Ảnh nền Hero (Background)',
        'section' => 'ss_hero',
    ) ) );

    // Hero Headline
    $wp_customize->add_setting( 'ss_hero_headline', array(
        'default'           => 'Where Sports <em>Connect</em> to Opportunity',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'ss_hero_headline', array(
        'label'   => '📝 Tiêu đề lớn (Headline)',
        'section' => 'ss_hero',
        'type'    => 'text',
    ) );

    // Hero Subtext
    $wp_customize->add_setting( 'ss_hero_subtext', array(
        'default'           => 'Smart Sports integrates sports and academics to build practical skills, expose youth to career pathways, and re-engage students who have fallen through the cracks of traditional education.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'ss_hero_subtext', array(
        'label'   => '📄 Đoạn mô tả ngắn',
        'section' => 'ss_hero',
        'type'    => 'textarea',
    ) );

    // Hero CTA Button Text
    $wp_customize->add_setting( 'ss_hero_btn', array(
        'default'           => 'Bring Smart Sports to Your Community',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ss_hero_btn', array(
        'label'   => '🔘 Chữ nút CTA (cam)',
        'section' => 'ss_hero',
        'type'    => 'text',
    ) );

    // ===== SECTION: STATS (Why It Matters) =====
    $wp_customize->add_section( 'ss_stats', array(
        'title' => '② Why It Matters — Số liệu thống kê',
        'panel' => 'ss_panel',
    ) );

    $stats = array(
        array( 'id' => 'stat1_num',  'label' => 'Số liệu 1 (vd: 41%)',  'default' => '41%' ),
        array( 'id' => 'stat1_text', 'label' => 'Mô tả thống kê 1',     'default' => 'of Illinois students are chronically absent — missing 10% or more of the school year.' ),
        array( 'id' => 'stat2_num',  'label' => 'Số liệu 2 (vd: 26%)',  'default' => '26%' ),
        array( 'id' => 'stat2_text', 'label' => 'Mô tả thống kê 2',     'default' => 'of students are proficient in math, leaving the majority underprepared for college and careers.' ),
        array( 'id' => 'stat3_num',  'label' => 'Số liệu 3 (vd: 31%)',  'default' => '31%' ),
        array( 'id' => 'stat3_text', 'label' => 'Mô tả thống kê 3',     'default' => 'of students are proficient in reading — a critical foundation for lifelong success.' ),
        array( 'id' => 'why_quote',  'label' => 'Câu quote lớn màu trắng', 'default' => 'When young people do not see how what they are learning connects to their future, they disengage.' ),
    );
    foreach ( $stats as $s ) {
        $wp_customize->add_setting( 'ss_' . $s['id'], array( 'default' => $s['default'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( 'ss_' . $s['id'], array(
            'label'   => $s['label'],
            'section' => 'ss_stats',
            'type'    => ( strpos( $s['id'], 'text' ) !== false || $s['id'] === 'why_quote' ) ? 'textarea' : 'text',
        ) );
    }

    // ===== SECTION: What Makes Us Different — Ảnh 4 Cards =====
    $wp_customize->add_section( 'ss_diff', array(
        'title' => '③ What Makes Us Different — 4 ảnh thẻ',
        'panel' => 'ss_panel',
    ) );

    $diff_images = array(
        array( 'id' => 'ss_diff_img1', 'label' => '🖼 Ảnh Card 1 — Not just sports' ),
        array( 'id' => 'ss_diff_img2', 'label' => '🖼 Ảnh Card 2 — Not just academics' ),
        array( 'id' => 'ss_diff_img3', 'label' => '🖼 Ảnh Card 3 — Not just exposure' ),
        array( 'id' => 'ss_diff_img4', 'label' => '🖼 Ảnh Card 4 — Not just participation' ),
    );
    foreach ( $diff_images as $img ) {
        $wp_customize->add_setting( $img['id'], array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $img['id'], array(
            'label'   => $img['label'],
            'section' => 'ss_diff',
        ) ) );
    }

    // ===== SECTION: What Success Looks Like — Ảnh trái =====
    $wp_customize->add_section( 'ss_success', array(
        'title' => '④ What Success Looks Like — Ảnh + nội dung',
        'panel' => 'ss_panel',
    ) );

    $wp_customize->add_setting( 'ss_success_img', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ss_success_img', array(
        'label'   => '🖼 Ảnh cột trái (lớp học)',
        'section' => 'ss_success',
    ) ) );

    $wp_customize->add_setting( 'ss_success_title', array(
        'default' => 'What Success Looks Like', 'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ss_success_title', array(
        'label' => '📝 Tiêu đề section', 'section' => 'ss_success', 'type' => 'text',
    ) );

    $wp_customize->add_setting( 'ss_success_sub', array(
        'default' => 'When Smart Sports is implemented with fidelity, students don\'t just attend — they grow. Here\'s what schools and partners see:',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'ss_success_sub', array(
        'label' => '📄 Đoạn mô tả phụ', 'section' => 'ss_success', 'type' => 'textarea',
    ) );

    // ===== SECTION: Bottom CTA =====
    $wp_customize->add_section( 'ss_cta', array(
        'title' => '⑤ Bottom CTA — Banner cuối trang',
        'panel' => 'ss_panel',
    ) );

    $wp_customize->add_setting( 'ss_cta_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ss_cta_bg', array(
        'label'   => '🖼 Ảnh nền sân bóng (CTA background)',
        'section' => 'ss_cta',
    ) ) );

    $wp_customize->add_setting( 'ss_cta_title', array(
        'default' => "LET'S BUILD WHAT COMES NEXT", 'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'ss_cta_title', array(
        'label' => '📝 Tiêu đề lớn CTA', 'section' => 'ss_cta', 'type' => 'text',
    ) );

    $wp_customize->add_setting( 'ss_cta_sub', array(
        'default' => 'Whether you are a school, community partner, or funder — there is a role for you in building a future where every young person can see themselves.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'ss_cta_sub', array(
        'label' => '📄 Đoạn mô tả phụ', 'section' => 'ss_cta', 'type' => 'textarea',
    ) );

    // ===== SECTION: Contact Info (Footer) =====
    $wp_customize->add_section( 'ss_contact', array(
        'title' => '⑥ Footer — Thông tin liên hệ',
        'panel' => 'ss_panel',
    ) );

    $contacts = array(
        array( 'id' => 'ss_address', 'label' => '📍 Địa chỉ',     'default' => '123 S. Michigan Ave, Suite 400, Chicago, IL 60603' ),
        array( 'id' => 'ss_phone',   'label' => '📞 Điện thoại',  'default' => '(312) 555-0192' ),
        array( 'id' => 'ss_email',   'label' => '✉️ Email',       'default' => 'info@smartsports.org' ),
        array( 'id' => 'ss_ig',      'label' => '🔗 Link Instagram', 'default' => '#' ),
        array( 'id' => 'ss_li',      'label' => '🔗 Link LinkedIn',  'default' => '#' ),
        array( 'id' => 'ss_tw',      'label' => '🔗 Link Twitter/X', 'default' => '#' ),
        array( 'id' => 'ss_fb',      'label' => '🔗 Link Facebook',  'default' => '#' ),
    );
    foreach ( $contacts as $c ) {
        $wp_customize->add_setting( $c['id'], array( 'default' => $c['default'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $c['id'], array(
            'label' => $c['label'], 'section' => 'ss_contact', 'type' => 'text',
        ) );
    }

    // ===== SECTION: Why It Matters Background =====
    $wp_customize->add_section( 'ss_whybg', array(
        'title' => '⑦ Why It Matters — Ảnh nền họa tiết',
        'panel' => 'ss_panel',
    ) );
    $wp_customize->add_setting( 'ss_why_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ss_why_bg', array(
        'label'   => '🖼 Ảnh nền họa tiết (nền xanh đậm)',
        'section' => 'ss_whybg',
    ) ) );
}
add_action( 'customize_register', 'smartsports_customizer' );

// ============================================================
// 4. HELPER: In nội dung từ Customizer (dùng trong template)
// ============================================================
function ss_get( $key, $fallback = '' ) {
    $val = get_theme_mod( $key, $fallback );
    return $val ? $val : $fallback;
}

function ss_img( $customizer_key, $fallback_file = '' ) {
    $url = get_theme_mod( $customizer_key, '' );
    if ( $url ) return esc_url( $url );
    if ( $fallback_file ) return esc_url( get_template_directory_uri() . '/image/' . $fallback_file );
    return '';
}

// ============================================================
// 5. CUSTOMIZER LIVE PREVIEW (real-time update)
// ============================================================
function smartsports_customizer_preview_js() {
    wp_enqueue_script( 'ss-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'smartsports_customizer_preview_js' );

// ============================================================
// 6. ALLOW SVG + WEBP UPLOADS
// ============================================================
function smartsports_mime_types( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'smartsports_mime_types' );
