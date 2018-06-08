<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Goodz Magazine
 */

$footer_copyright = get_theme_mod( 'goodz_footer_copyright', '' );

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">

				<?php if ( is_active_sidebar( 'footer-widget-1' ) ) { ?>
					<div class="custom-menus col-sm-6">
						<?php dynamic_sidebar( 'Footer Widget 1' );	?>
					</div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-widget-2' ) ) { ?>
					<div class="col-lg-3 col-sm-6 widget-area">
						<?php dynamic_sidebar( 'Footer Widget 2' ); ?>
					</div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-widget-3' ) ) { ?>
					<div class="col-lg-3 col-sm-6 widget-area">
						<?php dynamic_sidebar( 'Footer Widget 3' ); ?>
					</div>
				<?php } ?>
			</div>

			<div class="site-info">

				<?php if ( '' == $footer_copyright ) { ?>

					<a href="<?php echo esc_url( esc_html__( 'https://wordpress.org/', 'goodz' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'goodz' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>

					<span>
						<?php printf( 'Theme: %1$s by <a href="%2$s" rel="designer">%3$s</a>.', 'Goodz', 'http://themeskingdom.com', 'Themes Kingdom' ); ?>
					</span>

				<?php } else {

					printf( $footer_copyright );

				} ?>

			</div><!-- .site-info -->

		</div><!-- .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
