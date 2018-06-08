<?php

	/**
	 * COVER - SINGLE
	 */

	$onyx_post = onyx_global_post();

	if(has_post_thumbnail($onyx_post->ID)){

?>

	<header class="cover cover-single">
		<div class="cover-background" style="background-image:url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<div class="post-info">
				<?php onyx_get_category_markup(); ?>
				<h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
				<ul class="post-meta">
					<li class="post-author"><a href="<?php ecko_get_author_url(); ?>"><?php the_author(); ?></a></li>
					<li class="post-date"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
					<li class="post-comments"><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i><?php comments_number('0', '1', '%'); ?></a></li>
					<li class="post-likes"><?php if(function_exists('get_simple_likes_button')){ echo get_simple_likes_button($onyx_post->ID); } ?></li>
				</ul>
			</div>
		</div>
	</header>

<?php } ?>
