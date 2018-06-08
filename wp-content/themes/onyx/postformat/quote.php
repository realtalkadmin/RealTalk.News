<?php

	/**
	 * POST FORMAT - QUOTE
	 */

	$onyx_post_image = null;
	if(has_post_thumbnail()){
		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_background_small');
		$onyx_post_image = $onyx_post_image[0];
	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if($onyx_post_image){ ?>
		<div class="post-background" style="background-image:url('<?php echo esc_url($onyx_post_image); ?>');"></div>
		<?php } ?>
		<div class="post-info">
			<div class="post-quote">
				<?php the_content(); ?>
			</div>
			<ul class="post-meta">
				<li class="post-meta-comments post-meta-align-right"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="post-meta-likes post-meta-align-right"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
				<li class="post-pinned post-meta-align-right"><i class="fa fa fa-thumb-tack"></i></li>
			</ul>
			<div class="clear"></div>
		</div>
	</article>
