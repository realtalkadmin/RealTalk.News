<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Goodz Magazine
 */

function goodz_magazine_is_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation is posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'goodz-magazine' ); ?></h2>
		<div id="infinite-handle" class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( 'Load More', 'goodz-magazine' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Displays posts navigation on bottom of single post page
 */
function goodz_magazine_posts_navigation() {
	$navigation    = '';

	$previous_links_text = '<i class="icon-arrow"></i>' . esc_html__( 'Older posts', 'goodz-magazine' );
	$next_links_text     = '<i class="icon-arrow"></i>' . esc_html__( 'Newer posts', 'goodz-magazine' );
	$previous_link       = get_next_posts_link( $previous_links_text );
	$next_link           = get_previous_posts_link( $next_links_text  );

	$navigation .= $previous_link . '' . $next_link;

	echo _navigation_markup( $navigation );
}

/**
 * Displays posts navigation on bottom of single post page
 */
function goodz_magazine_post_navigation() {
	$navigation    = '';
	$previous_link = get_previous_post();
	$next_link     = get_next_post();

	// Only add markup if there's somewhere to navigate to.
	if ( $previous_link ) {
		$navigation .= '<a href="' . get_permalink( $previous_link ) . '" class="nav-previous"><i class="icon-arrow"></i><span>' . __( 'Previous post', 'goodz-magazine' ) . '</span>' . $previous_link->post_title . '</a>';
	}
	if ( $next_link ) {
		$navigation .= '<a href="' . get_permalink( $next_link ) . '" class="nav-next"><i class="icon-arrow"></i><span>' . __( 'Next post', 'goodz-magazine' ) . '</span>' . $next_link->post_title . '</a>';
	}

	return _navigation_markup( $navigation );
}


if ( ! function_exists( 'goodz_magazine_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function goodz_magazine_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( goodz_magazine_is_front_template() ) {
		the_category( ', ' );

		$posted_on = sprintf(
			esc_html_x( '%s%s', 'post date', 'goodz-magazine' ),
			'<span class="month">' . get_the_date( 'M' ) . '</span>',
			'<span class="day">' . get_the_date( 'd' ) . '</span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>';
	}
	else {

		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'goodz-magazine' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'goodz-magazine' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Comments', 'goodz-magazine' ), esc_html__( '1 Comment', 'goodz-magazine' ), esc_html__( '% Comments', 'goodz-magazine' ) );
		echo '</span>';
	}

	if ( is_single() ) {
		edit_post_link( esc_html__( 'Edit', 'goodz-magazine' ), '<span class="edit-link">', '</span>' );
	}

}
endif;

if ( ! function_exists( 'goodz_magazine_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function goodz_magazine_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html( '&nbsp;' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'goodz-magazine' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

}
endif;

if ( ! function_exists( 'goodz_magazine_entry_header' ) ) :
/**
 * Prints Categories above title
 */
function goodz_magazine_entry_header() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'goodz-magazine' ) );

	if ( 'link' == get_post_format() ) {
		printf( '<span class="cat-links">%1$s%2$s</span>', esc_html__( 'Link', 'goodz-magazine' ), edit_post_link( esc_html__( 'Edit', 'goodz-magazine' ), '<span class="edit-link">', '</span>' ) );
	}
	elseif ( 'quote' == get_post_format() ) {
		printf( '<span class="cat-links">%1$s%2$s</span>', esc_html__( 'Quote', 'goodz-magazine' ), edit_post_link( esc_html__( 'Edit', 'goodz-magazine' ), '<span class="edit-link">', '</span>' ) );
	}
	else {
		if ( $categories_list && goodz_magazine_categorized_blog() ) {
			printf( '<span class="cat-links">%1$s%2$s</span>', $categories_list, edit_post_link( esc_html__( 'Edit', 'goodz-magazine' ), '<span class="edit-link">', '</span>' ) ); // WPCS: XSS OK.
		}
	}

}
endif;

/**
 * Display the archive title based on the queried object.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function goodz_magazine_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span>' . single_tag_title( '', false ) . '</span>' );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span>' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'goodz-magazine' ) ) . '</span>' );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span>' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'goodz-magazine' ) ) . '</span>' );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), '<span>' . get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'goodz-magazine' ) ) . '</span>' );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'goodz-magazine' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'goodz-magazine' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( '%s', 'goodz-magazine' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: <span>%2$s</span>', 'goodz-magazine' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'goodz-magazine' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		printf( $before . $title . $after );  // WPCS: XSS OK.
	}
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function goodz_magazine_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'goodz_magazine_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'goodz_magazine_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so goodz_magazine_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so goodz_magazine_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in goodz_magazine_categorized_blog.
 */
