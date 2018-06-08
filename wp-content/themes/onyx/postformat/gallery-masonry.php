<?php

	/**
	 * POST FORMAT - GALLERY (MASONRY)
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-header-gallery">
			<i class="fa fa-chevron-right post-gallery-next"></i>
			<?php the_content(); ?>
			<i class="fa fa-chevron-left post-gallery-previous"></i>
		</div>
		<div class="post-info">
			<?php onyx_get_category_markup(); ?>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<p class="post-excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 215, '...'); ?></p>
			<ul class="post-meta">
				<li class="post-pinned post-meta-align-left"><i class="fa fa-thumb-tack"></i></li>
				<li class="post-meta-comments post-meta-align-left"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
				<li class="post-meta-likes post-meta-align-left"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
				<li class="post-meta-date post-meta-align-right"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_time_ago(get_post_time('U', true))); ?></time></a></li>
			</ul>
		</div>
	</article>
