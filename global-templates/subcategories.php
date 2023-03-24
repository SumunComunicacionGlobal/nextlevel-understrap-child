<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$read_more = __( 'Read More...', 'understrap' );

if ( is_tax( 'area-formativa') ) {

	$current_term = get_queried_object();

	$terms = get_terms( array( 
		'taxonomy' 		=> $current_term->taxonomy, 
		'parent' 		=> $current_term->term_id, 
		'hide_empty' 	=> true,
	) );

} else {

	$terms = get_terms( array( 
		'taxonomy' 		=> 'area-formativa', 
		'parent' 		=> 0, 
		'hide_empty' 	=> true,
	) );

}

if ( $terms ) { ?>

	<div class="slick-carousel subcategories">

		<?php foreach ( $terms as $key => $term ) { ?>

			<?php $img_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); ?>

			<?php if ( $term->taxonomy == 'area-formativa' ) $read_more = __( 'Ver cursos', 'smn' ); ?>

			<div class="card subcategory">

				<?php if ( $img_id ) echo wp_get_attachment_image( $img_id, 'medium', false, array( 'class' => 'card-img-top' ) ); ?>

				<div class="card-body">

					<h3 class="h4 card-title"><?php echo $term->name; ?></h3>

					<?php echo wpautop( wp_trim_words( $term->description, 20, false ) . '…' ); ?>

				</div>

				<div class="card-footer">

					<p><a class="btn btn-success stretched-link" href="<?php echo get_term_link( $term ); ?>"><?php echo $read_more; ?></a></p>

				</div>

			</div>

		<?php } ?>

	</div>

	<?php if ( is_active_sidebar( 'related-posts-after' ) ) {
		dynamic_sidebar( 'related-posts-after' );
	} ?>

<?php } ?>