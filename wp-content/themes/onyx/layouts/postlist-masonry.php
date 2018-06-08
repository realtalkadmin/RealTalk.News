<?php

	/**
	 * POSTLIST
	 */

	$onyx_post_count = 0;

?>

	<?php if(have_posts()): ?>

		<section class="page-contents post-list post-list-masonry">
			<div class="post-list-posts">
				<?php while(have_posts()) : the_post();

					$post_format = (get_post_format() === false) ? "standard" : get_post_format();

					switch($post_format){
						case "standard":
							if(get_post_meta($post->ID, 'onyx_post_image_background', true) == "yes"){
								include(locate_template('postformat/standard-background-masonry.php'));
							}else{
								include(locate_template('postformat/standard-masonry.php'));
							}
							break;
						case "status":
							include(locate_template('postformat/status-masonry.php'));
							break;
						case "aside":
							include(locate_template('postformat/status-masonry.php'));
							break;
						case "video":
							include(locate_template('postformat/video-masonry.php'));
							break;
						case "audio":
							include(locate_template('postformat/video-masonry.php'));
							break;
						case "image":
							include(locate_template('postformat/image-masonry.php'));
							break;
						case "quote":
							include(locate_template('postformat/quote-masonry.php'));
							break;
						case "gallery":
							include(locate_template('postformat/gallery-masonry.php'));
							break;
						case "link":
							include(locate_template('postformat/link-masonry.php'));
							break;
						default:
							include(locate_template('postformat/standard-masonry.php'));
							break;
					}

					$onyx_post_count++;

				endwhile; ?>
			</div>

			<?php get_template_part('layouts/pagination'); ?>

		</section>

	<?php else : ?>

		<?php get_template_part('no-results'); ?>

	<?php endif; ?>
