<?php

	/**
	 * POST - AUTHOR PROFILE
	 */

?>

	<section class="post-author-profile">
		<div class="post-author-upper">
			<div class="post-author-info">
				<img class="post-author-avatar" src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5(get_the_author_meta('user_email'))); ?>?s=70" alt="<?php the_author(); ?>">
				<div class="post-author-name">
					<span><?php esc_html_e('Author', 'onyx'); ?></span>
					<h4><a href="<?php ecko_get_author_url(); ?>"><?php the_author(); ?></a></h4>
				</div>
			</div>
			<ul class="post-author-social">
				<?php if(get_the_author_meta('user_url') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('user_url', $post->post_author)); ?>" target="_blank" title="<?php echo esc_attr(get_the_author_meta('user_url', $post->post_author)); ?>"><i class="fa fa-link"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('twitter') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitter', $post->post_author)); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('facebook', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('facebook', $post->post_author)); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('google-plus', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('google-plus', $post->post_author)); ?>" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('dribbble', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('dribbble', $post->post_author)); ?>" target="_blank" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('instagram', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('instagram', $post->post_author)); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('github', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('github', $post->post_author)); ?>" target="_blank" title="GitHub"><i class="fa fa-github"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('youtube', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('youtube', $post->post_author)); ?>" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('pinterest', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('pinterest', $post->post_author)); ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('linkedin', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('linkedin', $post->post_author)); ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('skype', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('skype', $post->post_author)); ?>" target="_blank" title="Skype"><i class="fa fa-skype"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('tumblr', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('tumblr', $post->post_author)); ?>" target="_blank" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('flickr', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('flickr', $post->post_author)); ?>" target="_blank" title="Flickr"><i class="fa fa-flickr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('reddit', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('reddit', $post->post_author)); ?>" target="_blank" title="Reddit"><i class="fa fa-reddit"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('stack-overflow', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('stack-overflow', $post->post_author)); ?>" target="_blank" title="Stack Overflow"><i class="fa fa-stack-overflow"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('twitch', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitch', $post->post_author)); ?>" target="_blank" title="Twitch"><i class="fa fa-twitch"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vine', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vine', $post->post_author)); ?>" target="_blank" title="Vine"><i class="fa fa-vine"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vk', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vk', $post->post_author)); ?>" target="_blank" title="VK"><i class="fa fa-vk"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vimeo', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vimeo', $post->post_author)); ?>" target="_blank" title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('weibo', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('weibo', $post->post_author)); ?>" target="_blank" title="Weibo"><i class="fa fa-weibo"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('soundcloud', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('soundcloud', $post->post_author)); ?>" target="_blank" title="Soundcloud"><i class="fa fa-soundcloud"></i></a></li>
				<?php } ?>
			</ul>
		</div>
		<p class="post-author-bio">
			<?php echo esc_html(the_author_meta('description')); ?>
		</p>
	</section>
