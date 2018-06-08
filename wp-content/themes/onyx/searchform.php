<?php 

	/**
	 * SEARCHFORM
	 */

?>

	<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" value="" name="s" class="query" placeholder="<?php esc_attr_e('Search the Blog...', 'onyx'); ?>">
		<i class="fa fa-search submit"></i>
	</form>
