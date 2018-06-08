<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Goodz Magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function goodz_magazine_body_classes( $classes ) {
	// Get global layout setting
	$global_layout = get_theme_mod( 'archive_layout_setting', 'boxed' );
	$single_layout = get_theme_mod( 'single_layout_setting', 'boxed' );
	$sticky_header = get_theme_mod( 'sticky_header_setting', 0 );
	$slider_width  = get_theme_mod( 'featured_slider_width', 0 );
    $slider_enable = get_theme_mod( 'featured_slider_enable', 0 );

	if ( is_single() ) {
		$classes[] = $single_layout . '-single';
	}
	else {
		if ( ! is_page() ) {
			$classes[] = $global_layout . '-blog';
		}
	}

	if ( 'yes' == $sticky_header ) {
		$classes[] = 'sticky-header';
	}

	if ( is_home() ) {
        if ( $slider_enable && 'yes' == $slider_width ) {
			$classes[] = 'featured-slider-fullwidth';
		}
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'goodz_magazine_body_classes' );

/**
 * Filter content column classes
 *
 * @since goodz magazine 1.0
 */
function goodz_magazine_content_cols() {

	// Primary container classes
	$cols = 'col-lg-12';

	// Get global layout setting
	$global_layout = get_theme_mod( 'archive_layout_setting', 'boxed' );

	if ( is_active_sidebar( 'sidebar-1' ) ) {

		if ( 'boxed' == $global_layout ) {
			$cols = 'col-md-9 has-sidebar';
		}
		else {
			$cols = 'col-lg-10 col-md-9 has-sidebar';
		}
	}

	if ( is_single() ) {
		// Container classes relevant to sidebar
		$cols = 'no-sidebar';

		if ( is_active_sidebar( 'sidebar-1' ) ) {
		    $cols = 'has-sidebar';
		}
	}

	echo esc_attr( $cols );
}

/**
 * Filter sidebar column classes
 *
 * @since goodz magazine 1.0
 */
function goodz_magazine_sidebar_cols() {

	// Get global layout setting
	$global_layout = get_theme_mod( 'archive_layout_setting', 'boxed' );

	if ( is_archive() || is_home() || is_search() ) {

		if ( 'boxed' == $global_layout ) {
			$cols = 'col-md-3';
		}
		else {
			$cols = 'col-lg-2 col-md-3';
		}
	}

	else {
		$cols = 'col-md-3';
	}

	echo esc_attr( $cols );
}

/**
 * Filter post_class() additional classes
 *
 * @since goodz magazine 1.0
 */
function goodz_magazine_post_classes( $classes, $class, $post_id ) {
	// Get global layout setting
	$global_layout     = get_theme_mod( 'archive_layout_setting', 'boxed' );
	$two_column_layout = get_theme_mod( 'two_columns_layout_setting', 0 );

	if ( ! is_single() ) :

		// If global layout is set to boxed
		if ( 'boxed' == $global_layout ) {
		    if ( is_sticky() ) {
		    	if ( $two_column_layout ) {
		    		$classes[] = 'col-sm-6';
		    	}
		    	else {
		    		if ( is_active_sidebar( 'sidebar-1' ) ) {
		    			$classes[] = 'col-sm-12';
		    		}
		    		else {
		    			$classes[] = 'col-lg-8 col-sm-12';
		    		}
		    	}
			}
			else {
				if ( $two_column_layout ) {
					$classes[] = 'col-sm-6';
				}
				else {
					if ( is_active_sidebar( 'sidebar-1' ) ) {
						$classes[] = 'col-sm-6';
					}
					else {
						$classes[] = 'col-lg-4 col-sm-6';
					}
				}
			}
		}
		else {
			if ( is_sticky() ) {
				if ( $two_column_layout ) {
					$classes[] = 'col-sm-6';
				}
				else {
					if ( is_active_sidebar( 'sidebar-1' ) ) {
						$classes[] = 'col-lg-8 col-sm-12';
					}
					else {
						$classes[] = 'col-lg-6 col-sm-12';
					}
				}
			}
			else {
				if ( $two_column_layout ) {
					$classes[] = 'col-sm-6';
				}
				else {
					if ( is_active_sidebar( 'sidebar-1' ) ) {
						$classes[] = 'col-lg-4 col-sm-6';
					}
					else {
						$classes[] = 'col-lg-3 col-sm-6';
					}
				}
			}
		}

	endif;

	return $classes;

}
add_filter( 'post_class', 'goodz_magazine_post_classes', 10, 3 );

/**
 * If is Front Page Template
 *
 * @since  goodz magazine 1.0
 */
function goodz_magazine_is_front_template() {
	return is_page_template( 'templates/template-front-page.php' );
}

/**
 * Filter search results not to display pages
 * @param  [type] $query [description]
 * @return [type]        [description]
 */
function goodz_magazine_search_filter( $query ) {

    if ( $query->is_search ) {
        $query->set( 'post_type', 'post' );
    }
    return $query;

}
add_filter( 'pre_get_posts', 'goodz_magazine_search_filter' );

/**
 * Remove Related posts from content
 *
 * @since  goodz magazine 1.0
 */
function goodz_magazine_remove_related_posts() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp     = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
	    remove_filter( 'the_content', $callback, 40 );
	}
	else {
		return;
	}
}
add_filter( 'wp', 'goodz_magazine_remove_related_posts', 20 );

