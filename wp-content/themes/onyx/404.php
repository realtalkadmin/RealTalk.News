<?php

	/**
	 * ERROR 404 TEMPLATE
	 */

	get_header();

?>

	<header class="cover cover-error">
		<div class="cover-background" style="background-image:url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<h1><?php esc_html_e('Error', 'onyx'); ?> 404: <?php esc_html_e('Not Found', 'onyx'); ?></h1>
			<p><?php esc_html_e('The page you were looking for cannot be found, it may have been moved or no longer exists. The search below may help you find the desired page, or you can navigate back to the homepage by clicking', 'onyx'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('here', 'onyx'); ?></a>.</p>
			<hr>
			<form role="search" method="get" class="cover-search" action="<?php echo esc_url(home_url('/')); ?>">
				<i class="fa fa-search search-submit"></i>
				<input type="text" value="" name="s" class="query" placeholder="<?php esc_attr_e('Search the Blog...', 'onyx'); ?>" autocomplete="off">
			</form>
		</div>
	</header>

<?php get_footer(); ?>
