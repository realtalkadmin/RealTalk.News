<?php

	/**
	 * COVER - BLOG
	 */

	$onyx_frontpage_posts = onyx_get_featured_posts();
	$onyx_blogcover_logo = get_theme_mod('blogcover_logo');
	$onyx_post_count = 0;

	if(count($onyx_frontpage_posts)){

?>

	<header class="cover cover-blog">
		<div class="cover-background cover-post-background-1" style="background-image: url('<?php echo esc_url(onyx_get_first_featured_post_background($onyx_frontpage_posts)); ?>');"></div>
		<div class="cover-background cover-post-background-2"></div>
		<div class="cover-background cover-post-background-3"></div>
		<div class="cover-shadow"></div>
		<div class="cover-load-indicator"></div>
		<div class="cover-content wrapper">
			<section class="cover-blog-description">
				<?php if($onyx_blogcover_logo){ ?>
				<div class="cover-logo"><img src="<?php echo esc_url($onyx_blogcover_logo); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></div>
				<?php } ?>
				<p class="cover-blog-info"><?php echo esc_html(get_theme_mod('general_blog_description')); ?></p>
				<div class="cover-mouse scroll-cover">
					<div class="cover-mouse-scroll"></div>
				</div>
			</section>
			<section class="cover-blog-posts">
				<?php
					foreach($onyx_frontpage_posts as $post){
						setup_postdata($post);
						$onyx_post_count++;
						$post_category = get_the_category();
						$post_image = null;
						if(has_post_thumbnail()){
							$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_background_large');
							$post_image = $post_image[0];
						}
						if(!$post_image){ $post_image = onyx_get_header_background(); }
				?>
				<article class="cover-post cover-post-<?php echo esc_attr($onyx_post_count); ?>" data-post-id="<?php echo esc_attr($onyx_post_count); ?>" data-background-image="<?php echo esc_url($post_image); ?>">
					<a href="<?php the_permalink(); ?>" class="post-category" data-category-color="#<?php echo onyx_get_category_color(); ?>"><?php echo esc_html($post_category[0]->name); ?></a>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-excerpt"><?php echo ecko_truncate_by_words(get_the_excerpt(), 160, '...'); ?></p>
					<a href="<?php the_permalink(); ?>" class="post-read-more"><?php esc_html_e('Read More', 'onyx'); ?> <i class="fa fa-chevron-right"></i></a>
				</article>
				<?php } ?>
			</section>
		</div>
	</header>

<?php }else{ ?>

	<?php get_template_part('layouts/cover-home-basic'); ?>

<?php } ?>
