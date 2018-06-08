<?php

	/**
	 * POST FORMAT - QUOTE (MASONRY)
	 */

	$onyx_post_image = null;
	if(has_post_thumbnail()){
		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_single');
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
			<ul class="post-meta post-meta-dark">
				<li class="post-pinned post-meta-align-left"><i class="fa fa-thumb-tack"></i></li>
				<li class="post-meta-comments post-meta-align-left"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="post-meta-likes post-meta-align-left"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
				<li class="post-meta-date post-meta-align-right"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_time_ago(get_post_time('U', true))); ?></time></a></li>
			</ul>
		</div>
	</article>
