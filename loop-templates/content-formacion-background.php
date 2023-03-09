<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'background-post' ); ?> id="post-<?php the_ID(); ?>">

	<div class="wp-block-cover border-radius-lg align-items-stretch">

		<?php echo get_the_post_thumbnail( $post->ID, 'medium_large', array( 'class' => 'wp-block-cover__image-background rounded-lg') ); ?>

		<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim rounded-lg"></span>

		<div class="wp-block-cover__inner-container d-flex flex-column justify-content-between">

			<header class="entry-header position-relative">

				<?php 
				$modalidades = get_the_term_list( get_the_ID(), 'modalidad', '<span class="modalidad">', ' · ', '</span>' );
				if ( $modalidades ) {
					$modalidades = strip_tags( $modalidades, '<span>');
					echo $modalidades;
				} ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php 
				$areas_formativas = get_the_term_list( get_the_ID(), 'area-formativa', '<p class="small mb-0">', ' · ', '</p>' );
				if ( $areas_formativas ) {
					$areas_formativas = strip_tags( $areas_formativas, '<p>');
					echo $areas_formativas;
				} ?>

				<?php
				the_title(
					sprintf( '<p class="entry-title h4"><a class="stretched-link text-white" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></p>'
				);
				?>

				<?php smn_datos_resumen_formacion(); ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">

				<p class="text-center"><a href="<?php the_permalink(); ?>" class="btn btn-success"><?php echo __( 'Ver curso', 'smn' ); ?></a></p>
				
				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
