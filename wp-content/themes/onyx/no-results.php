<?php

	/**
	 * NO-RESULTS TEMPLATE
	 */

?>

	<section class="post-list">

		<?php if(is_search()){ ?>
			<nav class="pagination pagination-noresults">
				<span class="pagination-button"><i class="fa fa-close"></i><?php esc_html_e('No Result', 'onyx'); ?>: <?php esc_html_e('Please try another search query.', 'onyx'); ?></span>
			</nav>
		<?php }else{ ?>
			<nav class="pagination pagination-noresults">
				<span class="pagination-button"><i class="fa fa-close"></i><?php esc_html_e('No Result', 'onyx'); ?>: <?php esc_html_e('Please try another query.', 'onyx'); ?></span>
			</nav>
		<?php } ?>

	</section>
