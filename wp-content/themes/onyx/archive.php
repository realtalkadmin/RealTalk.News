<?php

	/**
	 * ARCHIVE TEMPLATE
	 */

	get_header();

?>

	<header class="cover cover-category">
		<div class="cover-background" style="background-image:url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<h1 class="category-name">
				<?php
					if(is_day()){
						esc_html(the_time('F jS, Y'));
					}elseif(is_month()){
						esc_html(the_time('F, Y'));
					}elseif(is_year()){
						esc_html(the_time('Y'));
					};
				?>
			</h1>
			<hr>
			<span class="cover-article-count"><?php echo esc_html($wp_query->post_count); ?> <?php esc_html_e('Articles', 'onyx'); ?></span>
		</div>
	</header>

	<?php get_template_part('layouts/filter-bar'); ?>

	<?php get_template_part('layouts/postlist'); ?>

<?php get_footer(); ?>
