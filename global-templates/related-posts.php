<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$posts_ids = false;

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
}
