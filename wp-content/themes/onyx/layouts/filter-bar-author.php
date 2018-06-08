<?php

	/**
	 * FILTER BAR - AUTHOR
	 */

	$onyx_author_list = onyx_get_popular_authors();

?>

	<section class="filter-bar filter-bar-categories">
		<div class="wrapper">
			<ul class="filter-bar-options">
				<li class="title"><?php esc_attr_e('Authors', 'onyx'); ?></li>
				<li <?php if(!is_author()){ echo('class="active"'); }; ?>><a href="<?php echo esc_url(home_url('/')); ?>"  class="filter-all"  data-category-color=""><?php esc_attr_e('All', 'onyx'); ?></a></li>
				<?php
					foreach($onyx_author_list as $author){
						if(count_user_posts($author->ID) > 0){
				?>
				<li <?php if(is_author($author->ID)){ echo('class="active"'); }; ?>><a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo esc_html($author->display_name); ?></a></li>
				<?php
						}
					}
				?>
			</ul>
			<a class="filter-bar-search show-search" href="#"><i class="fa fa-search"></i></a>
		</div>
	</section>
