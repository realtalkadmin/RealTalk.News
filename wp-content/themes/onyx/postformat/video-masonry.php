<?php

	/**
	 * POST FORMAT - VIDEO (MASONRY)
	 */

	$onyx_post_image = null;
	if(has_post_thumbnail()){
		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_single');
		$onyx_post_image = $onyx_post_image[0];
	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-post-id="<?php the_ID(); ?>">
		<div class="post-background" style="background-image:url('<?php echo esc_url($onyx_post_image); ?>');"></div>
		<div class="post-info">
			<a href="<?php the_permalink(); ?>" class="post-play"><i class="fa fa-play"></i></a>
			<div class="post-media">
				<?php
					$onyx_content = do_shortcode(apply_filters('the_content', $post->post_content));
					$onyx_media = get_media_embedded_in_content($onyx_content);
				?>
				<script type="text/javascript">
					if(typeof window.post_video === 'undefined'){ window.post_video = new Array(); };
					window.post_video['<?php the_ID(); ?>'] = '<?php if(isset($onyx_media[0])){ echo esc_js(balanceTags($onyx_media[0])); } ?>'
				</script>
			</div>
			<?php onyx_get_category_markup(); ?>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<p class="post-excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 215, '...'); ?></p>
			<ul class="post-meta post-meta-dark">
				<li class="post-pinned post-meta-align-left"><i class="fa fa-thumb-tack"></i></li>
				<li class="post-meta-comments post-meta-align-left"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="post-meta-likes post-meta-align-left"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
				<li class="post-meta-date post-meta-align-right"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_time_ago(get_post_time('U', true))); ?></time></a></li>
			</ul>
		</div>
	</article>
