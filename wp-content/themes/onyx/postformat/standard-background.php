<?php

	/**
	 * POST FORMAT - FEATURED
	 */

	$onyx_post_image = null;
	if(has_post_thumbnail()){
		$onyx_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_background_small');
		$onyx_post_image = $onyx_post_image[0];
	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-format-standard-full-image'); ?>>
		<?php if($onyx_post_image){ ?>
		<div class="post-background" style="background-image:url('<?php echo esc_url($onyx_post_image); ?>');"></div>
		<?php } ?>
		<div class="post-shadow"></div>
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
				<ul class="post-meta post-meta-dark">
					<li class="post-read-more post-meta-align-left"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'onyx'); ?> <i class="fa fa-chevron-right"></i></a></li>
					<li class="post-meta-comments post-meta-align-right"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
					<li class="post-meta-likes post-meta-align-right"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($post->ID); } ?></li>
					<li class="post-pinned post-meta-align-right"><i class="fa fa fa-thumb-tack"></i></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</article>
