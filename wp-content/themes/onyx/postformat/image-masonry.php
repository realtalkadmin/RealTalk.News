<?php

	/**
	 * POST FORMAT - IMAGE (MASONRY)
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-image"><img src="<?php echo esc_url(ecko_get_first_image()); ?>" alt="<?php the_title(); ?>"></div>
		<div class="post-info-container">
			<div class="post-info">
				<?php onyx_get_category_markup(); ?>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<ul class="post-meta post-meta-dark">
					<li class="post-pinned post-meta-align-left"><i class="fa fa-thumb-tack"></i></li>
					<li class="post-meta-comments post-meta-align-left"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
					<li class="post-meta-likes post-meta-align-left"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
					<li class="post-meta-date post-meta-align-right"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_time_ago(get_post_time('U', true))); ?></time></a></li>
				</ul>
			</div>
		</div>
	</article>
