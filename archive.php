<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$post_type = get_post_type();

?>

<?php get_template_part( 'global-templates/image-header-archive' ); ?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

					<div class="row">

						<div class="col-md-6">

							<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

						</div>


						<?php if ( is_tax() ) { ?>
							
							<div class="col-md-6">
								
								<?php echo get_term_meta( get_queried_object_id(), 'secondary_description', true ); ?>

							</div>

							<div class="col-12">
							
								<?php get_template_part( 'global-templates/content-fragments', '', array('post_ids' => get_term_meta( get_queried_object_id(), 'top_fragments', true ) ) ); ?>

							</div>
						
						<?php } ?>

					</div><!-- .row -->

				</header><!-- .page-header -->


				<?php
				if ( is_category() || is_tag() ) {

					get_template_part( 'global-templates/filtro', 'blog' );

				} elseif ( is_tax( 'product_cat' ) ) {

					get_template_part( 'global-templates/subcategories' );

				} elseif ( 'formacion' == get_post_type() ) {

					get_template_part( 'global-templates/filtro-formacion' );
					
				}
				
				if ( have_posts() ) { ?>

					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', $post_type );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<?php
			if ( 'formacion' == get_post_type() ) {
				echo facetwp_display( 'facet', 'paginacion' ); 
			} else {
				// Display the pagination component.
				understrap_pagination();
			}

			if ( is_tax() ) {
				get_template_part( 'global-templates/content-fragments', '', array('post_ids' => get_term_meta( get_queried_object_id(), 'bottom_fragments', true ) ) );
				echo get_term_meta( get_queried_object_id(), 'terciary_description', true ); 
			}
			
			get_template_part( 'global-templates/related-posts' );

			// Do the right sidebar check.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
