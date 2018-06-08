<?php
/**
 * TGM PLUGIN ACTIVATION
 *
 * Activates plugins needed by theme
 *
 * @package  Goodz magazine
 */

// Activate TGM Class
get_template_part( 'inc/apis/class-tgm-plugin-activation' );

if ( ! function_exists( 'goodz_magazine_register_slider_plugin' ) ) {
    function goodz_magazine_register_slider_plugin() {
        $plugins = array(
            array(
                'name'               => 'TK Social Share', // The plugin name
                'slug'               => 'tk-social-share', // The plugin slug (typically the folder name)
                'source'             => 'http://www.themeskingdom.com/public/tk-social-share.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => 'http://www.themeskingdom.com', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'TK Advertising Widget', // The plugin name
                'slug'               => 'tk-advertising-widget', // The plugin slug (typically the folder name)
                'source'             => 'http://www.themeskingdom.com/public/tk-advertising-widget.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => 'http://www.themeskingdom.com', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'TK Shortcodes', // The plugin name
                'slug'               => 'tk-shortcodes', // The plugin slug (typically the folder name)
                'source'             => 'http://www.themeskingdom.com/public/tk-shortcodes.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => 'http://www.themeskingdom.com', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'Goodz Magazine Widgets', // The plugin name
                'slug'               => 'goodz-widgets', // The plugin slug (typically the folder name)
                'source'             => 'http://www.themeskingdom.com/public/goodz-widgets.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => 'http://www.themeskingdom.com', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'Goodz Magazine Contact Form', // The plugin name
                'slug'               => 'goodz-contact-form', // The plugin slug (typically the folder name)
                'source'             => 'http://www.themeskingdom.com/public/goodz-contact-form.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => 'http://www.themeskingdom.com', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'Flickr Bagdes Widget', // The plugin name
                'slug'               => 'flickr-badges-widget', // The plugin slug (typically the folder name)
                'source'             => 'https://downloads.wordpress.org/plugin/flickr-badges-widget.1.2.8.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => 'Widget Visibility', // The plugin name
                'slug'               => 'widget-visibility', // The plugin slug (typically the folder name)
                'source'             => 'https://downloads.wordpress.org/plugin/widget-visibility.1.2.0.zip', // The plugin source
                'required'           => false, // If false, the plugin is onl    y 'recommended' instead of required
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '', // If set, overrides default API URL and points to an external URL
            )
        );

        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            /*
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
                'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
                'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
                'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
                'notice_can_install_required'     => _n_noop(
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_install_recommended'  => _n_noop(
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_install'           => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update'            => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update_maybe'      => _n_noop(
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_update'            => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_activate_required'    => _n_noop(
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_activate'          => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'theme-slug'
                ),
                'update_link'                     => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'theme-slug'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'theme-slug'
                ),
                'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
                'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
                'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
                'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
                'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
                'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),
                'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            ),
            */
        );
        tgmpa( $plugins, $config );
    } // function
    add_action( 'tgmpa_register', 'goodz_magazine_register_slider_plugin' );
} // if
