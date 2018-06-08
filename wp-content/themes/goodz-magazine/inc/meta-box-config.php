<?php
/**
 * Post metaboxes configuration
 *
 * @package  Goodz magazine
 */


$prefix     = 'goodz_magazine_';
$meta_boxes = array(
    array(
        'id'       => 'post_format_gallery',
        'title'    => __( 'Gallery Fields', 'goodz-magazine' ),
        'pages'    => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label' => __( 'Repeatable', 'goodz-magazine' ),
                'name'  => __( 'Gallery images', 'goodz-magazine' ),
                'desc'  => '',
                'id'    => $prefix . 'repeatable',
                'type'  => 'repeatable'
            )
        )
    ),
    array(
        'id'       => 'post_format_link',
        'title'    => __( 'Link', 'goodz-magazine' ),
        'pages'    => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name' => __( 'Link Text', 'goodz-magazine' ),
                'desc' => '',
                'id'   => $prefix . 'link_text',
                'type' => 'textarea',
                'std'  => '',
                'options' => array(
                    'rows' => '4',
                    'cols' => '12'
                )
            ),
            array(
                'name' => __( 'Link Url', 'goodz-magazine' ),
                'desc' => '',
                'id'   => $prefix . 'link_url',
                'type' => 'text',
                'std'  => ''
            )
        )
    ),
    array(
        'id'       => 'post_format_quote',
        'title'    => __( 'Quote Text', 'goodz-magazine' ),
        'pages'    => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name' => __( 'Quote Text', 'goodz-magazine' ),
                'desc' => '',
                'id'   => $prefix . 'quote',
                'type' => 'textarea',
                'std'  => '',
                'options' => array(
                    'rows' => '4',
                    'cols' => '12'
                )
            ),
            array(
                'name' => __( 'Quote Author', 'goodz-magazine' ),
                'desc' => '',
                'id'   => $prefix . 'quote_author',
                'type' => 'text',
                'std'  => ''
            )
        )
    ),
    array(
        'id'       => 'post_format_video',
        'title'    => __( 'Video Link', 'goodz-magazine' ),
        'pages'    => array( 'post', 'gallery', 'event' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name' => __( 'Video Link', 'goodz-magazine' ),
                'desc' => __( 'Paste your video link (e.g. http://www.youtube.com/watch?v=zMtKfSSGkIY or https://vimeo.com/64814911)', 'goodz-magazine' ),
                'id'   => $prefix . 'video_link',
                'type' => 'text',
                'std'  => '',
                'options' => array(
                    'rows' => '4',
                    'cols' => '12'
                )
            )
        )
    ),
    array(
        'id'       => 'post_format_audio',
        'title'    => __( 'Audio Options', 'goodz-magazine' ),
        'pages'    => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name' => __( 'Audio Link', 'goodz-magazine' ),
                'desc' => __( 'Paste your audio link or audio embed HTML code', 'goodz-magazine' ),
                'id'   => $prefix . 'audio_link',
                'type' => 'textarea',
                'std'  => '',
                'options' => array(
                    'rows' => '4',
                    'cols' => '12'
                )
            ),
        )
    ),

);
