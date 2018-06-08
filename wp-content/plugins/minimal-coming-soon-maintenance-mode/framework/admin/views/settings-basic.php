<?php

/**
 * Basic settings view for the plugin
 *
 * @link       http://www.webfactoryltd.com
 * @since      1.0
 */

?>

<div class="signals-tile" id="basic">
	<div class="signals-tile-body">
		<div class="signals-tile-title"><?php _e( 'BASIC', 'signals' ); ?></div>
		<p><?php _e( 'Configure the core settings. Make sure you configure these options carefully as they are important for the proper functioning of the plugin.', 'signals' ); ?></p>

		<div class="signals-section-content">
			<div class="signals-double-group signals-clearfix">
				<div id="main-status" class="signals-form-group">
					<label for="signals_csmm_status" class="signals-strong"><?php _e( 'Enable Maintenance Mode?', 'signals' ); ?></label>
					<input type="checkbox" class="signals-form-ios" name="signals_csmm_status" id="signals_csmm_status" value="1"<?php checked( '1', $signals_csmm_options['status'] ); ?>>

					<p class="signals-form-help-block"><?php _e( 'Set the plugin status. Do you want to enable <strong>Maintenance Mode</strong> for your website?', 'signals' ); ?></p>
				</div>

        <div id="love-status" class="signals-form-group">
          <label for="signals_csmm_love" class="signals-strong"><?php _e( 'Show Some Love', 'signals' ); ?></label>
          <input type="checkbox" class="signals-form-ios" name="signals_csmm_love" id="signals_csmm_love" value="1"<?php checked( '1', $signals_csmm_options['love'] ); ?>>

          <p class="signals-form-help-block"><?php _e( 'Please help others learn about this free plugin by placing a small link in the footer. Thank you very much!', 'signals' ); ?></p>
        </div>
			</div>

      <div class="signals-double-group signals-clearfix">
        <div class="signals-form-group">
          <label for="signals_csmm_showlogged" class="signals-strong"><?php _e( 'Show normal website to logged in users?', 'signals' ); ?></label>
          <input id="signals_csmm_showlogged" type="checkbox" class="signals-form-ios" name="signals_csmm_showlogged" value="1"<?php checked( '1', $signals_csmm_options['show_logged_in'] ); ?>>

          <p class="signals-form-help-block"><?php _e( 'Enable this option if you want logged in users to view the website normally while visitors see the maintenance page.', 'signals' ); ?></p>
        </div>

        <div class="signals-form-group">
          <label for="signals_csmm_excludese" class="signals-strong"><?php _e( 'Exclude Search Engines?', 'signals' ); ?></label>
          <input type="checkbox" class="signals-form-ios" name="signals_csmm_excludese" id="signals_csmm_excludese" value="1"<?php checked( '1', $signals_csmm_options['exclude_se'] ); ?>>

          <p class="signals-form-help-block"><?php _e( 'Do you want to exclude search engines from viewing maintenance page? This will enable search engines to view your regular website and not the Maintenance Mode page even if the plugin is enabled.', 'signals' ); ?></p>
        </div>
      </div>

      <div class="signals-double-group signals-clearfix">
        <div class="signals-form-group">
          <label for="signals_csmm_title" class="signals-strong"><?php _e( 'Page Title', 'signals' ); ?></label>
          <input type="text" name="signals_csmm_title" id="signals_csmm_title" value="<?php echo esc_attr_e( stripslashes( $signals_csmm_options['title'] ) ); ?>" placeholder="<?php esc_attr_e( 'Please provide the Page Title', 'signals' ); ?>" class="signals-form-control">

          <p class="signals-form-help-block"><?php _e( 'Provide title for the maintenance page, for SEO.', 'signals' ); ?></p>
        </div>

        <div class="signals-form-group">
          <label for="signals_csmm_description" class="signals-strong"><?php _e( 'Page Description', 'signals' ); ?></label>
          <input type="text" name="signals_csmm_description" id="signals_csmm_description" value="<?php echo esc_attr_e( stripslashes( $signals_csmm_options['description'] ) ); ?>" placeholder="<?php esc_attr_e( 'Please provide the Page Description', 'signals' ); ?>" class="signals-form-control">

          <p class="signals-form-help-block"><?php _e( 'Provide description for the maintenance page, for SEO', 'signals' ); ?></p>
        </div>
      </div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_header" class="signals-strong"><?php _e( 'Header Text', 'signals' ); ?></label>
					<textarea name="signals_csmm_header" id="signals_csmm_header" rows="3" placeholder="<?php esc_attr_e( 'Header text for the maintenance page', 'signals' ); ?>"><?php echo esc_textarea( stripslashes( $signals_csmm_options['header_text'] ) ); ?></textarea>

					<p class="signals-form-help-block"><?php _e( 'Provide header text for the maintenance page. It is not recommended to leave this blank.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_secondary" class="signals-strong"><?php _e( 'Content', 'signals' ); ?></label>
					<textarea name="signals_csmm_secondary" id="signals_csmm_secondary" rows="3" placeholder="<?php esc_attr_e( 'Secondary text for the maintenance page', 'signals' ); ?>"><?php echo esc_textarea( stripslashes( $signals_csmm_options['secondary_text'] ) ); ?></textarea>

					<p class="signals-form-help-block"><?php _e( 'Main content. Allowed tags: &lt;P&gt;, &lt;A&gt;, &lt;B&gt;, &lt;I&gt;, &lt;BR&gt;. If you need more complex content and an WYSIWYG editor - check out the <a class="csmm-change-tab" href="#pro">PRO version</a>.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_antispam" class="signals-strong"><?php _e( 'Anti Spam Text', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_antispam" id="signals_csmm_antispam" value="<?php echo esc_attr_e( stripslashes( $signals_csmm_options['antispam_text'] ) ); ?>" placeholder="<?php esc_attr_e( 'Please provide a Anti-spam Text', 'signals' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php _e( 'Provide anti-spam text for the maintenance page.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_custom_login" class="signals-strong"><?php _e( 'Custom login URL', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_custom_login" id="signals_csmm_custom_login" value="<?php echo esc_attr_e( $signals_csmm_options['custom_login_url'] ); ?>" placeholder="<?php esc_attr_e( 'Custom login URL', 'signals' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php _e( 'In case you are using any plugin for custom login, provide your custom login URL over here. This plugin should be able to detect your custom login automatically in most of the situations. In case it fails to do so, you can provide the custom login URL over here.', 'signals' ); ?></p>
				</div>
			</div>

      <div class="signals-form-group signals-clearfix">
			<label class="signals-strong"><?php _e( 'Arrange Elements', 'signals' ); ?></label>
			<p class="signals-form-help-block"><?php _e( 'Select the order in which you would like to display the sections on the maintenance page. To change the order, simply drag the items and arrange as per your preference.', 'signals' ); ?></p>
			<?php
        $modules = array();
        $modules['logo'] = array('name' => 'Logo', 'link' => 'design');
        $modules['header'] = array('name' => 'Header', 'link' => 'signals_csmm_header');
        $modules['secondary'] = array('name' => 'Content', 'link' => 'signals_csmm_secondary');
        $modules['form'] = array('name' => 'Subscribe Form', 'link' => 'form');
        $modules['html'] = array('name' => 'Custom HTML', 'link' => 'advanced');
        $modules['video'] = array('name' => 'Video - PRO module', 'link' => 'design-video');
        $modules['countdown'] = array('name' => 'Countdown - PRO module', 'link' => 'design-countdown');
        $modules['progressbar'] = array('name' => 'Progress Bar - PRO module', 'link' => 'design-progress');
        $modules['social'] = array('name' => 'Social Icons - PRO module', 'link' => 'design-social');
        $modules['map'] = array('name' => 'Map - PRO module', 'link' => 'design-map');
        //$modules['contactform'] = array('name' => 'Contact Form', 'link' => 'design-contactform');
        $modules = apply_filters('csmm_modules_list', $modules);


        $active_modules = false;
        if (!empty($signals_csmm_options['arrange'])) {
          $active_modules = explode(',', $signals_csmm_options['arrange']);
        }
        if (!is_array($active_modules)) {
          $active_modules = array('logo', 'header', 'secondary', 'form', 'html');
        }
        $available_modules = array_diff(array_keys($modules), $active_modules);

        echo '<div class="arrange-wrapper" id="active-modules"><span class="arrange-label">Page Layout</span>';
        echo '<div class="browser-header"><div class="browser-button"></div><div class="browser-button"></div><div class="browser-button"></div><div class="browser-input"><span class="dashicons dashicons-update"></span></div></div>';
        echo '<ul id="arrange-items" class="csmm-layout-builder">';
        // active elements
        foreach ($active_modules as $module ) {
          echo '<li data-id="' . $module . '"><img src="' . CSMM_URL . '/framework/admin/img/sections/' . $module . '.png" title="Drag to rearrange the module on coming soon page"><div class="actions-center"><span class="module-name">' . $modules[$module]['name'] . '</span><a title="Edit module" href="#' . $modules[$module]['link'] . '" class="js-action csmm-change-tab" title="Edit module"><span class="dashicons dashicons-edit"></span></a></div></li>';
        }
        echo '</ul></div>';

        echo '<div class="arrange-wrapper" id="hidden-modules"><span class="arrange-label">Extra Modules <sup style="color: #fe2929;"> PRO</sup></span>';
        echo '<ul id="arrange-items2" class="csmm-layout-builder">';
        // available elements
        foreach ($available_modules as $module ) {
          echo '<li data-id="' . $module . '"><img src="' . CSMM_URL . '/framework/admin/img/sections/' . $module . '.png" title="Get PRO to activate additional modules"><div class="actions-center"><span class="module-name">' . $modules[$module]['name'] . '</span></div></li>';
        }
        echo '</ul></div>';
        ?>

        <input type="hidden" name="signals_csmm_arrange" id="signals_csmm_arrange" value="<?php echo esc_attr_e( $signals_csmm_options['arrange'] ); ?>">

</div>
      <div class="signals-double-group signals-clearfix">
			<div class="signals-form-group">
				<label for="signals_csmm_analytics" class="signals-strong"><?php _e( 'Analytics Code', 'signals' ); ?></label>
				<input name="signals_csmm_analytics" id="signals_csmm_analytics" placeholder="UA-123456-12" value="<?php echo csmm_convert_ga( stripslashes($signals_csmm_options['analytics'])); ?>">

				<p class="signals-form-help-block"><?php _e( 'Enter only the Google Analytics Profile ID, ie: UA-123456-99. You\'ll find it in the GA tracking code.', 'signals' ); ?></p>
      </div>
			</div>
		</div>
	</div>
</div><!-- #basic -->