function goodz_magazine_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'goodz_magazine_categories' );
}
add_action( 'edit_category', 'goodz_magazine_category_transient_flusher' );
add_action( 'save_post',     'goodz_magazine_category_transient_flusher' );

/**
 * Featured Posts Slider display
 */

function goodz_magazine_featured_posts_slider() {

	// Get Featured Slider settings
	$featured_slider       = get_theme_mod( 'featured_slider_enable', 0 );
	$featured_category     = get_theme_mod( 'featured_category_select', 'default' );
	$featured_posts_number = get_theme_mod( 'featured_posts_number', 6 );

	if ( ! $featured_slider ) :
		return;
	else : ?>

		<!-- Featured slider -->
		<div class="featured-slider-wrap">
			<div class="featured-slider">

				<?php

					if ( 'default' != $featured_category ) {
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => $featured_posts_number,
							'category_name'  => $featured_category
						);
					}
					else {
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => $featured_posts_number
						);
					}

					$featured_posts = new WP_Query( $args );

					if ( $featured_posts->have_posts() ) :

						while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
							get_template_part( 'templates/contents/content', 'slider' );
						endwhile;

					endif;

					wp_reset_postdata();

				?>

			</div><!-- .featured-slider -->
		</div>
		<div class="slider-preloader">
			<div class="preloader-content">
				<?php

					$logo = get_theme_mod( 'goodz_magazine_logo_setting' );

					if ( $logo ) :
						printf( '<img src="%s" />', esc_url( $logo ) );
					else :
						printf( '<p>%s</p>', esc_html__( 'Loading', 'goodz-magazine' ) );
					endif;

				?>
			</div>
		</div>

	<?php

	endif;

}


/**
 * Get latest posts for slider if no category selected
 * @return array of post ids
 */
function goodz_magazine_get_latest_posts() {
	$featured_posts_number = get_theme_mod( 'featured_posts_number', 6 );

	$args = array(
			'posts_per_page' => $featured_posts_number
		);

	$slider_posts      = get_posts( $args );
	$posts_not_display = array();

	foreach ( $slider_posts as $post ) :
		$posts_not_display[] = $post->ID;
	endforeach;

	return $posts_not_display;
}

/**
 * Exclude Category from Blog if slider and category enabled
 *
 * Alters main query to get wanted results
 */
function goodz_magazine_exclude_category_from_blog( $query ) {

	// Get Featured Slider settings
	$featured_slider           = get_theme_mod( 'featured_slider_enable', 0 );
	$featured_category         = get_theme_mod( 'featured_category_select', 'default' );
	$featured_category_exclude = get_theme_mod( 'featured_category_exclude', 1 );

	if ( $featured_slider && $featured_category_exclude ) :

		if ( $query->is_main_query() && $query->is_home() ) {

			if ( 'default' != $featured_category ) {
				$category_exclude    = get_category_by_slug( $featured_category );
				$category_exclude_id = $category_exclude->term_id;

				$query->set( 'category__not_in', array( $category_exclude_id ) );
			}
			else {
				$posts_not_display = goodz_magazine_get_latest_posts();
				$query->set( 'post__not_in', $posts_not_display );
			}

		}

	endif;

	if ( $query->is_main_query() && $query->is_home() ) {
        //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        if ( $query->is_paged() ) {
        	$query->set( 'ignore_sticky_posts', 1 );
        }
    }

}
add_action( 'pre_get_posts', 'goodz_magazine_exclude_category_from_blog' );

/**
 * Displays post featured image
 */
function goodz_magazine_featured_image( $thumb_size = 'goodz-magazine-archive-featured-image' ) {

	if ( has_post_thumbnail() ) :

		if ( is_single() && 'goodz-magazine-related-post' != $thumb_size ) { ?>

			<figure class="featured-image">
				<?php the_post_thumbnail( 'goodz-magazine-single-featured-image' ); ?>
			</figure>

		<?php } else { ?>

			<?php

				if ( is_sticky() ) {
					$thumb_size = 'goodz-magazine-sticky-featured-image';
				}

			?>

			<figure class="featured-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>
			</figure>

		<?php }

	else :

		return;

	endif;

}

/**
 * Displays post featured image
 */
