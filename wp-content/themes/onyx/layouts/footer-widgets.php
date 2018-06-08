<?php

	/**
	 * FOOTER - WIDGETS
	 */

	$onyx_blog_logo = onyx_get_footer_blog_image();

?>

	<section class="footer-widgets">
		<div class="wrapper">

			<div class="footer-widgets-static">
				<section class="widget blog_info">
					<?php if($onyx_blog_logo){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($onyx_blog_logo); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
					<?php }else{ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="blog-name"><?php esc_html(bloginfo('name')); ?></a>
					<?php } ?>
					<hr>
					<p><?php echo esc_html(get_theme_mod('general_blog_description')); ?></p>
				</section>
				<nav class="social">
					<ul>
						<?php if(get_theme_mod('social_twitter') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" class="twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_dribbble') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_dribbble')); ?>" target="_blank" class="dribbble" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_facebook') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" class="facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_google') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_google')); ?>" target="_blank" class="google" title="Google+"><i class="fa fa-google"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_tumblr') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_tumblr')); ?>" target="_blank" class="tumblr" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_youtube') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank" class="youtube" title="YouTube"><i class="fa fa-youtube"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_instagram') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" class="instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_linkedin') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" class="linkedin" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_github') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_github')); ?>" target="_blank" class="github" title="GitHub"><i class="fa fa-github"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_pinterest') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_pinterest')); ?>" target="_blank" class="pinterest" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_flickr') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_flickr')); ?>" target="_blank" class="flickr" title="Flickr"><i class="fa fa-flickr"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_reddit') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_reddit')); ?>" target="_blank" class="reddit" title="Reddit"><i class="fa fa-reddit"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_stackoverflow') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_stackoverflow')); ?>" target="_blank" class="stackoverflow" title="StackOverflow"><i class="fa fa-stack-overflow"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_twitch') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_twitch')); ?>" target="_blank" class="twitch" title="Twitch"><i class="fa fa-twitch"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_vine') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_vine')); ?>" target="_blank" class="vine" title="Vine"><i class="fa fa-vine"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_vk') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_vk')); ?>" target="_blank" class="vk" title="VK"><i class="fa fa-vk"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_vimeo') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_vimeo')); ?>" target="_blank" class="vimeo" title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_weibo') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_weibo')); ?>" target="_blank" class="weibo" title="Weibo"><i class="fa fa-weibo"></i></a></li>
						<?php } ?>
						<?php if(get_theme_mod('social_soundcloud') != ""){ ?>
							<li><a href="<?php echo esc_url(get_theme_mod('social_soundcloud')); ?>" target="_blank" class="soundcloud" title="Soundcloud"><i class="fa fa-soundcloud"></i></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>

			<div class="footer-widgets-custom">
				<?php
					if(is_active_sidebar('footer')){
						dynamic_sidebar('footer');
					}else{
						onyx_get_default_footer_widgets();
					}
				?>
			</div>

		</div>
	</section>
