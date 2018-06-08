<?php

	/**
	 * FOOTER - COPYRIGHT
	 */

?>

	<section class="footer-copyright">
		<div class="wrapper">
			<section class="footer-copyright-disclaimer">
				<p class="main">
					<?php if(!get_theme_mod('copyright_upper_html', false)){ ?>
					<?php esc_html_e('Copyright', 'onyx'); ?> &copy; <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. <?php echo date("Y"); ?> &bull; <?php esc_html_e('All rights reserved', 'onyx'); ?>.
					<?php }else{ echo get_theme_mod('copyright_upper_html', false); } ?>
				</p>
				<p class="alt">
					<?php if(!get_theme_mod('copyright_lower_html', false)){ ?>
					<span class="ecko"><a target="_blank" href="http://ecko.me/themes/wordpress/onyx/">Onyx WordPress Theme</a> by <a target="_blank" href="http://ecko.me">EckoThemes</a>.</span>
					<span class="wordpress"><?php esc_html_e('Published with', 'onyx'); ?> <a target="_blank" href="http://wordpress.org">WordPress</a>.</span>
					<?php }else{ echo get_theme_mod('copyright_lower_html', false); } ?>
				</p>
			</section>
			<ul class="footer-copyright-utils">
				<li><a href="#" class="show-search"><i class="fa fa-search"></i></a></li>
				<li><a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a></li>
			</ul>
		</div>
	</section>