/**
 * Rename Realted Posts Headline
 *
 * @since  goodz magazine 1.0
 */
function goodz_magazine_related_posts_headline( $headline ) {
	$headline = sprintf( '<h3 class="jp-relatedposts-headline"><em>%s</em></h3>', esc_html__( 'Related articles', 'goodz-magazine' ) );
	return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'goodz_magazine_related_posts_headline' );

/**
 * Widget tag cloud font size update
 *
 * @since  goodz magazine 1.0
 */
function goodz_magazine_widget_tag_cloud_args( $args ) {-
	$args['largest']  = 14;
	$args['smallest'] = 14;
	$args['unit']     = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'goodz_magazine_widget_tag_cloud_args' );

/**
 * Check for embed content in post and extract
 *
 * @since goodz magazine 1.0
 */
function goodz_magazine_get_embed_media() {
    $content = get_the_content();
    $embeds  = get_media_embedded_in_content( $content );

    if ( !empty( $embeds ) ) {
        //check what is the first embed containg video tag, youtube or vimeo
        foreach( $embeds as $embed ) {
            if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
                return $embed;
            }
        }
    } else {
        //No video embedded found
        return false;
    }
}

/**
 * Filter content for gallery post format
 *
 * @since  goodz-magazine 1.0
 */
function goodz_magazine_filter_post_content( $content ) {

if ( 'video' == get_post_format() && 'post' == get_post_type() ) {
    $video_content = goodz_magazine_get_embed_media();
    if ( $video_content ) {
        $content = str_replace( $video_content, '', $content );
    }
}

if ( 'gallery' == get_post_format() && 'post' == get_post_type() ) {
    $regex   = '/\[gallery.*]/';
    $content = preg_replace( $regex, '', $content, 1 );
}

return $content;
}
add_filter( 'the_content', 'goodz_magazine_filter_post_content' );

/**
 * Add Read More to post excerpt
 *
 * @since  goodz-magazine 1.0
 */
function goodz_magazine_excerpt_more( $excerpt ) {
	return $excerpt .' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . esc_html__( 'Read more', 'goodz-magazine' ) . '</a>';
}
add_filter( 'the_excerpt', 'goodz_magazine_excerpt_more' );

/**
 * Send Mail Contact Form
 */

