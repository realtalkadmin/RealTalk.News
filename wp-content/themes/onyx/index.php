<?php

	/**
	 * INDEX TEMPLATE
	 */

	get_header();

?>

	<?php
		if(!get_theme_mod('blogcover_hide_frontpage', false)){
			if(onyx_get_page_layout() == "page-layout-single" || get_theme_mod('blogcover_basic', false)){
				get_template_part('layouts/cover-home-basic');
			}else{
				get_template_part('layouts/cover-home');
			}
		}
	?>
	
	<?php get_template_part('layouts/filter-bar-category'); ?>

	<?php get_template_part('layouts/postlist'); ?>

<?php get_footer(); ?>
