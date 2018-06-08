<?php

	/**
	 * FILTER BAR - CATEGORY
	 */

	$onyx_category_list = onyx_get_popular_categories();

?>

	<section class="filter-bar filter-bar-categories">
		<div class="wrapper">
			<ul class="filter-bar-options">
				<li class="title"><?php esc_attr_e('Categories', 'onyx'); ?></li>
				<li <?php if(!is_category()){ echo('class="active"'); }; ?>><a href="<?php echo esc_url(home_url('/')); ?>" class="filter-all" data-category-color=""><?php esc_attr_e('All', 'onyx'); ?></a></li>
				<?php foreach($onyx_category_list as $category){ ?>
				<li <?php if(is_category($category->cat_ID)){ echo('class="active"'); }; ?>><a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>" data-category-color="#<?php echo esc_attr(get_option('category_meta_' . $category->term_id . '_color')); ?>"><?php echo esc_html($category->name); ?></a></li>
				<?php } ?>
			</ul>
			<a class="filter-bar-search show-search" href="#"><i class="fa fa-search"></i></a>
		</div>
	</section>
