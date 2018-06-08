<?php
/**
 * Template part for displaying quote posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Goodz Magazine
 */

$quote_text   = get_post_meta( get_the_ID(), 'goodz_magazine_quote', true );
$quote_author = get_post_meta( get_the_ID(), 'goodz_magazine_quote_author', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="highlighted">
		<header class="entry-header">

			<?php goodz_magazine_entry_header(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php printf( '<blockquote>%s</blockquote><cite>%s</cite>', esc_html( $quote_text ), esc_html( $quote_author ) ); ?>

		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
