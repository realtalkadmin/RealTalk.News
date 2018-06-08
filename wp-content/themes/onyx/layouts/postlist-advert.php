<?php 

	/**
	 * POSTLIST - ADVERT
	 */
	
	if(get_theme_mod('adverts_enable', false)){

?>

	<div class="post-list-advert inner">
		<div class="advrt">
			<?php echo get_theme_mod('adverts_ad_code', ''); ?>
		</div>
	</div>

<?php } ?>
