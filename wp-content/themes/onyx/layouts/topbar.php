<?php

	/**
	 * TOP BAR
	 */

?>

	<section class="top-bar top-bar-overlay <?php if(get_theme_mod('topbar_sticky', false)) echo "top-bar-sticky"; ?>">
		<div class="wrapper">
			<div class="top-bar-logo">
				<?php if(get_theme_mod('topbar_logo') != ""){ ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" itemprop="headline"><img src="<?php echo esc_url(get_theme_mod('topbar_logo')); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
				<?php }elseif(get_theme_mod('general_blog_light_image') != ""){ ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" itemprop="headline"><img src="<?php echo esc_url(get_theme_mod('general_blog_light_image')); ?>" class="retina" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
				<?php }else{ ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" itemprop="headline"><?php esc_html(bloginfo('name')); ?></a>
				<?php } ?>
			</div>
			<nav class="navigation-responsive">
				<i class="show-nav fa fa-navicon"></i>
				<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
			</nav>
			<nav class="navigation-main">
				<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
			</nav>
		</div>
	</section>
