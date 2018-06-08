<?php

	/**
	 * ECKO ADMIN
	 */

	defined('ABSPATH') or die();

?>

	<div class="ecko_admin">
		<section class="ecko_tile ecko_tile_main">
			<div class="ecko_logo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/eckoframework/assets/img/ecko_logo.png" alt="EckoThemes"></div>
			<p>The <strong><?php echo ECKO_THEME_NAME; ?></strong> WordPress theme by EckoThemes is currently active. The theme version installed is <strong><?php echo ECKO_THEME_VERSION; ?></strong>. If this is the first time activating the theme we highly recommend reading the included documentation.</p>
			<div class="ecko_social">
				<p>Find us on...</p>
				<a href="http://themeforest.net/user/eckothemes" target="_blank" class="ecko_button ecko_button_social ecko_envato" target="_blank">Envato</a>
				<a href="http://twitter.com/EckoThemes" class="ecko_button ecko_button_social ecko_twitter" target="_blank">Twitter</a>
			</div>
		</section>
		<section class="ecko_tile ecko_tile_documentation">
			<h2><i class="fa fa-info"></i>Documentation</h2>
			<p>The included documentation provides all the information needed to get your theme installed, customized and any existing content optimized. We highly recommend reading this before using the theme; And if you require any assistance or have any questions we're available at support.</p>
			<a href="http://docs.ecko.me/<?php echo ECKO_THEME_ID; ?>wp" class="ecko_button" target="_blank"><?php echo esc_html(ECKO_THEME_NAME); ?> Documentation</a>
		</section>
		<section class="ecko_tile ecko_tile_plugins">
			<h2><i class="fa fa-plug"></i>Install Plugins</h2>
			<p>Enable the full theme functionality by installing the theme recommended plugins via the simple installation wizard. Information on each recommended plugin can be found in the included documentation. All plugins are optional. </p>
			<a href="<?php echo esc_url(admin_url('themes.php?page=tgmpa-install-plugins')); ?>" class="ecko_button <?php if(!isset($GLOBALS['tgmpa']->page_hook)) echo "disabled"; ?>" target="_blank">Begin Installation</a>
		</section>
		<section class="ecko_tile ecko_tile_customizer">
			<h2><i class="fa fa-cogs"></i>Customizer</h2>
			<p>The WordPress customizer is used to customize all the aspects of the theme including layouts, branding, colors and general options. More information on each of the available options can be found within the included documentation.</p>
			<a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="ecko_button" target="_blank">View Customizer</a>
		</section>
		<section class="ecko_tile ecko_tile_update">
			<h2><i class="fa fa-cloud-download"></i>One-Click Updates</h2>
			<p>Connect with your Envato Market account to receive update notifications and one-click updates directly within your WordPress dashboard. Changelogs for each theme update can be found within the item description on ThemeForest.</p>
			<a href="<?php echo esc_url(admin_url('admin.php?page=envato-market')); ?>" class="ecko_button <?php if(!is_plugin_active('envato-market/envato-market.php')) echo "disabled"; ?>" target="_blank">Configure Updates</a>
		</section>
		<section class="ecko_tile ecko_tile_support">
			<h2><i class="fa fa-support"></i>Support</h2>
			<p>Theme support is provided exclusively via our support site. If you have any theme issues, questions or suggestions please create a support ticket. We respond to all queries within one-business day; tickets submitted during the weekend may take upto 48 hours for a response.</p>
			<a href="http://support.ecko.me" class="ecko_button" target="_blank">View Support</a>
		</section>
	</div>
