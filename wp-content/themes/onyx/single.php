<?php

	/**
	 * SINGLE TEMPLATE
	 */

	get_header();

?>

	<?php while(have_posts()) : the_post(); ?>

		<?php get_template_part('layouts/cover-single'); ?>

		<section class="page-container wrapper">

			<section class="page-contents">

				<article class="post-body">

					<?php get_template_part('layouts/post-header'); ?>

					<section class="post-contents">
						<?php the_content(); ?>
						<?php if(onyx_global_multipage()){ ?>
							<div class="post-numbers">
								<?php wp_link_pages(); ?>
							</div>
						<?php } ?>
					</section>

					<?php get_template_part('layouts/post-footer'); ?>

					<?php get_template_part('layouts/post-author-profile'); ?>

				</article>

				<?php get_template_part('layouts/post-related'); ?>

				<?php
					if(get_theme_mod('general_disqus_plugin_support', false)){
						get_template_part('layouts/disqus');
					}else{
						comments_template('', true);
					}
				?>

			</section>

			<?php get_template_part('sidebar'); ?>

			<div class="clear"></div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>
