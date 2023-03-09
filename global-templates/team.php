<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$posts_ids = false;

if ( is_singular() ) {
	$posts_ids = get_post_meta( get_the_ID(), 'team', true );
}

if ( $posts_ids ) {

	$args = array(
		'post_type'			=> 'team',
		'post__in'			=> $posts_ids,
		'orderby'			=> 'post__in',
		'order'				=> 'ASC',
		'ignore_row'		=> true,
	);

	$q = new WP_Query($args);

	if ( $q->have_posts() ) { 
		?>
		
		<div class="wrapper team">

			<?php echo '<p class="h1 text-center mb-3">' . __( 'Conoce al profesorado', 'smn' ) . '</p>'; ?>

			<?php while ( $q->have_posts() ) { $q->the_post();

				get_template_part( 'loop-templates/content', 'team' );

			} ?>

		</div>


	<?php }

	wp_reset_postdata();
}