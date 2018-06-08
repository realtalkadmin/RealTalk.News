<?php

	/**
	 * FOOTER - NEXT POST
	 */

	$onyx_next_post = get_next_post();

	if(is_single() && !empty($onyx_next_post)){

		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($onyx_next_post->ID), 'ecko_background');

?>

	<a href="<?php echo esc_url(get_permalink($onyx_next_post->ID)); ?>" class="footer-post-next">
		<div class="background" style="background-image:url('<?php echo esc_url($onyx_post_image[0]); ?>');"></div>
		<div class="wrapper">
			<span><?php esc_html_e('Next Post', 'onyx'); ?></span>
			<hr>
			<h2><?php echo esc_html(get_the_title($onyx_next_post->ID)); ?></h2>
			<?php onyx_get_category_markup(true, $onyx_next_post->ID); ?>
		</div>
	</a>

<?php } ?>