function goodz_magazine_send_contact_email() {

    $nonce   = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
        die ( __( 'You are not alowed to do this!', 'goodz-magazine' ) );
    }

    // Get our variables and data
    $captcha_option   = get_theme_mod( 'goodz_magazine_contact_captcha_setting' );
    $name             = $_POST['sender_name'];
    $email            = $_POST['sender_email'];
    $message          = $_POST['sender_message'];
    $message_info     = $_POST['message_info'];
    $validation_error = false;

    // Validation
    if ( strlen( $name ) < 2 ) {
        _e( 'Please enter your name!', 'goodz-magazine' );
        $validation_error = true;
        die();
    }
    elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        _e( 'Please enter your email!', 'goodz-magazine' );
        $validation_error = true;
        die();
    }
    elseif ( strlen( $message ) < 2  ) {
        _e( 'Please enter your message!', 'goodz-magazine' );
        $validation_error = true;
        die();
    }
    elseif ( $captcha_option ) {
        // Start our session
        session_start();

        $captcha = $_POST['sender_captcha'];
        if ( empty( $_SESSION['captcha'] ) || strtolower( trim( $captcha ) ) != $_SESSION['captcha'] ) {
            _e( 'Invalid text from image!', 'goodz-magazine' );
            $validation_error = true;
            die();
        }
    }
    else {
        $validation_error = false;
    }

    if ( ! $validation_error ) {

        $to = get_theme_mod( 'goodz_magazine_contact_mail_address' );

        if ( '' == $to ) {
            $to = get_option( 'admin_email' );
        }

        $subject = __( 'Message from ', 'goodz-magazine' ) . get_bloginfo( 'name' );

        $headers  = "From: $name <$name>\n";
        $headers  .= "Reply-To: $subject <$name>\n";
        $sitename = get_bloginfo( 'name' );

        $body = __( 'You received e-mail from ', 'goodz-magazine' ) . $name . '  [' . $email . '] ' . __( ' using ', 'goodz-magazine' ) . $sitename . "\n\n\n";
        $body .= __( 'The message:', 'goodz-magazine' ) . "\n\n" . $message;

        $send = wp_mail( $to, $subject, $body, $headers );

        if ( $send ) {
            echo esc_html( $message_info );
        }
        else {
            _e( 'Message not sent!', 'goodz-magazine' );
        }
    }

    die();
}
add_action( 'wp_ajax_nopriv_send_contact_email', 'goodz_magazine_send_contact_email' );
add_action( 'wp_ajax_send_contact_email', 'goodz_magazine_send_contact_email' );

/**
 * Extract image from video
 */
