<?php

	/**
	 * POST FORMAT - STATUS
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-info">
			<div class="post-contents">
				<?php the_content('', false, ''); ?>
			</div>
			<div class="clear"></div>
		</div>
	</article>
