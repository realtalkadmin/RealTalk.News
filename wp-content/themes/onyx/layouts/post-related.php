<?php

	/**
	 * POST - RELATED
	 */

	$onyx_post = onyx_global_post();
	$onyx_related_posts = ecko_get_related_posts($onyx_post->ID, 3, true, true);
	$onyx_related_posts_count = count($onyx_related_posts);

	if($onyx_related_posts_count > 0){

?>

	<section class="post-related post-related-count-<?php echo esc_attr($onyx_related_posts_count); ?>">

		<?php
			foreach($onyx_related_posts as $post){
			setup_postdata($post);
			$onyx_post_image = null;
			if(has_post_thumbnail()){
				$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_opengraph');
				$onyx_post_image = $onyx_post_image[0];
			}
		?>
		<a href="<?php the_permalink(); ?>" class="post-related-post">
			<?php if($onyx_post_image){ ?>
			<div class="post-background" style="background-image:url('<?php echo esc_url($onyx_post_image); ?>');"></div>
			<?php } ?>
			<div class="post-info">
				<span><?php esc_html_e('Related Article', 'onyx'); ?></span>
				<div class="post-bottom">
					<?php onyx_get_category_markup(true); ?>
					<h5 class="post-title"><?php the_title(); ?></h5>
					<span class="post-read-more"><?php esc_html_e('Read Article', 'onyx'); ?><i class="fa fa-chevron-right"></i></span>
				</div>
			</div>
		</a>
		<?php } ?>

	</section>

<?php

	}

	wp_reset_postdata();

?>
