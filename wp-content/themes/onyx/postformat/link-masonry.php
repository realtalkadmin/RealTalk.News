<?php

	/**
	 * POST FORMAT - LINK (MASONRY)
	 */

	$onyx_post_image = null;
	if(has_post_thumbnail()){
		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_column');
		$onyx_post_image = $onyx_post_image[0];
	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if($onyx_post_image){ ?>
		<div class="post-header-image">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($onyx_post_image); ?>" alt="<?php the_title(); ?>"></a>
		</div>
		<?php } ?>
		<div class="post-info">
			<?php onyx_get_category_markup(); ?>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<a href="<?php echo esc_url(ecko_get_first_link(get_the_content())); ?>" target="_blank" class="post-external-link"><i class="fa fa-link"></i><?php esc_html_e('External Link', 'onyx'); ?></a>
			<p class="post-excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 215, '...'); ?></p>
			<ul class="post-meta">
				<li class="post-pinned post-meta-align-left"><i class="fa fa-thumb-tack"></i></li>
				<li class="post-meta-comments post-meta-align-left"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="post-meta-likes post-meta-align-left"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
				<li class="post-meta-date post-meta-align-right"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_time_ago(get_post_time('U', true))); ?></time></a></li>
			</ul>
		</div>
	</article>
