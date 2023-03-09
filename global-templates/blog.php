<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$args = array(
	'posts_per_page'	=> 3,
	'ignore_row'		=> true,
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { ?>

	<div class="hfeed blog-block" id="wrapper-blog">

		<div class="<?php echo esc_attr( $container ); ?>" tabindex="-1">

			<?php if( is_singular() ): ?>
			<div class="row">
			<?php endif; ?>

				<?php while ( $q->have_posts() ) { $q->the_post();

					if ( 0 == $q->current_post ) :

						echo '<div class="col-lg-6">';

							get_template_part( 'loop-templates/content', 'background' );

						echo '</div>';

					else:

						echo '<div class="col-lg-3">';
							
							get_template_part( 'loop-templates/content' );

						echo '</div>';

					endif;

				} ?>

			<?php if( is_singular() ): ?>
			</div>
			<?php endif; ?>

		</div>

	</div>

<?php }

wp_reset_postdata();
