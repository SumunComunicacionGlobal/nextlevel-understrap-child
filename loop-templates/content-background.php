<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'wp-block-cover border-radius-lg' ); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'medium_large', array( 'class' => 'wp-block-cover__image-background rounded-lg') ); ?>

	<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim rounded-lg"></span>

	<div class="wp-block-cover__inner-container">

		<header class="entry-header">

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

			<?php
			the_title(
				sprintf( '<p class="entry-title h4"><a class="stretched-link text-white" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></p>'
			);
			?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php
			the_excerpt();
			understrap_link_pages();
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
