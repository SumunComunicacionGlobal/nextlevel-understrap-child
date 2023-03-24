<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$posts_ids = false;
$args = false;

if ( is_singular() ) {
	$posts_ids = get_post_meta( get_the_ID(), 'related_posts', true );
} elseif( is_tax() ) {
	$posts_ids = get_term_meta( get_queried_object_id(), 'related_posts', true );
}

if ( $posts_ids ) {

	if ( is_singular() ) {
		if (($key = array_search(get_the_ID(), $posts_ids)) !== false) {
			unset($posts_ids[$key]);
		}
	}

	$args = array(
		'post_type'			=> 'any',
		'post__in'			=> $posts_ids,
		'orderby'			=> 'post__in',
		'order'				=> 'ASC',
		'ignore_row'		=> true,
	);

} elseif( is_singular( 'formacion' ) ) {

	$taxonomy = 'area-formativa';
	$post_terms = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids') );

	if ( $post_terms ) {

		$args = array(
			'post_type'			=> 'formacion',
			'orderby'			=> 'rand',
			'ignore_row'		=> true,
			'tax_query'			=> array(array(
										'taxonomy'		=> $taxonomy,
										'terms'			=> $post_terms,
			)),
			'post__not_in'		=> array( get_the_ID() ),
		);

	}

} /*elseif( is_singular( 'post' ) ) {

	$taxonomy = 'category';
	$post_terms = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids') );

	if ( $post_terms ) {

		$args = array(
			'post_type'			=> 'post',
			'orderby'			=> 'rand',
			'ignore_row'		=> true,
			'tax_query'			=> array(array(
										'taxonomy'		=> $taxonomy,
										'terms'			=> $post_terms,
			)),
			'post__not_in'		=> array( get_the_ID() ),
		);

	}

}*/

if ( !$args ) return false;

$q = new WP_Query($args);

if ( $q->have_posts() ) { 
	
	$post_type = get_post_type();

	$pt_name = get_post_type_object( $post_type )->labels->name;

	echo '<div class="mw-600">';
		echo '<p class="h1">' . sprintf( __( '%s que también podrían interesarte', 'smn' ), $pt_name ) . '</p>';
	echo '</div>';
	if ( 'formacion' == $post_type ) {
		$post_type = 'formacion-background';
	}
	?>

	<div class="wp-block-group alignfull is-style-chevron-background">

		<div class="wp-block-group__inner-container">
	
			<div class="wrapper related-posts slick-carousel">

					<?php while ( $q->have_posts() ) { $q->the_post();

						get_template_part( 'loop-templates/content', $post_type );

					} ?>

			</div>

			<?php if ( is_active_sidebar( 'related-posts-after' ) ) {
				dynamic_sidebar( 'related-posts-after' );
			} ?>

		</div>

	</div>

<?php }

wp_reset_postdata();

