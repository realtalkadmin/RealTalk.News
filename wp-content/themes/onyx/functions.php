<?php

	/**
	 *
	 * 	ONYX THEME
	 *
	 * 	@author EckoThemes <support@ecko.me>
	 * 	@version 1.7.0
	 * 	@link http://ecko.me
	 *
	 */


	/*-----------------------------------------------------------------------------------*/
	/* CONFIGURATION
	/*-----------------------------------------------------------------------------------*/

	/*
	 *	THEME INFO
	 */
	define('ECKO_THEME', true);
	define('ECKO_THEME_ID', 'onyx');
	define('ECKO_THEME_NAME', 'Onyx');
	define('ECKO_THEME_VERSION', '1.7.0');
	define('ECKO_THEME_WIDTH', '860');
	define('ECKO_DATE_FORMAT', 'jS M \'y');
	define('ECKO_DEMO', false);

	/*
	 *	TYPOGRAPHY
	 */
	DEFINE('ECKO_FONT_BODY_FAMILY', "Noto Sans");
	DEFINE('ECKO_FONT_BODY_WEIGHT', "400,700");
	DEFINE('ECKO_FONT_BODY_SELECTOR', "body, html, h6, p, .widget .rssSummary, .widget li, .widget.latestposts .meta, textarea, .footer-widgets .widget.navigation li");
	DEFINE('ECKO_FONT_HEADER_FAMILY', "Montserrat");
	DEFINE('ECKO_FONT_HEADER_WEIGHT', "400,700");
	DEFINE('ECKO_FONT_HEADER_SELECTOR', "h1, h2, h3, h4, h5, input, body.author .author-twitter, .comments-body .comments-nocomments, .comments-body .logged-in-as, .comment .comment-meta, .comment-respond #cancel-comment-reply-link, .comment-respond .submit, .cover-blog-posts .cover-post .post-category, .cover-blog-posts .cover-post .post-read-more, .cover-article-count, .filter-bar-options, .footer-post-next span, .footer-widgets .footer-widgets-static .blog-name, .footer-post-next span, nav.navigation-main ul a, nav.navigation-main ul span, nav.navigation-responsive ul a, nav.navigation-responsive ul span, .overlay-post-info .post-read-more, .pagination, .post-body .post-category, .post-body .post-meta, .post-footer .post-tags a, .post-footer .post-share .post-share-title, .post-related .post-related-post span, .post-related .post-related-post .post-category, .post-related .post-related-post .post-title, .post-related .post-related-post .post-read-more, .post-contents blockquote p, .postcontents blockquote p, .page-contents.post-list-masonry .post .post-external-link, .page-contents.post-list-masonry .post .post-category, .page-contents.post-list-masonry .post .post-meta, .page-contents.post-list-masonry .post.format-quote .post-quote blockquote p, .page-contents.post-list-standard .post .post-external-link, .page-contents.post-list-standard .post .post-date, .page-contents.post-list-standard .post .post-category, .page-contents.post-list-standard .post .post-meta, .page-contents.post-list-standard .post.format-quote .post-quote blockquote p, .top-bar .top-bar-logo, .widget li span.count, .widget.authorprofile .meta .title, .widget.authorprofile .meta .twittertag , .widget.authorprofile .meta h3, .widget .tagcloud a, .widget.twitter .author, .widget.twitter .date, .widget.socialshare .sharebutton, .widget.latestposts h5, .widget.relatedposts .category, .widget.randomposts .category, .widget.navigation li, #wp-calendar, .post-show-comments, .post-contents q, .postcontents q");

	/*
	 *	WIDGETS
	 */
	define('ECKO_WIDGET_ADVERTISMENT', true);
	define('ECKO_WIDGET_AUTHOR_PROFILE', true);
	define('ECKO_WIDGET_BLOG_INFO', true);
	define('ECKO_WIDGET_LATEST_POSTS', true);
	define('ECKO_WIDGET_NAVIGATION', true);
	define('ECKO_WIDGET_RANDOM_POSTS', true);
	define('ECKO_WIDGET_RELATED_POSTS', true);
	define('ECKO_WIDGET_SHARE', true);
	define('ECKO_WIDGET_SOCIAL_AUTHOR', true);
	define('ECKO_WIDGET_SOCIAL_BLOG', true);
	define('ECKO_WIDGET_SUBSCRIBE', true);
	define('ECKO_WIDGET_TWITTER', true);


	/*-----------------------------------------------------------------------------------*/
	/* FRAMEWORK
	/*-----------------------------------------------------------------------------------*/

	require_once get_template_directory() . '/inc/eckoframework/eckoframework.php';


	/*-----------------------------------------------------------------------------------*/
	/* POST LIKES
	/*-----------------------------------------------------------------------------------*/

	require_once get_template_directory() . '/inc/post-like/post-like.php';


	/*-----------------------------------------------------------------------------------*/
	/* THEME SETUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_theme_setup')){
		function onyx_theme_setup(){
			add_theme_support('post-formats', array('status', 'aside', 'image', 'video', 'audio', 'gallery', 'quote', 'link'));
			register_nav_menus(
				array(
					'primary' => esc_attr__('Primary Menu', 'onyx')
				)
			);
		}
	}
	add_action('after_setup_theme', 'onyx_theme_setup');


	/*-----------------------------------------------------------------------------------*/
	/* ENQUE FONTS, STYLES AND SCRIPTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_load_scripts')){
		function onyx_load_scripts(){
			if(!is_admin()){
				// JAVASCRIPT VARS
				wp_localize_script('ecko_js', 'ecko_theme_vars', array(
					'general_hidecomments' => esc_js(get_theme_mod('general_hidecomments', 'false')),
					'general_disable_syntax_highlighter' => esc_js(get_theme_mod('general_disable_syntax_highlighter', 'false')),
					'pagination_enable_ajax' => esc_js(get_theme_mod('pagination_enable_ajax', 'false')),
					'topbar_sticky' => esc_js(get_theme_mod('topbar_sticky', 'false')),
					'localization_no_more_posts' => esc_js(esc_html__('No More Articles', 'onyx')),
					'localization_fetching_posts' => esc_js(esc_html__('Fetching Articles', 'onyx')),
					'localization_load_more' => esc_js(esc_html__('Load More', 'onyx')),
					'localization_email_address' => esc_js(esc_html__('Email Address', 'onyx')),
					'localization_view_comments' => esc_js(esc_html__('View Comments', 'onyx'))
				));
			}
		}
	}
	add_action('wp_enqueue_scripts', 'onyx_load_scripts');


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER THEME RECOMMENDED PLUGINS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_register_plugins')){
		function onyx_register_plugins(){
			$ecko_plugins = ecko_default_plugins();
			array_push($ecko_plugins, array(
				'name' => 'Categories Images',
				'slug' => 'categories-images',
				'required' => false,
			));
			tgmpa($ecko_plugins);
		}
	}
	add_action('tgmpa_register', 'onyx_register_plugins');


	/*-----------------------------------------------------------------------------------*/
	/* THEME LIVE DEMO SWITCHER
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_theme_demo_switch')){
		function onyx_theme_demo_switch(){
			if(!is_admin() && isset($_GET['layout'])){
				switch($_GET['layout']){
					case "standard":
						$_COOKIE['layout'] = "page-layout-standard";
						setcookie('layout', 'page-layout-standard', time() + 3600 * 24, COOKIEPATH, COOKIE_DOMAIN, false);
						break;
					case "masonry":
						$_COOKIE['layout'] = "page-layout-masonry";
						setcookie('layout', 'page-layout-masonry', time() + 3600 * 24, COOKIEPATH, COOKIE_DOMAIN, false);
						break;
					case "single":
						$_COOKIE['layout'] = "page-layout-single";
						setcookie('layout', 'page-layout-single', time() + 3600 * 24, COOKIEPATH, COOKIE_DOMAIN, false);
						break;
				}
			}
		}
	}
	if(ECKO_DEMO){
		add_action('init', 'onyx_theme_demo_switch');
	}


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER SIDEBARS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_widgets_init')){
		function onyx_widgets_init(){
			register_sidebar(array(
				'name' => esc_attr__('Footer (Max 3. Widgets)', 'onyx'),
				'id' => 'footer',
				'description' => esc_attr__('Appears in footer on all pages. Maximum of 3 widgets supported.', 'onyx'),
				'before_widget' => '<section class="widget">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><hr>'
			));
		}
	}
	add_action('widgets_init', 'onyx_widgets_init');


	/*-----------------------------------------------------------------------------------*/
	/* POST META BOX SETTINGS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_option_meta_onyx_setup')){
		function onyx_option_meta_onyx_setup(){
			add_action('add_meta_boxes', 'onyx_add_option_boxes');
			add_action('save_post', 'onyx_save_option_meta', 10, 2);
		}
	}
	add_action('load-post.php', 'onyx_option_meta_onyx_setup');
	add_action('load-post-new.php', 'onyx_option_meta_onyx_setup');

	if(!function_exists('onyx_add_option_boxes')){
		function onyx_add_option_boxes(){
			add_meta_box(
				'onyx-post-options',
				esc_html__('Theme Post Options', 'onyx'),
				'onyx_options_meta_box',
				'post',
				'side',
				'core'
			);
			add_meta_box(
				'onyx-page-options',
				esc_html__('Theme Page Options', 'onyx'),
				'onyx_options_meta_box',
				'page',
				'side',
				'core'
			);
		}
	}

	if(!function_exists('onyx_options_meta_box')){
		function onyx_options_meta_box($object, $box){
			global $post;
			wp_nonce_field(basename(__FILE__), 'onyx_post_feature');
			wp_nonce_field(basename(__FILE__), 'onyx_post_image_background');
			wp_nonce_field(basename(__FILE__), 'onyx_page_layout');

			$onyx_post_feature_meta = get_post_meta($post->ID, 'onyx_post_feature', true);
			$onyx_post_image_background = get_post_meta($post->ID, 'onyx_post_image_background', true);
			$onyx_page_layout_meta = get_post_meta($post->ID, 'onyx_page_layout', true)

		?>
			<p>
				<strong><?php esc_html_e("Page Layout", 'onyx'); ?></strong><br>
				<p class="howto"><?php esc_html_e("Configure the page layout of the individual post/custom page.", 'onyx'); ?></p>
				<input type="radio" id="pagelayout-theme" name="onyx_page_layout" value="pagelayout-theme" <?php if(!in_array($onyx_page_layout_meta, array('pagelayout-single', 'pagelayout-sidebar',  'pagelayout-sidebar-left'))){ echo 'checked'; } ?>>
				<label for="pagelayout-default"><?php esc_html_e("Default", 'onyx'); ?></label><br>
				<input type="radio" id="pagelayout-sidebar" name="onyx_page_layout" value="pagelayout-sidebar" <?php checked($onyx_page_layout_meta, 'pagelayout-sidebar'); ?>>
				<label for="pagelayout-sidebar"><?php esc_html_e("Sidebar", 'onyx'); ?></label><br>
				<input type="radio" id="pagelayout-sidebar-left" name="onyx_page_layout" value="pagelayout-sidebar-left" <?php checked($onyx_page_layout_meta, 'pagelayout-sidebar-left'); ?>>
				<label for="pagelayout-sidebar-left"><?php esc_html_e("Sidebar (Left)", 'onyx'); ?></label><br>
				<input type="radio" id="pagelayout-single" name="onyx_page_layout" value="pagelayout-single" <?php checked($onyx_page_layout_meta, 'pagelayout-single'); ?>>
				<label for="pagelayout-single"><?php esc_html_e("Single Column", 'onyx'); ?></label><br>
			</p>
			<hr>
			<p>
				<strong><?php esc_html_e('Post Feature', 'onyx'); ?></strong><br>
				<p class="howto"><?php esc_html_e('Configure if this post is shown on the front-page cover.', 'onyx'); ?></p>
				<label>
					<input type="checkbox" name="onyx_post_feature" id="onyx_post_feature" value="yes" <?php checked($onyx_post_feature_meta, 'yes'); ?> />
					<?php esc_html_e('Enable Post Feature', 'onyx'); ?>
				</label>
			</p>
			<hr>
			<p>
				<strong><?php esc_html_e('Post Background Image Style', 'onyx'); ?></strong><br>
				<p class="howto"><?php esc_html_e('Configure if this post uses the alternative background image post style within the post-list. This option is only supported for \'Standard\' format posts.', 'onyx'); ?></p>
				<label>
					<input type="checkbox" name="onyx_post_image_background" id="onyx_post_image_background" value="yes" <?php checked($onyx_post_image_background, 'yes'); ?> />
					<?php esc_html_e('Enable Post Background Image Style', 'onyx'); ?>
				</label>
			</p>
			<hr>
			<p class="howto"><?php esc_html_e('More information on these post/page options can be found within the theme documentation under \'Post Formatting\'.', 'onyx'); ?></p>

		<?php

		}
	}

	if(!function_exists('onyx_save_option_meta')){
		function onyx_save_option_meta($post_id, $post){
			$is_autosave = wp_is_post_autosave($post_id);
			$is_revision = wp_is_post_revision($post_id);

			$onyx_post_feature_meta = (isset($_POST['onyx_post_feature']) && wp_verify_nonce($_POST['onyx_post_feature'], basename(__FILE__))) ? 'true' : 'false';
			$onyx_post_image_background = (isset($_POST['onyx_post_image_background']) && wp_verify_nonce($_POST['onyx_post_image_background'], basename(__FILE__))) ? 'true' : 'false';
			$onyx_page_layout_meta = (isset($_POST['onyx_page_layout_meta']) && wp_verify_nonce($_POST['onyx_page_layout_meta'], basename(__FILE__))) ? 'true' : 'false';

			if($is_autosave || $is_revision && !$onyx_post_feature_meta && !$onyx_post_image_background && !$onyx_page_layout_meta){
				return;
			}
			if(isset($_POST['onyx_post_feature'])){
				update_post_meta($post_id, 'onyx_post_feature', sanitize_text_field($_POST['onyx_post_feature']));
			}
			if(isset($_POST['onyx_post_image_background'])){
				update_post_meta($post_id, 'onyx_post_image_background', sanitize_text_field($_POST['onyx_post_image_background']));
			}
			if(isset($_POST['onyx_page_layout'])){
				update_post_meta($post_id, 'onyx_page_layout', sanitize_text_field($_POST['onyx_page_layout']));
			}

		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* PAGINATION
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_posts_link_left_attributes')){
		function onyx_posts_link_left_attributes(){
			return 'class="pagination-button pagination-older"';
		}
	}
	add_filter('next_posts_link_attributes', 'onyx_posts_link_left_attributes');

	if(!function_exists('onyx_posts_link_right_attributes')){
		function onyx_posts_link_right_attributes(){
			return 'class="pagination-button pagination-newer"';
		}
	}
	add_filter('previous_posts_link_attributes', 'onyx_posts_link_right_attributes');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM BODY CLASS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_custom_body_class')){
		function onyx_custom_body_class($classes){
			array_push($classes, get_theme_mod('layout_color_scheme', 'light-theme'));
			if(is_single() || is_page()){
				global $post;
				switch(get_post_meta($post->ID, 'onyx_page_layout', true)){
					case "pagelayout-sidebar":
						array_push($classes, 'page-layout-standard');
						break;
					case "pagelayout-sidebar-left":
						array_push($classes, 'page-layout-standard-left');
						break;
					case "pagelayout-single":
						array_push($classes, 'page-layout-single');
						break;
					default:
						if(get_theme_mod('postpage_default_layout', onyx_get_page_layout()) !== "page-layout-default"){
							array_push($classes, get_theme_mod('postpage_default_layout', onyx_get_page_layout()));
						}else{
							array_push($classes, onyx_get_page_layout());
						}
						break;
				}
				if(!has_post_thumbnail($post->ID)){
					array_push($classes, 'post-basic-layout');
				}
			}else{
				array_push($classes, onyx_get_page_layout());
			}
			if(is_home() && !have_posts()){
				array_push($classes, 'no-result');
			}
			if(is_home() && get_theme_mod('blogcover_hide_frontpage', false)){
				array_push($classes, 'frontpage-no-cover');
			}
			if(is_home() && get_theme_mod('blogcover_basic', false)){
				array_push($classes, 'frontpage-cover-basic');
			}
			return $classes;
		}
	}
	add_filter('body_class', 'onyx_custom_body_class');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM POST CLASS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_post_class')){
		function onyx_post_class($classes){
			global $post;
			return $classes;
		}
	}
	add_filter('post_class', 'onyx_post_class');


	/*-----------------------------------------------------------------------------------*/
	/* DEFAULT WIDGETS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_default_widget_options')){
		function onyx_get_default_widget_options(){
			return array(
				'before_widget' => '<section class="widget">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><hr>'
			);
		}
	}

	if(!function_exists('onyx_get_default_post_widgets')){
		function onyx_get_default_post_widgets(){
			if(class_exists('ecko_widget_blog_info')){ the_widget('ecko_widget_blog_info', array()); }
			if(class_exists('ecko_widget_author_profile')){ the_widget('ecko_widget_author_profile', array()); }
			if(class_exists('ecko_widget_latest_posts')){ the_widget('ecko_widget_latest_posts', array('title' => esc_html__('Latest Articles', 'onyx'), 'postcount' => 5)); }
			if(class_exists('ecko_widget_random_posts')){ the_widget('ecko_widget_random_posts', array('title' => '', 'postcount' => 3)); }
			the_widget('WP_Widget_Categories', 'count=true', onyx_get_default_widget_options());
			the_widget('WP_Widget_Archives', '', onyx_get_default_widget_options());
		}
	}

	if(!function_exists('onyx_get_default_page_widgets')){
		function onyx_get_default_page_widgets(){
			if(class_exists('ecko_widget_blog_info')){ the_widget('ecko_widget_blog_info', array()); }
			if(class_exists('ecko_widget_latest_posts')){ the_widget('ecko_widget_latest_posts', array('title' => esc_html__('Latest Articles', 'onyx'), 'postcount' => 5)); }
			if(class_exists('ecko_widget_random_posts')){ the_widget('ecko_widget_random_posts', array('title' => '', 'postcount' => 3)); }
			the_widget('WP_Widget_Categories', 'count=true', onyx_get_default_widget_options());
			the_widget('WP_Widget_Archives', '', onyx_get_default_widget_options());
		}
	}

	if(!function_exists('onyx_get_default_footer_widgets')){
		function onyx_get_default_footer_widgets(){
			the_widget('WP_Widget_Meta', '', onyx_get_default_widget_options());
			the_widget('WP_Widget_Archives', '', onyx_get_default_widget_options());
			the_widget('WP_Widget_Categories', 'count=true', onyx_get_default_widget_options());
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* CATGEORY OPTIONS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_category_options')){
		function onyx_category_options($tag){
			$category_meta_title = 'category_meta_' . $tag->term_id . '_color';
			$category_meta = get_option($category_meta_title);
			?>
			<tr class="form-field">
				<th scope="row" valign="top"><label for="category-color"><?php esc_html_e('Category HEX Color Value', 'onyx'); ?></label></th>
				<td>
					<input id="category-color" name="<?php echo esc_attr($category_meta_title); ?>" value="<?php if(isset($category_meta)) echo esc_attr($category_meta); ?>" />
					<p class="description"><?php esc_html_e('Enter a color to associate with this category. The color must be in HEX format (E.g. 009bbb )', 'onyx'); ?></p>
				</td>
			</tr>
			<?php
		}
	}
	add_action('edit_category_form_fields', 'onyx_category_options');

	if(!function_exists('onyx_save_category_options')){
		function onyx_save_category_options($term_id){
			$category_meta_title = 'category_meta_' . $term_id . '_color';
			if(isset($_POST[$category_meta_title]) && !update_option($category_meta_title, $_POST[$category_meta_title])){
				add_option($category_meta_title, $_POST[$category_meta_title]);
			}
		}
	}
	add_action('edit_category', 'onyx_save_category_options');


	/*-----------------------------------------------------------------------------------*/
	/* GET PAGE LAYOUT
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_page_layout')){
		function onyx_get_page_layout(){
			if(ECKO_DEMO && isset($_COOKIE['layout'])){
				return $_COOKIE['layout'];
			}
			return get_theme_mod('layout_style', 'page-layout-standard');
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST CONETENTS (POST LIST)
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_post_contents')){
		function onyx_get_post_contents(){
			global $post;
			if(get_theme_mod('postlist_use_excerpts', false)){
				the_excerpt();
			}else{
				the_content('', false, '');
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* GET POPULAR CATEGORIES
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_popular_categories')){
		function onyx_get_popular_categories(){
			return get_categories(array(
				'type' => 'post',
				'orderby' => 'count',
				'order' => 'DESC',
				'hide_empty' => 1,
				'number' => 5,
				'taxonomy' => 'category',
				'pad_counts' => false,
				'exclude' => '1'
				)
			);
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POPULAR AUTHORS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_popular_authors')){
		function onyx_get_popular_authors(){
			return get_users(array(
				'orderby' => 'post_count',
				'order' => 'DESC',
				'number' => 5,
				)
			);
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* COMMENT FORMATTING
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_comment_format')){
		function onyx_comment_format($comment, $args, $depth){
			$GLOBALS['comment'] = $comment;
			?>
				<li <?php comment_class(); ?> id="comment-<?php echo esc_attr(comment_ID()); ?>">
					<div class="comment-contents">
						<div class="comment-profile">
							<a href="<?php comment_author_url(); ?>"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=96" class="comment-author-avatar" alt="<?php comment_author(); ?>"></a>
						</div>
						<div class="comment-main">
							<div class="comment-info">
								<section class="comment-meta">
									<div class="comment-left">
										<h4 class="comment-author">
											<a href="<?php comment_author_url(); ?>"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=24" class="comment-author-avatar-small" alt="<?php comment_author(); ?>"><i class="comment-is-author fa fa-user" title="<?php esc_attr_e('Author', 'onyx'); ?>"></i><?php comment_author(); ?></a>
										</h4>
										<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
									</div>
									<div class="comment-right">
										<div class="comment-date"><time datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date(get_option('date_format')); ?></time></div>
									</div>
								</section>
							</div>
							<div class="comment-body">
								<?php comment_text(); ?>
							</div>
						</div>
					</div>
			<?php
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST CATGEORY MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_category_markup')){
		function onyx_get_category_markup($usespan = false, $postid = false){
			if(!$postid){
				global $post;
				$postid = $post->ID;
			}
			$post_category = get_the_category($postid);

			if($post_category){
				if($usespan){
					echo '<span class="post-category" style="background:#' . esc_attr(onyx_get_category_color($postid)) . ';" data-category-color="#' . esc_attr(onyx_get_category_color($postid)) . '">' . esc_html($post_category[0]->name) . '</span>';
				}else{
					echo '<a class="post-category category-fade" style="background:#' . esc_attr(onyx_get_category_color($postid))  . ';" data-category-color="#' . esc_attr(onyx_get_category_color($postid)) . '" href="' . esc_url(get_category_link($post_category[0]->term_id)) . '">' . esc_html($post_category[0]->name) . '</a>';
				}
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET FOOTER BLOG IMAGE
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_footer_blog_image')){
		function onyx_get_footer_blog_image(){
			if(get_theme_mod('layout_color_scheme', 'light-theme') == "light-theme"){
				if(get_theme_mod('general_blog_image')){
					return get_theme_mod('general_blog_image');
				}
				return false;
			}else{
				if(get_theme_mod('general_blog_light_image')){
					return get_theme_mod('general_blog_light_image');
				}
				return false;
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* GET POST CATGEORY COLOR
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_category_color')){
		function onyx_get_category_color($postid = false){
			if(!$postid){
				global $post;
				$postid = $post->ID;
			}
			$post_category = get_the_category($postid);
			if($post_category){
				$color_option = get_option('category_meta_' . $post_category[0]->term_id . '_color');
				if(empty($color_option)){ $color_option = '7fbb00'; };
				return $color_option;
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET GRID POSTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_featured_posts')){
		function onyx_get_featured_posts(){
			$onyx_featured_posts = array(
				'numberposts' => 3,
				'meta_key' => 'onyx_post_feature',
				'meta_value' => 'yes'
			);
			return get_posts($onyx_featured_posts);
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET DEFAULT HEADER BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_header_background')){
		function onyx_get_header_background(){
			if(is_single() || is_page()){
				global $post;
				$post_image = null;
				if(has_post_thumbnail()){
					$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ecko_background_large');
					$post_image = $post_image[0];
				}
				return $post_image;
			}
			if(is_404() && get_theme_mod('error_background')){
				return get_theme_mod('error_background', '');
			}
			return get_theme_mod('layout_header_background', '');
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET GET FIRST FEATURED POST BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_get_first_featured_post_background')){
		function onyx_get_first_featured_post_background($featuredposts){
			if($featuredposts){
				$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($featuredposts[0]->ID), 'ecko_background_large');
				$post_image = $post_image[0];
				return $post_image;
			}
			return false;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* MODIFY DEFAULT WIDGET MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_list_categories')){
		function onyx_list_categories($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_categories', 'onyx_list_categories');

	if(!function_exists('onyx_list_archives')){
		function onyx_list_archives($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_archives', 'onyx_list_archives');


	/*-----------------------------------------------------------------------------------*/
	/* GLOABL ACCESS: MULTIPAGE
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_global_multipage')){
		function onyx_global_multipage(){
			global $multipage;
			return $multipage;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GLOABL ACCESS: POST
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('onyx_global_post')){
		function onyx_global_post(){
			global $post;
			return $post;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* THEME CUSTOMIZER SETTINGS
	/*-----------------------------------------------------------------------------------*/

	function onyx_customize_register($wp_customize){

		/*
		 * Layout
		 */
		$wp_customize->add_section('layout_section',
			array(
				'title' => 'Layout',
				'description' => esc_attr__('This section contains theme layout options.', 'onyx'),
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('layout_style',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => 'page-layout-standard',
		));
		$wp_customize->add_control(
			'layout_style',
			array(
				'type' => 'radio',
				'label' => esc_attr__('Layout Style', 'onyx'),
				'section' => 'layout_section',
				'choices' => array(
					'page-layout-standard' => esc_attr__('Standard (Sidebar)', 'onyx'),
					'page-layout-masonry' => esc_attr__('Masonry', 'onyx'),
					'page-layout-single' => esc_attr__('Single Column', 'onyx'),
				),
			)
		);

		$wp_customize->add_setting('layout_color_scheme',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => 'light-theme',
		));
		$wp_customize->add_control(
			'layout_color_scheme',
			array(
				'type' => 'radio',
				'label' => esc_attr__('Color Scheme', 'onyx'),
				'section' => 'layout_section',
				'choices' => array(
					'light-theme' => esc_attr__('Light Theme', 'onyx'),
					'dark-theme' => esc_attr__('Dark Theme', 'onyx'),
				),
			)
		);

		$wp_customize->add_setting('layout_header_background',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'layout_header_background',
				array(
					'label' => esc_attr__('Default Cover Background Image', 'onyx'),
					'section' => 'layout_section',
					'settings' => 'layout_header_background'
				)
			)
		);


		/*
		 * Top Bar
		 */
		$wp_customize->add_section('topbar_section',
			array(
				'title' => 'Top Bar',
				'description' => esc_attr__('This section contains Top bar options.', 'onyx'),
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('topbar_sticky',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_sticky',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Stick to Top (on scroll)', 'onyx'),
				'section' => 'topbar_section',
			)
		);

		$wp_customize->add_setting('topbar_hide_navigation',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('topbar_hide_navigation',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Navigation', 'onyx'),
				'section' => 'topbar_section',
			)
		);

		$wp_customize->add_setting('topbar_logo',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'topbar_logo',
				array(
					'label' => esc_attr__('Top Bar Logo', 'onyx'),
					'section' => 'topbar_section',
					'settings' => 'topbar_logo'
				)
			)
		);

		$wp_customize->add_setting('topbar_logo_retina',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'topbar_logo_retina',
				array(
					'label' => esc_attr__('Top Bar Logo (Retina - @2x file name)', 'onyx'),
					'section' => 'topbar_section',
					'settings' => 'topbar_logo_retina'
				)
			)
		);


		/*
		 * Blog Cover
		 */
		$wp_customize->add_section('blogcover_section',
			array(
				'title' => 'Blog Cover',
				'description' => esc_attr__('This section contains Blog Cover options.', 'onyx'),
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('blogcover_logo',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'blogcover_logo',
				array(
					'label' => esc_attr__('Blog Cover Logo', 'onyx'),
					'section' => 'blogcover_section',
					'settings' => 'blogcover_logo'
				)
			)
		);

		$wp_customize->add_setting('blogcover_logo_retina',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'blogcover_logo_retina',
				array(
					'label' => esc_attr__('Blog Cover Logo (Retina - @2x file name)', 'onyx'),
					'section' => 'blogcover_section',
					'settings' => 'blogcover_logo_retina'
				)
			)
		);

		$wp_customize->add_setting('blogcover_hide_posts',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('blogcover_hide_posts',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Posts', 'onyx'),
				'section' => 'blogcover_section',
			)
		);

		$wp_customize->add_setting('blogcover_hide_post_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('blogcover_hide_post_category',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Post Category', 'onyx'),
				'section' => 'blogcover_section',
			)
		);

		$wp_customize->add_setting('blogcover_hide_frontpage',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('blogcover_hide_frontpage',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Frontpage Cover', 'onyx'),
				'section' => 'blogcover_section',
			)
		);

		$wp_customize->add_setting('blogcover_basic',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('blogcover_basic',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Use Basic Style (Masonry & Standard)', 'onyx'),
				'section' => 'blogcover_section',
			)
		);


		/*
		 * Filter Bar
		 */
		$wp_customize->add_section('filterbar_section',
			array(
				'title' => 'Filter Bar',
				'description' => esc_attr__('This section contains Filter Bar options.', 'onyx'),
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('filterbar_hide',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('filterbar_hide',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Filter Bar', 'onyx'),
				'section' => 'filterbar_section',
			)
		);

		$wp_customize->add_setting('filterbar_hide_options',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('filterbar_hide_options',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Filter Options', 'onyx'),
				'section' => 'filterbar_section',
			)
		);

		$wp_customize->add_setting('filterbar_hide_search',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('filterbar_hide_search',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Search', 'onyx'),
				'section' => 'filterbar_section',
			)
		);



		/*
		 * POST LIST SECTION
		 */
		$wp_customize->add_section('postlist_section',
			array(
				'title' => 'Post List',
				'description' => esc_attr__('This section contains Post List options.', 'onyx'),
				'priority' => 27,
			)
		);

		$wp_customize->add_setting('postlist_use_excerpts',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_use_excerpts',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Use Excerpts', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_category',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Category', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_author',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_date',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Date', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Meta', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_excerpt',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_excerpt',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Excerpt', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_readmore',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_readmore',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide \'Read More\'', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_comment_count',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comment Count', 'onyx'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_likes',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_likes',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Likes', 'onyx'),
				'section' => 'postlist_section',
			)
		);


		/*
		 * PAGINATION SECTION
		 */
		$wp_customize->add_section('pagination_section',
			array(
				'title' => 'Pagination',
				'description' => esc_attr__('This section contains Pagination options.', 'onyx'),
				'priority' => 28,
			)
		);

		$wp_customize->add_setting('pagination_enable_ajax',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_enable_ajax',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Enable AJAX Post Loading', 'onyx'),
				'section' => 'pagination_section',
			)
		);

		$wp_customize->add_setting('pagination_hide_older_newer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_older_newer',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide \'Older/Newer\' Buttons', 'onyx'),
				'section' => 'pagination_section',
			)
		);

		$wp_customize->add_setting('pagination_hide_page_numbers',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_page_numbers',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Page Numbers', 'onyx'),
				'section' => 'pagination_section',
			)
		);


		/*
		 * POST PAGE SECTION
		 */
		$wp_customize->add_section('postpage_section',
			array(
				'title' => 'Post Page',
				'description' => esc_attr__('This section contains Post Page options.', 'onyx'),
				'priority' => 29,
			)
		);

		$wp_customize->add_setting('postpage_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_category',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Category', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_date',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Date', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_comment_count',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comment Count', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_likes',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_likes',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Likes', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_social_share',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_social_share',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Social Share', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_tags',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_tags',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Tags', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_related',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_related',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Related Posts', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_author_profile',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author_profile',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author Profile', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comments', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_next_prev_posts',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_next_prev_posts',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide \'Next/Previous\' Posts', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_show_author_description',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_show_author_description',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Author Profile Description', 'onyx'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_default_layout',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => 'page-layout-default',
		));
		$wp_customize->add_control(
			'postpage_default_layout',
			array(
				'type' => 'radio',
				'label' => esc_attr__('Default Layout', 'onyx'),
				'section' => 'postpage_section',
				'choices' => array(
					'page-layout-default' => esc_attr__('Default', 'onyx'),
					'page-layout-standard' => esc_attr__('Sidebar', 'onyx'),
					'page-layout-standard-left' => esc_attr__('Sidebar (Left)', 'onyx'),
					'page-layout-single' => esc_attr__('Single Column', 'onyx'),
				),
			)
		);


		/*
		 * CUSTOM PAGE SECTION
		 */
		$wp_customize->add_section('custompage_section',
			array(
				'title' => 'Custom Page',
				'description' => esc_attr__('This section contains Custom Page options.', 'onyx'),
				'priority' => 31,
			)
		);

		$wp_customize->add_setting('custompage_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_author',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author Profile', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_date',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Date', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_comment_count',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_comment_count',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comment Count', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Meta', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_social_share',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_social_share',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Social Share Options', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comments', 'onyx'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_title',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_title',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Page Title', 'onyx'),
				'section' => 'custompage_section',
			)
		);


		/*
		 * SUBSCRIPTION (Footer) SECTION
		 */
		$wp_customize->add_section('subscription_section',
			array(
				'title' => esc_attr__('Subscription (Footer)', 'onyx'),
				'description' => esc_attr__('This section contains inline post list subscription options.', 'onyx'),
				'priority' => 32,
			)
		);

		$wp_customize->add_setting('subscription_enabled',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('subscription_enabled',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Enable Footer Subscription', 'onyx'),
				'section' => 'subscription_section',
			)
		);

		$wp_customize->add_setting('subscription_title',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('subscription_title',
			array(
				'label' => esc_attr__('Title', 'onyx'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('subscription_description',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('subscription_description',
			array(
				'label' => esc_attr__('Description', 'onyx'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('subscription_embed_code',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('subscription_embed_code',
			array(
				'label' => esc_attr__('MailChimp Embed Code', 'onyx'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);


		/*
		 * FOOTER SECTION
		 */
		$wp_customize->add_section('footer_section',
			array(
				'title' => 'Footer',
				'description' => esc_attr__('This section contains Footer options.', 'onyx'),
				'priority' => 33,
			)
		);

		$wp_customize->add_setting('footer_hide_footer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_footer',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Footer', 'onyx'),
				'section' => 'footer_section',
			)
		);

		$wp_customize->add_setting('footer_hide_widgets',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_widgets',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Widgets', 'onyx'),
				'section' => 'footer_section',
			)
		);

		$wp_customize->add_setting('footer_hide_copyright',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('footer_hide_copyright',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Copyright', 'onyx'),
				'section' => 'footer_section',
			)
		);


		/*
		 * ADVERTS SECTION
		 */
		$wp_customize->add_section('adverts_section',
			array(
				'title' => 'Adverts & AdSense',
				'description' => esc_attr__('This section contains Advert & AdSense options. These options are supported on the Standard and Single-Column layouts.', 'onyx'),
				'priority' => 34,
			)
		);

		$wp_customize->add_setting('adverts_enable',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('adverts_enable',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Enable Advert/AdSense Support', 'onyx'),
				'section' => 'adverts_section',
			)
		);

		$wp_customize->add_setting('adverts_occurance_rate',
		array(
			'sanitize_callback' => 'ecko_sanitize_int',
			'default' => 4
		));
		$wp_customize->add_control('adverts_occurance_rate',
			array(
				'type' => 'select',
				'label' => esc_attr__('Show Every (X) Posts', 'onyx'),
				'section' => 'adverts_section',
				'choices' => array(
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
					6 => '6'
				),
			)
		);

		$wp_customize->add_setting('adverts_ad_code',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('adverts_ad_code',
			array(
				'type' => 'text',
				'label' => esc_attr__('Advert Emebed Code (728x90)', 'onyx'),
				'section' => 'adverts_section',
			)
		);

		/*
		 * ADVERTS SECTION
		 */
		$wp_customize->add_section('error_section',
			array(
				'title' => 'Error Page',
				'description' => esc_attr__('This section contains Error Page options (e.g. 404).', 'onyx'),
				'priority' => 35,
			)
		);

		$wp_customize->add_setting('error_background',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'error_background',
				array(
					'label' => esc_attr__('Error Cover Background Image', 'onyx'),
					'section' => 'error_section',
					'settings' => 'error_background'
				)
			)
		);

	}
	add_action('customize_register', 'onyx_customize_register');


	function onyx_customize_css(){
		?>
			<style type="text/css">

				<?php // GENERAL ?>
				<?php if(get_theme_mod('general_disqus_plugin_support')){ ?>
					.post-meta-comments{ display: none !important; }
				<?php } ?>

				<?php // TOP BAR ?>
				<?php if(get_theme_mod('topbar_hide_navigation')){ ?>
					nav.navigation-main{ display: none; }
					nav.navigation-responsive{ display: none; }
				<?php } ?>

				<?php // BLOGCOVER ?>
				<?php if(get_theme_mod('blogcover_hide_posts')){ ?>
					.cover-blog-posts{ display: none; }
					.cover-load-indicator{ display: none; }
					.cover-blog-description{ bottom: 0; }
				<?php } ?>
				<?php if(get_theme_mod('blogcover_hide_post_category')){ ?>
					.cover-blog-posts .cover-post .post-category{ display: none; }
				<?php } ?>

				<?php // FILTER BAR ?>
				<?php if(get_theme_mod('filterbar_hide')){ ?>
					.filter-bar{ display: none; }
					.cover.cover-blog{ height: 100vh; }
				<?php } ?>
				<?php if(get_theme_mod('filterbar_hide_options')){ ?>
					.filter-bar .filter-bar-options{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('filterbar_hide_search')){ ?>
					.filter-bar .filter-bar-search{ display: none; }
				<?php } ?>

				<?php // POSTLIST ?>
				<?php if(get_theme_mod('postlist_hide_category')){ ?>
					.page-contents.post-list .post .post-category{ display: none; }
					.page-contents.post-list .post .post-info{ margin-top: 0 !important; }
					.page-contents.post-list .post .post-title{ margin-top: 0 !important; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_author')){ ?>
					.page-contents.post-list .post .post-author{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_date')){ ?>
					.page-contents.post-list .post .post-meta .post-meta-date{ display: none; }
					.page-contents.post-list-standard .post .post-date{ display: none; }
					.page-contents.post-list-standard .post .post-right-align{ width: 100%; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_meta')){ ?>
					.page-contents.post-list .post .post-meta{ display: none; }
					.page-contents.post-list-masonry .post .post-excerpt{ margin-bottom: 0; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_excerpt')){ ?>
					.page-contents.post-list .post .post-excerpt{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_readmore')){ ?>
					.page-contents.post-list .post .post-meta .post-read-more{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_comment_count')){ ?>
					.page-contents.post-list .post .post-meta .post-meta-comments{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_likes')){ ?>
					.page-contents.post-list .post .post-meta .post-meta-likes{ display: none; }
				<?php } ?>

				<?php // PAGINATION ?>
				<?php if(get_theme_mod('pagination_hide_older_newer')){ ?>
					.pagination-standard .pagination-button{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('pagination_hide_page_numbers')){ ?>
					.pagination-standard ul.page-numbers{ display: none; }
				<?php } ?>

				<?php // POST PAGE ?>
				<?php if(get_theme_mod('postpage_hide_category')){ ?>
					body.single .cover-content .post-category{ display: none; }
					body.single .post-body .post-category{ display: none; }
					body.single .post-body .post-title{ margin-top: 0; }
					body.single .post-footer .post-tags .post-category{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author')){ ?>
					body.single .cover-content .post-meta .post-author{ display: none; }
					body.single .post-body .post-author{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_date')){ ?>
					body.single .cover-content .post-meta .post-date{ display: none; }
					body.single .post-body .post-date{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_comment_count')){ ?>
					body.single .cover-content .post-meta .post-comments{ display: none; }
					body.single .post-body .post-comments{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_likes')){ ?>
					body.single .cover-content .post-meta .post-likes{ display: none; }
					body.single .post-body .post-likes{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_social_share')){ ?>
					body.single .post-footer .post-share{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_tags')){ ?>
					body.single .post-footer .post-tags .tags{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_related')){ ?>
					body.single .post-related{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author_profile')){ ?>
					body.single .post-author-profile{ display: none; }
					body.single .post-footer, body.single .post-share{ margin-bottom: 0; padding-bottom: 0; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_comments')){ ?>
					body.single .post-comments-body{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_next_prev_posts')){ ?>
					body.single .footer-post-next{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_show_author_description')){ ?>
					body.single .post-author-profile .post-author-bio{ display: block; }
				<?php } ?>

				<?php // CUSTOM PAGE ?>
				<?php if(get_theme_mod('custompage_hide_author')){ ?>
					body.page .cover-content .post-meta .post-author{ display: none; }
					body.page .post-header .post-meta .post-author{ display: none; }
					body.page .post-author-profile{ display: none; }
					body.page .post-footer, body.page .post-share{ margin-bottom: 0; padding-bottom: 0; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_date')){ ?>
					body.page .cover-content .post-meta .post-date{ display: none; }
					body.page .post-header .post-meta .post-date{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_comment_count')){ ?>
					body.page .cover-content .post-meta .post-comments{ display: none; }
					body.page .post-header .post-meta .post-comments{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_meta')){ ?>
					body.page .cover-content .post-meta{ display: none; }
					body.page .post-header .post-meta{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_social_share')){ ?>
					body.page .post-footer .post-share{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_comments')){ ?>
					body.page .post-comments-body{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_title')){ ?>
					body.page .post-header{ display: none; }
				<?php } ?>

				<?php // FOOTER ?>
				<?php if(get_theme_mod('footer_hide_footer')){ ?>
					footer.page-footer{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('footer_hide_widgets')){ ?>
					footer.page-footer .footer-widgets{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('footer_hide_copyright')){ ?>
					footer.page-footer .footer-copyright{ display: none; }
				<?php } ?>

				<?php // COPYRIGHT ?>
				<?php if(get_theme_mod('copyright_hide_disclaimer')){ ?>
					.footer-copyright-disclaimer{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_wordpress')){ ?>
					.footer-copyright-disclaimer .wordpress{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_ecko')){ ?>
					.footer-copyright-disclaimer .ecko{ display: none; }
				<?php } ?>

				<?php // COLORS ?>
				<?php if(get_theme_mod('color_enable_custom')){ ?>
					nav.navigation-main>ul>li.current-menu-item:after, nav.navigation-main>ul>li.menu-item-active:after, nav.navigation-main>div>ul>li.current-menu-item:after, nav.navigation-main>div>ul>li.menu-item-active:after{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.cover-load-indicator{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.page-contents.post-list-masonry .post .post-title a:hover{ color: <?php echo esc_attr(get_theme_mod('color_accent_dark')); ?>; }
					.pagination-load-more{ background: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.pagination-load-more:hover{ background: <?php echo esc_attr(get_theme_mod('color_accent_dark')); ?>; }
				<?php } ?>

			 </style>
		<?php
	}
	add_action('wp_head', 'onyx_customize_css');