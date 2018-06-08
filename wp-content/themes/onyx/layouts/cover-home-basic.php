<?php

	/**
	 * COVER - BLOG (BASIC)
	 */

	$onyx_blogcover_logo = get_theme_mod('blogcover_logo');

?>

	<header class="cover cover-blog">
		<div class="cover-background cover-background-default" style="background-image: url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper">
			<section class="cover-blog-description">
				<?php if($onyx_blogcover_logo){ ?>
				<div class="cover-logo"><img src="<?php echo esc_url($onyx_blogcover_logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></div>
				<?php } ?>
				<p class="cover-blog-info"><?php echo esc_html(get_theme_mod('general_blog_description')); ?></p>
				<div class="cover-mouse scroll-cover">
					<div class="cover-mouse-scroll"></div>
				</div>
			</section>
		</div>
	</header>
