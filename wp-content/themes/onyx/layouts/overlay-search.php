<?php

	/**
	 * OVERLAY - SEARCH
	 */

?>

	<section class="page-overlay page-overlay-search">
		<div class="page-overlay-content">
			<div class="page-overlay-close"><i class="fa fa-close"></i></div>
			<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
				<input type="text" value="" name="s" class="query" placeholder="<?php esc_attr_e('Search the Blog...', 'onyx'); ?>" autocomplete="off">
				<i class="fa fa-chevron-right search-submit"></i>
			</form>
		</div>
	</section>
