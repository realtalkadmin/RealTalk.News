jQuery(document).ready(function() {
    "use strict";


    // ONLOAD

    (function() {
        setActiveCoverPost();
        configureRetinaImages();
        configureMediaEmbeds();
        appendNavigationsIcons();
        configurePagination();
        configureSubscribeWidget();
        configureSyntaxHighlighting();
        configureComments();
    })();

    jQuery(window).load(function() {
        resizeGalleryContainers();
        setTimeout(function() {
            loadPostCoverBackgrounds();
        }, 5000);
    });


    // HELPER FUNCTIONS

	function darkenColor(hex, lum) {
		hex = String(hex).replace(/[^0-9a-f]/gi, '');
		if (hex.length < 6) {
			hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
		}
		lum = lum || 0;
		var rgb = "#", c, i;
		for (i = 0; i < 3; i++) {
			c = parseInt(hex.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
			rgb += ("00"+c).substr(c.length);
		}
		return rgb;
    }


    // RETINA

    function configureRetinaImages() {
        jQuery('img').attr('data-no-retina', 'true');
        jQuery('img.retina').removeAttr('data-no-retina', 'false');
    }


    // CODE HIGHLIGHTER

    function configureSyntaxHighlighting() {
        if (ecko_theme_vars.general_disable_syntax_highlighter !== "1") {
            Rainbow.color();
        }
    }


    // MASONRY

    if (jQuery('.post-list-masonry').length) {
        var masonry_post_list = jQuery('.post-list-masonry .post-list-posts').masonry({
            itemSelector: '.post, .page',
            percentPosition: true,
        });
        masonry_post_list.imagesLoaded().progress(function() {
            masonry_post_list.masonry('layout');
        });
		masonry_post_list.imagesLoaded(function() {
			masonry_post_list.masonry('layout');
		});
		jQuery(window).load(function() {
			masonry_post_list.masonry('layout');
		});
    }


    // FITVIDS

    function configureMediaEmbeds() {
        jQuery('.overlay-media-embed, .post-contents, .postcontents').fitVids();
        jQuery('.fluid-width-video-wrapper').parent('p').addClass('post-contents-video');
    }


	// STICKY TOPBAR

	if(ecko_theme_vars.topbar_sticky == "1"){
		if(jQuery(document).scrollTop() > 0){
			jQuery('.top-bar-sticky').addClass('top-bar-stuck');
		}else{
			jQuery('.top-bar-sticky').removeClass('top-bar-stuck');
		}
		jQuery(window).scroll(function(){
			if(jQuery(document).scrollTop() > 0){
				jQuery('.top-bar-sticky').addClass('top-bar-stuck');
			}else{
				jQuery('.top-bar-sticky').removeClass('top-bar-stuck');
			}
		});
	}

    // POST COMMENTS

    function configureComments() {
        if (ecko_theme_vars.general_hidecomments == "1" && window.location.hash === "") {
            jQuery('.comments-main').hide();
            jQuery('.post-comments-body').prepend('<div class="post-show-comments"><i class="fa fa-comment-o"></i>' + ecko_theme_vars.localization_view_comments + "</div>");
        }
    }

    jQuery('.post-comments-body .post-show-comments').click(function() {
        jQuery('.post-comments-body .post-show-comments').hide();
        jQuery('.comments-main').slideDown(500);
    });


    // POST COVER

    setInterval(function() {
        // Get Current Cover Post
        var cover_current = jQuery('.cover-post-active');
        // Get Next Cover Post
        var cover_next = jQuery(cover_current).next();
        if (jQuery(cover_next).length === 0) {
            cover_next = jQuery('.cover-blog-posts .cover-post').first();
        }
        // Switch Active/Inactive Class
        jQuery(cover_current).removeClass('cover-post-active');
        jQuery(cover_current).addClass('cover-post-inactive');
        jQuery(cover_next).removeClass('cover-post-inactive');
        jQuery(cover_next).addClass('cover-post-active');
        // Category Background
        jQuery(".post-category", cover_current).css('background', '');
        jQuery(".post-category", cover_next).css('background', jQuery(".post-category", cover_next).attr('data-category-color'));
        // Transition Background
        jQuery('.cover-post-background-' + jQuery(cover_current).attr('data-post-id')).css('opacity', 0);
        jQuery('.cover-post-background-' + jQuery(cover_next).attr('data-post-id')).css('opacity', 0.7);
    }, 8000);

    function setActiveCoverPost() {
        var first_post = jQuery('.cover-blog-posts .cover-post').first();
        jQuery(first_post).addClass('cover-post-active');
        jQuery(".post-category", first_post).css('background', jQuery(".post-category", first_post).attr('data-category-color'));
    }

    function loadPostCoverBackgrounds() {
        if (jQuery('.cover-post-2').length) {
            jQuery('.cover-post-background-2').css('background-image', 'url(' + jQuery('.cover-post-2').attr('data-background-image') + ')');
        }
        if (jQuery('.cover-post-3').length) {
            jQuery('.cover-post-background-3').css('background-image', 'url(' + jQuery('.cover-post-3').attr('data-background-image') + ')');
        }
    }


    // SEARCH OVERLAY

    jQuery('.show-search').on('click', function() {
        if (jQuery(window).width() > 960) {
            jQuery('.page-overlay-search').addClass('page-overlay-open');
            setTimeout(function() {
                jQuery('.page-overlay-search .query').focus();
            }, 1000);
            return false;
        }
    });


    // NAVIGATION

    function appendNavigationsIcons() {
        jQuery('nav li.menu-item-has-children > a').each(function() {
            jQuery(this).html(jQuery(this).text() + '<i class="fa fa-chevron-down"></i>');
        });
        jQuery('.widget.navigation .menu-item-has-children > a').append('<i class=\"fa fa-caret-down\"></i>');
    }

    jQuery('.widget.navigation li.menu-item-has-children > a').on("click", function() {
        var parent = jQuery(this).parent();
        jQuery('a i', parent).toggleClass('fa-chevron-down');
        jQuery('a i', parent).toggleClass('fa-chevron-up');
        jQuery('.sub-menu', parent).slideToggle();
        return false;
    });

    jQuery('li.menu-item-has-children > a').on("click", function() {
        if (jQuery(this).attr('href') == "#") {
            return false;
        }
    });

    jQuery('.show-nav').on('click', function() {
        jQuery('nav.navigation-responsive > ul, nav.navigation-responsive > div > ul').fadeToggle();
    });

    jQuery('nav.navigation-responsive li.menu-item-has-children > a').on("click", function() {
        var parent = jQuery(this).parent();
        jQuery('a i', parent).toggleClass('fa-chevron-down');
        jQuery('a i', parent).toggleClass('fa-chevron-up');
        jQuery('.sub-menu', parent).slideToggle();
        return false;
    });


    // POST FORMAT - IMAGE GALLERY

    function resizeGalleryContainers() {
		jQuery(".eckogallery br").remove();
        jQuery("article.format-gallery").each(function(index) {
            jQuery('.post-header-gallery', this).height(jQuery('.post-header-gallery .eckogallery a', this).height());
            setTimeout(function() {
                if (jQuery('.post-list-masonry').length) masonry_post_list.masonry('layout');
            }, 400);
        });
    }

    function nextImage(post, callback) {
        if (jQuery(post).find('.active').length === 0) {
            jQuery(post).find('.eckogallery > a:first-child').first().addClass('active');
        }
        jQuery(post).find('.active').fadeOut(400);
        var next = jQuery(post).find('.active').next();
        if (next.length === 0) {
            next = jQuery(post).find('.eckogallery > a').first();
        }
        jQuery(post).find('.active').removeClass('active');
        jQuery(next).addClass('active');
        jQuery(next).fadeIn(400);
        callback();
    }

    function previousImage(post, callback) {
        if (jQuery(post).find('.active').length === 0) {
            jQuery(post).find('.eckogallery > a:first-child').first().addClass('active');
        }
        jQuery(post).find('.active').fadeOut(400);
        var previous = jQuery(post).find('.active').prev();
        if (previous.length === 0) {
            previous = jQuery(post).find('.eckogallery > a').last();
        }
        jQuery(post).find('.active').removeClass('active');
        jQuery(previous).addClass('active');
        jQuery(previous).fadeIn(400);
        callback();
    }

    jQuery('.post-header-gallery .post-gallery-next').live('click', function() {
        var post = jQuery(this).closest('.post-header-gallery');
        nextImage(post, function() {
            jQuery('.post-header-gallery').height(jQuery('.post-header-gallery .eckogallery .active img').height());
            if (jQuery('.post-list-masonry').length) {
                setTimeout(function() {
                    if (jQuery('.post-list-masonry').length) masonry_post_list.masonry('layout');
                }, 400);
            }
        });
    });

    jQuery('.post-header-gallery .post-gallery-previous').live('click', function() {
        var post = jQuery(this).closest('.post-header-gallery');
        previousImage(post, function() {
            jQuery('.post-header-gallery').height(jQuery('.post-header-gallery .eckogallery .active img').height());
            if (jQuery('.post-list-masonry').length) {
                setTimeout(function() {
                    if (jQuery('.post-list-masonry').length) masonry_post_list.masonry('layout');
                }, 400);
            }
        });
    });


    // OVERLAY CLOSE

    jQuery('.page-overlay-close').on('click', function() {
        jQuery(this).closest('.page-overlay').removeClass('page-overlay-open');
        jQuery('.page-overlay-media .overlay-media-embed').html('');
    });


    // FILTER BAR

    if (jQuery('.filter-bar-categories').length) {
        jQuery('.filter-bar-categories .active a').css('background-color', jQuery('.filter-bar-categories .active a').attr('data-category-color'));
    }

    jQuery(".filter-bar-options li a").mouseenter(function() {
        if (jQuery(this).parent().hasClass('active')) {
            jQuery(this).css('background-color', darkenColor(jQuery(this).attr('data-category-color'), -0.25));
        } else {
            jQuery(this).css('background-color', jQuery(this).attr('data-category-color'));
        }
    }).mouseleave(function() {
        if (jQuery(this).parent().hasClass('active')) {
            jQuery(this).css('background-color', jQuery(this).attr('data-category-color'));
        } else {
            jQuery(this).css('background-color', '');
        }
    });


    // CATEGORY HOVER

    jQuery(".category-fade").live('mouseenter', function() {
        jQuery(this).css('background', darkenColor(jQuery(this).attr('data-category-color'), -0.25));
    }).live('mouseleave', function() {
        jQuery(this).css('background', jQuery(this).attr('data-category-color'));
    });


    // CATEGORY COLOR FADE

    jQuery(".post-related-post .post-category").css('background', '');
    jQuery(".post-related-post").mouseenter(function() {
        var post_category = jQuery('.post-category', this);
        jQuery(post_category).css('background', jQuery(post_category).attr('data-category-color'));
    }).mouseleave(function() {
        jQuery('.post-category', this).css('background', '');
    });


    // POST FORMAT - VIDEO/AUDIO

    jQuery('.post-play, .post.format-video .post-header-image').live('click', function(e) {
        if (jQuery(window).width() > 960 && jQuery(window).height() > 915) {
            var current_post = jQuery(this).closest('.post');
			var current_post_id = jQuery(current_post).attr('data-post-id');
			var current_post_media = jQuery("<div/>").html(window.post_video[current_post_id]).text();
            jQuery('.page-overlay-media .overlay-media-embed').html(current_post_media);
            jQuery('.page-overlay-media .post-title a').text(jQuery('.post-title', current_post).text());
            jQuery('.page-overlay-media .post-excerpt').text(jQuery('.post-excerpt', current_post).text());
            jQuery('.page-overlay-media .post-title a').attr('href', jQuery('.post-title a', current_post).attr('href'));
            jQuery('.page-overlay-media .post-read-more').attr('href', jQuery('.post-title a', current_post).attr('href'));
            jQuery('.page-overlay-media').addClass('page-overlay-open');
            jQuery('.overlay-media-embed').fitVids();
            return false;
        }
    });


    // SCROLL - BACK TO TOP

    jQuery('.back-to-top').on('click', function() {
        jQuery('html, body').animate({
            scrollTop: "0px"
        }, 800);
        return false;
    });


	// TITLE HOVER EFFECT

	jQuery('.post-list-standard .post .post-title a').mouseenter(function() {
		jQuery(this).closest('.post-info').find('.post-date-category').addClass('active');
    }).mouseleave(function() {
		jQuery(this).closest('.post-info').find('.post-date-category').removeClass('active');
    });


    // SCROLL - COVER

    jQuery('.scroll-cover').on('click', function() {
        jQuery('html, body').animate({
            scrollTop: jQuery('.cover').height()
        }, 800);
        return false;
    });


    // WIDGET - SUBCRIBE

    function configureSubscribeWidget() {
        jQuery('.required.email').attr('placeholder', ecko_theme_vars.localization_email_address + '...');
        jQuery('.widget.subscribe .inner form').append('<i class="fa fa-envelope-o subscribe-icon"></i><i class="fa fa-arrow-right subscribe-submit"></i>');
        jQuery('.footer-subscribe form').append('<i class="fa fa-arrow-right subscribe-submit"></i>');
    }


    // FORM SUBMIT

    jQuery('.subscribe-submit, .search-submit, .widget_search .submit').on('click', function() {
        jQuery(this).parent('form').submit();
    });


    // AJAX

    function configurePagination() {
        if (ecko_theme_vars.pagination_enable_ajax == "1") {
            jQuery('.pagination-standard').hide();
            jQuery('.pagination-ajax').show();
        }
    }

    jQuery('.pagination-load-more').on('click', function() {
		var _this = this;
        jQuery(this).html("<i class=\"fa fa-spinner\"></i> " + ecko_theme_vars.localization_fetching_posts);
        loadPosts(function() {
            jQuery(_this).text(ecko_theme_vars.localization_load_more);
        });
        return false;
    });

    function loadPosts(callback) {
        if (jQuery('.pagination-older').length > 0) {
			var currentpage = jQuery(".pagination-older").attr('href');
            jQuery.get(currentpage, function(data) {
                var result = jQuery(data).find('.post-list article.post');
                var nextpage = jQuery(data).find(".pagination-older").attr('href');
                var pagecount = jQuery(data).find(".pagination-current-page").text();
				jQuery(result).addClass('post-new');
				jQuery(result).css('opacity', '0');
                if (jQuery('body').hasClass('page-layout-masonry')) {
					jQuery(result).css('display', 'none');
					jQuery('.post-list-posts').append(result);
                    jQuery('.post-list').imagesLoaded(function() {
						jQuery(result).css('display', 'block');
                        masonry_post_list.masonry('appended', result);
                        jQuery(".pagination-current-page").text(pagecount);
						resizeGalleryContainers();
                    });
                } else {
					jQuery('.post-list-posts').append(result);
					jQuery('.post-list article.post').css('opacity', '1');
					jQuery('.post-list').imagesLoaded(function() {
                        resizeGalleryContainers();
                    });
				}
                configureMediaEmbeds();
				history.replaceState(null, null, currentpage);
				jQuery('.pagination-active-page').text(parseInt(jQuery('.pagination-active-page').text()) + 1);
				jQuery('.post-list').imagesLoaded(function() {
	                if (nextpage !== undefined) {
	                    jQuery(".pagination-older").attr('href', nextpage);
	                    callback();
	                } else {
	                    jQuery(".pagination-older").remove();
	                    jQuery('.pagination-load-more').html("<i class=\"fa fa-close\"></i> " + ecko_theme_vars.localization_no_more_posts);
	                    jQuery('.pagination-load-more').unbind();
	                }
				});
            });
        }
    }


    // LIGHTBOX

    jQuery('.eckogallery, .gallery').each(function() {
        jQuery(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            mainClass: 'mfp-no-margins mfp-with-zoom',
            gallery: {
                enabled: true
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });


    // SHORTCODE - GALLERY

    jQuery(".post-contents .eckogallery").justifiedGallery({
        rowHeight: 160,
        maxRowHeight: 220,
        margins: 3,
        border: 0,
        lastRow: 'justify',
        captions: false,
        cssAnimation: true,
        imagesAnimationDuration: 300
    });


	// WINDOW RESIZE

	function resized(){
		resizeGalleryContainers();
	}

	var resizeTimer;
	jQuery(window).resize(function(){
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(resized, 100);
	});

});
