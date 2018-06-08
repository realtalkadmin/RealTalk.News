<?php

	/**
	 * FOOTER TEMPLATE
	 */

?>

	<?php get_template_part("layouts/page-utils"); ?>

	<?php get_template_part("layouts/overlay-search"); ?>
	<?php get_template_part("layouts/overlay-media"); ?>
	
	<footer class="page-footer">
		
		<?php get_template_part("layouts/footer-next-post"); ?>
		<?php get_template_part("layouts/footer-subscribe"); ?>
		<?php get_template_part("layouts/footer-widgets"); ?>
		<?php get_template_part("layouts/footer-copyright"); ?>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>
