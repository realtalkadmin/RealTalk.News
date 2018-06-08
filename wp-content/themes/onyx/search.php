<?php

	/**
	 * SEARCH TEMPLATE
	 */

	get_header();

?>

	<header class="cover cover-search">
		<div class="cover-background" style="background-image:url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<h1 class="search-title"><?php esc_html_e('Search Result', 'onyx'); ?></h1>
			<form role="search" method="get" class="cover-search" action="<?php echo esc_url(home_url('/')); ?>">
				<i class="fa fa-search search-submit"></i>
				<input type="text" name="s" class="query" value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off">
			</form>
			<span class="cover-article-count"><?php echo esc_html($wp_query->post_count); ?> <?php esc_html_e('Articles', 'onyx'); ?></span>
		</div>
	</header>

	<?php get_template_part('layouts/postlist'); ?>

<?php get_footer(); ?>