function goodz_magazine_featured_media() {

	if ( 'gallery' == get_post_format() ) :

		$gallery_images = get_post_meta( get_the_ID(), 'goodz_magazine_repeatable', true );

        if ( $gallery_images ) { ?>

            <div class="entry-gallery">

            	<div class="gallery gallery-size-full">
	            	<?php foreach( $gallery_images as $gallery_image ) : ?>
	            		<img src="<?php echo esc_url( $gallery_image ); ?> " />
	            	<?php endforeach; ?>
            	</div>

            </div><!-- .entry-gallery -->

			<?php if ( is_single() ) : ?>

	            <div class="slider-preloader">
					<div class="preloader-content">

						<?php

							$logo = get_theme_mod( 'goodz_magazine_logo_setting' );

							if ( $logo ) :
								printf( '<img src="%s" />', esc_url( $logo ) );
							else :
								printf( '<p>%s</p>', esc_html__( 'Loading', 'goodz-magazine' ) );
							endif;

						?>

					</div>
				</div>

			<?php endif; ?>

		<?php } else {

			goodz_magazine_featured_image();

		}

	elseif ( 'video' == get_post_format() ) :

		$video_link = get_post_meta( get_the_ID(), 'goodz_magazine_video_link', true );

        if ( $video_link ) {

			$video_image = goodz_magazine_get_video_image( $video_link, get_the_ID(), 2 );

		?>
            <div class="entry-video">

                <?php if ( !is_single() && isset( $video_image ) ) : ?>

					<figure class="featured-image video-image">
						<a href="<?php echo esc_url( $video_link ); ?>" class="fancybox">
							<?php echo sprintf( $video_image ); ?>
						</a>
					</figure>

				<?php else : ?>

					<figure class="featured-image scalable-wrapper">
						<?php echo goodz_magazine_video_player( $video_link ); ?>
					</figure>

				<?php endif; ?>

            </div><!-- .entry-video -->

        <?php } else {

            goodz_magazine_featured_image();

        }

	else :

		goodz_magazine_featured_image();

	endif;

}

/**
 * Generates video player for user content post meta
 */

function goodz_magazine_video_player( $url ) {

    if ( !empty( $url ) ) {

		$key_str1    = 'youtube';
		$key_str2    = 'vimeo';
		$pos_youtube = strpos( $url, $key_str1 );
		$pos_vimeo   = strpos( $url, $key_str2 );

        if ( !empty( $pos_youtube ) ) {
            $url = str_replace( 'watch?v=', '', $url );
            $url = explode( '&', $url );
            $url = $url[0];
            $protocol = substr( $url, 0, 5 );

            if ( $protocol == "http:" ) {
                $url = str_replace( 'http://www.youtube.com/', '', $url );
            }
            if ( $protocol == "https" ) {
                $url = str_replace( 'https://www.youtube.com/', '', $url );
            }

        	$iframe_video = '<iframe id="youtube-player" class="scalable-element" src="http://www.youtube.com/embed/' . $url . '?enablejsapi=1&rel=0" frameborder="0" allowfullscreen></iframe>';

        }
        elseif ( ! empty( $pos_vimeo ) ) {
            $urlParts = explode( "/", parse_url( $url, PHP_URL_PATH ) );
            $videoId  = (int) $urlParts[count($urlParts)-1 ];
            $iframe_video = '<iframe class="vimeo-video scalable-element" src="http://player.vimeo.com/video/' . $videoId . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        }
        else {
            $iframe_video = __( 'Video only allowes vimeo and youtube!', 'goodz-magazine' );
        }

        return $iframe_video;
    }
}

/**
 * Dispalys Author Box under single post content
 *
 * @since  goodz-magazine 1.0
 */
function goodz_magazine_author_box() {

?>

	<section class="author-box">
		<figure class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 75 ); ?>
		</figure>
		<div class="author-info">
			<h6 class="author-name"><?php the_author(); ?></h6>
			<p><?php echo get_the_author_meta( 'description' ); ?></p>
		</div>
	</section>

<?php
}

if ( ! function_exists( 'goodz_magazine_related_posts' ) ) :
	/**
	 * Displays related posts on single post page
	 */
	function goodz_magazine_related_posts() {

		$post_id        = get_the_ID();
		$posts_per_page = 3;
		$categories     = get_the_terms( $post_id, 'category' );
		$cats           = array();

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$cats[] = $category->term_id;
			}
			$cats = implode( ',', $cats );

			$args = array(
				'cat'            => $cats,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $posts_per_page,
				'post__not_in'   => array( $post_id )
			);

			//Get related posts
			$related_query = new WP_Query( $args );

			// Related posts Loop
			if ( $related_query->have_posts() ) : ?>

				<div id="jp-relatedposts" class="jp-relatedposts">

					<?php printf( '<h3 class="jp-relatedposts-headline">%s</h3>', esc_html__( 'Related Articles', 'goodz_magazine' ) ); ?>

					<div class="jp-relatedposts-items jp-relatedposts-items-visual">

						<?php

							while( $related_query->have_posts() ) : $related_query->the_post();

								get_template_part( 'templates/contents/content', 'related' );

							endwhile;

							wp_reset_postdata();

						?>

					</div>
					<!-- .jp-relatedposts-items -->

				</div>
				<!-- .jp-relatedposts -->

				<?php
			endif;

		}
		else {
			return;
		}
	}

endif;

