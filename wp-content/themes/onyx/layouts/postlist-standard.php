<?php

	/**
	 * POSTLIST
	 */

	$onyx_post_count = 0;

?>

	<?php if(have_posts()): ?>

		<section class="page-contents post-list post-list-standard">
			<div class="post-list-posts">
				<?php while(have_posts()) : the_post();

						if(get_theme_mod('adverts_enable', false)
							&& $wp_query->current_post != 0
							&& ($onyx_post_count % get_theme_mod('adverts_occurance_rate', 4)) == 0){
							get_template_part('layouts/postlist-advert');
						}

						$post_format = (get_post_format() === false) ? "standard" : get_post_format();

						switch($post_format){
							case "standard":
								if(get_post_meta($post->ID, 'onyx_post_image_background', true) == "yes"){
									include(locate_template('postformat/standard-background.php'));
								}else{
									include(locate_template('postformat/standard.php'));
								}
								break;
							case "status":
								include(locate_template('postformat/status.php'));
								break;
							case "aside":
								include(locate_template('postformat/status.php'));
								break;
							case "video":
								include(locate_template('postformat/video.php'));
								break;
							case "audio":
								include(locate_template('postformat/video.php'));
								break;
							case "image":
								include(locate_template('postformat/image.php'));
								break;
							case "quote":
								include(locate_template('postformat/quote.php'));
								break;
							case "gallery":
								include(locate_template('postformat/gallery.php'));
								break;
							case "link":
								include(locate_template('postformat/link.php'));
								break;
							default:
								include(locate_template('postformat/standard.php'));
								break;
						}

						$onyx_post_count++;
					?>

				<?php endwhile; ?>
			</div>

			<?php get_template_part('layouts/pagination'); ?>

		</section>

	<?php else : ?>

		<?php get_template_part('no-results'); ?>

	<?php endif; ?>
