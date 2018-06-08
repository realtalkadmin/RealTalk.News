<?php
/**
 * goodz-magazine Theme Customizer.
 *
 * @package Goodz Magazine
 */

/**
 * Load Customizer Specific functions
 */
get_template_part( 'inc/customizer', 'functions' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function goodz_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_section( 'logo_section', array(
        'title'    => __( 'Logo Settings', 'goodz-magazine' ),
        'priority' => 120,
    ) );

    $wp_customize->add_section( 'layout_section', array(
        'title'    => __( 'Layout Settings', 'goodz-magazine' ),
        'priority' => 121,
    ) );

    $wp_customize->add_section( 'header_section', array(
        'title'    => __( 'Header Settings', 'goodz-magazine' ),
        'priority' => 122,
    ) );

    $wp_customize->add_section( 'featured_slider_settings', array(
        'title'    => __( 'Featured Slider', 'goodz-magazine' ),
        'priority' => 123,
    ) );

    // Layout Section
    $wp_customize->add_section( 'footer_section', array(
        'title'    => esc_html__( 'Footer Settings', 'goodz' ),
        'priority' => 124
    ) );

    /**
     * SETTINGS
     */

    // COLORS

    // Headings color
    $wp_customize->add_setting( 'goodz_magazine_heading_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_heading_color',
        array(
            'label'    => __( 'Headings Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_heading_color',
        ) )
    );

    // Navigation color
    $wp_customize->add_setting( 'goodz_magazine_navigation_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_navigation_color',
        array(
            'label'    => __( 'Navigation Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_navigation_color',
        ) )
    );

    // Header color
    $wp_customize->add_setting( 'goodz_magazine_bg_header_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_bg_header_color',
        array(
            'label'    => __( 'Header Bg Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_bg_header_color',
        ) )
    );

    // Paragraph color
    $wp_customize->add_setting( 'goodz_magazine_paragraph_color', array(
        'default'           => '#838383',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_paragraph_color',
        array(
            'label'    => __( 'Paragraph / Text Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_paragraph_color',
        ) )
    );

    // Link color
    $wp_customize->add_setting( 'goodz_magazine_link_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_link_color',
        array(
            'label'    => __( 'Link Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_link_color',
        ) )
    );

    // Logo color
    $wp_customize->add_setting( 'goodz_magazine_logo_color', array(
        'default'           => '#000',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_logo_color',
        array(
            'label'    => __( 'Logo Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_logo_color',
        ) )
    );

    // Footer color
    $wp_customize->add_setting( 'goodz_magazine_footer_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'goodz_magazine_sanitize_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'goodz_magazine_footer_color',
        array(
            'label'    => __( 'Footer Bg Color', 'goodz-magazine' ),
            'section'  => 'colors',
            'settings' => 'goodz_magazine_footer_color',
        ) )
    );



    // LOGO

    // Register the setting for logo
    $wp_customize->add_setting( 'goodz_magazine_logo_setting', array(
        'sanitize_callback' => 'goodz_magazine_sanitize_image',
    ));

    // Add the control for logo
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'goodz_magazine_logo',
                array(
                    'label'    => __( 'Upload Logo', 'goodz_magazine' ),
                    'section'  => 'logo_section',
                    'settings' => 'goodz_magazine_logo_setting',
                )
        )
    );

    // Register the setting for Retina logo
    $wp_customize->add_setting( 'goodz_magazine_retina_logo_setting', array(
        'sanitize_callback' => 'goodz_magazine_sanitize_image',
    ));

    // Add the control for Retina logo
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'goodz_magazine_retina_logo',
                array(
                    'label'       => __( 'Upload Retina Logo', 'goodz_magazine' ),
                    'section'     => 'logo_section',
                    'description' => __( 'Upload double size image for retina displays. JPEG, GIF or PNG image, recommended up to 500KB', 'goodz_magazine' ),
                    'settings'    => 'goodz_magazine_retina_logo_setting'
                )
        )
    );

    // Enable Featured Slider
    $wp_customize->add_setting( 'featured_slider_enable', array(
        'default'           => 0,
        'sanitize_callback' => 'goodz_magazine_sanitize_select'
    ) );

    $wp_customize->add_control( 'featured_slider_enable', array(
        'settings'    => 'featured_slider_enable',
        'label'       => __( 'Check to enable Featured Slider', 'goodz-magazine' ),
        'section'     => 'featured_slider_settings',
        'type'        => 'checkbox',
        'std'         => 0
    ) );

    // Select Featured Slider Category
    $wp_customize->add_setting( 'featured_category_select', array(
        'default'           => 'default',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ) );

    $wp_customize->add_control( 'featured_category_select', array(
        'settings'    => 'featured_category_select',
        'description' => __( 'Select featured slider posts category', 'goodz-magazine' ),
        'label'       => __( 'Select Category', 'goodz-magazine' ),
        'section'     => 'featured_slider_settings',
        'type'        => 'select',
        'choices'     => goodz_magazine_get_categories_select()
    ) );

    // Select Featured Slider Category
    $wp_customize->add_setting( 'featured_category_exclude', array(
        'default'           => 1,
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ) );

    $wp_customize->add_control( 'featured_category_exclude', array(
        'settings' => 'featured_category_exclude',
        'label'    => __( 'Exclude this category from post listings', 'goodz-magazine' ),
        'section'  => 'featured_slider_settings',
        'type'     => 'checkbox'
    ) );

    // Featured slider width
    $wp_customize->add_setting( 'featured_slider_width', array(
        'default'           => 'default',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ) );

    $wp_customize->add_control( 'featured_slider_width', array(
        'settings'    => 'featured_slider_width',
        'description' => __( 'Display fullwidth slider display', 'goodz-magazine' ),
        'label'       => __( 'Enable fullwidth', 'goodz-magazine' ),
        'section'     => 'featured_slider_settings',
        'type'        => 'checkbox'
    ) );

    // Select Number of posts to display in slider
    $wp_customize->add_setting( 'featured_posts_number', array(
        'default'           => 6,
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ) );

    $wp_customize->add_control( 'featured_posts_number', array(
        'settings'    => 'featured_posts_number',
        'description' => __( 'Select number of posts to display in slider', 'goodz-magazine' ),
        'label'       => __( 'Select Posts Number', 'goodz-magazine' ),
        'section'     => 'featured_slider_settings',
        'type'        => 'select',
        'choices'     => goodz_magazine_number_of_slides()
    ) );

    // Global layout
    $wp_customize->add_setting( 'archive_layout_setting', array(
        'default'           => 'boxed',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ));

    $wp_customize->add_control( 'archive_layout_setting', array(
        'label'    => __( 'Choose Archive Pages Layout', 'goodz-magazine' ),
        'priority' => 0,
        'section'  => 'layout_section',
        'type'     => 'select',
        'choices'  => array(
            'boxed'     => __( 'Boxed', 'goodz-magazine' ),
            'fullwidth' => __( 'Full width', 'goodz-magazine' )
        ),
    ) );

    // Two Columns Layout
    $wp_customize->add_setting( 'two_columns_layout_setting', array(
        'default'           => 0,
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ) );

    $wp_customize->add_control( 'two_columns_layout_setting', array(
        'settings'    => 'two_columns_layout_setting',
        'description' => __( 'Choose two columns layout instead of default for archives', 'goodz-magazine' ),
        'label'       => __( 'Display Posts in Two Columns layout', 'goodz-magazine' ),
        'priority'    => 0,
        'section'     => 'layout_section',
        'type'        => 'checkbox'
    ) );

    // Single Layout
    $wp_customize->add_setting( 'single_layout_setting', array(
        'default'           => 'boxed',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ));

    $wp_customize->add_control( 'single_layout_setting', array(
        'label'    => __( 'Choose Single Page / Post', 'goodz-magazine' ),
        'priority' => 0,
        'section'  => 'layout_section',
        'type'     => 'select',
        'choices'  => array(
            'boxed'     => __( 'Boxed', 'goodz-magazine' ),
            'fullwidth' => __( 'Full width', 'goodz-magazine' )
        ),
    ) );

    // Paging Settings
    $wp_customize->add_setting( 'paging_setting', array(
        'default'           => 'infinite_scroll',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ));

    $wp_customize->add_control( 'paging_setting', array(
        'label'    => __( 'Choose Archive Paging Type', 'goodz-magazine' ),
        'priority' => 0,
        'section'  => 'layout_section',
        'type'     => 'select',
        'choices'  => array(
            'infinite_scroll' => __( 'Infinite Post Load', 'goodz-magazine' ),
            'standard_paging' => __( 'Standard Paging', 'goodz-magazine' )
        ),
    ) );

    // Infinite Scroll Settings
    $wp_customize->add_setting( 'infinite_scroll_type', array(
        'default'           => 'scroll',
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ));

    $wp_customize->add_control( 'infinite_scroll_type', array(
        'label'    => __( 'Choose infinite load type', 'goodz-magazine' ),
        'priority' => 0,
        'section'  => 'layout_section',
        'type'     => 'select',
        'choices'  => array(
            'scroll' => __( 'On scroll', 'goodz-magazine' ),
            'click'  => __( 'On click', 'goodz-magazine' )
        ),
    ) );

    // Sticky header
    $wp_customize->add_setting( 'sticky_header_setting', array(
        'default'           => 1,
        'sanitize_callback' => 'goodz_magazine_sanitize_select',
    ));

    $wp_customize->add_control( 'sticky_header_setting', array(
        'label'    => __( 'Enable Sticky Header', 'goodz-magazine' ),
        'priority' => 0,
        'section'  => 'header_section',
        'type'     => 'checkbox'
    ) );

    // Footer Copyright text
    $wp_customize->add_setting( 'goodz_footer_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'goodz_magazine_sanitize_text',
    ) );

    $wp_customize->add_control( 'goodz_footer_copyright', array(
        'label'       => esc_html__( 'Footer Copyright Text', 'goodz' ),
        'section'     => 'footer_section',
        'priority'    => 0,
        'settings'    => 'goodz_footer_copyright',
        'type'        => 'textarea'
    ) );

}
add_action( 'customize_register', 'goodz_magazine_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function goodz_magazine_customize_preview_js() {
	wp_enqueue_script( 'goodz_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'goodz_magazine_customize_preview_js' );

/**
 * Load Customizer Sanitization functions
 */
get_template_part( 'inc/customizer', 'sanitize' );
