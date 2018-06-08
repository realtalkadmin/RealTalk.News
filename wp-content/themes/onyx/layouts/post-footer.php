<?php

	/**
	 * POST - FOOTER
	 */

?>

	<section class="post-footer">
		<div class="post-tags">
			<div class="tags">
				<?php onyx_get_category_markup(); ?>
				<?php echo get_the_tag_list(); ?>
			</div>
		</div>
		<ul class="post-share">
			<li class="post-share-title"><?php esc_html_e('Share', 'onyx'); ?>:</li>
			<li><a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" title="Twitter" class="socialdark twitter"><i class="fa fa-twitter"></i></a></li>
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Facebook" class="socialdark facebook"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;" title="Google Plus" class="socialdark google"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" onclick="window.open(this.href, 'reddit-share', 'width=490,height=530');return false;" title="Reddit" class="socialdark reddit"><i class="fa fa-reddit"></i></a></li>
			<li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;description=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" onclick="window.open(this.href, 'pinterest-share', 'width=490,height=530');return false;" title="Pinterest" class="socialdark pinterest"><i class="fa fa-pinterest"></i></a></li>
			<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>" onclick="window.open(this.href, 'linkedin-share', 'width=490,height=530');return false;" title="LinkedIn" class="socialdark linkedin"><i class="fa fa-linkedin"></i></a></li>
		</ul>
	</section>