function goodz_magazine_get_video_image( $url, $post_ID, $img_quality ) {

    require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
    require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
    require_once( ABSPATH . "wp-admin" . '/includes/media.php' );

    if ( !empty( $url ) ) {
        $key_str1    = 'youtube';
        $key_str2    = 'vimeo';
        $pos_youtube = strpos( $url, $key_str1 );
        $pos_vimeo   = strpos( $url, $key_str2 );

        if ( !empty( $pos_youtube ) ) {
            $url      = str_replace( 'watch?v=', '', $url );
            $url      = explode( '&', $url );
            $url      = $url[0];
            $protocol = substr( $url, 0, 5 );

            if ( $protocol == "http:" ) {
                $url      = str_replace( 'http://www.youtube.com/', '', $url );
                $protocol_new = "http://";
            }
            if ( $protocol == "https" ) {
                $url      = str_replace( 'https://www.youtube.com/', '', $url );
                $protocol_new = "https://";
            }

            if ( empty( $img_quality ) ) {
                $img_quality = 2;
            }

            $video_image_url = $protocol_new . 'img.youtube.com/vi/'. $url . '/hqdefault.jpg';

            if ( !has_post_thumbnail( $post_ID ) ) {
                $url = $video_image_url;
                $tmp = download_url( $url );

                if( is_wp_error( $tmp ) ){
                    // download failed, handle error
                }

                $post_id    = $post_ID;
                $desc       = get_the_title();
                $file_array = array();

                // Set variables for storage
                // fix file filename for query strings
                preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );
                $file_array['name']     = basename( $matches[0] );
                $file_array['tmp_name'] = $tmp;

                // If error storing temporarily, unlink
                if ( is_wp_error( $tmp ) ) {
                    @unlink( $file_array['tmp_name'] );
                    $file_array['tmp_name'] = '';
                }

                // do the validation and storage stuff
                $id = media_handle_sideload( $file_array, $post_id, $desc );

                // If error storing permanently, unlink
                if ( is_wp_error( $id ) ) {
                    @unlink( $file_array['tmp_name'] );
                    return $id;
                }

                set_post_thumbnail( $post_ID, $id );

            }

            $video_image = get_the_post_thumbnail( $post_ID, 'goodz-magazine-video-featured-image' );

        }
        elseif ( !empty( $pos_vimeo ) ) {

            $urlParts = explode( "/", parse_url( $url, PHP_URL_PATH ) );
            $videoId  = (int) $urlParts[count($urlParts)-1 ];
            $data     = wp_remote_get( "http://vimeo.com/api/v2/video/" . $videoId . ".json" );

            if ( !is_wp_error( $data ) && is_array( $data ) ) {
                $data  = wp_remote_get( "http://vimeo.com/api/v2/video/" . $videoId . ".json" );
                $data  = json_decode( wp_remote_retrieve_body( $data ), true );
                $image = $data[0]['thumbnail_large'];

                if ( !has_post_thumbnail( $post_ID ) ) {
                    $url = $image;
                    $tmp = download_url( $url );

                    if( is_wp_error( $tmp ) ){
                        // download failed, handle error
                    }

                    $post_id    = $post_ID;
                    $desc       = get_the_title();
                    $file_array = array();

                    // Set variables for storage
                    // fix file filename for query strings
                    preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );
                    $file_array['name']     = basename( $matches[0] );
                    $file_array['tmp_name'] = $tmp;

                    // If error storing temporarily, unlink
                    if ( is_wp_error( $tmp ) ) {
                        @unlink( $file_array['tmp_name'] );
                        $file_array['tmp_name'] = '';
                    }

                    // do the validation and storage stuff
                    $id = media_handle_sideload( $file_array, $post_id, $desc );

                    // If error storing permanently, unlink
                    if ( is_wp_error( $id ) ) {
                        @unlink( $file_array['tmp_name'] );
                        return $id;
                    }

                    set_post_thumbnail( $post_ID, $id );

                }

                $video_image = get_the_post_thumbnail( $post_ID, 'goodz-magazine-video-featured-image' );

            }
        }
        else {

            $video_image = __( 'Video only allowes vimeo and youtube!', 'goodz-magazine' );
        }

        return $video_image;
    }
}

/**
 * Retina Detection and variable set
 *
 * @since Goodz Magazine 1.0
 */
function goodz_magazine_is_retina() {
    global $is_retina;
    $is_retina = isset( $_COOKIE["device_pixel_ratio"] ) AND $_COOKIE["device_pixel_ratio"] >= 2;
}
add_action( 'init', 'goodz_magazine_is_retina' );

/**
 * Remove website vrom comment form
 *
 * @since Goodz Magazine 1.0
 */
function goodz_magazine_disable_comment_url( $fields ) {
    unset( $fields['url'] );
    return $fields;
}
add_filter( 'comment_form_default_fields', 'goodz_magazine_disable_comment_url' );

/**
 * Set maximum width of images for responsive images feature
 *
 * @since Goodz Magazine 1.0
 */
function goodz_m_max_srcset_image_width( $max_width, $size_array ) {
    $width = $size_array[0];

    if ( $width > 800 ) {
        $max_width = 2048;
    }

    return $max_width;
}
add_filter( 'max_srcset_image_width', 'goodz_m_max_srcset_image_width', 10, 2 );

/**
 * Add responsive container to embeds
 */
function goodz_embed_html( $html ) {
    return '<figure class="scalable-wrapper">' . $html . '</figure>';
}
add_filter( 'embed_oembed_html', 'goodz_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'goodz_embed_html' ); // Jetpack
