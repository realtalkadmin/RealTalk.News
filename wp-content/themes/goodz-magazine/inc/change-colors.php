<?php
/**
 * Change colors regarding user choices in customizer
 *
 * @package Goodz Magazine
 */

// Headings color
$headings_color   = get_theme_mod( 'goodz_magazine_heading_color', '#000' );
$navigation_color = get_theme_mod( 'goodz_magazine_navigation_color', '#000' );
$paragraph_color  = get_theme_mod( 'goodz_magazine_paragraph_color', '#838383' );
$link_color       = get_theme_mod( 'goodz_magazine_link_color', '#000' );
$logo_color       = get_theme_mod( 'goodz_magazine_logo_color', '#000' );
$background_color = get_theme_mod( 'background_color', '#fff' );
$footer_color     = get_theme_mod( 'goodz_magazine_footer_color', '#fff' );
$header_color     = get_theme_mod( 'goodz_magazine_bg_header_color', '#fff' );

?>

<style type="text/css">

    /* Headings color */
    h1, h2, h3, h4, h5, h6,
    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
    .widget-title, .nav-links,
    .format-quote blockquote {
        color: <?php echo esc_attr( $headings_color ); ?>;
    }

    body:not(.featured-slider-fullwidth) #masthead{
        background-color: <?php echo esc_attr( $header_color ); ?>;
    }

    /* Navigation color */
    #site-navigation ul li a,
    a#big-search-trigger {
        color: <?php echo esc_attr( $navigation_color ); ?>;
    }

    /* Paragraph color */
    .entry-content p {
        color: <?php echo esc_attr( $paragraph_color ); ?>;
    }

    /* Link color */
    a {
        color: <?php echo esc_attr( $link_color ); ?>;
    }

    /* Button color */
    .site-branding a {
        color: <?php echo esc_attr( $logo_color ); ?>;
    }

    /* Content color */
    #content,
    .main-content-wrap {
        background-color: <?php echo '#' . esc_attr( $background_color ); ?>;
    }

    /* Content color */
    .site-footer,
    .featured-slider-fullwidth .site-footer {
        background-color: <?php echo esc_attr( $footer_color ); ?>;
    }

</style>

