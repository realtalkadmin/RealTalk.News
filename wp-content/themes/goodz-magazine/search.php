<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Goodz Magazine
 */

get_header();

$paging_type = get_theme_mod( 'paging_setting', 'infinite_scroll' );

?>

<div class="container">
	<header class="page-header">
		<?php
			printf( '<h1 class="page-title">%s<span>%s</span></h1>', esc_html__( 'Search results:', 'goodz-magazine' ), esc_html( get_search_query() ) );
		?>
	</header><!-- .page-header -->
	<div class="row">

		<section id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<div class="row">
					<div class="grid-wrapper clear">

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'templates/contents/content', get_post_format() ); ?>

						<?php endwhile; ?>

					</div>
				</div>

				<!-- Infinite load -->
				<?php if ( 'infinite_scroll' == $paging_type ) : ?>

					<?php goodz_magazine_is_posts_navigation(); ?>

					<div id="loading-is"></div>

				<?php endif; ?>

			<?php else : ?>

				<?php get_template_part( 'templates/contents/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

	</div><!-- .row -->

	<!-- Paging -->
	<?php if ( 'infinite_scroll' != $paging_type ) : ?>

		<?php the_posts_navigation(); ?>

	<?php endif; ?>

</div><!-- .container -->

<?php get_footer(); ?>
