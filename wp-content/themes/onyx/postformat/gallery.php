<?php

	/**
	 * POST FORMAT - GALLERY
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-header-gallery">
			<i class="fa fa-chevron-right post-gallery-next"></i>
			<?php the_content(); ?>
			<i class="fa fa-chevron-left post-gallery-previous"></i>
		</div>
		<div class="post-info">
			<a href="<?php the_permalink(); ?>" class="post-date">
				<span class="post-date-day"><?php the_time('j'); ?><small><?php the_time('S'); ?></small></span>
				<span class="post-date-month"><?php the_time('F'); ?></span>
				<span class="post-date-year"><?php the_time('Y'); ?></span>
				<span class="post-date-category" style="background: #<?php echo esc_attr(onyx_get_category_color()); ?>;"></span>
				<hr>
			</a>
			<div class="post-right-align">
				<?php onyx_get_category_markup(); ?>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<section class="post-contents">
					<?php onyx_get_post_contents(); ?>
				</section>
				<ul class="post-meta">
					<li class="post-read-more post-meta-align-left"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'onyx'); ?> <i class="fa fa-chevron-right"></i></a></li>
					<li class="post-meta-comments post-meta-align-right"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
					<li class="post-meta-likes post-meta-align-right"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
					<li class="post-pinned post-meta-align-right"><i class="fa fa fa-thumb-tack"></i></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</article>
