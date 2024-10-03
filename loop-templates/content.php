<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'medium_large', array('class' => 'rounded mb-3' ) ); ?>

	<header class="entry-header">

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

		<?php
		the_title(
			sprintf( '<p class="entry-title h4 mb-2"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></p>'
		);
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			// Mostrar el extracto en todas las páginas excepto en la homepage/frontpage
			if ( !is_front_page() ) {
				the_excerpt();
				understrap_link_pages(); // Esto también se ejecutará en todas las páginas excepto en la homepage
			}

			// Mostrar el botón "Leer más" solo en la homepage/frontpage
			if ( is_front_page() ) {
				echo '<a class="btn btn-success understrap-read-more-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">Leer más…</a>';
			}
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
