<?php 

	/**
	 * FOOTER - SUBSCRIBE
	 */

	if(get_theme_mod('subscription_enabled', false)){

?>

	<section class="footer-subscribe">
		<div class="footer-subscribe-info">
			<h3><?php echo esc_html(get_theme_mod('subscription_title', "")); ?></h3>
			<p><?php echo esc_html(get_theme_mod('subscription_description', "")); ?></p>	
		</div>
		<div class="footer-subscribe-form">
			<?php echo get_theme_mod('subscription_embed_code', ""); ?>
		</div>
	</section>

<?php } ?>
