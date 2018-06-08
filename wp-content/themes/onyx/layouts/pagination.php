<?php

	/**
	 * PAGINATION
	 */

	$onyx_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if($wp_query->max_num_pages > 1){

?>

	<?php if($wp_query->max_num_pages == $onyx_paged){ ?>
		<nav class="pagination pagination-noresults">
			<span class="pagination-button"><i class="fa fa-close"></i><?php esc_html_e('No More Articles', 'onyx'); ?></span>
		</nav>
	<?php }else{ ?>
		<nav class="pagination pagination-ajax">
			<a href="#" class="pagination-load-more"><?php esc_html_e('Load More', 'onyx'); ?></a>
			<span class="pagination-current-page"><?php esc_html_e('Page', 'onyx'); ?> <span class="pagination-active-page"><?php echo esc_html($onyx_paged); ?></span> <?php esc_html_e('of', 'onyx'); ?> <?php echo esc_html($wp_query->max_num_pages); ?></span>
		</nav>
	<?php } ?>

	<nav class="pagination pagination-standard">
		<?php previous_posts_link('<span class="sub"><i class="fa fa-chevron-left"></i></span><span class="main">' . esc_html__('Newer Posts', 'onyx') . '</span>'); ?>
		<?php ecko_paging_nav(); ?>
		<?php next_posts_link('<span class="main">' . esc_html__('Older Posts', 'onyx') . '</span><span class="sub"><i class="fa fa-chevron-right"></i></span>'); ?>
	</nav>

<?php }elseif(!is_404()){ ?>

	<nav class="pagination pagination-noresults">
		<span class="pagination-button"><i class="fa fa-close"></i><?php esc_html_e('No More Articles', 'onyx'); ?></span>
	</nav>

<?php } ?>
