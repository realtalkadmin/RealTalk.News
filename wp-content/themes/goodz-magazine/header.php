<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Goodz Magazine
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'goodz-magazine' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">

			<div class="site-branding">

				<?php

					$is_retina      = false;
					$headline_class = '';

				    if ( isset( $_COOKIE["device_pixel_ratio"] ) ) {

				        $is_retina = ( $_COOKIE["device_pixel_ratio"] >= 2 );

				    } else { ?>

						<script language="javascript">

							( function() {
								if ( document.cookie.indexOf( 'device_pixel_ratio' ) == -1
									&& 'devicePixelRatio' in window
									&& window.devicePixelRatio == 2 ) {

									var date = new Date();
									date.setTime( date.getTime() + 3600000 );

									document.cookie = 'device_pixel_ratio=' + window.devicePixelRatio + ';' +  ' expires=' + date.toUTCString() +'; path=/';

									//if cookies are not blocked, reload the page
									if ( document.cookie.indexOf( 'device_pixel_ratio' ) != -1 ) {
										window.location.reload();
									}
								}
							} )();

					</script>

				<?php }

					if ( $is_retina ) {

						$logo = get_theme_mod( 'goodz_magazine_retina_logo_setting' );

						if ( empty ( $logo ) ) {
							$logo = get_theme_mod( 'goodz_magazine_logo_setting' );
						}

						$retina_class = 'retina-logo';

					} else {

						$logo = get_theme_mod( 'goodz_magazine_logo_setting' );

						$retina_class = 'standard-logo';

					}

					// Display logo
					if ( $logo ) {
						printf( '<a href="%1$s" rel="home" class="%2$s"><img src="%3$s" /></a>', esc_url( home_url( '/' ) ), $retina_class, esc_url( $logo ) );
						$headline_class = 'screen-reader-text';
					}

				?>

				<!-- Display site title and description -->
				<?php if ( '' != get_bloginfo( 'name' ) ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="site-title <?php echo esc_attr( $headline_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<p class="site-title <?php echo esc_attr( $headline_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

					<?php endif; ?>

				<?php } ?>

				<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
					<p class="site-description <?php echo esc_attr( $headline_class ); ?>"><?php bloginfo( 'description' ); ?></p>
				<?php } ?>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e( 'Primary Menu', 'goodz-magazine' ); ?><span>&nbsp;</span>
				</button>

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

			</nav><!-- #site-navigation -->

			<!-- Search form -->
			<div class="search-wrap"><?php get_search_form(); ?></div>
			<a href="#" id="big-search-trigger"><i class="icon-search"></i></a>
			<a href="#" id="big-search-close"><i class="icon-close"></i></a>

		</div><!-- container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
