<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Goodz Magazine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<div id="secondary" class="widget-area <?php goodz_magazine_sidebar_cols(); ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
