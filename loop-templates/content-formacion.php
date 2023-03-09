<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'hfeed-post' ); ?> id="post-<?php the_ID(); ?>">

	<div class="formacion-wrapper position-relative">

		<?php echo get_the_post_thumbnail( $post->ID, 'medium_large', array('class' => 'rounded') ); ?>

		<?php 
		$modalidades = get_the_term_list( get_the_ID(), 'modalidad', '<span class="modalidad">', ' · ', '</span>' );
		if ( $modalidades ) {
			$modalidades = strip_tags( $modalidades, '<span>');
			echo $modalidades;
		} ?>

		<header class="entry-header px-2">

			<?php 
			$areas_formativas = get_the_term_list( get_the_ID(), 'area-formativa', '<p class="small mb-0">', ' · ', '</p>' );
			if ( $areas_formativas ) {
				$areas_formativas = strip_tags( $areas_formativas, '<p>');
				echo $areas_formativas;
			} ?>

			<?php
			the_title(
				sprintf( '<p class="entry-title h4"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></p>'
			);
			?>

		</header><!-- .entry-header -->

		<div class="entry-content px-2">

			<?php smn_datos_resumen_formacion(); ?>

			<p class="text-center"><span class="btn btn-success"><?php echo __( 'Read More...', 'understrap' ); ?></span></p>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
