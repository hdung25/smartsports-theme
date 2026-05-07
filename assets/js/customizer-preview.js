/**
 * Smart Sports — Customizer Live Preview
 * Cập nhật trang ngay khi khách gõ trong Customizer (không cần refresh)
 */
( function( $ ) {
    // Hero headline
    wp.customize( 'ss_hero_headline', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-content h1' ).html( newval );
        } );
    } );

    // Hero subtext
    wp.customize( 'ss_hero_subtext', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-content p' ).text( newval );
        } );
    } );

    // Hero button text
    wp.customize( 'ss_hero_btn', function( value ) {
        value.bind( function( newval ) {
            $( '.hero-actions .btn-orange' ).contents().first().replaceWith( newval );
        } );
    } );

    // Stats
    wp.customize( 'ss_stat1_num',  function(v){ v.bind(function(n){ $('.stat-card.blue  .stat-number').text(n); }); } );
    wp.customize( 'ss_stat1_text', function(v){ v.bind(function(n){ $('.stat-card.blue  p').text(n); }); } );
    wp.customize( 'ss_stat2_num',  function(v){ v.bind(function(n){ $('.stat-card.orange .stat-number').text(n); }); } );
    wp.customize( 'ss_stat2_text', function(v){ v.bind(function(n){ $('.stat-card.orange p').text(n); }); } );
    wp.customize( 'ss_stat3_num',  function(v){ v.bind(function(n){ $('.stat-card.green  .stat-number').text(n); }); } );
    wp.customize( 'ss_stat3_text', function(v){ v.bind(function(n){ $('.stat-card.green  p').text(n); }); } );

    // Why quote
    wp.customize( 'ss_why_quote', function(v){ v.bind(function(n){ $('.why-quote').text('\u201C' + n + '\u201D'); }); } );

    // CTA title & sub
    wp.customize( 'ss_cta_title', function(v){ v.bind(function(n){ $('.bottom-cta h2').text(n); }); } );
    wp.customize( 'ss_cta_sub',   function(v){ v.bind(function(n){ $('.bottom-cta > .container > p').text(n); }); } );

    // Success title & sub
    wp.customize( 'ss_success_title', function(v){ v.bind(function(n){ $('.success-content h2').text(n); }); } );
    wp.customize( 'ss_success_sub',   function(v){ v.bind(function(n){ $('.success-content .sub').text(n); }); } );

} )( jQuery );
