<?php

	/**
	 * TAG TEMPLATE
	 */

	get_header();

	$background_image = (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url(get_query_var('tag_id')) != "" ? z_taxonomy_image_url(get_query_var('tag_id')) : onyx_get_header_background());

?>

	<header class="cover cover-category">
		<div class="cover-background" style="background-image:url('<?php echo esc_url($background_image); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<h1 class="category-name"><?php esc_html(single_tag_title()); ?></h1>
			<span class="cover-article-count"><?php echo esc_html($wp_query->found_posts); ?> <?php esc_html_e('Articles', 'onyx'); ?></span>
		</div>
	</header>

	<?php get_template_part('layouts/postlist'); ?>

<?php get_footer(); ?>
