<?php 

	/**
	 * AUTHOR TEMPLATE
	 */

	get_header(); 

?>

	<header class="cover cover-author">
		<div class="cover-background" style="background-image:url('<?php echo esc_url(onyx_get_header_background()); ?>');"></div>
		<div class="cover-shadow"></div>
		<div class="cover-content wrapper" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
			<img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5(get_the_author_meta('user_email'))); ?>?s=70" itemprop="image" alt="<?php the_author(); ?>" class="author-avatar">
			<h1 class="author-name" itemprop="name"><?php the_author(); ?></h1>
			<?php if(get_the_author_meta('twitter_handle') != ""){ ?><a href="http://twitter.com/<?php echo esc_attr(get_the_author_meta('twitter_handle')); ?>" class="author-twitter"><i class="fa fa-twitter"></i>@<?php echo esc_html(get_the_author_meta('twitter_handle')); ?></a><?php } ?>	
			<p class="author-bio"><?php echo get_the_author_meta('description'); ?></p>
			<ul class="author-social">
				<?php if(get_the_author_meta('user_url') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('user_url', $post->post_author)); ?>" class="url" target="_blank" title="<?php echo esc_attr(get_the_author_meta('user_url', $post->post_author)); ?>"><i class="fa fa-link"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('twitter') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('facebook') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('google-plus') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('google-plus')); ?>" target="_blank" class="google"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('dribbble') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('dribbble')); ?>" target="_blank" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('instagram') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('instagram')); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('github') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('github')); ?>" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('youtube') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('youtube')); ?>" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('pinterest') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('pinterest')); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('linkedin') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('skype') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('skype')); ?>" target="_blank" class="skype"><i class="fa fa-skype"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('tumblr') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('tumblr')); ?>" target="_blank" class="tumblr"><i class="fa fa-tumblr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('flickr') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('flickr')); ?>" target="_blank" class="flickr"><i class="fa fa-flickr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('reddit') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('reddit')); ?>" target="_blank" class="reddit"><i class="fa fa-reddit"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('stack-overflow') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('stack-overflow')); ?>" target="_blank" class="stack-overflow"><i class="fa fa-stack-overflow"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('twitch') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitch')); ?>" target="_blank" class="twitch"><i class="fa fa-twitch"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vine') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vine')); ?>" target="_blank" class="vine"><i class="fa fa-vine"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vk') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vk')); ?>" target="_blank" class="vk"><i class="fa fa-vk"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vimeo') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vimeo')); ?>" target="_blank" class="vimeo"><i class="fa fa-vimeo-square"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('weibo') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('weibo')); ?>" target="_blank" class="weibo"><i class="fa fa-weibo"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('soundcloud') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('soundcloud')); ?>" target="_blank" class="soundcloud"><i class="fa fa-soundcloud"></i></a></li>
				<?php } ?>
			</ul>
		</div>
	</header>

	<?php get_template_part('layouts/filter-bar-author'); ?>

	<?php get_template_part('layouts/postlist'); ?>

<?php get_footer(); ?>
