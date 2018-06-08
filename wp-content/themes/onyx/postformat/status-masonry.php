<?php

	/**
	 * POST FORMAT - STATUS (MASONRY)
	 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-info">
			<div class="post-contents">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
